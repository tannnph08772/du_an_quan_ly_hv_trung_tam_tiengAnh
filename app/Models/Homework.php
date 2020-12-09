<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Homework extends Model
{
    protected $table = 'homework';
    protected $fillable = [
        'title', 'file', 'end_day', 'note', 'class_id', 'teacher_id'
    ];

    public function class(){
    	return $this->belongsTo(ClassRoom::class, 'class_id');
    }
    
    public function teacher(){
    	return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    } 

    public function submit(){
    	return $this->hasMany(Submit::class, 'homework_id');
    }
}
