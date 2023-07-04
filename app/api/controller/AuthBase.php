<?php

namespace app\api\controller;

use app\instance\RedisInstance;
use app\lib\exception\UserException;

/**
 * 需要登录继承
 */
class AuthBase extends ApiBase
{
    public $userId = 0;
    public $userName;
    public $accessToken;
    public $redis;

    protected function initialize()
    {
        parent::initialize();
        $this->accessToken = $this->request->header("access-token");
        if (!$this->isLogin()) {
            throw new UserException([
                'msg' => '暂无登录'
            ]);
        }
    }

    public function isLogin()
    {
        $this->redis = RedisInstance::get();
        $userInfo = $this->redis->get(config('redis.token_code') . $this->accessToken);

        if (!$userInfo) {
            return false;
        }
        $userInfo = json_decode($userInfo, true);

        if ($userInfo['userId'] && $userInfo['username']) {
            $this->userId = $userInfo['userId'];
            $this->userName = $userInfo['username'];
            return true;
        }
        return false;
    }

}