<?php

namespace app\api\service;

use app\api\validate\UserValidate;
use app\business\sms\ClassArr;
use app\instance\RedisInstance;
use app\lib\exception\SuccessMessage;
use app\lib\utils\RandNumberUtils;
use think\Cache;

class SmsService
{
    protected \Redis $redis;

    public function sendCode(array $paramsData, $type)
    {
        // 检查参数
        (new UserValidate())->goCheck('scene_code');

        //写到缓存
        $this->redis = RedisInstance::get();

        $redisData = $this->redis->get(config('redis.sms_send_code') . $paramsData['phone_number']);

        if ($redisData) {
            throw new SuccessMessage([
                'msg' => "当前验证码还未过期，无须重新发送",
                "errorCode" => 10000
            ]);
        }
        //发送短信
        $code = RandNumberUtils::getCode(4);

        //工厂模式实现
        $classStats = ClassArr::smsClassStat();
        $classObj = ClassArr::initClass($type, $classStats);
        $sms = $classObj::sendCode($paramsData['phone_number'], $code);

        if ($sms) {
            $this->redis->set(config('redis.sms_send_code') . $paramsData['phone_number'], $code, 120);
        }

        throw new SuccessMessage([
            'msg' => "发送成功"
        ]);
    }
}