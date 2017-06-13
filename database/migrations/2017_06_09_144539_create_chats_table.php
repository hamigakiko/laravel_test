<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function(Blueprint $table){
            $table->increments('id');
            $table->integer('chat_rooms_id')->unsigned();
            $table->integer('user_id')->references('id')->on('users');
            $table->string('message');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['chat_rooms_id', 'deleted_at']);
        });

        Schema::create('chat_rooms', function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('entry_count')->unsigned()->default(2);
            $table->tinyInteger('type_id')->default(0);
            $table->tinyInteger('group_id')->default(0);
            $table->boolean('is_closed');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('chat_room_users', function(Blueprint $table){
            $table->increments('id');
            $table->integer('chat_rooms_id')->unsigned();
            $table->integer('user_id')->references('id')->on('users');
            $table->softDeletes();
            $table->timestamps();
            $table->index(['chat_rooms_id', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chats');
        Schema::dropIfExists('chat_rooms');
        Schema::dropIfExists('chat_room_users');
    }
}
