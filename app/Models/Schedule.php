<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    protected $fillable = [
        'name_schedule', 'start_time', 'end_time', 
    ];

    public function students(){
    	return $this->hasMany(Student::class, 'class_id', 'id');
    }

    public function classes(){
    	return $this->hasMany(ClassRoom::class, 'schedule_id', 'id');
    }

    public function attendances(){
    	return $this->hasMany(Attendance::class, 'schedule_id', 'id');
    }
}
