<?php
//网站后台的路由配置文件
Route::prefix('admin')->group(function () {
    Route::get('login', '\App\Admin\Controllers\AuthController@index');
    Route::post('login', '\App\Admin\Controllers\AuthController@login');
    Route::middleware(['admin.identify'])->group(function () {
        Route::get('/', '\App\Admin\Controllers\IndexController@index');
        Route::get('logout', '\App\Admin\Controllers\AuthController@logout');
        Route::get('changepwd', '\App\Admin\Controllers\AuthController@changePwdIndex');
        Route::post('changepwd', '\App\Admin\Controllers\AuthController@changePwd');
        Route::resource('categories', '\App\Admin\Controllers\CategoryController');
        Route::post('categories/changeorder', '\App\Admin\Controllers\CategoryController@changeOrder');
        Route::resource('articles', '\App\Admin\Controllers\ArticleController');
        Route::any('upload_article_thumb', '\App\Admin\Controllers\ArticleController@upload_thumb');
        Route::any('upload_article_content', '\App\Admin\Controllers\ArticleController@upload_content');
        Route::resource('friend_links', '\App\Admin\Controllers\FriendLinkController');
        Route::post('friend_links/changeorder', '\App\Admin\Controllers\FriendLinkController@changeOrder');
        Route::resource('navigations', '\App\Admin\Controllers\NavigationController');
        Route::post('navigations/changeorder', '\App\Admin\Controllers\NavigationController@changeOrder');
        Route::resource('webconfigs', '\App\Admin\Controllers\WebConfigController');
        Route::post('webconfigs/changeorder', '\App\Admin\Controllers\WebConfigController@changeOrder');
    });
});