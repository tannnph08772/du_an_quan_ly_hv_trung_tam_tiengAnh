<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmitDetail extends Model
{
    protected $table = 'submit_detail';
    protected $id = 'id';
    protected $fillable = [
        'file', 'submit_id'
    ];

    public function submit(){
    	return $this->belongsTo(Submit::class, 'submit_id');
    }
    
}
