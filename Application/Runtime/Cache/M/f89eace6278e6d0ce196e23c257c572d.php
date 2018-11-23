<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0040)http://m.ddky.com/my-dingdangdenglu.html -->
<html lang="zh-cn" style="font-size: 100px;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
<meta name="keywords" content="驼铃商贸">
<meta name="description" content="驼铃商贸">
<meta name="format-detection" content="telephone=no, email=no">
<title>个人中心</title>
<script>!function(n,e){function t(){var n=e.documentElement,t=e.documentElement.clientWidth;t>750&&(t=750),n.style.fontSize=t/750*100+"px"}var i="orientationchange"in window?"orientationchange":"resize";n.addEventListener(i,t,!1),n.addEventListener("load",t,!1),e.addEventListener("DOMContentLoaded",t,!1)}(window,document);</script>
<link rel="stylesheet" type="text/css" href="/Public/grzx_files/base.css">
<link href="/Public/grzx_files/my-dingdang.css" rel="stylesheet">
    <link href="/Public/car_files/swiper.min.css" rel="stylesheet" type="text/css">
    <script src="/Public/car_files/swiper.min.js" type="text/javascript"></script>
    <link href="/Public/car_files/vkad.reset.css" rel="stylesheet" type="text/css">
<style>

body,html{
	background: #EFEFF4;
}
.unbundling{
    color: #FFF;
    height: 18px;
    line-height: 16px;
    border: 1px solid #FC5C63;
    padding: 0 10px;
    border-radius: 9px;
    font-size: 10px;
    margin-top: 2px;
}
.usertel img{
	width:14px;height:14px;margin-left: 4px;position: relative;top: 2px;
}
</style>


    </head>
    <body >


    <header>

    <div class="my-head cl">
    <img class="headbg" src="/Public/grzx_files/personal_bg.png">
    <div class="headcont">
    <div class="userIconBox fl">
    <img src="/Public/grzx_files/zu-8@2x.png">
    </div>


<div class="userInfoBox fl">

<?php if($_SESSION['user']!= ''): ?><p class="usertel"><?php echo ($_SESSION['user']['phone']); ?></p>

    <span><a style="color: #FFF;" class="toquit" href="<?php echo U('Index/logout');?>">注销</a></span>
    &nbsp;<span><a style="color: #FFF;" class="toquit" href="<?php echo U('Index/uppw');?>">更改密码</a></span>

    <!--<p class="userother">-->
        <!--<span id="userName">未绑定</span>-->
        <!--<span class="unbundling none" style="display: none;">解绑微信</span>-->
        <!--<span class="bundling none" style="display: inline-block;">绑定微信</span>-->
    <!--</p>-->
<?php else: ?>
    <p class="nologin" style="">
    <span id="reg-btn"><a style="color: #FFF;" class="toquit" href="<?php echo U('Index/reg');?>">注册</a></span> /
    <span><a style="color: #FFF;" class="toquit" href="<?php echo U('Index/login');?>">登录</a></span>

    </p><?php endif; ?>


</div>


<!--<?php if($_SESSION['user']!= ''): ?>-->
    <!--<div class="membercenterBox fr">-->
    <!--<img class="member_icon" src="/Public/grzx_files/personal_centericon.png">-->
    <!--<div class="memberInfo">-->
    <!--<p class="member_rank">普通会员</p>-->
    <!--<span class="member_Money">驼铃商贸币 : 0</span>-->
    <!--</div>-->
    <!--<img class="member_next" src="/Public/grzx_files/iconwhite_left.png">-->
    <!--</div>-->
