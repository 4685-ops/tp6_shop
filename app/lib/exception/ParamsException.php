<?php


namespace app\lib\exception;


class ParamsException extends BaseException
{
    public $code = 200;
    public $msg = "invalid parameters";
    public $errorCode = 10000;
}