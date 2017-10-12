<?php

namespace App\Admin\Middleware;

use Closure;

/**
 * 后台用户登录验证
 * Class AdminIdentify
 * @package App\Admin\Middleware
 */
class AdminIdentify
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!\Auth::check()) {
            //没有登录系统
            return redirect("admin/login");
        }
        return $next($request);
    }
}
