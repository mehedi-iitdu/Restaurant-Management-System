<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Restaurant;
use App\ReservationRequest;
use App\TimeConfig;

class ReservationController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index()
    {
        return view('reservations.index');
    }

    public function store(Request $request)
    {
    	$reservation_request = ReservationRequest::find($request->reservation_request_id);

    	foreach ($request->table_ids as $key => $table_id) {
    		$reservation = new Reservation;
            $reservation->restaurant_id = $reservation_request->restaurant_id;
    		$reservation->reservation_request_id = $reservation_request->id;
    		$reservation->restaurant_table_id = $table_id;
    		$reservation->date = $reservation_request->date;
    		$reservation->start_time = $reservation_request->time;
    		$reservation->end_time = date('H:i:s', strtotime($reservation_request->time.$request->hours.$request->minutes));
            $reservation->color = $request->color;
    		$reservation->save();

    		$reservation_request->status = 1;
    		$reservation_request->save();
    	}

    	flash('Reservation confirmed')->success();

    	return redirect()->route('reservation_requests.show', $reservation_request->restaurant->code);
    }

    public function show($code)
    {
        $resources = array();
        foreach (Restaurant::where('code', $code)->first()->tables as $key => $table) {
            $item['id'] = $table->id;
            $item['type'] = $table->restaurant->restaurant_type->name;
            $item['title'] = $table->name;
            array_push($resources, $item);
        }
        return view('reservations.show', compact('code', 'resources'));
    }

    public function events(Request $request)
    {
        $reservations = Restaurant::where('code', $request->code)->first()->reservations;
        $events = array();
        foreach ($reservations as $key => $reservation) {
            $item['id'] = $reservation->id;
            $item['resourceId'] = $reservation->restaurant_table_id;
            $item['start'] = date('Y-m-d', $reservation->date).'T'.$reservation->start_time;
            $item['end'] = date('Y-m-d', $reservation->date).'T'.$reservation->end_time;
            $item['title'] = $reservation->reservationRequest->first_name.' '.$reservation->reservationRequest->last_name;
            $item['backgroundColor'] = '#'.$reservation->color;
            $item['person'] = $reservation->reservationRequest->number_of_people;
            $item['note'] = $reservation->reservationRequest->note;

            array_push($events, $item);
        }

        return $events;
    }

    public function edit(Request $request)
    {
        $reservation = Reservation::find($request->id);
        $day = date('l', $reservation->date);
        $timeConfig = TimeConfig::where('restaurant_id', $reservation->restaurant->id)->where('day', $day)->first();
        return view('reservations.edit', compact('reservation', 'timeConfig'));
    }
}
