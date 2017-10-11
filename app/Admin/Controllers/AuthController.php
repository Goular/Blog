<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;

/**
 * 鉴权控制器:提供本站登录，登出，并提供第三方登录的操作
 * Class AuthController
 * @package App\Admin\Controllers
 */
class AuthController extends Controller
{
    /**
     * 后台登录功能的显示页面
     */
    public function index(){
        return view('backend.auth.index');
    }

    /**
     * 后台登录
     */
    public function login(){
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha',
        ]);

    }
}
