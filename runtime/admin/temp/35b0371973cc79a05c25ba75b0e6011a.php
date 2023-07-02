<?php /*a:1:{s:60:"D:\phpstudy_pro\WWW\tp6_shop\app\admin\view\login\login.html";i:1687859764;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理-登陆</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Access-Control-Allow-Origin" content="*">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" href="/static/admin/lib/layui-v2.5.4/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/login.css">
    <!--[if lt IE 9]>
    <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        #admin-captcha {
            width: 110px;
            height: 50px;
            position: relative;
            right: 20px;
            bottom: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="container">
    <div></div>
    <div class="admin-login-background">
        <div class="admin-header">
            <span></span>
        </div>
        <form class="layui-form" action="">
            <div>
                <i class="layui-icon layui-icon-username admin-icon"></i>
                <input type="text" name="username" placeholder="请输入用户名" autocomplete="off"
                       class="layui-input admin-input admin-input-username" value="">
            </div>
            <div>
                <i class="layui-icon layui-icon-password admin-icon"></i>
                <input type="password" name="password" placeholder="请输入密码" autocomplete="off"
                       class="layui-input admin-input" value="">
            </div>
            <div>
                <input type="text" name="captcha" placeholder="请输入验证码" autocomplete="off"
                       class="layui-input admin-input admin-input-verify input-val" value="">
                <div class="admin-captcha"><?php echo captcha_img("","admin-captcha"); ?></div>
            </div>
            <button class="layui-btn admin-button" lay-submit="" lay-filter="login">登 陆</button>
        </form>
    </div>
</div>
<script src="/static/admin/lib/layui-v2.5.4/layui.js" charset="utf-8"></script>
<script src="/static/admin/lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="/static/admin/js/common.js" charset="utf-8"></script>
<script src="/static/admin/js/login.js?v9"></script>
</body>
</html>
