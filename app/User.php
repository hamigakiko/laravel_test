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



    public function create()
    {
        $this->password       = bcrypt(bcrypt($this->password));
        $this->remember_token = str_random(10);
        $this->save();
    }


}
