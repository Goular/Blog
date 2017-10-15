<?php

namespace App\Admin\Controllers;

use App\Entities\Category;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends CommonController
{
    public function index()
    {
        //获取所有的分类
        $model = new CategoryModel();
        $categories = $model->getTrees();
        return view("backend.category.index")->with(['categories' => $categories]);
    }

    public function create()
    {

        return view("backend.category.create");
    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        return view("backend.category.update");
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    /**
     * 变更分类的排序级别
     */
    public function changeOrder()
    {
        $validator = \Validator::make(request()->all(), [
            'id' => 'required|numeric',
            'value' => 'required|numeric'
        ], [
            'id.required' => 'ID字段不能为空',
            'value.required' => '排序值不能为空',
            'id.numeric' => 'ID字段必须是数字',
            'value.numeric' => '排序值必须是数字',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMsg = '';
            if (count($errors) > 0) {
                $errorMsg = implode(",", $errors);
            } else {
                $errorMsg = "未知异常";
            }
            return $this->toJson(null, -1, $errorMsg);
        }




        dd(request()->all());
        //return 123458;
    }
}
