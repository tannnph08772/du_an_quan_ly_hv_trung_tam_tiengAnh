<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
     'status', 'user_id', 'class_id', 'course_id'
    ];
    
    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function attendanceDetail(){
        return $this->hasOne(AttendanceDetail::class, 'student_id', 'id');
    }

    public function course(){
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function feedback(){
    	return $this->hasOne(Feedback::class, 'student_id');
    }

    public function classRoom(){
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }

    public function class(){
    	return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    
    public function homeworks(){
    	return $this->hasMany(Homework::class, 'student_id');
    }

    public function sampleForms(){
    	return $this->hasMany(SampleForm::class, 'student_id');
    }

    public function submit(){
    	return $this->hasMany(Submit::class, 'student_id');
    }

    public function tuitions(){
        return $this->hasMany(Tuition::class, 'student_id');
    }
    
    public function reserves(){
    	return $this->hasMany(Reserve::class, 'student_id');
    }

    public function points(){
    	return $this->hasMany(Point::class, 'student_id');
    }
}
