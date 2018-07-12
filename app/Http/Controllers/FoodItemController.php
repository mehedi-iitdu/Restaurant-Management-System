<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\Admin;
use App\FoodItem;
use App\FoodCategory;
use Auth;

class FoodItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
    	return view('fooditem.index');
    }

    public function showFoodItems($code){
        $restaurant = Restaurant::where('code', $code)->first();
        $foodCategories = $restaurant->foodCategories;
        return view('fooditem.show', ['foodCategories'=> $foodCategories, 'code' => $code]);
    }

    public function showAddFoodItemForm($code){
        $restaurant = Restaurant::where('code', $code)->first();
        $foodCategories = $restaurant->foodCategories;
        return view('fooditem.add_item', ['foodCategories' => $foodCategories, 'code'=>$code]);
    }

    public function insertFoodItem(Request $request){
        $restaurant = Restaurant::where('code', $request->code)->first();
        
        $foodItem = new FoodItem;
        $foodItem->name = $request->name;
        $foodItem->description = $request->description;
        $foodItem->price = $request->price;
        $foodItem->restaurant_id = $restaurant->id;
        $foodItem->food_category_id = $request->food_category_id;

        if($foodItem->save()){
            flash('Item inserted')->success();
            /*return redirect()->route('fooditem.index');*/
        }

        return redirect()->route('fooditem.show', $request->code);
    }

    public function showEditFoodItemForm(Request $request){
        $foodItem = FoodItem::find($request->id);
        $restaurant = Restaurant::where('id', $foodItem->restaurant_id)->first();
        $foodCategories = $restaurant->foodCategories;
        return view('fooditem.edit_item', ['foodItem' => $foodItem, 'foodCategories' => $foodCategories]);
    }

    public function updateFoodItem(Request $request){
        $foodItem = FoodItem::find($request->id);

        $foodItem->name = $request->name;
        $foodItem->description = $request->description;
        $foodItem->price = $request->price;
        $foodItem->food_category_id = $request->food_category_id;

        if($foodItem->save()){
            flash('Item updated')->success();
            /*return redirect()->route('fooditem.index');*/
        }

        return redirect()->route('fooditem.show', $request->code);
    }

    public function deleteFoodItem(Request $request){
        $foodItem = FoodItem::find($request->id);
        $code = $foodItem->restaurant->code;

        if ($foodItem != null) {
            $foodItem->delete();
            flash('Item deleted')->success();
        }
        return redirect()->route('fooditem.show', $code);
    }
}
