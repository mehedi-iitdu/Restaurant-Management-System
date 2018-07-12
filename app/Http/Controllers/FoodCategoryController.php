<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Admin;
use Auth;
use App\FoodCategory;

class FoodCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function insertCategory(Request $request){
    	$restaurant = Restaurant::where('code', $request->code)->first();

    	$foodCategory = new FoodCategory;
    	$foodCategory->name = $request->name;
    	$foodCategory->restaurant_id = $restaurant->id;
    	$foodCategory->save();

    	flash('Category inserted')->success();

        return redirect()->route('fooditem.show', $request->code);
    }

    public function updateCategory(Request $request){
    	$foodCategory = FoodCategory::find($request->id);
    	$foodCategory->name = $request->name;
    	$foodCategory->save();

    	flash('Category updated')->success();

        return redirect()->route('fooditem.show', $request->code);
    }

    public function deleteCategory(Request $request){
    	$foodCategory = FoodCategory::find($request->id);

        if($foodCategory != null){
            $foodCategory->delete();
            flash('Category deleted')->success();
        }
        return back();
    }
}
