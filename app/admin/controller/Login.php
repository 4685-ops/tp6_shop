<?php

namespace app\admin\controller;

use app\admin\service\LoginService;
use app\Request;
use think\App;
use think\facade\View;

class Login extends AdminBase
{
    protected $loginService;

    public function initialize()
    {
        $this->loginService = new LoginService();
    }

    public function login()
    {
        return View::fetch('/login/login');
    }

    public function check(Request $request)
    {
        return $this->loginService->login($request->post());
    }

    public function out()
    {
        return $this->loginService->loginOut();
    }
}