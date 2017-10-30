<?php

namespace App\Http\Middleware;

use App\Entities\Article;
use App\Entities\Navigation;
use Closure;
use Illuminate\Support\Facades\View;

/**
 * 仅用于前台博客页面 视图渲染
 * Class FrontendView
 * @package App\Http\Middleware
 */
class FrontendView
{
    public function handle($request, Closure $next)
    {
        //前置中间件
        //渲染页面导航显示的内容
        $navigations = Navigation::all();
        //点击量最高的6篇文章
        $hot = Article::orderBy('view','desc')->take(5)->get();
        //最新发布文章8篇
        $new = Article::orderBy('updated_at','desc')->take(8)->get();
        View::share('viewNavigations', $navigations);
        View::share('hot',$hot);
        View::share('new',$new);
        return $next($request);
    }
}
