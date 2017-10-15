<?php

namespace App\Http\Controllers;

/**
 * 鉴权控制器:提供本站登录，登出，并提供第三方登录的操作
 * Class AuthController
 * @package App\Admin\Controllers
 */
class AuthController extends CommonController
{

    public function login(){
        return "frontend-login";
    }
}
