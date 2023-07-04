<?php

namespace app\api\controller;

use app\BaseController;

/**
 * 不需要登录继承
 */
class ApiBase extends BaseController
{
    protected function initialize()
    {
        parent::initialize();
    }
}