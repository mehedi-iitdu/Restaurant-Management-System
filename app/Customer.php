<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Reservation;

class Customer extends Model
{
    protected $table = 'customer';

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function reservations(){
    	return $this->hasMany(Reservation::class);
    }
}
