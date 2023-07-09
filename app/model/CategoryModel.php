<?php

namespace app\model;

use app\lib\enum\DeleteEnum;
use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

class CategoryModel extends BaseModel
{
    protected $table = "litemall_category";

    /**
     * @throws ModelNotFoundException
     * @throws DataNotFoundException
     * @throws DbException
     */
    public function getAllData(): array
    {
        $where[] = ['deleted', '<>', DeleteEnum::DELETE_FAIL];

        return $this->where($where)->field(['id', 'name', 'pid'])->select()->toArray();
    }

    public function getChildCountInParentIds($condition)
    {
//        $where[] = ['pid', 'in', $condition['pid']];
//        $where[] = ['deleted', '<>', DeleteEnum::DELETE_FAIL];
//        $res = $this->where($where)->field(
//            ['pid', 'count(*) as count']
//        )group('pid')->select();

    }


}