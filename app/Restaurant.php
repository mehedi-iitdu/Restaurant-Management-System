<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
	protected $table = 'restaurant';

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function tables(){
    	return $this->hasMany(RestaurantTable::class);
    }

    public function timeConfigs(){
    	return $this->hasMany(TimeConfig::class);
    }

    public function foodItems(){
        return $this->hasMany(FoodItem::class)->orderBy('food_category_id','asc');
    }

    public function foodCategories(){
        return $this->hasMany(FoodCategory::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function restaurant_type(){
        return $this->belongsTo(RestaurantType::class);
    }

    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function holidays(){
        return $this->hasMany(Holiday::class);
    }
}
