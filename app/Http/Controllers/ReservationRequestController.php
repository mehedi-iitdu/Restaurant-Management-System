<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservationRequest; 
use App\Restaurant;

class ReservationRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('reservation_requests.index');
    }

    public function show($code){
    	$reservation_requests = Restaurant::where('code', $code)->first()->reservationRequests;
    	//dd($reservation_requests);
    	return view('reservation_requests.show', compact('reservation_requests', 'code'));
    }
}
