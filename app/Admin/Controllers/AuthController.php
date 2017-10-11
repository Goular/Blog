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

    public function login(){
        return "backend-login";
    }
}
