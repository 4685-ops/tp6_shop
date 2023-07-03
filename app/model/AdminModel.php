<?php

namespace app\model;

use think\db\exception\DataNotFoundException;
use think\db\exception\DbException;
use think\db\exception\ModelNotFoundException;

class AdminModel extends BaseModel
{
    protected $table = "litemall_admin";

    public function getUserInfoByWhere(array $where): array
    {
        $userInfo = self::where($where)->find();

        if ($userInfo) {
            return $userInfo->toArray();
        }

        return [];
    }

    public function updateRow($data = array(), $id)
    {
        return self::update($data, array('id' => $id));
    }
}
