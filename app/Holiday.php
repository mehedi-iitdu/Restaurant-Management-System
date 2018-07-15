<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    protected $table = 'holiday';

    public function restaurant(){
    	return $this->belongsTo(Restaurant::class);
    }
}
