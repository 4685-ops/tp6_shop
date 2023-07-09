<?php

namespace app\api\service;

use app\lib\exception\SuccessMessage;
use app\lib\utils\ArrayUtils;
use app\model\CategoryModel;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

class CategoryService
{

    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    /**
     * @throws ModelNotFoundException
     * @throws DataNotFoundException
     * @throws DbException
     */
    public function getData(): \think\response\Json
    {
        //获取所有的分类数据
        $data = $this->categoryModel->getAllData();

        $categoryData = ArrayUtils::getTree($data);

        return json([
            'code' => 0,
            'data' => ArrayUtils::sliceTreeArr($categoryData)
        ]);
    }

}
