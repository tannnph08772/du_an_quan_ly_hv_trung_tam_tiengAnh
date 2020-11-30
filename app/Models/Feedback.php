<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = [
        'content', 
        'name_student',
        'email',
        'phone',
        'course_id',
        'class_id'
    ];
}
