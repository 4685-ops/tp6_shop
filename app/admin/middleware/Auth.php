<?php

namespace app\admin\middleware;


class Auth
{
    public function handle($request, \Closure $next)
    {

        return $next($request);
    }

    public function end(\think\Response $response)
    {
        // 回调行为
    }
}