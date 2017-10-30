<?php

namespace App\Http\Controllers;

use App\Entities\Article;
use App\Entities\Category;
use App\Entities\FriendLink;
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
        $links = FriendLink::orderBy('order', 'asc')->get();

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

    /**
     * 根据分类的ID显示文章列表
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category($id)
    {
        //图文列表4篇（带分页）
        $data = Article::where('cate_id', $id)->orderBy('updated_at', 'desc')->paginate(4);
        //查看次数自增
        Category::where('id', $id)->increment('view');
        //当前分类的子分类
        $submenu = Category::where('parent_id', $id)->get();
        $field = Category::find($id);
        return view("frontend.index.category", compact('field', 'data', 'submenu'));
    }

    /**
     * 根据文章ID显示文章详情
     * @param $id
     */
    public function article($id)
    {
        return "1122334";
    }
}
