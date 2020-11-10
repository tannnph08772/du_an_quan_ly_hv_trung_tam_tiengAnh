<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table = 'homework';
    protected $fillable = [
        'name_hw', 'file', 'end_day', 'class_id'
    ];
    
}
