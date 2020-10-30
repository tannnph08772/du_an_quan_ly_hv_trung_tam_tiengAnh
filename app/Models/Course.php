<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\WaitList;

class Course extends Model
{
    protected $table = 'course';
	protected $primaryKey = 'id';
     protected $fillable = [
        'name_course',
        'number_course',
        'discription'
    ];
    public function waitList(){
    	return $this->belongsTo(WaitList::class, 'course_id');
    }
}
