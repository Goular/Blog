<?php
//网站后台的路由配置文件
Route::prefix('admin')->group(function () {
    Route::get('/', '\App\Admin\Controllers\IndexController@index');
    Route::get('/login', '\App\Admin\Controllers\AuthController@index');
});