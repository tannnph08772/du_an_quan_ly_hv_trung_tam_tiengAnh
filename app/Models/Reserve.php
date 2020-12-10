<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    protected $table = 'reserve';
	protected $primaryKey = 'id';

    protected $fillable = [
        'student_id', 'course_id', 'content', 'status'
    ];

    public function student(){
    	return $this->belongsTo(Student::class, 'student_id');
    }

    public function course(){
    	return $this->belongsTo(Course::class, 'course_id');
    }
}
