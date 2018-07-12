<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    protected $table = 'food_category';

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }

    public function foodItems(){
    	return $this->hasMany(FoodItem::class);
    }
}
