<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\RestaurantType;
use Auth;
use App\Review;
use App\Feedback;
use App\Bookmark;

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
        $restaurant_ids = array();
        foreach (Auth::user()->restaurants as $key => $restaurant) {
            array_push($restaurant_ids, $restaurant->id);
        }
        $total_review = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $total_review += count(Review::where('restaurant_id', $restaurant_id)->get());
        }
        $total_bookmark = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $total_bookmark += count(Bookmark::where('restaurant_id', $restaurant_id)->get());
        }

        $month1 = strtotime('-1 month');
        $month2 = strtotime('-2 month');
        $month3 = strtotime('-3 month');
        $month4 = strtotime('-4 month');

        $rating_month1 = 0;
        $feedback = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $feedback += count(Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month2)->where('date', '<', $month1)->get());
            $rating_month1 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month2)->where('date', '<', $month1)->get()->sum('service');
            $rating_month1 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month2)->where('date', '<', $month1)->get()->sum('meal');
            $rating_month1 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month2)->where('date', '<', $month1)->get()->sum('waiting_time');
            $rating_month1 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month2)->where('date', '<', $month1)->get()->sum('value');
        }
        if($feedback > 0){
            $rating_month1 = $rating_month1/$feedback;
        }

        $rating_month2 = 0;
        $feedback = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $feedback += count(Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month3)->where('date', '<', $month2)->get());
            $rating_month2 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month3)->where('date', '<', $month2)->get()->sum('service');
            $rating_month2 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month3)->where('date', '<', $month2)->get()->sum('meal');
            $rating_month2 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month3)->where('date', '<', $month2)->get()->sum('waiting_time');
            $rating_month2 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month3)->where('date', '<', $month2)->get()->sum('value');
        }
        if($feedback >0){
            $rating_month2 = $rating_month2/$feedback;
        }

        $rating_month3 = 0;
        $feedback = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $feedback += count(Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month4)->where('date', '<', $month3)->get());
            $rating_month3 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month4)->where('date', '<', $month3)->get()->sum('service');
            $rating_month3 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month4)->where('date', '<', $month3)->get()->sum('meal');
            $rating_month3 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month4)->where('date', '<', $month3)->get()->sum('waiting_time');
            $rating_month3 += Feedback::where('restaurant_id', $restaurant_id)->where('date', '>', $month4)->where('date', '<', $month3)->get()->sum('value');
        }
        if($feedback >0){
            $rating_month3 = $rating_month3/$feedback;
        }

        $total_feedback = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $total_feedback += count(Feedback::where('restaurant_id', $restaurant_id)->get());
        }

        $positive = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $positive += count(Feedback::where('restaurant_id', $restaurant_id)->where('comment', '!=', null)->get());
        }
        if($total_feedback > 0){
            $positive = $positive/$total_feedback;
        }

        $negative = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $negative += count(Feedback::where('restaurant_id', $restaurant_id)->where('suggestion', '!=', null)->get());
        }
        if($total_feedback > 0){
            $negative = $negative/$total_feedback;
        }

        $service = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $service += Feedback::where('restaurant_id', $restaurant_id)->get()->sum('service');
        }
        if($total_feedback >0){
            $service = $service/$total_feedback;
        }

        $waiting_time = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $waiting_time += Feedback::where('restaurant_id', $restaurant_id)->get()->sum('waiting_time');
        }
        if($total_feedback >0){
            $waiting_time = $waiting_time/$total_feedback;
        }

        $meal = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $meal += Feedback::where('restaurant_id', $restaurant_id)->get()->sum('meal');
        }
        if($total_feedback >0){
            $meal = $meal/$total_feedback;
        }

        $value = 0;
        foreach ($restaurant_ids as $key => $restaurant_id) {
            $value += Feedback::where('restaurant_id', $restaurant_id)->get()->sum('value');
        }
        if($total_feedback >0){
            $value = $value/$total_feedback;
        }
        
        return view('dashboard', compact('total_review', 'total_bookmark', 'rating_month1', 'rating_month2', 'rating_month3', 'service', 'waiting_time', 'meal', 'value', 'positive', 'negative', 'restaurant_ids'));
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
