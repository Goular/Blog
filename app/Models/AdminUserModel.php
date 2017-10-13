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
     * 判断旧密码是否正确
     * @param $oldPassword
     */
    public function judgeOldPassword($oldPassword)
    {
        $user = \Auth::user();
        if (\Hash::check($oldPassword, $user->getAuthPassword())) {
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
    public function changePwd($password)
    {
        $user = \Auth::user();
        if ($user) {
            $user->password = bcrypt($password);
            $user->save();
            return true;
        }
        return false;
    }
}