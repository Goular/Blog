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
     * 将数据按照下面的JSON格式进行输出，成功的话可以直接返回toJson($data)
     * @param $data
     * @param $status
     * @param $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function toJson($data, $status = 1, $message = '操作成功')
    {
        return response()->json(compact('status', 'message', 'data'));
    }

    /**
     * Ajax 进行表单提交后成功的返回,例如ajax进行更改某条记录的某个变量值
     */
    public function ajaxSuccessOperate($message = '操作成功')
    {
        return $this->toJson(null, 1, $message);
    }

    /**
     * Ajax 进行表单提交后失败的返回,例如ajax进行更改某条记录的某个变量值
     */
    public function ajaxFailOperate($message = '操作失败', $status = -1)
    {
        return $this->toJson(null, $status, $message);
    }

    /**
     * Ajax请求，将表单验证器的错误信息进行归集成一条字符串数据
     * @param $validator    手动表单验证器执行完成后返回的对象
     * @param string $guleFormat implode方法的合并错误信息的间隔符号
     */
    public function compactAjaxErrorsMsg($validator, $guleFormat = ',')
    {
        $errors = $validator->errors()->all();
        if (count($errors) > 0) {
            return implode($guleFormat, $errors);
        } else {
            return "未知异常";
        }
    }
}
