<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('users', 'UserController@index');
Route::get('users/{id}', 'UserController@show');
Route::post('users', 'UserController@store');
Route::post('users/{id}', 'UserController@update');
Route::delete('users/{id}', 'UserController@destroy');

Route::get('chats', 'ChatController@index');
Route::get('chats/{id}', 'ChatController@show');
Route::post('chats', 'ChatController@store');
Route::post('chats/{id}', 'ChatController@update');
Route::delete('chats/{id}', 'ChatController@destroy');

