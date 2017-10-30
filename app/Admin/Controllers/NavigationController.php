<?php

namespace App\Admin\Controllers;

use App\Entities\Navigation;
use App\Models\NavigationModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * 友情链接控制器
 * Class NavigationController
 * @package App\Admin\Controllers
 */
class NavigationController extends CommonController
{
    public function index()
    {
        //获取所有的导航
        $navigations = Navigation::orderBy("order", "asc")->paginate(12);
        return view("backend.navigation.index", compact('navigations'));
    }

    public function create()
    {
        return view("backend.navigation.create");
    }

    public function store(Request $request)
    {
        //校验
        $this->validate($request, [
            "name" => "required|unique:navigations,name",
            "alias" => "nullable",
            "url" => "required",
            "order" => "nullable|numeric",
        ], [
            'name.required' => '名称不能为空',
            'name.unique' => '名称已存在',
            'url.required' => '网址不能为空',
            'order.numeric' => '排序必须是数字',
        ]);

        //逻辑 && 渲染
        $entity = new Navigation();
        if ($entity->create(request()->all())) {
            return redirect("admin/navigations");
        } else {
            return back()->withInput()->withErrors("添加失败");
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        try {
            $selectNavigation = Navigation::findOrFail($id);
            return view("backend.navigation.update", compact('selectNavigation'));
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required|unique:navigations,name",
            "alias" => "nullable",
            "url" => "required",
            "order" => "nullable|numeric",
        ], [
            'name.required' => '名称不能为空',
            'name.unique' => '名称已存在',
            'url.required' => '网址不能为空',
            'order.numeric' => '排序必须是数字',
        ]);
        $model = Navigation::find($id);
        if ($model) {
            if ($model->update(request()->all())) {
                return redirect("admin/navigations");
            } else {
                return back()->withInput()->withErrors("修改失败");
            }
        } else {
            return back()->withInput()->withErrors("修改的导航找不到");
        }
    }

    public function destroy($id)
    {
        $model = Navigation::find($id);
        if ($model->delete()) {
            return $this->ajaxSuccessOperate('删除成功');
        } else {
            return $this->ajaxFailOperate('删除失败');
        }
    }

    /**
     * 变更导航的排序级别
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
        $model = new NavigationModel();
        if ($model->changeOrder($id, $value)) {
            //更新成功
            return $this->ajaxSuccessOperate();
        } else {
            //更新失败
            return $this->ajaxFailOperate();
        }
    }
}
