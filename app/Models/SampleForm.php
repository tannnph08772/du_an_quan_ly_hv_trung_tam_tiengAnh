<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SampleForm extends Model
{
    protected $table = 'sample_form';
	protected $primaryKey = 'id';

    protected $fillable = [
        'student_id', 'class_id', 'content', 'status'
    ];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id', 'id');
    }

    public function class(){
        return $this->belongsTo(ClassRoom::class, 'class_id', 'id');
    }
}
