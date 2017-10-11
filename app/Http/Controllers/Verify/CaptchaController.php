<?php

namespace App\Http\Controllers\Verify;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 用于验证码内容的生成
 * Class CaptchaController
 * @package App\Http\Controllers
 */
class CaptchaController extends Controller
{
    /**
     * 返回的是Image的二进制图片资源
     */
    public function createImg()
    {
        //方法一:
        return captcha();
        //return captcha('flat');

        //方法二:
        //return Captcha::create();
        //return Captcha::create('inverse');
    }

    /**
     * 返回的是Image的URL的地址资源
     */
    public function createUrl()
    {
        //方法一:
        return captcha_src();
        //方法二:
        //return Captcha::src();
    }

    /**
     * 返回的是Image的带有HTML标签H5代码
     */
    public function createHtml()
    {
        //方法一:
        return captcha_img();

        //方法二:
        //return Captcha::img();
    }
}
