<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{

    protected $fillable = [
        'birthday', 'sex'
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
