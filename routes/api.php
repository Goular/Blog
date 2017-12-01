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

//2017-12-02 用于Vue 饿了么测试，后期可以删除
Route::get('goods','\App\Api\Controllers\ApiController@goods');
Route::get('sellers','\App\Api\Controllers\ApiController@sellers');
Route::get('ratings','\App\Api\Controllers\ApiController@ratings');
