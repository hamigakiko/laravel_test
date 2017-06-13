<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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


    public function chatRoomUsers()
    {
        return $this->hasMany('App\Models\ChatRoomUsers');
    }


    public function existsChatRoom(int $userId)
    {
        $chatRoomUsers = $this->chatRoomUsers;

        foreach($chatRoomUsers as $chatRoomUser){
            if($userId == $chatRoomUser->user_id){
                return true;
            }
        }
        return false;
    }


    public function checkClosed($nowTransaction = false)
    {
        $chatRoomUserCount = count($this->chatRoomUsers);
        if ($nowTransaction){
            $chatRoomUserCount += 1;
        }

        if($this->entry_count <= $chatRoomUserCount){
            $this->is_closed = true;
        }
        return $this->is_closed;
    }
}
