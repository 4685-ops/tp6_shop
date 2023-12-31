<?php /*a:1:{s:58:"E:\phpstudy_pro\WWW\tp6_shop\app\admin\view\goods\add.html";i:1688960405;}*/ ?>
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
    <link rel="stylesheet" href="/static/layuiadmin/goods/css/goods.css">
    <link rel="stylesheet" href="/static/layuiadmin/goods/css/sku_style.css"/>
    <script src="https://cdn.bootcss.com/jquery/3.0.0/jquery.min.js"></script>
    <script type="text/javascript" src="/static/layuiadmin/goods/js/sku/createSkuTable.js?v19"></script>
</head>
<body>

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-form layui-card-header layuiadmin-card-header-auto">

        </div>
        <div class="layui-card-body">
            <!--基本信息 start-->
            <div class="layui-tab-item layui-show">
                <form action="" class="layui-form" id="myform" lay-filter="form-filter">
                    <div class="layui-form-item">
                        <label class=" layui-form layui-form-label">商品名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" id="goods_name" lay-verify="required"
                                   placeholder="请输入商品名称"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">商品分类</label>
                            <div class="layui-input-inline">
                                <input type="text" name="category_id" id="goods_cate" placeholder="请选择"
                                       autocomplete="off" class="layui-input">
                            </div>
                            <div class="layui-btn change-type">选择</div>
                        </div>
                    </div>

                    <div class="layui-form layui-form-item">
                        <label class="layui-form-label">商品副标题</label>
                        <div class="layui-input-inline">
                            <input type="text" name="sub_title" id="subtitle" lay-verify="required"
                                   placeholder="请输入商品副标题"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form layui-form-item">
                        <label class="layui-form-label">商品促销语</label>
                        <div class="layui-input-inline">
                            <input type="text" name="promotion_title" id="goods_sales" lay-verify="required"
                                   placeholder="请输入商品促销语"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form layui-form-item">
                        <label class="layui-form-label">关键词</label>
                        <div class="layui-input-inline">
                            <input type="text" name="keywords" id="goods_word" placeholder="请输入商品关键词"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form layui-form-item">
                        <label class="layui-form-label">商品单位</label>
                        <div class="layui-input-inline">
                            <input type="text" name="goods_unit" id="goods_unit" placeholder="请输入商品单位"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form layui-form-item">
                        <label class="layui-form-label">库存显示</label>
                        <div class="layui-input-block">
                            <input type="radio" name="is_show_stock" value="1" title="是" checked="">
                            <input type="radio" name="is_show_stock" value="0" title="否">
                        </div>
                    </div>
                    <div class="layui-form layui-form-item">
                        <label class="layui-form-label">总库存</label>
                        <div class="layui-input-inline">
                            <input type="number" name="stock" id="goods_stock" placeholder="请输入商品总库存 /件"
                                   autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">生产日期</label>
                            <div class="layui-input-block">
                                <input type="text" name="production_time" id="goods_date" autocomplete="off"
                                       class="layui-input">
                            </div>
                        </div>
                    </div>

                    <div class="layui-form layui-form-item">
                        <label class="layui-form-label">商品规格</label>
                        <div class="layui-input-block">
                            <input type="radio" name="goods_specs_type" lay-filter="spec" value="1" title="统一规格" checked="">
                            <input type="radio" name="goods_specs_type" lay-filter="spec" value="2" title="多规格">
                        </div>
                    </div>
                    <button style="display: none;" class="buttons" lay-submit lay-filter="*"></button>
                </form>
                <div class="layui-form-item spec-more" style="display: none">
                    <label class="layui-form-label"></label>
                    <div class="layui-input-block  spec-more-block">
                        <table class="layui-table">
                            <colgroup>
                                <col width="500">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>规格值</th>
                            </tr>
                            </thead>
                            <tbody class="spec-content">
                            </tbody>
                        </table>
                        <div class="layui-btn-container">
                            <button type="button" class="layui-btn add-spec">添加规格</button>
                        </div>


                        <!--生成 规格 start-->
                        <!--                                <div class="layui-tab-item">-->
                        <div class="control-group choose_config">
                            <div class="skus-warp"></div>
                            <div class="clear"></div>
                            <div id="skuTable">
                                <table class="skuTable">
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--生成 规格 end-->
                </div>

                <div class="layui-form-item spec-is-show">
                    <label class="layui-form-label">市场价格</label>
                    <div class="layui-input-inline">
                        <input type="text" name="market_price" id="market_price" placeholder="请输入市场价格 /元"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item spec-is-show">
                    <label class="layui-form-label">销售价格</label>
                    <div class="layui-input-inline">
                        <input type="text" name="sell_price" id="sell_price" placeholder="请输入销售价格 /元"
                               autocomplete="off" class="layui-input">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">上传 大图</label>
                    <div class="layui-input-inline">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn" id="btn_main">上传图片</button>
                            <div class="layui-upload-list big_image">
                                <p id="demoText"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">上传轮播图</label>
                    <div class="layui-input-block">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn" id="btn_banner">多图片上传</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                预览图：
                                <div class="layui-upload-list" id="banner_img"
                                     value=""></div>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="layui-form-item">
                    <label class="layui-form-label">上传展示图</label>
                    <div class="layui-input-block">
                        <div class="layui-upload">
                            <button type="button" class="layui-btn" id="btn_show">图片上传</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                预览图：
                                <div class="layui-upload-list" id="show_img"
                                     value=""></div>
                            </blockquote>
                        </div>
                    </div>
                </div>

            </div>
            <!--基本信息 end-->
            <div class="layui-form-item">
                <label class="layui-form-label">商品详情</label>
                <div class="layui-input-block">
                    <textarea id="content" style="display: none;"  value=""></textarea>
                </div>
            </div>


        </div>

    </div>
