<?php
namespace App\Instance;

use App\Service\Collect\Core\AbstractCollectService;

class CollectInstance
{
    public static function get(array $sourceInfo):?AbstractCollectService
    {
        return self::getCollectObject($sourceInfo);
    }

    public static function getCollectObject(array $sourceInfo)
    {
        // 支持多个目录
        $dirList = [
            'App\Service\Collect\WebSite',
        ];
        foreach ($dirList as $dir) {
            $className = "{$dir}" .'\\'. $sourceInfo['class_name'];
            if (class_exists($className)) {
                return new $className($sourceInfo);
            }
        }
        return null;
    }
}