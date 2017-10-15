<?php

namespace App\Admin\Controllers;

use \App\Http\Controllers\Controller;

/**
 * 后台使用的基础控制类
 * Class CommonController
 * @package App\Http\Controllers
 */
class CommonController extends Controller
{
    /**
     * 将数据按照下面的JSON格式进行输出
     * @param $data
     * @param $status
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function toJson($data, $status, $message)
    {
        return response()->json(compact('status', 'message', 'data'));
    }

    /**
     * Ajax请求，将表单验证器的错误信息进行归集成一条字符串数据
     * @param $validator    手动表单验证器执行完成后返回的对象
     * @param string $guleFormat implode方法的合并错误信息的间隔符号
     */
    public function compactAjaxErrorsMsg($validator, $guleFormat = ',')
    {

    }
}
