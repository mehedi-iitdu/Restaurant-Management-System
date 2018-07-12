<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeConfig extends Model
{
	protected $table = 'time_config';
	
    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }
}
