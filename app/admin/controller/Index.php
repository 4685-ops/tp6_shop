<?php

namespace app\admin\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Session;

class Index extends AdminBase
{
    public function index(): string
    {
        return View::fetch('/index/index');
    }

    public function welcome(): string
    {
        return View::fetch('/index/welcome');
    }
}


