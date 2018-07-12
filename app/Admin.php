<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Restaurant;

class Admin extends Model
{
    protected $table = 'admin';

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }
}