<!--<?php endif; ?>-->



    </div>
    </div>
    </header>
    <nav class="my-nav success-login">
    <ul class="nav-list cl">
    <li  onclick="location='/index.php/M/Index/olst'" class="waitpay">
    <a>
    <i class="icon icon-fukuan">
    <span class="num pay-num none" style="display: none;"></span>
    </i> 货到付款
    </a>
    </li>
    <li onclick="location='/index.php/M/Index/car'" class="currentorder">
    <a>
    <i class="icon">
    <span class="num dq-num none" style="display: none;">

    </span>
    </i> 购物车
    </a>
    </li>
    <li class="waitcomment">
    <a>
    <i class="icon icon-pingjia">
    <span class="num comm-num none"></span>
    </i> 已完成
    </a>
    </li>
    </ul>
    </nav>

    <div class="my-main">

    <ul class="main-list cl">
    <li onclick="location='/index.php/M/Index/olst'" class="allorder"><a><i class="icon icon1"></i><strong>全部订单</strong></a></li>
    <li class="ddsl"><a><i class="icon gifts"></i><strong>退换货</strong></a></li>
    <li class="myyouhui"><a onclick="location='/index.php/M/Index/vip'"><i class="icon icon-youhui"></i><strong>会员等级</strong></a></li>
    <!--<li class="mycoin none" style="display: list-item;"><a><i class="icon icon-mycoin"></i><strong>商城首页</strong></a></li>-->
    <li class="dizhiguanli"><a onclick="location='/index.php/M/Index/address'"><i class="icon icon2"></i><strong>地址管理</strong></a></li>
    <li><a onclick="location='/index.php/M/Index/problems'"><i class="icon icon4"></i><strong>常见问题</strong></a></li>
    </ul>

    <!-- <h1 class="tele-btn"><a href="tel:95028">客服电话：95028</a></h1> -->
    </div>
    <?php $cd=4;?>
    <!--<script src="../../../../Public/car_files/m_shopCart.js"></script>-->
<div  class="menu">
    <div id="one" class="subMenu text-center " data-src="">
        <a href="/index.php/M/Index/index">
        <img src="/Public/index_files1/首页icon.png" class="menu_img" >
        <div class="menu_name <?php if($cd==1) echo 'active'?>">首页</div>
        </a>
    </div>
    <div id="two" class="subMenu text-center">
        <a href="/index.php/M/Index/cates/id/14">
        <img src="/Public/index_files1/类别icon.png" class="menu_img" >
        <div class="menu_name <?php if($cd==2) echo 'active'?>">类别</div>
        </a>
    </div>
    <div id="three" class="subMenu text-center" data-src="personal.html">
        <a href="/index.php/M/Index/car">
        <img src="/Public/index_files1/购物车icon.png" class="menu_img" >
        <div class="menu_name <?php if($cd==3) echo 'active'?>" >购物车</div></a>
    </div>
    <div id="four" class="subMenu text-center" >
        <a href="/index.php/M/Index/grzx">
        <img src="/Public/index_files1/个人中心icon.png" class="menu_img" >
        <div class="menu_name <?php if($cd==4) echo 'active'?>">个人中心</div>
        </a>
    </div>

</div> <!--底部菜单-->
<style>
    .menu {
        z-index:9999;
        display: block;
        position: fixed;
        bottom: 0;
        width: 100%;
        /*height: 11%;*/
        color: #474747;
        padding-top: 2%;
        border-top: 1px solid #eee;
        background-color: #fff;
    }

    .subMenu {
        width: 25%;
        float: left;
        cursor: pointer;
    }

    .menu_name {
        height: 30px;
        width: 90px;
        line-height: 30px;
        margin: auto;
    }

    img.menu_img {
        height: 33px;
        width: auto;
    }

    .menu img {
        margin: auto;
        vertical-align: middle;
        border: 0;
    }

    .active {
    color: #01abff;
    }

    .text-center {
        text-align: center
    }

</style>
    <!--<footer class="my-footer hasuser">-->
    <!--<ul class="footer-nav cl">-->
    <!--<li class="tohome"><a href="<?php echo U('Index/index');?>">首页</a></li>-->
    <!--<li class="toAPP"><a href="<?php echo U('Index/grzx');?>">个人中心</a></li>-->


<!--<?php if($_SESSION['user']!= ''): ?>-->
  <!--<li class="hasUserli fr none" style="display: list-item;"><a class="toquit" href="<?php echo U('Index/logout');?>">退出</a></li>-->
<!--<?php else: ?>-->
  <!--<li class="hasUserli fr none" style="display: list-item;"><a class="toquit" href="<?php echo U('Index/login');?>">登录</a></li>-->
<!--<?php endif; ?>-->


    <!--</ul>-->
    <!--</footer>-->

    </body>
    </html>