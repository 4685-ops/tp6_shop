<?php

namespace app\admin\controller;

use app\BaseController;
use think\facade\Session;

class AdminBase extends BaseController
{
    public function initialize()
    {
        parent::initialize();
    }

    public function isLogin(): bool
    {
        if (Session::get(config('app.login_user_info'))) {
            return true;
        } else {
            return false;
        }

    }

}