<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<link href="/Public/index_files1/swiper.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/index_files1/m_index2.css" rel="stylesheet" type="text/css">
	<script src="/Public/index_files1/jquery-1.10.1.min.js" type="text/javascript"></script><script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script>
	<script src="/Public/index_files1/swiper3.07.min.js" type="text/javascript"></script>
	<script src="/Public/index_files1/m_index2.js" type="text/javascript"></script>
	<style>

		#category2{
			width: 20%;
			position: fixed;
			background-color: #f8f8f8;
			height: 100%;
		}
		.cur{
			list-style: none;
			height:6%;
			margin: auto;
			padding-top: 5%;

		}
		.cur a .J_ping{
			text-align: center;
			color: black;
			padding-left: 20px;
			font-size: .24rem;
		}
		a{
			text-decoration:none;
			color: black;
		}
		.left{

			background-color: white;
			float:right;
			width: 80%;
		}
		.imgpic{
			width: 30%;
			margin: 5%;
			height: auto;
			display: inline;

		}
		.picname{
			margin-right: 28%;
			margin-top: 10%;
			float: right;
		}

	</style>
</head>
<body>
<?php $cd=2;?>
<div id="menu" class="menu">
    <div id="one" class="subMenu text-center " data-src="">
        <a href="/index.php/M/Index/index">
        <img src="/Public/index_files1/首页icon.png" class="menu_img" data-imgname="1">
        <div class="menu_name <?php if($cd==1) echo 'active'?>">首页</div>
        </a>
    </div>
    <div id="two" class="subMenu text-center">
        <a href="/index.php/M/Index/cates">
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
<!--<div>-->
	<!--<form action=""></form></div>-->
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
<div class="left">
	<div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>
		<div class="picdiv">
			<img src="/Public/Uploads/Goods/2018-09-28/5bae254ced5dc.jpg" class="imgpic" alt="pic">
			<p class="picname">fdfdsfdsfdsfsdf<br>$15</p>

		</div>

	</div>
</div>
</body>
</html>