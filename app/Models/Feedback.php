<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $fillable = [
        'content', 
        'student_id',
        'class_id'
    ];

    public function student(){
    	return $this->belongsTo(Student::class, 'student_id');
    }

    public function class(){
    	return $this->belongsTo(ClassRoom::class, 'class_id');
    }
}
