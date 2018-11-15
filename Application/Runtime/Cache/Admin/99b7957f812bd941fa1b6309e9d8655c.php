<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <title>商城-驼铃商贸</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="http://www.shop.com/Application/Admin/Public/style/bootstrap.css" rel="stylesheet">
    <link href="http://www.shop.com/Application/Admin/Public/style/font-awesome.css" rel="stylesheet">
    <link href="http://www.shop.com/Application/Admin/Public/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="http://www.shop.com/Application/Admin/Public/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="http://www.shop.com/Application/Admin/Public/style/demo.css" rel="stylesheet">
    <link href="http://www.shop.com/Application/Admin/Public/style/typicons.css" rel="stylesheet">
    <link href="http://www.shop.com/Application/Admin/Public/style/animate.css" rel="stylesheet">
    <!-- 引入ueditor -->
    <script src="http://www.shop.com/Application/Admin/Public/ueditor/ueditor.config.js"></script>
    <script src="http://www.shop.com/Application/Admin/Public/ueditor/ueditor.all.min.js"></script>
    <script src="http://www.shop.com/Application/Admin/Public/ueditor/lang/zh-cn/zh-cn.js
"></script>
</head>
<body>
<!-- 头部 -->
<div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img src="http://www.shop.com/Application/Admin/Public/images/logo.png" alt="">
                        </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="http://www.shop.com/Application/Admin/Public/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo (session('uname')); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="/index.php/Admin/Admin/logout">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/index.php/Admin/Admin/edit/id/<?php echo (session('uid')); ?>">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>

<!-- /头部 -->

