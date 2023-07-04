<?php

namespace app\api\service;

use app\api\validate\UserValidate;
use app\instance\RedisInstance;
use app\lib\enum\DeleteEnum;
use app\lib\enum\UserStatusEnum;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;
use app\lib\utils\TokenUtils;
use app\model\UserModel;
use app\Request;

class LoginService
{
    protected \Redis $redis;

    protected $userModel;

    public function __construct()
    {
        $this->redis = RedisInstance::get();
        $this->userModel = new UserModel();
    }

    /**
     * @function doLogin: 登录
     *
     * phone_number 手机号码
     * code 验证码
     * type 1:7天 2:30
     */
    public function doLogin(array $paramsData)
    {
        (new UserValidate())->goCheck('login');

        // 检查验证码是否正确
        $redisCodeData = $this->redis->get(config('redis.sms_send_code') . $paramsData['phone_number']);

        if (empty($redisCodeData)) {
            throw new UserException([
                'msg' => '验证码已过期'
            ]);
        }

        if ($paramsData['code'] != $redisCodeData) {
            throw new UserException([
                'msg' => '验证码不正确'
            ]);
        }

        // 手机号码查找用户

        $userInfo = $this->userModel->getInfoByWhere([
            'mobile' => $paramsData['phone_number']
        ]);
        $userId = 0;
        $username = "";
        if (!$userInfo) {
            //add
            try {
                $username = 'fans_' . $paramsData['phone_number'];
                $userId = $this->userModel->addRow([
                    'nickname' => $username,
                    'mobile' => $paramsData['phone_number'],
                    'status' => UserStatusEnum::USER_STATUS_SUCCESS,
                    'add_time' => date('Y-m-d H:i:s', time()),
                    'update_time' => date('Y-m-d H:i:s', time()),
                    'last_login_time' => date('Y-m-d H:i:s', time()),
                    'deleted' => DeleteEnum::DELETE_SUCCESS,
                    'gender' => 0,
                    'last_login_ip' => (new Request())->ip(),
                ]);
            } catch (\Throwable $e) {
                throw new UserException([
                    'msg' => '数据库内部异常'
                ]);
            }
        } else {
            //update
            $userId = $userInfo['id'];
            $username = $userInfo['nickname'];
        }

        $returnUserInfo = [
            'userId' => $userId,
            'username' => $username,
        ];


        // 生成token 可以检查token是否过期
        $token = TokenUtils::getLoginToken($paramsData['phone_number']);

        $this->redis->set(config('redis.token_code') . $token, json_encode($returnUserInfo), TokenUtils::getLoginTokenExpire($paramsData['type']));

        return json([
            'code' => 0,
            'data' => [
                'token' => $token
            ]
        ]);
    }
}