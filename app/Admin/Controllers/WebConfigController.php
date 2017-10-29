<?php

namespace App\Admin\Controllers;

use App\Entities\WebConfig;
use App\Models\WebConfigModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class WebConfigController extends CommonController
{
    public function index()
    {
        //获取所有的配置
        $webConfigs = WebConfig::orderBy("order", "desc")->paginate(1);
        return view("backend.web_config.index", compact('webConfigs'));
    }

    public function create()
    {
        return view("backend.web_config.create");
    }

    public function store(Request $request)
    {
        //校验
        $this->validate($request, [
            "title" => "required",
            "name" => "required",
            "content" => "nullable",
            "order" => "nullable|numeric",
            "tips" => "nullable",
            "type" => "nullable",
            "value" => "nullable",
        ], [
            'title.required' => '标题不能为空',
            'name.required' => '变量名不能为空',
            'order.numeric' => '排序必须是数字',
        ]);

        //逻辑 && 渲染
        $entity = new WebConfig();
        if ($entity->create(request()->all())) {
            return redirect("admin/web_configs");
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
            $selectConfig = WebConfig::findOrFail($id);
            return view("backend.web_config.update", compact('selectLink'));
        } catch (ModelNotFoundException $e) {
            return back();
        }
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "title" => "required",
            "name" => "required",
            "content" => "nullable",
            "order" => "nullable|numeric",
            "tips" => "nullable",
            "type" => "nullable",
            "value" => "nullable",
        ], [
            'title.required' => '标题不能为空',
            'name.required' => '变量名不能为空',
            'order.numeric' => '排序必须是数字',
        ]);
        $model = WebConfig::find($id);
        if ($model) {
            if ($model->update(request()->all())) {
                return redirect("admin/web_configs");
            } else {
                return back()->withInput()->withErrors("修改失败");
            }
        } else {
            return back()->withInput()->withErrors("修改的配置找不到");
        }
    }

    public function destroy($id)
    {
        $model = WebConfig::find($id);
        if ($model->delete()) {
            return $this->ajaxSuccessOperate('删除成功');
        } else {
            return $this->ajaxFailOperate('删除失败');
        }
    }

    /**
     * 变更配置的排序级别
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
        $model = new WebConfigModel();
        if ($model->changeOrder($id, $value)) {
            //更新成功
            return $this->ajaxSuccessOperate();
        } else {
            //更新失败
            return $this->ajaxFailOperate();
        }
    }
}
