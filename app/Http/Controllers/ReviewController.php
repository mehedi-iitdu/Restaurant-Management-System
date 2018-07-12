<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Admin;
use Auth;
use App\Review;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $restaurants = Restaurant::where('user_id', Auth::user()->id)->get();
    	
        $visitor_reviews = Review::join('restaurant', 'restaurant.id','=', 'restaurant_id')->where('restaurant.user_id', '=', Auth::user()->id)->get();

        $my_reviews = Review::where('user_id', Auth::user()->id)->get();

    	return view('reviews.index', ['visitor_reviews'=> $visitor_reviews, 'my_reviews'=>$my_reviews, 'restaurants' => $restaurants]);
    }

    public function showReview(Request $request){

        if($request->code == "all"){
            
            $visitor_reviews = Review::join('restaurant', 'restaurant.id','=', 'restaurant_id')->where('restaurant.user_id', '=', Auth::user()->id)->get();
        }
        else{
            $visitor_reviews = Review::where('restaurant_id', Restaurant::where('code', $request->code)->first()->id)->get();
        }

        return view('partials_.reviews', ['visitor_reviews'=> $visitor_reviews]);
    }
}
