<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttendanceDetail extends Model
{
    protected $table = 'attendance_detail';
    protected $fillable = [
        'status', 'attendance_id', 'student_id',
    ];
    
    public function student(){
    	return $this->belongsTo(Student::class, 'student_id');
    }
    public function attendance(){
    	return $this->belongsTo(Attendance::class, 'attendance_id');
    }
}
