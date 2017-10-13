<?php
//网站后台的路由配置文件
Route::prefix('admin')->group(function () {
    Route::get('/login', '\App\Admin\Controllers\AuthController@index');
    Route::post('/login', '\App\Admin\Controllers\AuthController@login');
    Route::middleware(['admin.identify'])->group(function () {
        Route::get('/', '\App\Admin\Controllers\IndexController@index');
        Route::get('/logout', '\App\Admin\Controllers\AuthController@logout');
        Route::get('/changepwd', '\App\Admin\Controllers\AuthController@changePwdIndex');
        Route::post('/changepwd', '\App\Admin\Controllers\AuthController@changePwd');
    });
});