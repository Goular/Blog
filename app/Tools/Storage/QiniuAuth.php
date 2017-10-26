<?php
namespace App\Tools\Storage;

use Qiniu\Auth;

/**
 * 用于处理文件上传的处理类
 * Class FileUpload
 * @package App\Tools
 *
 * overtrue/laravel-filesystem-qiniu
 */
class QiniuAuth
{
    public function UploadToken()
    {
        $bucket = env("QINIU_BUCKET");
        $auth = new Auth(env("QINIU_ACCESS_KEY"), env("QINIU_SECRET_KEY"));
        return $auth->uploadToken($bucket);
    }
}