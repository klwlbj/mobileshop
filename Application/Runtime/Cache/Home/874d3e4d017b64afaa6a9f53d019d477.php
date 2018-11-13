<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0044)http://www.baxsun.cn/product/detail?id=52317 -->
<html lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>百姓阳光大药房</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<!--[if lt IE 9]>
<link href="/css/ie6.css" rel="stylesheet">
<script src="/js/html5shiv.js"></script>

<script type="text/javascript" src="/js/cssQuery-p.js"></script>
<script type="text/javascript" src="/js/jcoglan.com/sylvester.js"></script>
<script type="text/javascript" src="/js/css3Helpers.js"></script>
 <![endif]-->
	<meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="2FyhFecyypHAImbT04Lh1wgtWEQFfTVOOSSM_ZsXD5nsbtlD1VqA96NYE72yw4-wXEM6MHNKAw9pfM3K1k528g==">
	<title>
		百姓阳光大药房	</title>
	<link href="/Public/pc/detail_files/common.css" rel="stylesheet">
<link href="/Public/pc/detail_files/font-awesome.min.css" rel="stylesheet">
<link href="/Public/pc/detail_files/buttons.css" rel="stylesheet">
<script src="/Public/pc/detail_files/jquery-1.8.3.min.js"></script>
<script src="/Public/pc/detail_files/jquery.SuperSlide.2.1.1.js"></script></head>
<body class="body-bg">


 <header class="header">
	<div class="toper">
		<div class="toper-meun">

<div class="toper-left">
<span>欢迎光临源多享！</span>

<?php if($_SESSION['user']== ''): ?><span><a href="/index.php/Home/Index/login">登录</a></span>
<span class="color-red"><a href="/index.php/Home/Index/reg">注册</a></span>
<?php else: ?>
<span><?php echo ($_SESSION['user']['nick']); ?>&nbsp;&nbsp;您好!</span>
<span><a href="/index.php/Home/Index/logout">退出</a></span><?php endif; ?>

</div>

<div class="toper-right">
	<a href="/index.php/Home/Index/grzx">会员中心</a>|
	<a href="/index.php/Home/Index/olst">我的订单</a>			|
	<a href="">在线客服</a>
</div>

</div>
	</div>
	<div class="content-wrap">
	<div class="gonggao" style="margin-bottom:20px;">

	</div>
		<div class="logo">
			<a href=""><img src="/Public/pc/index_files/logo.png" alt=""></a>
		</div>
		<div class="search">
		<form id="form" action="" method="get">
			<div class="search-s">
				<div>
                     <input name="key" type="text" class="search-s1">
				</div>
				<div class="search-s2">搜索</div>
			</div>
			</form>
			<script type="text/javascript">
						$('.search-s2').click(function () {
							$('#form').submit();
						})
					</script>
			<div class="search-text">
				热门搜索：
				<a href="">黄芪精</a> <a href="">感冒</a> <a href="">万艾可</a> <a href="">希罗达</a> <a href="">安宫牛黄丸</a>
			</div>
		</div>
		<div class="kefu">
			<div class="kefu-text">周一至周日（9:00 - 18:00）</div>
			<div class="kefu-tel"><img src="/Public/pc/index_files/tel-iocn.png" alt="">客服热线：400-060-0002</div>
		</div>
	</div>
	<div class="clear"></div>
</header>






			<div class="clear"></div>
		</div>
			<div style="clear: both;"></div>



 <div class="container mt15">
	<div class="nav-break">您现在的位置：
		<a href="/index.php/Home/Index/index">首页</a>
		 &gt;
		<a> <span class="color-red"><?php echo ($goods["goods_name"]); ?></span></a>

	</div>
</div>
<div class="content-neiye">
	<div class="content-neiye-box">



		<div class="cp-picbox">
			<div class="cp-picbox-left minPicScroll">
				<div class="w-dtl-mag-lar" id="product_bigimg">
				<img id="mainproductimg_lar" src="/<?php echo ($goods["original"]); ?>" alt="" jqimg="/<?php echo ($goods["original"]); ?>">
				</div>

				<div id="minPicScroll" class="minPicScroll">
					<a class="prev" style="display: none;"></a>
					<a class="prevNo"></a>
				<!-- 	<div class="minPicScrolldiv">

