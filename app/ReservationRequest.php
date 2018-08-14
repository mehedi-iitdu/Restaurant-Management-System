<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationRequest extends Model
{
    protected $table = 'reservation_requests';

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }
}
