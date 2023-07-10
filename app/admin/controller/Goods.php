<?php

namespace app\admin\controller;

use think\facade\View;

class Goods extends AdminBase
{
    public function index()
    {
        return View::fetch('/goods/index');
    }

    public function add()
    {
        return View::fetch('/goods/add');
    }
}