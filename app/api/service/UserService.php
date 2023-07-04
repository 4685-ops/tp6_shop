<?php

namespace app\api\service;

use app\api\validate\UserValidate;
use app\lib\enum\DeleteEnum;
use app\lib\enum\UserStatusEnum;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;
use app\model\UserModel;
use app\Request;

class UserService
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getUserInfo($userId)
    {
        $userInfo = $this->userModel->getInfoByWhere([
            'id' => $userId
        ], "id,gender,birthday,nickname");

        if (empty($userInfo)) {
            throw new UserException([
                'msg' => "获取不到该用户信息"
            ]);
        }

        return json([
            'code' => 0,
            'data' => $userInfo
        ]);
    }

    public function updateUserInfo(array $paramsData, int $userId)
    {
        //检查参数
        (new UserValidate())->goCheck('updateUserInfo');

        if (empty($userId)) {
            throw new UserException([
                'msg' => "暂未登录"
            ]);
        }

        // 检查用户名是否存在
        $userInfo = $this->userModel->getInfoByWhere([
            'nickname' => $paramsData['nickname']
        ], "id,gender,birthday,nickname");

        if (!empty($userInfo) && $userInfo['id'] != $userId) {
            throw new UserException([
                'msg' => "用户名已存在"
            ]);
        }
        try {
            //更新
            $this->userModel->updateRow([
                'nickname' => $paramsData['nickname'],
                'update_time' => date('Y-m-d H:i:s', time()),
                'last_login_time' => date('Y-m-d H:i:s', time()),
                'birthday' => $paramsData['birthday'],
                'gender' => $paramsData['gender'],
                'last_login_ip' => (new Request())->ip(),
            ], $userId);
        } catch (\Throwable $e) {
            throw new UserException([
                'msg' => '数据库内部异常'
            ]);
        }

        throw new SuccessMessage([
            'msg' => '更新成功'
        ]);
    }
}