<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * 前台首页
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends CommonController
{
    public function index()
    {
        return view("frontend.index.index");
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
