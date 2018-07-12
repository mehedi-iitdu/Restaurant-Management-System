<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\RestaurantType;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurantTypes = RestaurantType::all();
        return view('home',['restaurantTypes' => $restaurantTypes]);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function listings()
    {   
        $restaurants = Restaurant::paginate(9);
        $restaurantTypes = RestaurantType::all();
        return view('listing', ['restaurants' => $restaurants, 'restaurantTypes' => $restaurantTypes]);
    }

    public function filterListings(Request $request){
        if($request->order == 0){
            $restaurants = Restaurant::paginate(9);
        }
        else if($request->order == 3){
            $restaurants = Restaurant::orderBy('created_at', 'desc')->paginate(9);   
        }
        else if($request->order == 4){
            $restaurants = Restaurant::orderBy('created_at', 'asc')->paginate(9);   
        }

        if (!empty($request->amenities)) {
            foreach ($restaurants as $key => $restaurant) {
                $restaurant_amenities = json_decode($restaurant->amenities);
                $flag = 0;
                foreach ($request->amenities as $amenity) {
                    if(!$this->val_in_arr($amenity, $restaurant_amenities)){
                        $flag = 1;
                    }
                }
                if ($flag != 0) {
                    $restaurants->forget($key);
                }
            }   
        }
        
        return view('partials_.restaurants', ['restaurants' => $restaurants]);
    }

    public function val_in_arr($val,$arr){
        if(!empty($arr)){
            foreach($arr as $arr_val){
                if($arr_val == $val){
                    return true;
                }
            }    
        }
        
        return false;
    }

    public function showRestaurant($code){
        $restaurant = Restaurant::where('code', $code)->first();
        return view('restaurant_show', ['restaurant' => $restaurant]);
    }
}
