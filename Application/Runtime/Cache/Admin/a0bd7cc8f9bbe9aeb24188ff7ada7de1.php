<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
	    <meta charset="utf-8">
    <title>商城-源多享</title>

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
                                    <a href="/x/index.php/Admin/Admin/logout">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="/x/index.php/Admin/Admin/edit/id/<?php echo (session('uid')); ?>">
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
                                <a href="/x/index.php/Admin/admin/lst">
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
                                <a href="/x/index.php/Admin/Cate/lst">
                                    <span class="menu-text">分类管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/x/index.php/Admin/Brand/lst">
                                    <span class="menu-text">品牌管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/x/index.php/Admin/Goods/lst">
                                    <span class="menu-text">商品管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/x/index.php/Admin/Type/lst">
                                    <span class="menu-text">商品类型</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-hand-o-right"></i>
                            <span class="menu-text">导航设置</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/x/index.php/Admin/Nav/lst">
                                    <span class="menu-text">导航管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-file-text-o"></i>
                            <span class="menu-text">文章模块</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/x/index.php/Admin/Category/lst">
                                    <span class="menu-text">栏目管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/x/index.php/Admin/Article/lst">
                                    <span class="menu-text">文章管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa  fa-dashboard "></i>
                            <span class="menu-text">广告模块</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/x/index.php/Admin/Adpos/lst">
                                    <span class="menu-text">广告位管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/x/index.php/Admin/Ad/lst">
                                    <span class="menu-text">广告管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text">会员模块</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/admin/user/index.html">
                                    <span class="menu-text">会员管理</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                            <li>
                                <a href="/x/index.php/Admin/MemberLevel/lst">
                                    <span class="menu-text">会员等级</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-thumbs-up"></i>
                            <span class="menu-text">推荐位</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/x/index.php/Admin/Recpos/lst">
                                    <span class="menu-text">推荐位列表</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-cny"></i>
                            <span class="menu-text">订单管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/x/index.php/Admin/index/dds">
                                    <span class="menu-text">订单列表</span>
                                    <i class="menu-expand"></i>
                                </a>
                                <a href="/x/index.php/Admin/index/dd">
                                    <span class="menu-text">订单需求</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-gear"></i>
                            <span class="menu-text">系统管理</span>
                            <i class="menu-expand"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a href="/x/index.php/Admin/Config/config">
                                    <span class="menu-text">站点配置</span>
                                    <i class="menu-expand"></i>
                                </a>
                                <a href="/x/index.php/Admin/Config/lst">
                                    <span class="menu-text">配置列表</span>
                                    <i class="menu-expand"></i>
                                </a>
                            </li>
                        </ul>
                    </li>



                    <li>
                        <a href="/x/index.php/Admin/index/ip" class="menu-dropdown">
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
                        <a href="/x/index.php/Admin/Index/index">系统</a>
                    </li>
                                        <li>
                        <a href="/x/index.php/Admin/Cate/lst">商品分类列表</a>
                    </li>
                                        <li class="active">修改商品分类</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">