<div class="main-container container-fluid">
    <div class="page-container">
        <!-- Page Sidebar -->
        <div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input class="searchinput" type="text">
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-user"></i>
                            <span class="menu-text">管理员管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/index.php/Admin/admin/lst">
                                    <span class="menu-text">管理员列表</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-shopping-cart"></i>
                            <span class="menu-text">商品模块</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/index.php/Admin/Cate/lst">
                                    <span class="menu-text">分类管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <!--<li>-->
                                <!--<a href="/index.php/Admin/Brand/lst">-->
                                    <!--<span class="menu-text">品牌管理</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                            <!--</li>-->
                            <li>
                                <a href="/index.php/Admin/Goods/lst">
                                    <span class="menu-text">商品管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <!--<li>-->
                                <!--<a href="/index.php/Admin/Type/lst">-->
                                    <!--<span class="menu-text">商品类型</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                            <!--</li>-->
                        </ul>
                    </li>

                    <!--<li>-->
                        <!--<a href="#" class="menu-dropdown">-->
                            <!--<i class="menu-icon fa  fa-hand-o-right"></i>-->
                            <!--<span class="menu-text">导航设置</span>-->
                            <!--<i class="menu-expand"></i>-->
                        <!--</a>-->
                        <!--<ul class="submenu">-->
                            <!--<li>-->
                                <!--<a href="/index.php/Admin/Nav/lst">-->
                                    <!--<span class="menu-text">导航管理</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</li>-->

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-file-text-o"></i>
                            <span class="menu-text">文章模块</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/index.php/Admin/Category/lst">
                                    <span class="menu-text">栏目管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/index.php/Admin/Article/lst">
                                    <span class="menu-text">文章管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!--<li>-->
                        <!--<a href="#" class="menu-dropdown">-->
                            <!--<i class="menu-icon fa  fa-dashboard "></i>-->
                            <!--<span class="menu-text">广告模块</span>-->
                            <!--<i class="menu-expand"></i>-->
                        <!--</a>-->
                        <!--<ul class="submenu">-->
                            <!--<li>-->
                                <!--<a href="/index.php/Admin/Adpos/lst">-->
                                    <!--<span class="menu-text">广告位管理</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                            <!--</li>-->
                            <!--<li>-->
                                <!--<a href="/index.php/Admin/Ad/lst">-->
                                    <!--<span class="menu-text">广告管理</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</li>-->

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text">会员模块</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">

                            <li>
                                <a href="/index.php/Admin/MemberLevel/lst">
                                    <span class="menu-text">会员管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!--<li>-->
                        <!--<a href="#" class="menu-dropdown">-->
                            <!--<i class="menu-icon fa fa-thumbs-up"></i>-->
                            <!--<span class="menu-text">推荐位</span>-->
                            <!--<i class="menu-expand"></i>-->
                        <!--</a>-->
                        <!--<ul class="submenu">-->
                            <!--<li>-->
                                <!--<a href="/index.php/Admin/Recpos/lst">-->
                                    <!--<span class="menu-text">推荐位列表</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</li>-->

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-cny"></i>
                            <span class="menu-text">订单管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/index.php/Admin/index/dds">
                                    <span class="menu-text">订单列表</span>
                                    <i class="menu-expand"></i>
                                </a>
                                <!--<a href="/index.php/Admin/index/dd">-->
                                    <!--<span class="menu-text">订单需求</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                            </li>
                        </ul>
                    </li>

                    <!--<li>-->
                        <!--<a href="#" class="menu-dropdown">-->
                            <!--<i class="menu-icon fa fa-gear"></i>-->
                            <!--<span class="menu-text">系统管理</span>-->
                            <!--<i class="menu-expand"></i>-->
                        <!--</a>-->
                        <!--<ul class="submenu">-->
                            <!--<li>-->
                                <!--<a href="/index.php/Admin/Config/config">-->
                                    <!--<span class="menu-text">站点配置</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                                <!--<a href="/index.php/Admin/Config/lst">-->
                                    <!--<span class="menu-text">配置列表</span>-->
                                    <!--<i class="menu-expand"></i>-->
                                <!--</a>-->
                            <!--</li>-->
                        <!--</ul>-->
                    <!--</li>-->



                    <li>
                        <a href="/index.php/Admin/index/ip" class="menu-dropdown">
                            <i class="menu-icon fa fa-gear"></i>
                            <span class="menu-text">访客统计</span>
                            <i class="menu-expand"></i>
                        </a>
                    </li>





                </ul>
                <!-- /Sidebar Menu -->
            </div>
        <!-- /Page Sidebar -->
        <!-- Page Content -->
        <div class="page-content">
            <!-- Page Breadcrumb -->
            <div class="page-breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <a href="/index.php/Admin/Index/index">系统</a>
                    </li>
                    <li>
                        <a href="/index.php/Admin/Index/lst">订单列表</a>
                    </li>
                    <li class="active">修改订单</li>
                </ul>
            </div>
            <!-- /Page Breadcrumb -->

            <!-- Page Body -->
            <div class="page-body">

                <div class="row">
                    <div class="col-lg-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <div class="widget-header bordered-bottom bordered-blue">
                                <span class="widget-caption">修改订单</span>
                            </div>
                            <div class="widget-body">
                                <div id="horizontal-form">
                                    <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data" >
                                        <input type="hidden" name="id" value="<?php echo ($goods["id"]); ?>">
                                        <!-- 111111111111111111111111111111111 -->
                                        <div class="tabbable">
                                            <ul id="myTab11" class="nav nav-tabs tabs-flat">
                                                <li class="active">
                                                    <a href="#home11" data-toggle="tab">
                                                        订单信息
                                                    </a>
                                                </li>

                                            </ul>
                                            <div class="tab-content tabs-flat">
                                                <div class="tab-pane active" id="home11">

                                                    <style>
                                                        li{
                                                            list-style-type: none;
                                                        }
                                                    </style>



                                                    <div class="orders-box">


                                                        <div class="orders-msg">

                                                            <ul class="oreders-list">

                                                                <li class="first"><h1 style="font-size: 14px;">订单编号：<?php echo ($oder_list['sn']); ?></h1></li>


                                                                <?php if(is_array($oder_list['data'][0])): $i = 0; $__LIST__ = $oder_list['data'][0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="Li" class="id=535851&amp;shopId=202132&amp;skuId=50047873" detailurl="null">
                                                                        <div class="left fl" ><img style="width: 10%;" src="<?php echo ($vo->max_thumb); ?>"></div>
                                                                        <dl class="right fr"><dt><strong><?php echo ($vo->goods_name); ?></strong></dt><dd><p class="type"></p><p class="cl"><span class="num">数量：<?php echo ($vo->count); ?>&nbsp;</span><i class="price">单价：¥<?php echo ($vo->shop_price); ?></i></p></dd>
                                                                        </dl>
                                                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

                                                            </ul>

                                                            <ul class="rate-list">
                                                                <li class="rate-msg">
                                                                    <p>商品总额：<span>¥<?php echo ($oder_list['data'][1]); ?></span></p>
                                                                </li>
                                                            </ul>

                                                            <ul class="address-msg mt-10">
                                                                <li>支付方式：<span class="fr">货到付款</span></li>
                                                                <li>下单时间：<span class="fr"><?php echo (date('Y-m-d H:i:s',$oder_list["time"])); ?></span></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="username">联系人姓名</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" required="" name="truename" value="<?php echo ($oder_list["truename"]); ?>" placeholder="" class="form-control" >
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <input type="hidden" required="" name="id" value="<?php echo ($oder_list["id"]); ?>" placeholder="" class="form-control" >
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="username">商品总价</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" required="" name="money" value="<?php echo ($oder_list['data'][1]); ?>" placeholder="" class="form-control" >
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="username">地址</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" required="" name="address" value="<?php echo ($oder_list["address"]); ?>" placeholder="" class="form-control" >
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="username">联系人手机</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" required="" name="phone" value="<?php echo ($oder_list["phone"]); ?>" placeholder="" class="form-control" >
                                                        </div>
                                                        <p class="help-block col-sm-4 red">* 必填</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label no-padding-right" for="username">备注</label>
                                                        <div class="col-sm-6">
                                                            <input type="text" required="" name="msg" value="<?php echo ($oder_list["msg"]); ?>" placeholder="" class="form-control" >
                                                        </div>
                                                        <p class="help-block col-sm-4 red"></p>
                                                    </div>





                                                </div>


                                            </div>


                                        </div>

                                <input type="submit" value="修改订单信息" style="width:150px;" class="btn btn-darkorange btn-block">
                                <!-- 111111111111111111111111111111111 -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /Page Body -->
    </div>
    <!-- /Page Content -->
</div>
</div>

<!--Basic Scripts-->
<script src="http://www.shop.com/Application/Admin/Public/style/jquery_002.js"></script>
<script src="http://www.shop.com/Application/Admin/Public/style/bootstrap.js"></script>
<script src="http://www.shop.com/Application/Admin/Public/style/jquery.js"></script>
<!--Beyond Scripts-->
<script src="http://www.shop.com/Application/Admin/Public/style/beyond.js"></script>
<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('goods_desc',{initialFrameWidth:1200,initialFrameHeight:500,});
    var str='<div class="form-group"><label class="col-sm-2 control-label no-padding-right" for="username"><a onclick="delImg(this);" href="javascript:;">[-]</a></label><div class="col-sm-6"><input type="file" name="goods_pics[]"></div></div>';
    $("#addImg").click(function(){
        $("#profile14").append(str);
    });

    function delImg(o){
        $(o).parent().parent().remove();
    }

    function attrad(o){
        var div=$(o).parent().parent();
        if($(o).html() == '[+]'){
            var newdiv=div.clone();
            var sel=newdiv.find("select");
            var oldname=sel.attr('name');
            var newname=oldname.replace('old_','');
            sel.attr('name',newname);
            newdiv.find(":text").attr('name','goods_price[]');
            newdiv.find('a').html('[-]');
            div.after(newdiv);
        }else{
            if(confirm('确定要删除该商品属性吗？')){
                var gaid=div.attr('gaid');
                $.ajax({
                    type:"GET",
                    url:"/index.php/Admin/Index/ajaxdelga/gaid/"+gaid,
                    success:function(data){
                        div.remove();
                    }
                });
            }
        }
    }
    //处理删除商品图片
    function delpic(o){
        if(confirm('确定要删除该图片吗？')){
            var li=$(o).parent();
            var picid=li.attr('picid');
            $.ajax({
                type:"GET",
                url:"/index.php/Admin/Index/ajaxdelpic/picid/"+picid,
                success:function(data){
                    li.remove();
                }
            });
        }
    }
    $("select[name=type_id]").change(function(){

        var typeid=$(this).val();
        $.ajax({
            type:"GET",
            url:"/index.php/Admin/Index/ajaxgetattr/typeid/"+typeid,
            dataType:"json",
            // success : function(data){

            //     var html="";
            //     $(data).each(function(k,v){
            //         html+="<div class='form-group'><label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label><div class='col-sm-6'><input type='text' class='form-control' /></div></div>";
            //     });

            //     $("#attr").html(html);
            // }
            success : function(data){

                var html="";
                $(data).each(function(k,v){
                    // html+="<div class='form-group'><label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label><div class='col-sm-6'><input type='text' class='form-control' /></div></div>";
                    if(v.attr_type == '1'){
                        var attrs=v.attr_values.split(",");
                        html+="<div class='form-group'><label class='col-sm-2 control-label no-padding-right'><a href='javascript:;' onclick='attrad(this);'>[+]</a>"+v.attr_name+"</label><div class='col-sm-6'>";
                        html+="<select name='goods_attr["+v.id+"][]'><option>请选择</option>";
                        for(var i=0; i<attrs.length; i++){
                            html+="<option>"+attrs[i]+"</option>";
                        }
                        html+="</select> <span>￥<input type='text' name='goods_price[]' style='padding:6px 12px; width:70px;' value='0' /> 元</span>";
                        html+="</div></div>";
                    }else{
                        if(v.attr_values != ''){
                            var attrs=v.attr_values.split(",");
                            html+="<div class='form-group'><label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label><div class='col-sm-6'>";
                            html+="<select name='goods_attr["+v.id+"]'><option>请选择</option>";
                            for(var i=0; i<attrs.length; i++){
                                html+="<option>"+attrs[i]+"</option>";
                            }
                            html+="</select><input type='hidden' name='goods_price[]' value='0' />";
                            html+="</div></div>";
                        }else{
                            html+="<div class='form-group'><label class='col-sm-2 control-label no-padding-right'>"+v.attr_name+"</label><div class='col-sm-6'><input name='goods_attr["+v.id+"]' type='text' class='form-control' /><input type='hidden' name='goods_price[]' value='0' /></div></div>";
                        }
                    }
                });

                $("#attr").html(html);
            }
        });
    });

</script>


</body></html>