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
}
