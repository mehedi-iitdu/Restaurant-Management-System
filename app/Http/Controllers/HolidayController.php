<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Holiday;
use App\Restaurant;

class HolidayController extends Controller
{

	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function showHolidays($code){
    	$holidays = Restaurant::where('code', $code)->first()->holidays;
    	return view('holidays.show', compact('holidays', 'code'));
    }

    public function insertHoliday(Request $request){
    	$holiday = new Holiday;
    	$holiday->purpose = $request->purpose;
    	$holiday->restaurant_id = Restaurant::where('code', $request->code)->first()->id;
    	$holiday->date = strtotime($request->date);

    	if($holiday->save()){
    		flash('Holiday inserted')->success();
    	}

    	return back();
    }

    public function updateHoliday(Request $request){
    	$holiday = Holiday::find($request->id);
    	$holiday->purpose = $request->purpose;
    	$holiday->date = strtotime($request->date);

    	if($holiday->save()){
    		flash('Holiday updated')->success();
    	}

    	return back();
    }

    public function deleteHoliday(Request $request){
    	$holiday = Holiday::find($request->id);

    	if($holiday->delete()){
    		flash('Holiday deleted')->success();
    	}

    	return back();
    }
}
