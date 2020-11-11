<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function classes(){
    	return $this->hasMany(ClassRoom::class, 'place_id', 'id');
    }
}
