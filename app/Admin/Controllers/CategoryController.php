<?php

namespace App\Admin\Controllers;

use App\Entities\Category;
use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    public function changeOrder(){
        dd(request()->all());
        //return 123458;
    }
}
