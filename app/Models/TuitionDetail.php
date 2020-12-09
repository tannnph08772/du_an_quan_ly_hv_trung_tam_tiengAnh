<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TuitionDetail extends Model
{
    protected $table = 'tuition_detail';
	protected $primaryKey = 'id';

    protected $fillable = [
        'image', 'sum_money', 'tuition_id'
    ];

    public function tuition(){
    	return $this->belongsTo(Tuition::class, 'tuition_id');
    }
}
