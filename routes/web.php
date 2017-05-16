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

Route::get('blade', function(){
    return view('child');
});

Route::get('greeting', function () {
    return view('welcome', ['name' => 'Samantha']);
});


Route::post('user/create',   'User\UserController@create');
Route::get('user/list',   'User\UserController@list');

Route::get('user/test', 'User\UserController@test');

Route::get('user/{id}', 'User\UserController@show');

Route::get('user/', 'User\UserController@list');
