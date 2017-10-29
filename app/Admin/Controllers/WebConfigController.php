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
//        $webConfigs = WebConfig::orderBy("order", "asc")->paginate(12);
        $webConfigs = WebConfig::orderBy("order", "asc")->get();

        foreach ($webConfigs as $k => $v) {
            switch ($v->type_name) {
                case 'input':
                    $webConfigs[$k]->_html = '<input type="text" class="lg" name="value[]" style="width:100%" value="' . $v->value . '">';
                    break;
                case 'textarea':
                    $webConfigs[$k]->_html = '<textarea type="text" class="lg" name="value[]" style="width:100%" rows="8">' . $v->value . '</textarea>';
                    break;
                case 'radio':
                    //1|开启,0|关闭
                    $arr = explode(',', $v->type_value);
                    $str = '';
                    foreach ($arr as $m => $n) {
                        //1|开启
                        $r = explode('|', $n);
                        $c = $v->value == $r[0] ? ' checked ' : '';
                        $str .= '<input type="radio" name="value[]" value="' . $r[0] . '"' . $c . '>' . $r[1] . '　';
                    }
                    $webConfigs[$k]->_html = $str;
                    break;
            }

        }

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
            return view("backend.web_config.update", compact('selectConfig'));
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

    /**
     * 更改配置内容的选项
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeContent()
    {
        $datas = request()->all();
        $ids = $datas['ids'];
        $values = $datas['value'];


        foreach ($ids as $k => $v) {
            WebConfig::where('id', $v)->update(['value' => $values[$k]]);
        }
        $this->saveConfigFile();
        return back()->withErrors("配置项更新成功");
    }

    /**
     * 生成配置文件
     */
    public function saveConfigFile()
    {
        $config = WebConfig::pluck('value','name')->all();
        $path = base_path().'\config\webite.php';
        $str = '<?php return '.var_export($config,true).';';
        file_put_contents($path,$str);
    }
}
