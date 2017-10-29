<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 前台分类控制器
 * Class IndexController
 * @package App\Http\Controllers
 */
class CategoryController extends CommonController
{
    public function index()
    {
        return view("frontend.category.index");
    }

    public function create()
    {

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
