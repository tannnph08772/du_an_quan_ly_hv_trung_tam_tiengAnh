<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
	protected $primaryKey = 'id';

    protected $fillable = [
        'date', 'teacher_id', 'class_id', 'schedule_id'
    ];
}
