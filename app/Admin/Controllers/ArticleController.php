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
        $categories = $model->getChildrenCategories(0);
        return view("backend.article.create", compact('categories'));
    }

    public function store(Request $request)
    {

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
}
