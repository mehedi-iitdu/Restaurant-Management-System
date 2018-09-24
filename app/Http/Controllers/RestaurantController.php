<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RestaurantType;
use App\Restaurant;
use App\Admin;
use App\User;
use Auth;

class RestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($status){
        $restaurants = Auth::user()->restaurants->where('status', $status);
        return view('listing.index', ['restaurants'=>$restaurants, 'status' => $status]);
    }

    public function showAddListingForm(){
    	$restaurantTypes = RestaurantType::all();
    	return view('listing.add', ['restaurantTypes' => $restaurantTypes]);
    }

    public function insertRestaurant(Request $request){

    	$restaurant = new Restaurant;
   		$restaurant->restaurant_type_id = $request->restaurant_type_id;
        $restaurant->user_id = Auth::user()->id;
    	$restaurant->code = substr(md5($request->name), -20);
    	$restaurant->name = $request->name;
        $restaurant->city = $request->city;
    	$restaurant->address = $request->address;
    	$restaurant->latitude = $request->latitude;
    	$restaurant->longitude = $request->longitude;
    	$restaurant->description = $request->description;
        $restaurant->amenities = json_encode($request->check);
    	$restaurant->facebook = $request->facebook;
    	$restaurant->website = $request->website;
    	$restaurant->phone = $request->phone;
        $restaurant->twitter = $request->twitter;
        $restaurant->google_plus = $request->google_plus;
    	$restaurant->email = $request->email;
    	$restaurant->keywords = $request->keywords;

    	if($restaurant->save()){
	    	$user = Auth::user();
	    	$user->user_type = "Admin";
	    	$user->save();

            flash('Restaurant inserted')->success();
    	}
        
    	return redirect()->route('mylistings', 'Pending');
    }

    public function showEditRestaurantForm($code){
        $restaurant = Restaurant::where('code', $code)->first();
        $restaurantTypes = RestaurantType::all();
        return view('listing.edit', ['restaurant'=>$restaurant, 'restaurantTypes' => $restaurantTypes]);
    }

    public function updateRestaurant(Request $request){
        $restaurant = Restaurant::where('id', $request->id)->first();
        $restaurant->restaurant_type_id = $request->restaurant_type_id;
        $restaurant->name = $request->name;
        $restaurant->city = $request->city;
        $restaurant->address = $request->address;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->description = $request->description;
        $restaurant->amenities = json_encode($request->check);
        $restaurant->facebook = $request->facebook;
        $restaurant->website = $request->website;
        $restaurant->phone = $request->phone;
        $restaurant->email = $request->email;
        $restaurant->twitter = $request->twitter;
        $restaurant->google_plus = $request->google_plus;
        $restaurant->keywords = $request->keywords;
        $restaurant->save();

        flash('Restaurant updated')->success();

        return back();
    }
}