<ul class="clearfix">
<li class="w-dtl-smr-cur">
<img src="" alt="" data-url="/<?php echo ($goods["original"]); ?>" jqimg="/<?php echo ($goods["original"]); ?>">
</li>
</ul>

					</div> -->
					<a class="nextNo"></a>
					<a class="next" style="display: none;"></a>
				</div>


			</div>
			<div class="cp-picbox-right">
				<div class="cpbt-text">

					<h1><?php echo ($goods["goods_name"]); ?></h1>
					<!-- <span class="efficacy">用于外感风寒，内伤湿滞，头痛昏重，胸膈痞闷，脘腹胀痛，呕吐泄泻</span> -->

								<div class="cp-text-hr"></div>
								<div class="bt-jiage goods-info-cell">
									<div class="bt-1" style="margin-top: 10px;">价格：<span class="color-red">￥</span><span class="size-30"><?php echo ($goods["shop_price"]); ?></span></div>
									<div class="bt-1">市场价：<?php echo ($goods["market_price"]); ?></div>
                                    <div class="bt-1">优惠：<?php echo ($goods["yh"]); ?></div>
									<div class="bt-1">货号：<?php echo ($goods["goods_sn"]); ?></div>
									<div class="bt-1" style="display: inline-block;">

<div class="inf-r-num-box clearfix" style="margin-top: 5px;  display: inline-block;">
<div class="inf-r-numjs nohuo-hidden">
    <a class="numjs-com numjs-l" href = 'javascript:;' onclick ='fun1(1)' >-</a>
    <input type="text" class="numjs-m"  name = 'num' onkeyup="numModify();" onblur="buyQuantity(0);" value="1">
    <a class="numjs-com numjs-r" href = 'javascript:;' onclick = 'fun1(2)'>+</a>
</div>
<script type="text/javascript">function fun1(e) {
var num = $('input[name=num]').val();

if(e == 1) {
if(num > 1) {
num -= 1
}
} else if(e == 2) {
if(num < 1) {
num = 0
}
num = parseInt(num) + 1
}

$('input[name=num]').val(num);
}</script>
</div>
                                        <span  style="float:left">数量：</span>
									</div>

									<div class="clear"></div>

<div class="buy_or_joincart">
    <a href="/index.php/Home/Index/car/id/<?php echo ($goods["id"]); ?>" class="buy_now">立即购买</a>
    <a href="/index.php/Home/Index/car/id/<?php echo ($goods["id"]); ?>" class="join_mycart" data-id="">加入购物车</a>
</div>
<style>
.buy_or_joincart {
    width: 556px;
    height: 40px;
    overflow: hidden;
    margin-top: 20px;
}
.buy_now {
    float: left;
    _display: inline;
    width: 178px;
    height: 38px;
    line-height: 38px;
    text-align: center;
    border: 1px solid #d10303;
    display: inline-block;
    background: #ffeded;
    color: #d10303;
    font-size: 16px;
    font-family: "微软雅黑";
}
.join_mycart {
    width: 180px;
    height: 40px;
    line-height: 40px;
    background: url(/Public/pc/detail_files/join_car_btn.jpg) no-repeat left center;
    color: #fff;
    display: inline-block;
    margin-left: 10px;
    font-size: 16px;
    font-family: "微软雅黑";
    text-indent: 60px;
}
</style>

								</div>
									<div class="bo-hr"></div>
								<div class="bt-jiage">
									<div class="buy-box">
 										 																			</div>

								</div>

							</div>
						</div>



					</div>
					<div class="case-1">
			<div class="leftsidebar-detail">

<!-- <div class="leftsidebar-tit mt15">家庭常备</div> -->

<div class="left-chanel">

<?php if(is_array($cate2)): $i = 0; $__LIST__ = $cate2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="no_bd_b "><a href=""><?php echo ($vo["catename"]); ?><span></span></a>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
     <div class="clear"></div>
			</div>

		</div>
					<div class="cp-picbox-bt">
			  <div class="notice">
        	<label>温馨提示：</label>部分品种因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，故不能确保货物与网站图片、产地、附件、说明完全一致，请顾客以店内实物为准，若因此给您带来不便，敬请谅解。<strong>如发现商品信息不准确，请联系我们及时改正，谢谢合作！
