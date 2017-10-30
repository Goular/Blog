<?php

namespace App\Http\Middleware;

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
        View::share('viewNavigations', $navigations);
        return $next($request);
    }
}
