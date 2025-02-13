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
        'name', 'email', 'password', 'phone_number', 'sex', 'birthday', 'address', 'role', 'status'
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

    public function student(){
        return $this->hasOne(Student::class, 'user_id', 'id');
    }

    public function tuition(){
        return $this->hasMany(Tuition::class, 'user_id', 'id');
    }
}
