<?php

namespace app\api\controller;

use app\api\service\SmsService;
use app\Request;

class Sms
{
    public function send(Request $request)
    {
        $smsService = new SmsService();
        $result = $smsService->sendCode($request->post(), "jd");
        dd($result);
    }
}