<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// 認証は面倒なので一旦省略
Route::resource('/items', 'ItemController', ['except' => ['create', 'edit']]);



// // API
// Route::group(['prefix'=>'api', ], function () {

//     Route::resource('chat', 'ChatsController@index');

//     // Route::resource('/items', 'ItemController', ['except' => ['create', 'edit']]);

// });



// API
// Route::group(['middleware'=>'auth'], function(){

    // // チャットコントローラー
    // // Route::resource('/chats', 'Api\Chat\ChatsController', [
    // Route::resource('/chats', 'Api\Chat\ChatsController', [
    //     'except' => 'destroy'
    // ]);
// });
