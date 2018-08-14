<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\ReservationRequest;

class ReservationController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function store(Request $request)
    {
    	$reservation_request = ReservationRequest::find($request->reservation_request_id);

    	foreach ($request->table_ids as $key => $table_id) {
    		$reservation = new Reservation;
    		$reservation->reservation_request_id = $reservation_request->id;
    		$reservation->restaurant_table_id = $table_id;
    		$reservation->date = $reservation_request->date;
    		$reservation->start_time = $reservation_request->time;
    		$reservation->end_time = date('H:i:s', strtotime($reservation_request->time.$request->hours.$request->minutes));
    		$reservation->save();

    		$reservation_request->status = 1;
    		$reservation_request->save();
    	}

    	flash('Reservation confirmed')->success();

    	return redirect()->route('reservation_requests.show', $reservation_request->restaurant->code);
    }
}
