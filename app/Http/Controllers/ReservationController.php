<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Restaurant;
use App\ReservationRequest;
use App\TimeConfig;
use App\RestaurantTable;

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
        $people = $reservation_request->number_of_people;

    	foreach ($request->table_ids as $key => $table_id) {
            if($people > 0){
                $reservation = new Reservation;
                $reservation->restaurant_id = $reservation_request->restaurant_id;
                $reservation->reservation_request_id = $reservation_request->id;
                $reservation->restaurant_table_id = $table_id;
                $reservation->number_of_people = min(RestaurantTable::find($table_id)->capacity, $people);
                $reservation->date = $reservation_request->date;
                $reservation->start_time = $reservation_request->time;
                $reservation->end_time = date('H:i:s', strtotime($reservation_request->time.$request->hours.$request->minutes));
                $reservation->color = $request->color;
                $reservation->save();

                $reservation_request->status = 1;
                $reservation_request->save();

                $people = $people - $reservation->number_of_people;
            }
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
            $item['person'] = $reservation->number_of_people;
            $item['note'] = $reservation->reservationRequest->note;

            array_push($events, $item);
        }

        return $events;
    }

    public function edit(Request $request)
    {
        $reservation = Reservation::find($request->id);
        $code = $reservation->restaurant->code;
        $day = date('l', $reservation->date);
        $timeConfig = TimeConfig::where('restaurant_id', $reservation->restaurant->id)->where('day', $day)->first();
        return view('reservations.edit', compact('reservation', 'timeConfig', 'code'));
    }

    public function update(Request $request)
    {
        $reservation = Reservation::find($request->id);
        $reservation->restaurant_table_id = $request->table_id;
        $reservation->date = strtotime($request->date);
        $reservation->start_time = $request->start_time;
        $reservation->end_time = $request->end_time;
        $reservation->color = $request->color;
        $reservation->reservationRequest->number_of_people = $request->number_of_people;
        $reservation->save();
        return "updated";
    }

    public function create(Request $request)
    {
        $restaurant = Restaurant::where('code', $request->code)->first();
        return view('reservations.create', compact('restaurant'));
    }

    public function store_event(Request $request)
    {
        $reservation_request = new ReservationRequest;
        $reservation_request->restaurant_id = Restaurant::where('code', $request->code)->first()->id;
        $reservation_request->number_of_people = $request->number_of_people;
        $reservation_request->date = strtotime($request->date);
        $reservation_request->time = $request->start_time;
        $reservation_request->title = $request->title;
        $reservation_request->company = $request->company;
        $reservation_request->first_name = $request->first_name;
        $reservation_request->last_name = $request->last_name;
        $reservation_request->email = $request->email;
        $reservation_request->telephone = $request->telephone;
        $reservation_request->note = $request->note;
        $reservation_request->save();

        $people = $reservation_request->number_of_people;

        foreach ($request->table_ids as $key => $table_id) {
            if($people > 0){
                $reservation = new Reservation;
                $reservation->restaurant_id = $reservation_request->restaurant_id;
                $reservation->reservation_request_id = $reservation_request->id;
                $reservation->restaurant_table_id = $table_id;
                $reservation->number_of_people = min(RestaurantTable::find($table_id)->capacity, $people);
                $reservation->date = $reservation_request->date;
                $reservation->start_time = $reservation_request->time;
                $reservation->end_time = $request->end_time;
                $reservation->color = $request->color;
                $reservation->save();

                $reservation_request->status = 1;
                $reservation_request->save();

                $people = $people - $reservation->number_of_people;
            }
        }

        return "stored";
    }

    public function delete(Request $request)
    {
        $reservation = Reservation::find($request->id);
        $reservation->delete();
        return "deleted";
    }
}
