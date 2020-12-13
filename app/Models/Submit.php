<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    protected $table = 'submit';
    protected $fillable = [
        'homework_id', 'student_id'
    ];

    public function student(){
    	return $this->belongsTo(Student::class, 'student_id');
    }

    public function homework(){
    	return $this->belongsTo(Homework::class, 'homework_id');
    }

    public function submitDetail(){
    	return $this->hasMany(submitDetail::class, 'submit_id', 'id');
    }
    
}
