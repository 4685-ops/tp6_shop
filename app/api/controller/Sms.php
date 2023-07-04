<?php

namespace app\api\controller;

use app\api\service\SmsService;
use app\Request;

class Sms extends ApiBase
{
    public function send(Request $request)
    {
        $smsService = new SmsService();
        return $smsService->sendCode($request->post(), "jd");
    }
}