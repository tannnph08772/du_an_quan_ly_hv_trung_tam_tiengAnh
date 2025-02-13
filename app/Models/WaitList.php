<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitList extends Model
{
    protected $table = 'wait_list';
	protected $primaryKey = 'id';
     protected $fillable = [
        'name',
        'email',
        'phone_number',
        'birthday',
        'sex',
        'address',
        'course_id',
        'place_id',
        'student_id'
    ];
    public function course(){
    	return $this->belongsTo(Course::class, 'course_id');
    }

    public function place(){
    	return $this->belongsTo(Place::class, 'place_id');
    }
}
