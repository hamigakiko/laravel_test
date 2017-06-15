<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'chat_rooms_id', 'user_id', 'user_name'
    ];

    public function chatRooms()
    {
        return $this->belongsTo('App\Models\ChatRooms');
    }





//     protected static function boot()
//     {
//         parent::boot();

//         self::saved(function($chatRoomUsers){
//             return $chatRoomUsers->onSavedHandler();
//         });
//     }


//     private function onSavedHandler()
//     {
// logger("hoge");

//         return true;
//     }
}