</strong>
        </div>

	<div class="mt20">
             <div id="menu_2box">
                <!--切换菜单1begin-->
                <div class="sprg-menu" id="sprg_menu">
                    <ul class="clearfix">
                        <li class="sprg-mcur">商品详情</li>
                        <li class="">说明书</li>
                         <li class="">商品咨询</li>
                         <li class="">注意事项</li>
                        <li class="">相关文章</li>
                    </ul>
                </div>
                <!--切换菜单1end-->
                <!--切换菜单2固定定位begin-->

                <!--切换菜单2固定定位end-->
            </div>
        </div>

        <!--商品介绍begin-->
        <div class="tabrow">

            <div class="infor-list">
<?php echo (htmlspecialchars_decode($goods["goods_desc"])); ?>
            </div>
        </div>
            <!--说明书-->
           <div class="tabrow hidden">

             <div class="infor-list">
<img src="/<?php echo ($goods["s_pic"]); ?>" />
            </div>
        </div>
          <!--商品咨询-->
       <div class="tabrow hidden">

             <div class="infor-list">

                  <div class="goods-intro"></div>
            </div>
        </div>
               <!--注意事项-->
              <div class="tabrow hidden">

             <div class="infor-list">

                  <div class="goods-intro">        温馨提示：百姓阳光大药房药品网确保所有商品为正品真货，但因厂家会在没有任何提前通知的情况下更改产品包装、产地或者一些附件，故不能确保货物与网站图片、产地、附件、说明完全一致，请顾客以店内实物为准，若因此给您带来不便，敬请谅解。如发现商品信息不准确，请联系我们及时改正，谢谢合作！
                </div>
            </div>
        </div>
                <!--相关文章-->
     <div class="tabrow hidden">

             <div class="infor-list">

            </div>
        </div>

        <!--用户评价end-->
                <!--购药咨询begin-->

    </div>
    </div>
    <script>$(function() {
	$("#sprg_menu  ul li").click(function(){
		var obj = this;
		$("#sprg_menu li").removeClass("sprg-mcur");
		$(obj).addClass("sprg-mcur");
		$(".tabrow").addClass('hidden');
		$(".tabrow").eq($(obj).index()).removeClass("hidden");
	});


	$(".banner-ny-3").slide({
		mainCell: ".banner-pic-3 ul",
		effect: "fold",
		autoPlay: true,
		delayTime: 1000,
		interTime: 5000
	});
	$(".banner-ad").slide({
		mainCell: ".banner-pic-ad ul",
		effect: "fold",
		autoPlay: true,
		delayTime: 1000,
		interTime: 5000
	});
	$("#focus-box").slide({
		mainCell: ".bd ul",
		effect: "fold",
		autoPlay: true,
		easing: "easeOutCirc",
		interTime: 7000
	});

	function addClass() {
		$(this).addClass("hover");
	}

	function removeClass() {
		$(this).removeClass("hover");
	}
	$(".focus-box").hover(addClass, removeClass);
	$(window).resize(function(e) {
		var windowWidth = $(window).width();
		$(".banner-pic").find("li").width(windowWidth);
	}).resize();
	$(".news-tabs").slide({
		delayTime: 0
	});
	$(".banner-ad-box").slide({
		mainCell: "ul",
		autoPage: true,
		effect: "topLoop",
		vis: 1,
		interTime: 5000,
		autoPlay: true
	});

});



	</script>
    <script>var number = 5; //定义条目数
//www.divcss5.com
function LMYC() {
	var lbmc;
	for(i = 1; i <= number; i++) {
		lbmc = eval('LM' + i);
		lbmc.style.display = 'none';
	}
}

