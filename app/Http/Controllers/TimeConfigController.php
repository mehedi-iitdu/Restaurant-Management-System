<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Admin;
use App\TimeConfig;
use Auth;

class TimeConfigController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('times.index');
    }

    public function showTimeConfig($code){
        $timeConfigs = Restaurant::where('code', $code)->first()->timeConfigs;
        return view('times.show', ['timeConfigs'=> $timeConfigs, 'code' => $code]);
    }

    public function showAddTimeConfigForm($code){
    	return view('times.add', ['code' => $code]);
    }

    public function insertTimeConfig(Request $request){
        $restaurant = Restaurant::where('code', $request->code)->first();
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

        for($j=0; $j < count($days); $j++){
            $timeConfig = new TimeConfig;
            $timeConfig->restaurant_id = $restaurant->id;
            $timeConfig->day = $days[$j];
            $timeConfig->opening_time = $request->opening_time[$j];
            $timeConfig->closing_time = $request->closing_time[$j];
            $timeConfig->save();
        }

        flash('Time Configuration inserted')->success();

        return redirect()->route('timeConfig.index');
    }

    /*public function showEditTimeConfigForm(Request $request){
        $timeConfig = TimeConfig::find($request->id);
        return view('times.edit',['timeConfig' => $timeConfig]);
    }*/

    public function updateTimeConfig(Request $request){

        $restaurant = Restaurant::where('code', $request->code)->first();
        $days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');

        for($j=0; $j < count($days); $j++){
            $timeConfig = TimeConfig::where('day', $days[$j])->where('restaurant_id', $restaurant->id)->first();
            $timeConfig->opening_time = $request->opening_time[$j];
            $timeConfig->closing_time = $request->closing_time[$j];
            $timeConfig->save();
        }

        flash('Time Configuration updated')->success();

        return redirect()->route('timeConfig.index');
    }
}
