<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class Reservation extends Model
{
    public function customer(){
    	return $this->belongsTo(Customer::class);
    }
}
