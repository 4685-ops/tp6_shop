<?php

namespace app\api\controller;

use app\api\service\CategoryService;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

class Category extends ApiBase
{
    /**
     * @throws ModelNotFoundException
     * @throws DbException
     * @throws DataNotFoundException
     */
    public function getData(): \think\response\Json
    {
        $categoryService = new CategoryService();
        return $categoryService->getData();
    }
}