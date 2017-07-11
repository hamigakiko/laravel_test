<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chats extends Model
{
    use SoftDeletes;
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'chat_rooms_id',
        'user_id',
        'user_name',
        'user_sex',
        'message',
    ];


    public function chatRooms()
    {
        return $this->belongsTo('App\Models\ChatRooms');
    }
}
