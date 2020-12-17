<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendance';
    protected $fillable = [
        'date', 'class_id', 'teacher_id', 'schedule_id'
    ];

    public function class(){
    	return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    public function attendanceDetail(){
    	return $this->hasMany(AttendanceDetail::class, 'attendance_id', 'id');
    }
    public function schedule(){
    	return $this->belongsTo(Schedule::class, 'schedule_id');
    }
    public function teacher(){
    	return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
