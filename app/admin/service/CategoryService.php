<?php

namespace app\admin\service;

use app\model\CategoryModel;

class CategoryService
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function getData()
    {
        $categoryData = $this->categoryModel->getListByWhere([
            'deleted' => 0
        ], "id asc", 1, 100000);


        if ($categoryData){
            foreach ($categoryData as $key=>$val){
                if ($val['pid']==0){
                    $categoryData[$key]['pid'] = -1;
                }
            }
        }

        return json([
            'code' => 0,
            'data' => $categoryData
        ]);
    }
}