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

//引入后台的路由配置文件
include_once("admin.php");

//前台路由配置规则
Route::prefix('')->group(function () {
    Route::get('/', 'IndexController@index');
});


