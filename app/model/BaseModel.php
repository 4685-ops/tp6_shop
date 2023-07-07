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

    public function getListByWhere($where, $order, $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        $data = self::where($where)->order($order)->limit($offset, $limit)->select();
        if ($data) {
            return $data->toArray();
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