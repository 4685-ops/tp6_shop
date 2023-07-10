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

    public function index(): string
    {
        return View::fetch('/category/index');
    }

    public function getData()
    {
        return $this->categoryService->getData();
    }

    public function add(): string
    {
        return View::fetch('/category/add');
    }

    public function dialog()
    {
        return View::fetch('/category/dialog');
    }
}
