<?php

namespace App\Api\Middleware;

use Closure;

/**
 * api 允许跨域访问
 * XMLHttpRequest cannot load http://api.console.vms3.com/api/user.
 * No 'Access-Control-Allow-Origin' header is present on the requested resource.
 * Origin 'http://localhost:8080' is therefore not allowed access
 * Class AccessControlAllowOrigin
 * @package App\Http\Middleware
 */
class AccessControlAllowOrigin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: Content-Type,Access-Token");
        header("Access-Control-Expose-Headers: *");

        return $next($request);
    }
}
