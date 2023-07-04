<?php

namespace app\api\controller;

use app\api\service\LoginService;
use app\Request;

class Login extends ApiBase
{
    public function login(Request $request)
    {
        $loginService = new LoginService();
        return $loginService->doLogin($request->post());
    }
}