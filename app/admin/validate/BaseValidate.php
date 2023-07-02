<?php


namespace app\admin\validate;


use app\lib\exception\ParamsException;
use think\Exception;
use think\exception\HttpException;
use think\facade\Request;
use think\Validate;

class BaseValidate extends Validate
{
    /**
     * 检测所有客户端发来的参数是否符合验证类规则
     * 基类定义了很多自定义验证方法
     * 这些自定义验证方法其实，也可以直接调用
     * @return true
     * @throws ParameterException
     * @throws ParamsException
     */
    public function goCheck()
    {
        $request = Request::instance();
        $param = $request->param();
        if (!$this->check($param)) {
            $message = is_array($this->error) ? implode(';', $this->error) : $this->error;

            throw new ParamsException([
                'msg' => is_array($this->error) ? implode(
                    ';', $this->error) : $this->error,
            ]);
        }

        return true;
    }
}