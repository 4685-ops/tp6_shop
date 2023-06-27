<?php

namespace app\admin\controller;

use app\BaseController;
use think\facade\View;

class Login extends BaseController
{
    public function login()
    {
        return View::fetch('/login/login');
    }
}
