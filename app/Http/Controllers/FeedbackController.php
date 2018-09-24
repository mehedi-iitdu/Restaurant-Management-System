<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;
use App\Restaurant;

class FeedbackController extends Controller
{
	public function index($code){
		return view('feedback_app.index', compact('code'));
	}

    public function store(Request $request)
    {
    	$feedback = new Feedback;
    	$feedback->service = $request->service;
    	$feedback->waiting_time = $request->waiting_time;
    	$feedback->meal = $request->meal;
        $feedback->value = $request->value;
        $feedback->comment = $request->comment;
        $feedback->suggestion = $request->suggestion;
    	$feedback->email = $request->email;
    	$feedback->sub_1 = $request->sub_1;
    	$feedback->sub_2 = $request->sub_2;
        $feedback->date = strtotime(date('d-m-Y H:i'));
    	$feedback->restaurant_id = Restaurant::where('code', $request->code)->first()->id;
    	$feedback->save();

    	return "submitted";
    }

    public function delete(Request $request)
    {
        $feedback = Feedback::find($request->id);
        $feedback->delete();
        return "deleted";
    }
}
