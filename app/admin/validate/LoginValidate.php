<?php

namespace app\admin\validate;

use think\facade\Session;

class LoginValidate extends BaseValidate
{
    protected $rule = [
        'username' => 'require',
        'password' => 'require',
        'captcha' => 'require|checkVerifyCode'
    ];


    protected $message = [
        'username' => '用户名不能为空',
        'password' => '密码不能为空',
        'captcha' => '图形验证码不能为空'
    ];

    /**
     * 验证成 场景的使用  ->scene('scene_code')
     */
    protected $scene = [
        'scene_code' => ['phone_number']
    ];

    /**
     * @function 检查图形验证码是否正确
     *
     * @param $value
     * @param string $rule
     * @param string $data 接收的所有参数数组
     * @param string $field 字段 verifyCode
     * @return bool|string
     */
    protected function checkVerifyCode($value, $rule = '', $data = '', $field = '')
    {
        if (!captcha_check($value)) {
            //验证码不正确
            return '验证码不正确';
        };

        return true;
    }
}