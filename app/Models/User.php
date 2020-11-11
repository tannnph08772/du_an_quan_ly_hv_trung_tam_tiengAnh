<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
	protected $primaryKey = 'id';

    protected $fillable = [
<<<<<<< HEAD:app/Models/User.php
        'name', 'email', 'password', 'phone_number', 'address', 'birthday', 'sex', 'role', 'course_id'
=======
        'name', 'email', 'password', 'phone_number', 'sex', 'birthday', 'address', 'role'
>>>>>>> 1d2fadb92e4aa3be5f3c2e471862823724f6a7d3:app/User.php
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function teacher(){
        return $this->hasOne(Teacher::class, 'user_id', 'id');
    }
}
