<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantTable extends Model
{
    protected $table = 'restaurant_table';

    public function restaurantType(){
    	return $this->belongsTo(RestaurantType::class);
    }

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }

    public function reservations(){
    	return $this->hasMany(Reservation::class);
    }
}
