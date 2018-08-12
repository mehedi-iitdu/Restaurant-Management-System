<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReservationRequest; 
use App\Restaurant;
use App\RestaurantTable;

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
    	return view('reservation_requests.show', compact('reservation_requests', 'code'));
    }

    public function accept(Request $request){
        $reservation_request = ReservationRequest::find($request->id);
        $tables = RestaurantTable::where('restaurant_id', $reservation_request->restaurant_id)->get();
        foreach ($tables as $key => $table) {
            $reservations = $table->reservations->where('date', $reservation_request->date);
            foreach ($reservations as $reservation) {
                if($reservation_request->time >= $reservation->start_time && $reservation_request->time < $reservation->end_time){
                    $tables->forget($key);
                    break;
                }
            }
        }
        return view('reservation_requests.accept', compact('tables', 'reservation_request'));
    }
}
