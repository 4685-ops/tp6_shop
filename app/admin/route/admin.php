<?php

use think\facade\Route;

Route::rule('/login', '/login/login','GET');


Route::rule('/index/index', '/index/index','GET');


Route::rule('/out', '/admin/login/out','GET');

// 分类
Route::rule('/category/get_data', '/category/getData','GET');
