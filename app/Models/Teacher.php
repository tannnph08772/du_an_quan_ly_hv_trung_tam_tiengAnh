<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
	protected $primaryKey = 'id';

    protected $fillable = [
        'user_id', 'course_id'
    ];

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function course(){
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function classes(){
    	return $this->hasMany(ClassRoom::class, 'teacher_id', 'id');
    }
}
