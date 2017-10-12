<?php
namespace App\Models;

/**
 * 用于后台用户的模型
 * Class AdminUserModel
 * @package App\Models
 */
class AdminUserModel extends BaseModel
{
    /**
     * 校验是否能够成功登录
     * @param $username
     * @param $password
     */
    public function login($username,$password){

        if (Auth::attempt(['name' => $username, 'password' => $password])) {
            // 认证通过...
            return redirect()->intended('dashboard');
        }

        return true;
    }
}