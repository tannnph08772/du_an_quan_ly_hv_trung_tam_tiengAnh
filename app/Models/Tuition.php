<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tuition extends Model
{
    protected $table = 'tuition';
	protected $primaryKey = 'id';

    protected $fillable = [
        'student_id','class_id', 'user_id'
    ];

    public function student(){
    	return $this->belongsTo(Student::class, 'student_id');
    }

    public function tuitionDetail(){
    	return $this->hasOne(TuitionDetail::class, 'tuition_id');
    }

    public function user(){
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function class(){
    	return $this->belongsTo(ClassRoom::class, 'class_id');
    }
}
