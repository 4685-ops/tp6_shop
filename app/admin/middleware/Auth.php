<?php

namespace app\admin\middleware;

use think\facade\Session;

class Auth
{
    public function handle($request, \Closure $next)
    {
        if (empty(Session::get(config('app.login_user_info'))) && !preg_match('/login/', $request->pathinfo())) {
            // 跳到登录
            return redirect((string)url('/admin/login/login'));
        }

        if (Session::get(config('app.login_user_info'))&& preg_match('/login/', $request->pathinfo())) {
            // 跳到首页
            return redirect((string)url('/admin/index/index'));
        }

        return $next($request);
    }

    public function end(\think\Response $response)
    {
        // 回调行为
    }
}