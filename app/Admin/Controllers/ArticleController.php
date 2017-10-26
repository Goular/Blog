<?php

namespace App\Admin\Controllers;

use App\Models\CategoryModel;
use App\Tools\Radom\RandomKey;
use App\Tools\Storage\FileUpload;
use Illuminate\Http\Request;

class ArticleController extends CommonController
{
    public function index()
    {

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
        dd(request()->all());
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
