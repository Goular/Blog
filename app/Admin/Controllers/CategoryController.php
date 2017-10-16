<?php

namespace App\Admin\Controllers;

use App\Entities\Category;
use App\Models\CategoryModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $model = new CategoryModel();
        //获取父级分类
        $categories = $model->getChildrenCategories(0);
        return view("backend.category.create", compact('categories'));
    }

    public function store(Request $request)
    {
        //校验
        $this->validate($request, [
            "parent_id" => "required|numeric",
            "name" => "required|unique:categories,name",
            "title" => "required",
            "keywords" => "nullable",
            "description" => "nullable",
            "order" => "nullable|numeric",
        ], [
            'name.required' => '分类名称不能为空',
            'title.required' => '分类标题不能为空',
            'order.numeric' => '分类排序必须是数字',
        ]);

        //逻辑 && 渲染
        $entity = new Category();
        if ($entity->create(request()->all())) {
            return redirect("admin/category");
        }else{
            return back()->withInput()->withErrors("添加失败");
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            $model = new CategoryModel();
            //获取父级分类
            $categories = $model->getChildrenCategories(0);
            $selectCate = Category::findOrFail($id);
            return view("backend.category.update",compact('categories','selectCate'));
        } catch (ModelNotFoundException $e) {
            return back();
        }

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        return $this->ajaxSuccessOperate();
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
        //验证失败返回json数据
        if ($validator->fails())
            return $this->toJson(null, -1, $this->compactAjaxErrorsMsg($validator));
        //进行逻辑操作
        $id = request('id');
        $value = request('value');
        $model = new CategoryModel();
        if ($model->changeOrder($id, $value)) {
            //更新成功
            return $this->ajaxSuccessOperate();
        } else {
            //更新失败
            return $this->ajaxFailOperate();
        }
    }
}
