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
    public function index()
    {
        return view('backend.auth.index');
    }

    /**
     * 后台登录
     */
    public function login()
    {
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
        if ($model->login($username, $password)) {
            return redirect('admin');
        } else {
            return back()->withInput()->withErrors("账号密码不匹配");
        }
    }

    /**
     * 后台登出
     */
    public function logout()
    {
        \Auth::logout();
        return redirect('admin/login');
    }

    /**
     * 后台用户修改密码显示内容
     */
    public function changePwdIndex()
    {
        //return bcrypt("123456");
        return view("backend.auth.changePwd");
    }

    /**
     * 后台用户修改密码
     */
    public function changePwd(Request $request)
    {
        //验证
        $this->validate(request(), [
            'old_password' => 'required|between:6,20',
            'password' => 'required|between:6,20|confirmed',
        ]);
        //逻辑
        $oldPassword = trim(request('old_password'));
        $newPassword = request('password');
        $model = new AdminUserModel();
        //判断旧密码是否正确
        if (!$model->judgeOldPassword($oldPassword))
            return back()->withInput()->withErrors("原始密码错误!");
        //修改密码
        if ($model->changePwd($newPassword)) {
            $request->session()->flash('status', '修改密码成功!');
            return back();
        } else {
            return back()->withInput()->withErrors("修改密码失败!");
        }
    }
}
