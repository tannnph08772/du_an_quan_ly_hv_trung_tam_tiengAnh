<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'name_class', 'strat_day', 'end_day', 'status', 'teacher_id', 'place_id', 'course_id'
    ];
}
