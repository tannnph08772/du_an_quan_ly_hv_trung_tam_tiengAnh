<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'classes';
	protected $primaryKey = 'id';

    protected $fillable = [
        'name_class', 'start_day', 'end_day', 'status', 'teacher_id', 'course_id', 'place_id', 'schedule_id'
    ];

    public function teacher(){
    	return $this->belongsTo(Teacher::class, 'teacher_id');
    }

    public function course(){
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function place(){
    	return $this->belongsTo(Place::class, 'place_id');
    }

    public function attendances(){
    	return $this->hasMany(Attendance::class, 'class_id', 'id');
    }

    public function feedback(){
    	return $this->hasMany(Feedback::class, 'class_id', 'id');
    }

    public function students(){
    	return $this->hasMany(Student::class, 'class_id', 'id');
    }

    public function schedule(){
    	return $this->belongsTo(Schedule::class, 'schedule_id');
    }

    public function sampleForms(){
    	return $this->hasMany(SampleForm::class, 'class_id', 'id');
    }

    public function homeworks(){
    	return $this->hasMany(Homework::class, 'class_id');
    }
}
