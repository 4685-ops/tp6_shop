<?php

namespace app\model;

use think\Model;

class BaseModel extends Model
{
    public function getInfoByWhere(array $where, $field = "*"): array
    {
        $userInfo = self::where($where)->field($field)->find();

        if ($userInfo) {
            return $userInfo->toArray();
        }

        return [];
    }

    public function addRow(array $data)
    {
        return self::insert($data, true);
    }

    public function updateRow($data = array(), $id)
    {
        return self::update($data, array('id' => $id));
    }
}