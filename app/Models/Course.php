<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function teachers(){
    	return $this->hasMany(Teacher::class, 'course_id', 'id');
    }

    public function classes(){
    	return $this->hasMany(ClassRoom::class, 'course_id', 'id');
    }
}
