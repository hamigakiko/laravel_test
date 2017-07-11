<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\Redis;

class ChatRooms extends Model
{
    use SoftDeletes;
    /**
     * 日付へキャストする属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'entry_count', 'type_id', 'group_id'
    ];


    public function chats()
    {
        return $this->hasMany('App\Models\Chats');
    }
    public function chatsOrderByIdDesc()
    {
        return $this->chats()->orderBy('id', 'desc');
    }


    public function chatRoomUsers()
    {
        return $this->hasMany('App\Models\ChatRoomUsers');
    }


    public function isChatRoomMembers(int $userId)
    {
        $chatRoomUsers = $this->chatRoomUsers;

        foreach($chatRoomUsers as $chatRoomUser){
            if($userId == $chatRoomUser->user_id){
                return true;
            }
        }
        return false;
    }


    public function checkClosed()
    {
        return $this->entry_count <= count($this->chatRoomUsers);
    }



    public function cacheName()
    {
        return "ChatRooms:".$this->id;
    }

    public function getCache()
    {
        return Redis::smembers($this->cacheName());
    }
}
