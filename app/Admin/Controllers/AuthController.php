<?php

namespace App\Admin\Controllers;

use App\Models\AdminUserModel;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 * 鉴权控制器:提供本站登录，登出，并提供第三方登录的操作
 * Class AuthController
 * @package App\Admin\Controllers
 */
class AuthController extends Controller
{
    //添加官方Auth的Trait
    use AuthenticatesUsers;

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
        //验证
        $this->validate(request(), [
            'username' => 'required',
            'password' => 'required|min:6',
            'captcha' => 'required|captcha',
        ]);
        //逻辑
        $username = request('username');
        $password = request('password');
        $model = new AdminUserModel();
        //渲染
        if($model->login($username,$password)){
            return redirect('admin');
        }else{
            return back()->withErrors("账号密码不匹配");
        }
    }
}