<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-header bordered-bottom bordered-blue">
                <span class="widget-caption">修改商品分类</span>
            </div>
            <div class="widget-body">
                <div id="horizontal-form">
                    <form class="form-horizontal" role="form" action="" method="post">
                        <input type="hidden" name="id" value="<?php echo ($cates["id"]); ?>">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">分类名称</label>
                            <div class="col-sm-6">
                                <input class="form-control" id="catename" placeholder="" name="catename" value="<?php echo ($cates["catename"]); ?>" required="" type="text">
                            </div>
                            <p class="help-block col-sm-4 red">* 必填</p>
                        </div>

                        <div class="form-group">
                            <label for="group_id" class="col-sm-2 control-label no-padding-right">上级分类</label>
                            <div class="col-sm-6">
                                <select name="pid">
                                    <option value="0">顶级分类</option>
                                    <?php if(is_array($cateres)): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($cates['pid'] == $vo['id']): ?>selected = "selected"<?php endif; ?> value="<?php echo ($vo["id"]); ?>"><?php if($vo['pid'] != 0): ?>|<?php endif; echo str_repeat('-', $vo['level']*8); echo ($vo["catename"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">设置推荐</label>
                            <div class="col-sm-6">
                                <div class="checkbox">
                                    <?php if(is_array($recposres)): $i = 0; $__LIST__ = $recposres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$recpos): $mod = ($i % 2 );++$i;?><label style="margin-right:15px;">
                                            <input <?php if(in_array($recpos['id'],$recids)){echo'checked="checked"';}?> type="checkbox" name="recid[]" value="<?php echo ($recpos["id"]); ?>"  class="colored-success">
                                            <span class="text"><?php echo ($recpos["recname"]); ?></span>
                                        </label><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>

                        <style type="text/css">
                        div.col-sm-6 ul {padding: 0px; margin: 0px;}
                        div.col-sm-6 ul li{list-style: none; margin: 10px 0;}
                        div.col-sm-6 ul li select{margin-left:10px; width: 120px;}
                        </style>
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label no-padding-right">筛选属性</label>
                            <div class="col-sm-6">
                                <?php if($attrRes):?>
                                <ul>
                                    <?php foreach($attrRes as $k=>$v): if($k==0){ $add='[+]'; }else{ $add='[-]'; } ?>
                                    <li>
                                        <a style="padding" href="javascript:void(0);" onclick="addli(this)"><?php echo ($add); ?></a>
                                        <select name="type_id[]">
                                            <option value="">选择类型</option>
                                            <?php foreach($typeRes as $k1=>$v1): if($v1['id']==$v['type_id']){ $select='selected="selected"'; }else{ $select=''; } ?>
                                            <option <?php echo ($select); ?> value="<?php echo ($v1["id"]); ?>"><?php echo ($v1["type_name"]); ?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <select attr_id="<?php echo ($v['id']); ?>" name="attr_id[]">
                                            <option value="">选择属性</option>
                                        </select>
                                    </li>
                                <?php endforeach;?>
                                </ul>
                            <?php else:?>
                                <ul>
                                    <li>
                                        <a style="padding" href="javascript:void(0);" onclick="addli(this)">[+]</a>
                                        <select name="type_id[]">
                                            <option value="">选择类型</option>
                                            <?php if(is_array($typeRes)): $i = 0; $__LIST__ = $typeRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type): $mod = ($i % 2 );++$i;?><option value="<?php echo ($type["id"]); ?>"><?php echo ($type["type_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <select name="attr_id[]">
                                            <option value="">选择属性</option>
                                        </select>
                                    </li>
                                </ul>
                            <?php endif;?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">保存信息</button>
                            </div>
                        </div>
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
    $("select[name='type_id[]']").change(function(){
        var type_id=$(this).val();
        var selectobj=$(this);
        var opt="<option value=''>选择属性</option>";
        if(type_id!=""){
            $.ajax({
                type:"GET",
                url:"/x/index.php/Admin/Goods/ajaxgetattr/typeid/"+type_id,
                dataType:"json",
                success:function(data){
                    var attr_id=selectobj.next('select').attr('attr_id');
                    $(data).each(function(k,v){
                        if(v.id==attr_id){
                            var select='selected="selected"';
                        }else{
                            var select='';
                        }
                        opt +="<option "+select+" value='"+v.id+"'>"+v.attr_name+"</option>";
                    });
                    // $("select[name='attr_id[]']").html(opt);s
                    selectobj.next('select').html(opt);
                }
            });
        }else{
            selectobj.next('select').html(opt);

        }

    });

    function addli(o){
        var li=$(o).parent();
        if($(o).html()=='[+]'){
            var newli=li.clone(true);
            newli.find("a").html('[-]');
            li.after(newli);
        }else{
            li.remove();
        }

    }

    $("select[name='type_id[]']").trigger("change");
    </script>


</body></html>