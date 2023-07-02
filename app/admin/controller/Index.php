<?php

namespace app\admin\controller;

use app\BaseController;
use think\facade\View;
use think\facade\Session;

class Index extends AdminBase
{
    public function index()
    {
        return View::fetch('/index/index');
    }
    public function welcome()
    {
        return View::fetch('/index/welcome');
    }
}


