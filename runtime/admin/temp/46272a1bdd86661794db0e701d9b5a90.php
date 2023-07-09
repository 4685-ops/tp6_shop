<?php /*a:1:{s:63:"D:\phpstudy_pro\WWW\tp6_shop\app\admin\view\category\index.html";i:1688801129;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>分类列表</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/layuiadmin/style/admin.css" media="all">
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">

        </div>
        <div class="layui-card-body">
            <div class="demoTable">
                <div class="layui-inline layui-show-xs-block">
                    <input type="text" name="UserName" id="demoReload" placeholder="请输入菜单名称" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-inline layui-show-xs-block" id="demoTable">
                    <button class="layui-btn" id="search" data-type="reload" lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                </div>
            </div>
        </div>
        <div class="layui-card-header">
            <button class="layui-btn" id="btn-expand">全部展开</button>
            <button class="layui-btn" id="btn-fold">全部折叠</button>
            <button class="layui-btn" id="OpenMenuAdd" ><i class="layui-icon"></i>添加</button>
        </div>

        <div class="layui-card-body layui-table-body layui-table-main">
            <table id="auth-table" class="layui-table" lay-filter="auth-table"></table>
        </div>

        <script type="text/html" id="auth-state">
            <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="edit">修改</a>
            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
        </script>


    </div>
</div>

<script src="/static/layuiadmin/layui/layui.js"></script>
<script src="/static/layuiadmin/common.js"></script>
<script>
    layui.config({
        base: '/static/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index', //主入口模块
        treetable: 'treetable-lay/treetable',
    }).use(['index', 'useradmin', 'table','treetable'], function () {
        var $ = layui.jquery;
        var table = layui.table;
        var treetable = layui.treetable;

        // 渲染表格
        layer.load(2);
        treetable.render({
            treeColIndex: 1,
            treeSpid: -1,
            treeIdName: 'id',
            treePidName: 'pid',
            elem: '#auth-table',
            url: '/admin/category/get_data',
            page: false,
            cols: [[
                {type: 'numbers'},
                {field: 'name', width: 300, title: '权限名称'},
                {field: 'desc', title: '描述',width: 300},
                {field: 'sort_order', width: 80, align: 'center', title: '排序号'},
                {templet: '#auth-state', width: 120, align: 'center', title: '操作'}
            ]],
            done: function () {
                layer.closeAll('loading');
            }
        });

        $('#btn-expand').click(function () {
            treetable.expandAll('#auth-table');
        });

        $('#btn-fold').click(function () {
            treetable.foldAll('#auth-table');
        });

        $('#OpenMenuAdd').click(function (){
            layObj.dialog("/admin/category/add","添加分类");
        })
    });
</script>
</body>
</html>

