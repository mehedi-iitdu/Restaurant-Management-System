<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Restaurant;

class FoodItem extends Model
{

	protected $table = 'food_item';

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }

    public function foodCategory(){
    	return $this->belongsTo(FoodCategory::class);
    }
}
