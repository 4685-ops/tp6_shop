<?php

use think\facade\Route;

//发送验证码
Route::rule('/send/code', '/api/sms/send', 'POST');

// 手机+验证码登录
Route::rule('/login', '/api/login/login', 'POST');

//资源路由
Route::rule('/user', '/api/user/index', 'get');

Route::rule('/update', '/api/user/update', 'POST');


// 获取分类
Route::rule('/category/get_data', '/api/category/getData', 'GET');
