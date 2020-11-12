<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmitDetail extends Model
{
    protected $table = 'submit_detail';
    protected $fillable = [
        'file', 'submit_id'
    ];
    
}
