<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'question',
        'status'
    ];
    public function result(){
        return $this->hasMany(Result_Qestion::class, 'id_question', 'id');
    }
}

