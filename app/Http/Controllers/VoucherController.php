<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Voucher;

class VoucherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('vouchers.index');
    }

    public function showVouchers($code){
    	$vouchers = Restaurant::where('code', $code)->first()->vouchers;
    	return view('vouchers.show', compact('vouchers', 'code'));
    }

    public function editVoucher(Request $request){
    	$voucher = Voucher::find($request->id);
        return view('vouchers.edit', compact('voucher'));
    }

    public function updateVoucher(Request $request){
        $voucher = Voucher::find($request->id);
        $voucher->status = $request->status;
        $voucher->title = $request->title;
        $voucher->description = $request->description;
        $voucher->price = $request->price;
        if($request->file('photo') != null){
            $path = $request->file('photo')->store('uploads');
            $voucher->photo = $path;
        }
        if ($voucher->save()) {
            flash('Voucher updated successfully')->success();
        }

        return redirect()->route('vouchers.show', $voucher->restaurant->code);
    }

    public function showAddVoucherForm($code){
        return view('vouchers.add', compact('code'));
    }

    public function insertVoucher(Request $request){
        $voucher = new Voucher;
        $voucher->restaurant_id = Restaurant::where('code', $request->code)->first()->id;
        $voucher->title = $request->title;
        $voucher->description = $request->description;
        $voucher->price = $request->price;
        if($request->file('photo') != null){
            $path = $request->file('photo')->store('uploads');
            $voucher->photo = $path;
        }
        if ($voucher->save()) {
            flash('Voucher added successfully')->success();
        }

        return redirect()->route('vouchers.show', $request->code);
    }
}