</div>

<script src="/static/layuiadmin/layui/layui.js"></script>

<script src="/static/layuiadmin/goods/js/uploads.js?c11"></script>
<script src="/static/layuiadmin/goods/js/goods.js?c9"></script>
<script src="/static/layuiadmin/goods/js/common.js?b4"></script>

<script>
    // 点击查看分类
    $('.change-type').on('click', function () {
        goods_cls_ids = $('#goods_cate').attr('data-ids');
        layObj.dialog("/admin/category/dialog")
    })


    layui.use(['form', 'layedit', 'laydate', 'element'], function () {
        var form = layui.form
            , layedit = layui.layedit
            , laydate = layui.laydate
            , $ = layui.$
            , element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块

        laydate.render({
            elem: '#goods_date'
        });

        layedit.set({
            uploadImage: {
                url: '<?php echo url('image/layUpload'); ?>',
            type: 'post',
        }
    })

        let edit_index = layedit.build('content')


        form.on('radio(spec)', function (data) {
            // 多规格处理
            $('.spec-more').css('display', (data.value == 2 ? 'block' : 'none'));
            $('.spec-is-show').css('display', (data.value == 1 ? 'block' : 'none'));
        });


        // 显示规格  输入框
        let spec_index = $('.spec-content').children('tr').length;
        $('.add-spec').on('click', function () {
            spec_index++;
            let html = `<tr class="tr${spec_index}">
                                        <td>
                                            <div class="layui-form-item">
                                                <div class="layui-input-inline" style="width:  600px">
                                                    <input type="text" name="spec_group" lay-verify="required"
                                                           placeholder="请输入规格名" autocomplete="off" class="layui-input">
                                                           <ul style="margin-top: 12px"></ul>
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">
                                                    <i class="layui-icon add-spec-btn" style="margin-left: 10px;cursor:pointer;">&#xe65f;</i>
                                                    <i class="layui-icon del-spec" style="margin-left: 100px;cursor:pointer;">&#xe640;</i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>`;
            $('.spec-content').append(html)
        })


        // 删除规格输入框
        $('body').on('click', '.del-spec', function () {
            let trs = $(this).parent().parent().parent().parent();
            trs.remove();
            let el = trs.attr('class');
            $('.del-' + el).remove()

            // 删除规格复选框栏
            let input_id =  $(this).parent().prev().find('input').attr('data-id')

            $("ul[class*='SKU_TYPE']").each(function (i, item) {
                let propid = $(this).find('li').attr('propid')
                if(propid == input_id){
                    $(this).next().next().remove()
                    $(this).next().remove()
                    $(this).remove()
                    return false;
                }
            })
            // 规格赋值
            getAlreadySetSkuVals()
            // 创建表格
            createTab()
        })


        // 显示规格页面
        $('body').on('click', '.add-spec-btn', function () {
            let cls = $(this).parent().parent().parent().parent().attr('class')
            layObj.dialog("/admin/specs/dialog", '添加规格')
        })

        $("#btnSubmit").on("click", function () {
            $(".buttons").click();
        });
        layui.form.on('submit(*)', function (data) {
            let goods_data = {
                ...data.field,
                category_id: $('#goods_cate').attr('data-ids'),
                big_image: $('#main_img').attr('src'),
                carousel_image: images('banner_img'),
                recommend_image: images('show_img'),
                skus: skus(),
                description: layedit.getContent(edit_index),
                add_spec_arr: addSpecArr() // 提交的规格数据
            };
            console.log(goods_data);//这个data就是表单的值 包含以下值

            url = '<?php echo url("goods/save"); ?>';
            // 发送ajax请求
            layObj.post(url, goods_data,  (res) =>{
                if(res.status == 1) {
                    layer.msg("商品新增成功");
                } else {
                    layer.msg("商品新增失败");
                }
            })

            return false;
        });


        // 特别说明 修改数据
        let request = getRequest()
        let editid = request['id'];
        let objEdit = {
            // 加上常规的 表字段内容
            add_spec_arr:[
                {   id: "1",
                    name: "颜色规格",
                    project: "红色,橘黄色,青色,灰色"
                },
                {
                    id: "2",
                    name: "尺码",
                    project: "265/m,270/m,275/m,280/m,285/m,290/m"
                }],
            skus: [
                {
                    0: "红色",
                    1: "270/m",
                    2: "11",
                    3: "33",
                    4: "22",
                    propvalnames: {propvalids: "10,21", skuSellPrice: "11", skuMarketPrice: "22", skuStock: "33"}
                }, {
                    0: "红色",
                    1: "275/m",
                    2: "44",
                    3: "666",
                    4: "55",
                    propvalnames: {propvalids: "10,22", skuSellPrice: "44", skuMarketPrice: "55", skuStock: "666"}
                },
                {
                    0: "青色",
                    1: "270/m",
                    2: "77",
                    3: "99",
                    4: "88",
                    propvalnames: {propvalids: "12,21", skuSellPrice: "77", skuMarketPrice: "88", skuStock: "99"}
                },
                {
                    0: "青色",
                    1: "275/m",
                    2: "100",
                    3: "300",
                    4: "200",
                    propvalnames: {propvalids: "12,22", skuSellPrice: "100", skuMarketPrice: "200", skuStock: "300"}
                }
            ]
        }
        if(editid == 1){
            form.val('form-filter',objEdit)


            $('.spec-more').css('display', (objEdit.spec == 2 ? 'block' : 'none'));
            $('.spec-is-show').css('display', (objEdit.spec == 1 ? 'block' : 'none'));

            $('#goods_cate').val(objEdit.goods_cate)
            $('#goods_cate').attr('data-ids', objEdit.goods_cate_ids)
            $('.main_img').append('<img class="layui-upload-img upload-img" id="main_img" src="'+objEdit.main_img+'" />');
            $('#show_img').append(imageEle())
            $('#banner_img').append(imageEle())
            skustab(objEdit.add_spec_arr)
            skusData(objEdit.skus)

            layedit.setContent(edit_index, objEdit.content);
            form.render()
            return false
        }


        // 多图片数据插入
        function imageEle(imgSrc = '') {
            let tpl = ''
            let imgArr = imgSrc.split(',');

            for (let item of imgArr) {
                tpl += '<div class="img-wrap"><img src="' + item + '"  class="layui-upload-img upload-img"><i class="layui-icon layui-icon-close btn-del"></i></div>'
            }
            return tpl
        }
    })

    // 提交的规格数据
    function addSpecArr() {
        // 规格值 数组
        let specArr = [];
        $("input[name^='spec_group']").each(function (i, el) {
            let that = $(this)
                , lis = that.next().children('li')
                , eleLi = ''

            lis.each(function (index, item) {
                eleLi += $(item).text() + ','
            })
            let id = that.attr('data-id'),
                name = that.attr('data-name')
            project = eleLi.slice(0, -1)

            specArr.push({id, name, project})
        });
        return specArr
    }
    // 修改时创建数据
    function skustab(moke) {
        let pli = ''// 选择框栏 tr
            , child_li = ''// 选择框 li 栏
            , tmp = '' // 是复选框栏
            ,trindex = 0
        for (let item of moke) {
            trindex++
            tmp += `<ul class="SKU_TYPE" >
                                    <li is_required='1' propid='${item.id}' sku-type-name="${item.name}"><em>*</em>${item.name}</li>
                                </ul>
                                <ul>`;
            let projectArr = item.project.split(',')


            projectArr.forEach(function (name, index) {
                tmp += `<li><label><input type="checkbox"  class="sku_value" lay-ignore  propvalid="${item.id}${index}" value="${name}"/>${name}</label></li>`;
                child_li += `<li class="layui-badge layui-bg-blue">${name}</li>`
            })
            tmp += `</ul><div class="clear"></div>`


            pli += `<tr class="tr${trindex}">
                                        <td>
                                            <div class="layui-form-item">
                                                <div class="layui-input-inline" style="width:  600px">
                                                    <input type="text" name="spec_group" lay-verify="required" placeholder="请输入规格名" autocomplete="off"  value="${item.name}" class="layui-input" data-id="${item.id}" data-name="颜色规格">
                                                           <ul style="margin-top: 12px">
                                                           ${child_li}
                                                           </ul>
                                                </div>
                                                <div class="layui-form-mid layui-word-aux">
                                                    <i class="layui-icon add-spec-btn" style="margin-left: 10px;cursor:pointer;"></i>
                                                    <i class="layui-icon del-spec" style="margin-left: 100px;cursor:pointer;"></i>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>`
            child_li = ''
        }
        $('.spec-content').html(pli);
        $('.skus-warp').append(tmp)
    }

    function skusData(skus) {
        for (let item of skus) {
            let propvalids = item['propvalnames']['propvalids'].split(',')

            $(".sku_value").each(function (i, item) {
                let propvalid = $(this).attr('propvalid')
                if (propvalids.includes(propvalid)) {
                    $(this).attr('checked', true)
                }
            })
            alreadySetSkuVals[item['propvalnames']['propvalids']] = {
                "price": item['propvalnames']['skuSellPrice'],
                "cost_price": item['propvalnames']['skuMarketPrice'],
                "stock": item['propvalnames']['skuStock']
            }
        }
        // 创建 规格表格
        createTab()
    }

    // 获取 url 参数 ，上线后 删除
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

