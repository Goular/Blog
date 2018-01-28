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

//2017-10-31 添加微信公众号的访问的库
Route::any('/wechat', 'WeChatController@serve');

//前台路由配置规则
Route::prefix('')->middleware(['frontend.view'])->group(function () {
    Route::get('/', 'IndexController@index');
    Route::get('/category/{id}', 'IndexController@category');
    Route::get('/article/{id}', 'IndexController@article');
    Route::resource('/indexs', 'IndexController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/articles', 'ArticleController');
    // 慕课网Vue音乐项目使用的代理API 2018-01-28
    Route::get('/music/getDiscList','MoocMusicController@discList');
});

//验证模块
Route::group(['prefix' => 'verify'], function () {
    //验证码模块的使用
    Route::get('captcha/img', '\App\Http\Controllers\Verify\CaptchaController@createImg');
    Route::get('captcha/imgUrl', '\App\Http\Controllers\Verify\CaptchaController@createUrl');
    Route::get('captcha/imgHtml', '\App\Http\Controllers\Verify\CaptchaController@createHtml');

    //验证短信发送模块的使用
    Route::get('sms/code/{id}', '\App\Http\Controllers\Verify\SmsController@sendSms');
});


