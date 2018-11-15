<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html><head>
        <meta charset="utf-8">
    <title>商城-驼铃商贸</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="http://www.shop.com/Application/Admin/Public/style/bootstrap.min.css" rel="stylesheet">
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
                                        <li class="active">订单需求列表</li>
                                        </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">


<div class="row">
    <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="widget">
            <div class="widget-body">
                <div class="flip-scroll">
                    <table class="table table-bordered table-hover" style="text-align: center;">
                        <thead class="">
                            <tr>
                                <th class="text-center" width="10%">ID</th>
                                <th align="left">商品id</th>
                                <th align="left">商品名称</th>
                                <th class="text-center">姓名</th>
                                <th class="text-center">手机号</th>
                                <th class="text-center">省份</th>
                                <th class="text-center">详细地址</th>
                                <th class="text-center">留言信息</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(is_array($dingdan)): $k = 0; $__LIST__ = $dingdan;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><tr>
                                    <td align="center"><?php echo ($vo["id"]); ?></td>
                                    <td align="left"><?php echo ($vo["sid"]); ?></td>
                                    <td align="left"><?php echo ($vo["goods_name"]); ?></td>
                                    <td align="left"><?php echo ($vo["truename"]); ?></td>
                                    <td align="left"><?php echo ($vo["phone"]); ?></td>
                                    <td align="left"><?php echo ($vo["provinceid"]); ?></td>
                                    <td align="left"><?php echo ($vo["address"]); ?></td>
                                    <td align="left"><?php echo ($vo["msg"]); ?></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                    <div style="height:40px;">
                    <ul class="pagination" style="float:right; margin:10px 0 0 0; ">
                    <?php echo ($page); ?>
                    </ul>
                    </div>
                </div>
                <div>
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



</body></html>