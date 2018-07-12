<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TimeConfig;
use App\Restaurant;
use App\RestaurantTable;

class WidgetController extends Controller
{
    public function getAvailableTimes(Request $request){

    	$day = date('l', strtotime($request->date));
    	$timeConfig = TimeConfig::where('restaurant_id', Restaurant::where('code', $request->code)->first()->id)->where('day', $day)->first();
    
    	return view('widget.item_time', ['timeConfig'=>$timeConfig]);
    }

    public function getMaximumPeopleNumber(Request $request){

    	$table = RestaurantTable::where('restaurant_id', Restaurant::where('code', $request->code)->first()->id)->orderBy('capacity', 'desc')->first();
    	
    	return $table->capacity;
    }
}
