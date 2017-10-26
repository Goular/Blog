<?php

namespace App\Admin\Controllers;

use App\Entities\Article;
use App\Models\CategoryModel;
use App\Tools\Radom\RandomKey;
use App\Tools\Storage\FileUpload;
use Illuminate\Http\Request;

class ArticleController extends CommonController
{
    public function index()
    {
        $articles = Article::orderBy("updated_at", "desc")->paginate(10);
        return view("backend.article.index", compact('articles'));
    }

    public function create()
    {
        $model = new CategoryModel();
        //获取父级分类
        $categories = $model->getTrees();
        //dd($categories);
        return view("backend.article.create", compact('categories'));
    }

    public function store(Request $request)
    {
        //校验
        $this->validate($request, [
            "cate_id" => "required|numeric",
            "title" => "required",
            "editor" => "nullable",
            "thumb" => "nullable",
            "tag" => "nullable",
            "content" => "required",
        ], [
            'title.required' => '标题不能为空',
            'content.required' => '正文不能为空',
        ]);

        //逻辑 && 渲染
        $entity = new Article();
        if ($entity->create(request()->all())) {
            return redirect("admin/article");
        } else {
            return back()->withInput()->withErrors("添加失败");
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }

    /**
     * 图片上传
     */
    public function upload(Request $request)
    {
        $file = $request->file('Filedata');
        if ($file->isValid()) {//判断文件是否有效
            $entension = $file->getClientOriginalExtension(); //获取上传文件的后缀.
            $fileUpload = new FileUpload();
            $randomKey = new RandomKey();
            $newName = date('YmdHis') . '@' . $randomKey->randomkeys(8) . '.' . $entension;
            $saveFilePath = 'uploads/article_thumb/' . $newName;
            if ($fileUpload->saveFile($saveFilePath, $file->getRealPath())) return $this->toJson(["fileDomain" => "http://" . env('QINIU_DOMAIN') . '/', "filePath" => $saveFilePath]);
            else return $this->ajaxFailOperate("上传文件失败!");
        }
    }
}
