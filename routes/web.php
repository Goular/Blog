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
Route::prefix('')->middleware(['frontend.view'])->group(function () {
    Route::get('/', 'IndexController@index');
    Route::get('/indexs/category/{id}', 'IndexController@category');
    Route::resource('/indexs', 'IndexController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/articles', 'ArticleController');

});

//验证模块
Route::group(['prefix' => 'verify'], function () {
    //验证码模块的使用
    Route::get('captcha/img','\App\Http\Controllers\Verify\CaptchaController@createImg');
    Route::get('captcha/imgUrl','\App\Http\Controllers\Verify\CaptchaController@createUrl');
    Route::get('captcha/imgHtml','\App\Http\Controllers\Verify\CaptchaController@createHtml');

    //验证短信发送模块的使用
    Route::get('sms/code/{id}','\App\Http\Controllers\Verify\SmsController@sendSms');
});


