<?php

namespace app\business\sms;

class ClassArr
{
    public static function smsClassStat(): array
    {
        return [
            'ali' => "app\business\sms\AliSms",
            'baidu' => "app\business\sms\BaiduSms",
            'jd' => "app\business\sms\JdSms",
        ];
    }

    public static function initClass($type, $class, $params = [], $needInstance = false)
    {
        if (!array_key_exists($type, $class)) {
            return false;
        }

        $className = $class[$type];

        return $needInstance ? (new \Reflection($className))->newInstanceArgs($params) : $className;
    }
}