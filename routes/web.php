<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::post('user/create',   'User\UserController@create');

// Route::get('user/list',   'User\UserController@list');

// Route::get('user/{id}', 'User\UserController@show');

// Route::get('user/', 'User\UserController@list');

// 認証
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


// 認証必須
Route::group(['middleware'=>'auth'], function () {

    // User
    Route::group(['namespace'=> 'User'], function(){
        // ユーザーコントローラー
        Route::resource('user', 'UserController', [
            'except' => 'create', 'store', 'update', 'destroy'
        ]);

        // ユーザープロファイルコントローラー
        Route::resource('userProfile', 'UserProfilesController', [
            'except' => 'destroy'
        ]);

        // ユーザープロファイルコントローラー
        Route::resource('userAvater', 'UserAvatersController', [
            'except' => 'destroy'
        ]);
    });


    //Chat
    Route::group(['namespace' => 'Chat'], function () {
        Route::resource('chatRooms', 'ChatRoomsController', [
            'except' => 'destroy'
        ]);

        Route::resource('chats', 'ChatsController', [
            'except' => 'destroy'
        ]);
    });


});
