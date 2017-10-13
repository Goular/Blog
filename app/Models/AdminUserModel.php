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
    public function login($username, $password)
    {
        if (\Auth::attempt(['username' => $username, 'password' => $password])) {
            return true;
        }
        return false;
    }

    /**
     * 修改密码
     * @param $oldPassword
     * @param $newPassword
     * @param $repeatPassword
     */
    public function changePwd($oldPassword, $newPassword,$repeatPassword){
        return false;
    }
}