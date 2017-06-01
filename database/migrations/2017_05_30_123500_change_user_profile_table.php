<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUserProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            $table->string('birthday', 8)->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->unique('user_id')->comment('ユニークキーを追加');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_profiles', function (Blueprint $table) {
            // // 既にテーブルの対象カラムにNULLを登録しているならば必要
            // DB::statement('UPDATE `user_profiles` SET `birthday` = "" WHERE `birthday` IS NULL');
            // DB::statement('UPDATE `user_profiles` SET `age` = "" WHERE `age` IS NULL');

            // noteカラムにNULLを許容しない
            DB::statement('ALTER TABLE `user_profiles` MODIFY COLUMN `birthday` varchar(8) NOT NULL;');
            DB::statement('ALTER TABLE `user_profiles` MODIFY COLUMN `age` int(11) NOT NULL Default 0;');
            $table->dropUnique(['user_id']);
        });
    }
}
