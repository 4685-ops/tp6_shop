<?php

namespace app\business\sms;

interface SmsBase
{
    public static function sendCode(string $phone, int $code);
}