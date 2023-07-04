<?php

namespace app\api\controller;

use app\api\service\UserService;
use think\App;

class User extends AuthBase
{
    public $userService;

    protected function initialize()
    {
        parent::initialize();
        $this->userService = new UserService();
    }

    public function index()
    {
        return $this->userService->getUserInfo($this->userId);
    }

    public function update()
    {
        return $this->userService->updateUserInfo($this->request->post(), $this->userId);
    }
}