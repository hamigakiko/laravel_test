<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChatRoomUsers extends Model
{
    // use SoftDeletes;
    // /**
    //  * 日付へキャストする属性
    //  *
    //  * @var array
    //  */
    // protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'chat_rooms_id', 'user_id'
    ];

    public function chatRooms()
    {
        return $this->belongsTo('App\Models\ChatRooms');
    }
}
