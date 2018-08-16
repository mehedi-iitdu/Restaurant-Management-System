<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Bookmark;
use App\Restaurant;

class BookmarkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $bookmark = Bookmark::where('user_id', Auth::user()->id)->where('restaurant_id', Restaurant::where('code', $request->code)->first()->id)->first();

        if($bookmark == null){
            $bookmark = new Bookmark;
            $bookmark->user_id = Auth::user()->id;
            $bookmark->restaurant_id = Restaurant::where('code', $request->code)->first()->id;
            $bookmark->save();
        }
        else{
            $bookmark->delete();
        }

    	return count(\App\Bookmark::where('restaurant_id', Restaurant::where('code', $request->code)->first()->id)->get());
    }
}
