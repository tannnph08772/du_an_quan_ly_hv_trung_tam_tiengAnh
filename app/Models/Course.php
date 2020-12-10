<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Course extends Model
{
    protected $table = 'courses';
	protected $primaryKey = 'id';

    protected $fillable = [
        'name_course', 'number_course', 'description'
    ];

    public function teachers(){
    	return $this->hasMany(Teacher::class, 'course_id', 'id');
    }

    public function classes(){
    	return $this->hasMany(ClassRoom::class, 'course_id', 'id');

    }
    
    public function waitList(){
    	return $this->belongsTo(WaitList::class, 'course_id');
    }

    public function students(){
    	return $this->hasMany(Student::class, 'course_id', 'id');
    }

    public function reserves(){
    	return $this->hasMany(Reserve::class, 'course_id', 'id');
    }
}
