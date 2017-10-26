<?php

namespace App\Admin\Controllers;

use App\Models\CategoryModel;
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
            $entension = $file -> getClientOriginalExtension(); //获取上传文件的后缀.
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $filepath = 'uploads/admin/'.$newName;
            //$path = $file -> move(base_path().'/uploads',$newName);
            return $filepath;
        }
    }
}
