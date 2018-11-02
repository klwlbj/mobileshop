<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<style>
		#category2{
			width: 20%;
			background-color: #f8f8f8;
			height: 100%;
		}
		li{
			list-style: none;
			height:6%;
			margin: auto;
			padding-top: 5%;
		}
		li a {
			text-align: center;
			color: black;


		}
	</style>
</head>
<body>
<?php $cd=2;?>
<div id="menu" class="menu">
    <div id="one" class="subMenu text-center " data-src="">
        <a href="/index.php/M/Cates/index">
        <img src="/Public/index_files1/首页icon.png" class="menu_img" data-imgname="1">
        <div class="menu_name <?php if($cd==1) echo 'active'?>">首页</div>
        </a>
    </div>
    <div id="two" class="subMenu text-center">
        <a href="M/Cates/index">
        <img src="/Public/index_files1/类别icon.png" class="menu_img" data-imgname="2">
        <div class="menu_name <?php if($cd==2) echo 'active'?>">类别</div>
        </a>
    </div>
    <div id="three" class="subMenu text-center" data-src="personal.html">
        <a href="/index.php/M/Cates/car">
        <img src="/Public/index_files1/购物车icon.png" class="menu_img" data-imgname="3">
        <div class="menu_name <?php if($cd==3) echo 'active'?>" >购物车</div></a>
    </div>
    <div id="four" class="subMenu text-center" data-src="personal.html">
        <a href="/index.php/M/Cates/grzx">
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
<ul style="transform: translateY(0px);" id="category2">
	<li class="cur"  id="category6" >
	<a class="J_ping" href="">热门推荐</a>
	</li>
	<li class="cur"  id="category6" >
	<a class="J_ping" href="">热门推荐</a>
	</li>
	<li class="cur"  id="category6" >
	<a class="J_ping" href="">热门推荐</a>
	</li>
	<li class="cur"  id="category6" >
	<a class="J_ping" href="">热门推荐</a>
	</li>
	<li class="cur"  id="category6" >
	<a class="J_ping" href="">热门推荐</a>
	</li>


	</ul>
</body>
</html>