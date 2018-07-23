<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TimeConfig;
use App\Restaurant;
use App\RestaurantTable;
use App\ReservationRequest;

class WidgetController extends Controller
{
    public function getAvailableTimes(Request $request){

        if($request->date != null){
            $day = date('l', strtotime($request->date));
            $timeConfig = TimeConfig::where('restaurant_id', Restaurant::where('code', $request->code)->first()->id)->where('day', $day)->first();
            
            return view('widget.item_time', ['timeConfig'=>$timeConfig]);
        }
    }

    public function getMaximumPeopleNumber(Request $request){

    	$table = RestaurantTable::where('restaurant_id', Restaurant::where('code', $request->code)->first()->id)->orderBy('capacity', 'desc')->first();
    	
    	return $table->capacity;
    }

    public function storeBookRequest(Request $request){
        $reservationRequest = new ReservationRequest;
        $reservationRequest->restaurant_id = Restaurant::where('code', $request->code)->first()->id;
        $reservationRequest->number_of_people = $request->number_of_people;
        $reservationRequest->date = strtotime($request->date);
        $reservationRequest->time = $request->time;
        $reservationRequest->title = $request->title;
        $reservationRequest->company = $request->company;
        $reservationRequest->first_name = $request->first_name;
        $reservationRequest->last_name = $request->last_name;
        $reservationRequest->email = $request->email;
        $reservationRequest->telephone = $request->telephone;
        $reservationRequest->note = $request->note;

        if ($reservationRequest->save()) {
            return "success";
        }

        return "error";
    }
}
