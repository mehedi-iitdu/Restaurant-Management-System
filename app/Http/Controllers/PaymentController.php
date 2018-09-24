<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Restaurant;
use App\Config;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function preparePayment($code)
    {
        $config = Config::first();

        //dd($config);

        $restaurant_id = Restaurant::where('code', $code)->first()->id;
        $order_id = Str::random();

    	$mollie = new \Mollie\Api\MollieApiClient();
    	$mollie->setApiKey("test_QzcsxBmNVtbhVdyRptJdFMjtUPwpfR");

        $payment = $mollie->payments->create([
            "amount" => [
                "currency" => $config->currency,
                "value" => $config->payment_amount
            ],
            "description" => "Verify your restaurant",
            "redirectUrl" => route('payment_check', $order_id)
        ]);

        $payment_ = new Payment;
        $payment_->payment_id = $payment->id;
        $payment_->order_id = $order_id;
        $payment_->restaurant_id = $restaurant_id;
        $payment_->save();
        
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function paymentCheck($order_id)
    {
    	$mollie = new \Mollie\Api\MollieApiClient();
    	$mollie->setApiKey("test_QzcsxBmNVtbhVdyRptJdFMjtUPwpfR");

    	$payment = $mollie->payments->get(Payment::where('order_id', $order_id)->first()->payment_id);

    	if ($payment->isPaid())
    	{
    	    $restaurant = Restaurant::find(Payment::where('order_id', $order_id)->first()->restaurant_id);
            $restaurant->status = 'Active';
            $restaurant->save();

            flash('Payment successfull! '.$restaurant->name.' is now verified')->success();

            return redirect()->route('mylistings', 'Active');
    	}
        else{

            flash('Payment failed! Try again.')->danger();

            return redirect()->route('mylistings');
        }
    }
}
