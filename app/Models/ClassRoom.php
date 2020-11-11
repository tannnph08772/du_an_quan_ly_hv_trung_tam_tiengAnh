<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    public function teacher(){
    	return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function course(){
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function place(){
    	return $this->belongsTo(Place::class, 'place_id');
    }
}
