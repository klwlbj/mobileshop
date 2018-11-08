<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0040)http://m.ddky.com/my-dingdangdenglu.html -->
<html lang="zh-cn" style="font-size: 100px;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=320,maximum-scale=1.3,user-scalable=no">
<meta name="keywords" content="源多享">
<meta name="description" content="源多享">
<meta name="format-detection" content="telephone=no, email=no">
<title>个人中心</title>
<script>!function(n,e){function t(){var n=e.documentElement,t=e.documentElement.clientWidth;t>750&&(t=750),n.style.fontSize=t/750*100+"px"}var i="orientationchange"in window?"orientationchange":"resize";n.addEventListener(i,t,!1),n.addEventListener("load",t,!1),e.addEventListener("DOMContentLoaded",t,!1)}(window,document);</script>
<link rel="stylesheet" type="text/css" href="/Public/grzx_files/base.css">
<link href="/Public/grzx_files/my-dingdang.css" rel="stylesheet">

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
    <script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script>
    </head>
    <body style="">
    <?php $cd=4;?>
    <div id="menu" class="menu">
    <div id="one" class="subMenu text-center " data-src="">
        <a href="/index.php/M/Index/index">
        <img src="/Public/index_files1/首页icon.png" class="menu_img" data-imgname="1">
        <div class="menu_name <?php if($cd==1) echo 'active'?>">首页</div>
        </a>
    </div>
    <div id="two" class="subMenu text-center">
        <a href="/index.php/M/Index/cates/id/14">
        <img src="/Public/index_files1/类别icon.png" class="menu_img" data-imgname="2">
        <div class="menu_name <?php if($cd==2) echo 'active'?>">类别</div>
        </a>
    </div>
    <div id="three" class="subMenu text-center" data-src="personal.html">
        <a href="/index.php/M/Index/car">
        <img src="/Public/index_files1/购物车icon.png" class="menu_img" data-imgname="3">
        <div class="menu_name <?php if($cd==3) echo 'active'?>" >购物车</div></a>
    </div>
    <div id="four" class="subMenu text-center" data-src="personal.html">
        <a href="/index.php/M/Index/grzx">
        <img src="/Public/index_files1/个人中心icon.png" class="menu_img" data-imgname="4">
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
        height: auto;
        color: #474747;
        padding-top: 10px;
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
        width: 100%;
        line-height: 30px;
    }

    img.menu_img {
        height: 3%;
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

    <header>

    <div class="my-head cl">
    <img class="headbg" src="/Public/grzx_files/personal_bg.png">
    <div class="headcont">
    <div class="userIconBox fl">
    <img src="/Public/grzx_files/zu-8@2x.png">
    </div>


<div class="userInfoBox fl">

<?php if($_SESSION['user']!= ''): ?><p class="usertel"><?php echo ($_SESSION['user']['phone']); ?></p>
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
    <!--<span class="member_Money">源多享币 : 0</span>-->
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
    </i> 待评价
    </a>
    </li>
    </ul>
    </nav>
    <div class="my-main">

    <ul class="main-list cl">
    <li onclick="location='/index.php/M/Index/olst'" class="allorder"><a><i class="icon icon1"></i><strong>全部订单</strong></a></li>
    <li class="ddsl"><a><i class="icon gifts"></i><strong>退换货</strong></a></li>
    <li class="myyouhui"><a><i class="icon icon-youhui"></i><strong>会员等级</strong></a></li>
    <!--<li class="mycoin none" style="display: list-item;"><a><i class="icon icon-mycoin"></i><strong>商城首页</strong></a></li>-->
    <li class="dizhiguanli"><a><i class="icon icon2"></i><strong>地址管理</strong></a></li>
    <li><a href=""><i class="icon icon4"></i><strong>常见问题</strong></a></li>
    </ul>

    <!-- <h1 class="tele-btn"><a href="tel:95028">客服电话：95028</a></h1> -->
    </div>

    <footer class="my-footer hasuser">
    <ul class="footer-nav cl">
    <li class="tohome"><a href="<?php echo U('Index/index');?>">首页</a></li>
    <li class="toAPP"><a href="<?php echo U('Index/grzx');?>">个人中心</a></li>


<?php if($_SESSION['user']!= ''): ?><li class="hasUserli fr none" style="display: list-item;"><a class="toquit" href="<?php echo U('Index/logout');?>">退出</a></li>
<?php else: ?>
  <li class="hasUserli fr none" style="display: list-item;"><a class="toquit" href="<?php echo U('Index/login');?>">登录</a></li><?php endif; ?>


    </ul>
    </footer>
    </body>
    </html>