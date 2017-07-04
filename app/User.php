<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

// API認証
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;

    // API認証
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function userProfile()
    {
        return $this->hasOne('App\UserProfile', 'user_id', 'id');
    }


    public function userAvater()
    {
        return $this->hasOne('App\UserAvater', 'user_id', 'id');
    }

}
