<?php /*a:1:{s:63:"E:\phpstudy_pro\WWW\tp6_shop\app\admin\view\category\index.html";i:1688455953;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layui</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/static/admin/lib/layui-v2.5.4/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/public.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/public.css" media="all">
    <link rel="stylesheet" href="/static/admin/js/lay-module/treetable-lay/treetable.css" media="all">
    <style>
        .inoutCls {
            height: 22px;
            line-height: 22px;
            padding: 0 5px;
            font-size: 12px;
            background-color: #1E9FFF;
            max-width: 80px;
            border: none;
            color: #fff;
            margin-left: 10px;
            display: inline-block;
            white-space: nowrap;
            text-align: center;
            border-radius: 2px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="layuimini-container">
    <div class="layuimini-main">
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">
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
                            <button id="btnExpandAll" class="layui-btn layui-btn-sm layui-btn-primary">
                                <i class="layui-icon">&#xe668;</i>展开全部
                            </button>
                            <button id="btnFoldAll" class="layui-btn layui-btn-sm layui-btn-primary">
                                <i class="layui-icon">&#xe66b;</i>折叠全部
                            </button>
                            <button class="layui-btn" id="OpenMenuAdd" ><i class="layui-icon"></i>添加</button>
                        </div>

                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-hide" id="menu" lay-filter="menu"></table>
                        </div>

                        <script type="text/html" id="switchTpl">
                            <input id="checkShow" type="checkbox" name="Show" value="{{d.id}}" lay-skin="switch" lay-text="启用|停用"{{ d.IsShow == "启用" ? "checked" : "" }} lay-filter="ShowDemo">
                        </script>

                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<script src="/static/admin/lib/jquery-3.4.1/jquery-3.4.1.min.js"></script>
<script src="/static/admin/lib/layui-v2.5.4/layui.js" charset="utf-8"></script>
<script src="/static/admin/js/common.js?v5" charset="utf-8"></script>
<script src="/static/admin/js/lay-module/treeTable.js" charset="utf-8"></script>
<script src="/static/admin/js/lay-module/treetable-lay/treetable.js" charset="utf-8"></script>
<!-- 注意：如果你直接复制所有代码到本地，上述js路径需要改成你本地的 -->
<script>
    layui.config({
        //   base: '/js/'存放treeTable.js的文件夹
        base: '/js/'
    }).use(['layer', 'util', 'treeTable'], function () {
        //var table = layui.table
        //, form = layui.form;
        var $ = layui.jquery;
        var layer = layui.layer;
        var util = layui.util;
        var treeTable = layui.treeTable, form = layui.form;

        // 渲染表格
        var insTb = treeTable.render({
            elem: '#menu',
            url: '/admin/category/get_data',
            toolbar: 'default',
            height: 'full-200',
            tree: {
                iconIndex: 2,
                isPidData: true,
                idName: 'id',//父ID
                pidName: 'parentid',//子ID
                openName: 'open',// 是否默认展开的字段名
                //public bool open { get; set; }open字段是bool类型
            },
            defaultToolbar: ['filter', 'print', 'exports'],
            cols: [[
                { type: 'checkbox', fixed: 'left' }
                , { field: 'id', title: 'ID', fixed: 'left', unresize: true, sort: true, hide: true }
                , { field: 'menuname', title: '菜单名称', edit: 'text' }
                , { field: 'parentid', title: '父ID', hide: true }
                , { field: 'remark', title: '备注', edit: 'text' }
                , { field: 'menuurl', title: '菜单路径', hide: true }
                , { field: 'orderid', title: '菜单排序', hide: true }
                , { field: 'menuico', title: '菜单图标', hide: true }
                , { field: 'Isfather', title: '是否父菜单', hide: true }
                , { field: 'IsShow', title: '状态', templet: '#switchTpl', unresize: true }
                , { fixed: 'right', title: '操作', toolbar: '#barDemo' }
            ]],
            style: 'margin-top:0;'
        });

        //监听状态操作
        form.on('switch(ShowDemo)', function (data) {
            var swithcData = data;
            var id = data.value;// 获取要修改的ID
            var IsShow = this.checked ? '启用' : '停用';// 当前状态值
            $.ajax({
                type: 'post',
                url: '/api/menuApi/postUpdMenu',
                data: {
                    "id": id,
                    "IsShow": IsShow
                },
                error: function (data) {
                    console.log(data);
                    layer.msg('数据异常，操作失败！');
                },
                // 修改失败，请填写对应的参数
                success: function (data) {
                    layer.alert("操作成功", {
                        icon: 6
                    });
                    //window.location.reload();
                }
            });
        });

        //监听行工具事件
        treeTable.on('tool(menu)', function (obj) {
            var data = obj.data;
            //console.log(obj)
            if (obj.event === 'del') {
                layer.confirm('真的删除行么', function (index) {
                    //var id = data['id'];
                    var param = { id: data['id'] };
                    $.ajax({
                        type: 'post',
                        url: '/api/menuApi/postDeleMenu',
                        async: false,
                        data: param,
                        success: function (data) {
                        }
                    })
                    layer.msg('已删除数据!', { icon: 1, time: 1000 });
                    setTimeout('window.location.reload()', 1000);
                    //alert(id);
                });
            } else if (obj.event === 'edit') {
                //xadmin.open('修改用户', '/User/UserUpd?id=' + data['id'], 600, 400);//flag=edit&id=
                layer.open({
                    type: 2,
                    title: "修改菜单",
                    shadeClose: true,
                    shade: 0.5,
                    area: ['600px', '600px'],
                    content: ['/menu/menuOper?flag=edit&id=' + data['id'], 'no'],
                    //end: function () { location.reload(); }
                })
            }
        });

        // 搜索
        $('#search').click(function () {
            var keywords = $('#demoReload').val();
            if (keywords) {
                insTb.filterData(keywords);
            } else {
                insTb.clearFilter();
            }
            return false;
        });

        // 全部展开
        $('#btnExpandAll').click(function () {
            insTb.expandAll();
        });

        // 全部折叠
        $('#btnFoldAll').click(function () {
            insTb.foldAll();
        });

        $("#OpenMenuAdd").click(function () {
            //alert(1);
            //var url = "<?php echo url('/menu/menuAdd'); ?>";
            layer.open({
                type: 2,
                title: "添加菜单",
                shadeClose: true,
                shade: 0.5,
                area: ['600px', '600px'],
                content: ['/menu/menuOper?flag=add', 'no'],
                //end: function () { location.reload(); }
            })
        })
    });
</script>
</body>
</html>
