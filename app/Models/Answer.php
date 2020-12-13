<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'question_id',
        'answer'
    ];
    public function result(){
        return $this->hasMany(Result_Qestion::class, 'id_answer', 'id');
    }
}
