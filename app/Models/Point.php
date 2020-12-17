<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'point';
	protected $primaryKey = 'id';

    protected $fillable = [
        'exercise', 'diligence', 'test', 'student_id', 'class_id'
    ];

    public function student(){
    	return $this->belongsTo(Student::class, 'student_id');
    }
}
