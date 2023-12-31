<?php /*a:1:{s:61:"E:\phpstudy_pro\WWW\tp6_shop\app\admin\view\specs\dialog.html";i:1688960870;}*/ ?>
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

    <style>
        body {
            background: #ffffff;
        }

        .layui-inline {
            border: 1px solid #eee;
            width: 170px;
            height: 330px;
            margin-right: 12px;
            line-height: 1.9;
            text-indent: 12px;
            overflow: hidden;
        }

        .layui-inline ul li {
            cursor: pointer;
        }

        .active {
            color: #009688;
        }

        .more-right {
            width: 370px !important;
        }

        .spec-title {
            border-bottom: 1px solid #ccc;
            height: 42px;
            line-height: 42px;
            box-sizing: border-box;
        }

        .layui-btn-normal {
            color: #fff;
        }

        .tip-font {
            margin: 126px 0 0 100px;
        }

    </style>
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">

        </div>
        <div class="layui-card-body">
            <div class="layui-inline">
                <div class="spec-title">选择规格[单选]</div>
                <div class="layui-input-inline">
                    <div class="layui-side-scroll">
                        <ul class="spec-left">
                        </ul>
                    </div>
                </div>
            </div>

            <div class="layui-inline more-right">
                <div class="spec-title">选择规格值[可多选] <input type="text" id="add-spec-tags"
                                                                  style="padding-left: 5px;border: none;border-bottom: 1px solid #ccc; width: 200px;margin-left: 10px;display:inline-block;"
                                                                  placeholder="新增规格名、按回车键确定添加" autocomplete="off" class="layui-input"></div>
                <div class="layui-input-inline">
                    <div class="spec-right">
                        <p class="tip-font">请选择左侧规格列表</p>
                    </div>
                </div>
            </div>

            <div class="layui-input-block"></div>
            <button class="layui-btn classify-btn" style="margin-left:240px;">确 定</button>
        </div>
    </div>
</div>

<script src="/static/layuiadmin/layui/layui.js"></script>
<script src="https://cdn.bootcss.com/jquery/3.0.0/jquery.min.js"></script>
<script src="/static/layuiadmin/goods/js/common.js?b4"></script>
<script>
    let isInputVal = false
    var cls = '' //点击时父级的class
    let moke = [
        {
            id: 1,
            name: '颜色规格',

        }, {
            id: 2,
            name: '尺码',

        }, {
            id: 3,
            name: '材质',

        }
    ];

    layui.use(['form'], function () {
        let request = getRequest();

        cls = request['cls'];

        function queryClassif() { // 请求分类 后端接口

            let html = ''
            moke.forEach(function (item, index) {
                html += `<li class="child-ele" data-id="${item.id}"  data-index="${index}">${item.name}</li>`
            })


            $('.spec-left').html(html)

            // });
        }

        queryClassif(); // 获取后端分类数据

        //  点击获取而已
        $('body').on('click', '.child-ele', function () {

            $(this).parent().children('li').removeClass('layui-btn-normal');
            $(this).addClass('layui-btn-normal');

            let index = $(this).attr('data-index');
            specs_id = $(this).attr('data-id');
            // let projectArr = moke[index]['project'].split(',')

            let url = "<?php echo url('specsValue/getBySpecsId'); ?>"+"?specs_id="+specs_id;

            layObj.get(url, function (res) {
                let html = ''
                projectArr = res.result;
                projectArr.forEach(function (item) {
                    html += '<button type="button" data-specs-value-id="'+item.id+'" class="layui-btn layui-btn-sm layui-btn-normal" style="margin-top: 12px"> <b>' + item.name + '</b><i class="layui-icon del-child-tags" style="padding-left: 12px;"></i></button>'
                })
                $specleft = $('.spec-right')
                $($specleft).html(html)
            });

            isInputVal = true
            // let html = ''
            // projectArr.forEach(function (item, index) {
            //     html += '<button type="button" class="layui-btn layui-btn-sm layui-btn-normal" style="margin-top: 12px"> <b>' + item + '</b><i class="layui-icon del-child-tags" style="padding-left: 12px;"></i></button>'
            // })
            // $specleft = $('.spec-right')
            // $($specleft).html(html)
        })

        // 删除规格值按钮
        $('html').on('click', '.del-child-tags', function () {
            $(this).parent().remove()
            // var index = parent.layer.getFrameIndex(window.name);
            // parent.layer.close(index);
        })

        // 添加规格标签
        $('#add-spec-tags').on('keypress', function (e) {

            if (!isInputVal) {
                return layer.msg('请点选左侧规格名称')
            }
            if (e.which === 13) {
                let tags = $(this).val();
                url = "/admin/specsValue/save?specs_id="+specs_id+"&name="+tags;
                layObj.get(url, function (res) {
                    if(res.status != 1) {
                        layer.msg("添加失败，请稍候重试");
                        return false;
                    }
                    let tag = '<button type="button" data-specs-value-id="'+res.result.id+'" class="layui-btn layui-btn-sm layui-btn-normal" style="margin-top: 12px"><b>' + tags + '</b> <i class="layui-icon del-child-tags" style="padding-left: 12px;"></i></button>'
                    $('.spec-right').append(tag)
                    $(this).val('');
                });

            }
        })


        // 提交规格值到商品页面
        $('html').on('click', '.classify-btn', function () {
            let spec_left_name = '';
            let spec_left_id = 0;
            // 左侧规格类目
            let spec_left = $('.spec-left').children('li')
            spec_left.each(function (index, item) {
                if ($(item).hasClass('layui-btn-normal')) {
                    spec_left_name = $(item).text()
                    spec_left_id = $(item).attr('data-id')
                }
            })

            // 右侧规格值
            let spec_right = $('.spec-right').find('button')
            let tmp = ''
            let spec_tmp = ''

            spec_right.each(function (index, item) {
                let name = $(item).children('b').text()
                let specs_value_id = $(item).attr('data-specs-value-id');
                tmp += `<li class="layui-badge layui-bg-blue">${name}</li>`
                spec_tmp += `<li><label><input type="checkbox"  class="sku_value" lay-ignore  propvalid="${specs_value_id}" value="${name}"/>${name}</label></li>`
            });

            // 给父级 赋值
            parent.$('.' + cls).find('input').val(spec_left_name)
            parent.$('.' + cls).find('input').attr('data-id', spec_left_id);
            parent.$('.' + cls).find('input').attr('data-name', spec_left_name);
            parent.$('.' + cls).find('ul').html(tmp);


            let conf = `<ul class="SKU_TYPE del-${cls}" >
                                    <li is_required='1' propid='${spec_left_id}' sku-type-name="${spec_left_name}"><em>*</em>${spec_left_name}</li>
                                </ul>
                                <ul class="del-${cls}">
                                    ${spec_tmp}
                                </ul>
                                <div class="clear"></div>`



            parent.$('.skus-warp').append(conf)
            // window.parent.location.reload();//刷新父页面
            var index = parent.layer.getFrameIndex(window.name);

            parent.layer.close(index);
        })


    })


    function getRequest() {
        let url = location.search; //获取url中"?"符后的字串
        let theRequest = {};
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for (var i = 0; i < strs.length; i++) {
                theRequest[strs[i].split("=")[0]] = unescape(strs[i].split("=")[1]);
            }
        }
        return theRequest;
    }
</script>
</body>
</html>

