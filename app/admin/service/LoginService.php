<?php

namespace app\admin\service;

use app\admin\validate\LoginValidate;
use app\lib\enum\DeleteEnum;
use app\lib\exception\ParamsException;
use app\lib\exception\SuccessMessage;
use app\lib\exception\UserException;
use app\lib\utils\Md5Utils;
use app\model\AdminModel;
use app\Request;
use think\facade\Session;

class LoginService
{
    public function login(array $paramsData): bool
    {

        // 验证参数 和 验证码
        (new LoginValidate())->goCheck();

        $username = $paramsData['username'];
        $password = $paramsData['password'];
        $adminModel = new AdminModel();

        $adminUserInfo = $adminModel->getInfoByWhere([
            'username' => $username
        ]);

        if (empty($adminUserInfo)) {
            throw new UserException([
                'msg' => "暂无此用户",
            ]);
        }


        //检查状态
        if ($adminUserInfo['deleted'] == DeleteEnum::DELETE_FAIL) {
            throw new UserException([
                'msg' => "当前用户已被禁用",
            ]);
        }

        // 检查密码
        if ($adminUserInfo['password'] !== Md5Utils::encryption($password, $adminUserInfo['slot'])) {
            throw new UserException([
                'msg' => "密码不正确",
            ]);
        }

        //修改登录信息
        $adminModel->updateRow([
            'last_login_ip' => (new Request())->ip(),
            'last_login_time' => date('Y-m-d H:i:s', time()),
        ], $adminUserInfo['id']);

        //登录成功 信息保存到session
        unset($adminUserInfo['password']);

        Session::set(config('app.login_user_info'), json_encode($adminUserInfo));

        throw new SuccessMessage([
            'code' => 0,
            'msg' => '登录成功'
        ]);
    }

    public function loginOut()
    {
        Session::delete(config('app.login_user_info'));

        throw new SuccessMessage([
            'code' => 0,
            'msg' => '退出成功'
        ]);
    }

}