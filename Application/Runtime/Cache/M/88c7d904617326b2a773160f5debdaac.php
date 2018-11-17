<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>类别</title>
	<link href="/Public/index_files1/swiper.min.css" rel="stylesheet" type="text/css">
	<link href="/Public/index_files1/m_index2.css" rel="stylesheet" type="text/css">
	<script src="/Public/index_files1/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script>
	<script src="/Public/index_files1/swiper3.07.min.js" type="text/javascript"></script>
	<script src="/Public/index_files1/m_index2.js" type="text/javascript"></script>
	<style>

		#category2{
			width: 20%;
			position: fixed;
			height: 100%;
			top: 7%;
		}
		.cur{
			list-style: none;
			height:5%;
			margin: auto;
			padding-top: 21%;
			background-color: #f8f8f8;
			text-align: center;
			color: black;
			font-size: .24rem;
		}
		.cur1{
			 background-color: white;
		 }
		a{
			text-decoration:none;
			color: black;
		}
		.left{
			padding-top: 7%;
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
			font-size: 16px;
			width: 60%;
			margin-top: 10%;
			float: right;
		}

	</style>
	<link rel="stylesheet" href="../../../../../xb/public/static/css/web.css">
</head>
<body>
<?php $cd=2;?>
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
<!--<div>-->
	<!--<form action=""></form></div>-->
<ul  id="category2">
	<?php if(is_array($cate1)): $i = 0; $__LIST__ = $cate1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="cur <?php if($vo["id"] == $_GET['id']): ?>cur1<?php endif; ?>"  id="category6 " >
	<a class="J_ping" href="/index.php/M/Index/cates/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></a>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>



	</ul>
<div class="search" >
	<form action="" method="post">
		<input type="text" name="search" style="border: 1px solid rgb(132, 95, 63);display: block;width: 80%; float:left;margin-top: 5px;margin-bottom: 5px;height: 0.7rem; font-size: 20px;border-radius: 8px;">
		<!--<input type="submit" value="" style="width: 10%;border:none; background:url(/Public/search.png) no-repeat">--><img style="width: 10%;display: inline;margin-top: 9px;" src="/Public/search.png" alt="">

	</form>
</div>
<div class="left">
	<div>

		<?php if(is_array($g_res1)): $i = 0; $__LIST__ = $g_res1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vm): $mod = ($i % 2 );++$i;?><div class="picdiv">
			<a href="/index.php/M/Index/detail/id/<?php echo ($vm["id"]); ?>">
			<img src="/<?php echo ($vm["original"]); ?>" class="imgpic" alt="pic">
			<p class="picname"><?php echo (mb_substr($vm["goods_name"],0,20,'utf-8')); ?>...<br>￥<?php echo ($vm["shop_price"]); ?></p>
			</a>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>

		<div style="height:6em;"></div>

	</div>
</div>
</body>
</html>