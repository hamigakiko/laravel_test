<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'barthday', 'age', 'sex'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // public function items()
    // {
    //     return $this->hasMany(Item::class);
    // }


    public function create(Array $params)
    {
        $this->name           = $params['name'];
        $this->email          = $params['email'];
        $this->barthday       = $params['barthday'];
        $this->age            = $params['age'];
        $this->sex            = $params['sex'];
        $this->password       = bcrypt(40);
        $this->remember_token = str_random(10);
        $this->save();
    }


}
