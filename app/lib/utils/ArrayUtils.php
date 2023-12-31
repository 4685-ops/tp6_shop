<?php

namespace app\lib\utils;

class ArrayUtils
{

    /**
     * 分类树 支持无限极
     * @param $data
     * @return array
     */
    public static function getTree($data): array
    {
        $items = [];

        foreach ($data as $v) {
            $items[$v['id']] = $v;
        }

        $tree = [];

        foreach ($items as $id => $item) {
            if (isset($items[$item['pid']])) {
                $items[$item['pid']]['list'][] = &$items[$id];
            } else {
                $tree[] = &$items[$id];
            }
        }

        return $tree;

    }

    public static function sliceTreeArr($data, $firstCount = 5, $secondCount = 3, $treeCount = 5): array
    {
        $data = array_slice($data, 0, $firstCount);
        foreach ($data as $k => $v) {
            if (!empty($v['list'])) {
                $data[$k]['list'] = array_slice($v['list'], 0, $secondCount);

                foreach ($v['list'] as $kk => $vv) {
                    if (!empty($vv['list'])) {
                        $data[$k]['list'][$kk]['list'] = array_slice($vv['list'], 0, $treeCount);
                    }
                }

            }
        }

        return $data;
    }

}
