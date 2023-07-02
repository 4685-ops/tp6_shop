<?php

namespace app\business\sms;

use app\business\sms\SmsBase;


class BaiduSms implements SmsBase
{
    public static function sendCode(string $phone, int $code): bool
    {
        //发生短信
        return true;
    }
}
