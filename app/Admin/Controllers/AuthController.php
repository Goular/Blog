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
    use AuthenticatesUsers;

    //设置验证成功后转跳的页面
    protected function redirectTo()
    {
        return '/admin';
    }

    //自定义校验的用户名称
    public function username()
    {
        return 'name';
    }

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
        $username = request('username');
        $password = request('password');
        $model = new AdminUserModel();
        if($model->login($username,$password)){
            return redirect('admin');
        }else{
            return view('backend.auth.index');
        }
    }
}
