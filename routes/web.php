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

// ユーザーコントローラー
Route::resource('user', 'User\UserController', [
    'except' => 'create', 'store', 'update', 'destroy'
]);


// ユーザープロファイルコントローラー
Route::resource('userProfile', 'User\UserProfilesController', [
    'except' => 'destroy'
]);

// ユーザープロファイルコントローラー
Route::resource('userAvater', 'User\UserAvatersController', [
    'except' => 'destroy'
]);

// チャットルームコントローラー
Route::resource('chatRooms', 'Chat\ChatRoomsController', [
    'except' => 'destroy'
]);
