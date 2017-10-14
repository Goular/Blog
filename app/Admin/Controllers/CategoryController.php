<?php

namespace App\Admin\Controllers;

use App\Entities\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        dd(Category::all());
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
