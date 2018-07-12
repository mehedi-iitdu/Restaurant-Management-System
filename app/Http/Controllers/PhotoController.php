<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Photo;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	return view('photos.index');
    }

    public function showPhotos($code)
    {
    	$photos = Restaurant::where('code', $code)->first()->photos;
    	return view('photos.show', compact('photos','code'));
    }

    public function upload(Request $request)
    {

    	$photo = new Photo;

    	if($request->file('file') != null){
            $path = $request->file('file')->store('uploads');
            $photo->photo = $path;
            $photo->restaurant_id = Restaurant::where('code', $request->code)->first()->id;
            $photo->save();
            flash('Photo uploaded')->success();
        }

        return "uploaded";
    }

    public function delete($id)
    {

    	$photo = Photo::find($id);

        if($photo != null){
            $photo->delete();
            flash('Photo deleted')->success();
        }
        return back();
    }
}