function ShowFLT(i) {
	lbmc = eval('LM' + i);
	if(lbmc.style.display == 'none') {
		LMYC();
		lbmc.style.display = '';
	} else {
		lbmc.style.display = 'none';
	}
}</script>
    <script>$(function() {
	$(".yaopin-box").slide({
		trigger: "click",
		delayTime: 0
	});
});</script>
      <script>$(function() {
	function addClass() {
		$(this).addClass("hover");
	}

	function removeClass() {
		$(this).removeClass("hover");
	}
	$(".tuijian-cp ul li").hover(addClass, removeClass);
});</script>

    <!-- 需求清单js开始 -->
     <script type="text/javascript">function createcar() {
	var state = $('input[name=car]').val();

	if(state == 0) {
		var goodnum = $('input[name=num]').val();
		var maxnum = $('input[name=maxnum]').val();

		if(parseInt(goodnum) > 　parseInt(maxnum)) {
			alert('数量超出库存');
			return false;
		}
		if(isNaN(parseInt(goodnum))) {
			alert('数量不合法');
			return false;
		}
		if(parseInt(goodnum) <= 0) {
			alert('数量不合法');
			return false;
		}
		$('input[name=car]').val(1)
		$.ajax({
					url: "/car/getgood",
type: 'get',
	data: {
		id:52317, num: parseInt(goodnum)
},
success: function(e) {
$('input[name=car]').val(0)
alert(e)
}

})
}
}</script>
	 <!-- 需求清单js结束 -->
     <script type="text/javascript">$('.pinpai .p1').mouseover(function() {
	$('.pinpai .p1').addClass('buyi')
	$('.pinpai .p2').removeClass('buyi')
	$('.paidang .ul1').addClass('chu')
	$('.paidang .ul2').removeClass('chu')
})
$('.pinpai .p2').mouseover(function() {
	$('.pinpai .p2').addClass('buyi')
	$('.pinpai .p1').removeClass('buyi')
	$('.paidang .ul2').addClass('chu')
	$('.paidang .ul1').removeClass('chu')
})</script>
	 <div class="clear" style="width: 100%; height: 20px;"></div>






<div class="bottom-ny">
	<div class="banner-ny-box">
		<div class="baozhang">
			<div class="bz">
				<div class="bz-left">
					<div class="bz-iocn bz-icon-1"></div>
				</div>
				<div class="bz-right">
					100%正品

				</div>
			</div>
			<div class="bz">
				<div class="bz-left">
					<div class="bz-iocn bz-icon-2"></div>
				</div>
				<div class="bz-right">
					药师服务
 				</div>
			</div>
			<div class="bz">
				<div class="bz-left">
					<div class="bz-iocn bz-icon-3"></div>
				</div>
				<div class="bz-right">
					准时送达

				</div>
			</div>
			<div class="bz">
				<div class="bz-left">
					<div class="bz-iocn bz-icon-4"></div>
				</div>
				<div class="bz-right">
					隐私包装

				</div>
			</div>
		</div>
		<div class="bz-line"></div>
		<div class="bottom-nav">
			<a href="">关于我们</a>			|
			<a href="">服务指南</a>			|
			<a href="">售后服务</a>			|
			<a href="">联系我们</a>
			<span>
								<a href=""> 互联网药品信息服务资格证书</a> | <a href="">药品经营许可证 </a>| <a href="">医疗器械经营许可证 </a>| <a href="">食品卫生许可证 </a>| <a href="">企业营业执照</a> | <a href="">GSP认证证书</a> <br>
	驼铃商贸网上药店
							</span>
		</div>
		<div class="b-icon">
			<ul>
				<li><img src="/Public/pc/index_files/b1.png">
				</li>
				<li><img src="/Public/pc/index_files/b2.png">
				</li>
				<li><img src="/Public/pc/index_files/b3.png">
				</li>
				<li><img src="/Public/pc/index_files/b4.png">
				</li>
				<li><img src="/Public/pc/index_files/b5.png">
				</li>
				<li><img src="/Public/pc/index_files/b6.png">
				</li>
				<li><img src="/Public/pc/index_files/b.png">
				</li>
			</ul>
		</div>
	</div>
</div>
<!--<SCRIPT type="text/javascript" src="http://chat.53kf.com/kf.php?arg=baxsun&amp;style=1"></SCRIPT>-->
<!--{#modAdvsPop#}{#modAdvsFloat#}{#modAdvsLeftConer#}{#modAdvsRightConer#}{#modAdvsDuilian#}-->
<script>
$(function(){
	if(self.frameElement && self.frameElement.tagName=="IFRAME"){
		$("#wb_con").html("");
	}else{
		$("#wb_con").html("<iframe width='100%' height='270' class='share_self'  frameborder='0' scrolling='yes' src='http://widget.weibo.com/weiboshow/index.php?language=&width=0&height=800&fansRow=1&ptype=1&speed=0&skin=4&isTitle=0&noborder=0&isWeibo=1&isFans=1&uid=2037564187&verifier=7101054f&dpc=1'></iframe>");
	}
});
</script>
	<script src="/Public/pc/detail_files/jquery.jqzoom.v2.js"></script>
<script src="/Public/pc/detail_files/detail.js"></script>

</div><div style="display:none;" class="jqPreload0">PowerEasy<img src="/Public/pc/detail_files/1497098289_63615(2).jpg"></div></body></html>