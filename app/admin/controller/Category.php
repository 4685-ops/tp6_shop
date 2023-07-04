<?php

namespace app\admin\controller;

use app\admin\service\CategoryService;
use app\BaseController;
use think\facade\View;

class Category extends AdminBase
{

    protected $categoryService;

    public function initialize()
    {
        parent::initialize();
        $this->categoryService = new CategoryService();
    }

    public function index()
    {
        return View::fetch('/category/index');
    }

    public function getData()
    {
        $this->categoryService->getData();
    }
}
