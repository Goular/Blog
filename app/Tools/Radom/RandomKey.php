<?php
namespace App\Tools\Radom;
/**
 * 用于处理文件上传的处理类
 * Class FileUpload
 * @package App\Tools
 *
 * overtrue/laravel-filesystem-qiniu
 */
class RandomKey
{
    function randomkeys($length)
    {
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        $output = '';
        for ($i = 0; $i < $length; $i++) {
            $output .= $pattern{mt_rand(0, 62)};    //生成php随机数
        }
        return $output;
    }
}