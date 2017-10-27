<?php
namespace App\Tools\Qiniu;

class QiniuHelper
{
    /**
     * 对从数据库返回回来的路径进行拼接，生成可访问的url
     * @param $savePath 数据库保存的路径
     */
    public static function showUrl($savePath)
    {
        return "http://" . env('QINIU_DOMAIN') . "/" . $savePath;
    }
}