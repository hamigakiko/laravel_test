<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->tinyInteger('user_sex')->unsigned()->after('user_name');
        });

        Schema::table('chat_room_users', function(Blueprint $table){
            $table->tinyInteger('user_sex')->unsigned()->after('user_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chats', function (Blueprint $table) {
            $table->dropColumn('user_sex');
        });

        Schema::table('chat_room_users', function (Blueprint $table) {
            $table->dropColumn('user_sex');
        });
    }
}
