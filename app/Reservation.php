<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Reservation extends Model
{
	protected $table = 'reservation';

    public function reservationRequest(){
        return $this->belongsTo(ReservationRequest::class);
    }
}
