<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaitList extends Model
{
    protected $table = 'wait_list';
    protected $fillable = [
        'name', 'email', 'phone_number', 'sex', 'birthday', 'address', 'course_id'
    ];
}
