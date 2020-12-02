<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $table = 'places';
	protected $primaryKey = 'id';

    protected $fillable = [
        'name_place', 'address'
    ];

    public function classes(){
    	return $this->hasMany(ClassRoom::class, 'place_id', 'id');
    }

    public function waitList(){
    	return $this->hasOne(WaitList::class, 'place_id', 'id');
    }
}
