<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    Const Admin = 1;
    Const Teacher = 2;
    Const User = 3;

    use Notifiable;

    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'name', 'family', 'email', 'phone_number', 'university_id' ,'password','role','university_name'
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
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function user_type()
    {
        switch ($this->attributes['role']){
            case self::Admin:
                return 'ادمین';
                break;
            case self::Teacher:
                return 'استاد';
                break;
            case self::User:
                return 'دانشجو';
                break;
        }
    }

}
