<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result_Qestion extends Model
{
    protected $table = 'result_question';
    protected $fillable = [
        'id_feedback',
        'id_question',
        'id_answer'
    ];
    public function student(){
        return $this->belongsTo(Feedback::class, 'id_feedback', 'id');
    }
    public function answer(){
    	return $this->belongsTo(Answer::class, 'id_answer', 'id');
    }
    public function question(){
    	return $this->belongsTo(Question::class, 'id_question', 'id');
    }
}
