<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $fillable = [
        'image', 'status', 'user_id', 'class_id', 'course_id'
    ];
    
}
