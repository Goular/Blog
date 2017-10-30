<?php

namespace App\Http\Controllers;

use App\Entities\Article;
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
        //点击量最高的6篇文章（站长推荐）
        $pics = Article::orderBy('view', 'desc')->take(6)->get();

        //点击量最高的6篇文章
        $hot = Article::orderBy('view', 'desc')->take(5)->get();

        //最新发布文章8篇
        $new = Article::orderBy('updated_at', 'desc')->take(8)->get();

        //图文列表5篇（带分页）
        $data = Article::orderBy('updated_at', 'desc')->paginate(5);

        //友情链接
        //$links = Links::orderBy('link_order', 'asc')->get();

        return view("frontend.index.index", compact('hot', 'new', 'pics', 'data', 'links'));
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
