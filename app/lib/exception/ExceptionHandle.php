<?php

namespace app\lib\exception;

use think\exception\Handle;
use think\facade\Env;
use think\facade\Log;
use think\Response;
use Throwable;
use think\facade\Request;

class ExceptionHandle extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    public function render($request, Throwable $e): Response
    {
        if ($e instanceof BaseException) {
            //如果是自定义异常，则控制http状态码，不需要记录日志
            //因为这些通常是因为客户端传递参数错误或者是用户请求造成的异常
            //不应当记录日志

            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;

        } else {

            // 如果是服务器未处理的异常，将http状态码设置为500，并记录日志
            if (env::get('APP_DEBUG')) {
                // 调试状态下需要显示TP默认的异常页面，因为TP的默认页面
                // 很容易看出问题
                print_r($e->getMessage());
                die;
            }
            $this->code = 500;
            $this->msg = 'sorry，we make a mistake. (^o^)Y';
            $this->errorCode = 999;

            $this->recordErrorLog($e);
        }

        $request = Request::instance();
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
            'code' => $this->code,
            'request_url' => $request = $request->url()
        ];

        return json($result, $this->code);
    }

    /*
     * 将异常写入日志
     */
    private function recordErrorLog($e)
    {
        Log::write($e->getMessage(),'error');
    }
}