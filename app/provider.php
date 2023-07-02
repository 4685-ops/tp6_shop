<?php

use app\lib\exception\ExceptionHandle;
use app\Request;

return [
    'think\Request' => Request::class,
    'think\exception\Handle' => ExceptionHandle::class
];
