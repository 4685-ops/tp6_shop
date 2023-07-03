<?php

namespace app\api\validate;

use think\facade\Session;

class UserValidate extends BaseValidate
{
    protected $rule = [
        'username' => 'require',
        'phone_number' => 'require',
        'code' => 'require|number|min:4',
        'type' => ["require", "in" => "1,2"],
    ];


    protected $message = [
        'username' => '用户名不能为空',
        'phone_number' => '电话号码不能为空',
        'code.require' => '短信验证码不能为空',
        'code.number' => '短信验证码必须是数字',
        'code.min' => '短信验证码长度不得低于4',
        'type.require' => '类型必须',
        'type.in' => '类型数值错误',
    ];

    /**
     * 验证成 场景的使用  ->scene('scene_code')
     */
    protected $scene = [
        'scene_code' => ['phone_number'],
        'login' => ['phone_number', 'code', 'type'],
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