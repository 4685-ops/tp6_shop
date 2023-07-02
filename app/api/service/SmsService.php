<?php

namespace app\api\service;

use app\api\validate\UserValidate;
use app\business\sms\ClassArr;
use app\lib\exception\SuccessMessage;
use app\lib\utils\RandNumberUtils;

class SmsService
{
    public function sendCode(array $paramsData, $type)
    {
        // 检查参数
        (new UserValidate())->goCheck('scene_code');

        //发送短信
        $code = RandNumberUtils::getCode(4);

        //工厂模式实现
        $classStats = ClassArr::smsClassStat();
        $classObj = ClassArr::initClass($type, $classStats);
        $sms = $classObj::sendCode($paramsData['phone_number'], $code);

        if ($sms) {
            //写到缓存
            
        }

        throw new SuccessMessage([
            'msg' => "发送成功"
        ]);
    }
}