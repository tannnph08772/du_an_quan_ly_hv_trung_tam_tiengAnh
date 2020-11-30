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
}
