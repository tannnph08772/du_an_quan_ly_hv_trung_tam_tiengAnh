<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    protected $table = 'submit';
    protected $fillable = [
        'homework_id', 'student_id'
    ];
    
}
