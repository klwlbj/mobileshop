<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0033)http://www.baxsun.cn/product/1604 -->
<html lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>_百姓阳光大药房</title>

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
    <meta name="csrf-token" content="oVYlVIPJ6f5M1jxlYe0fjWXWSGnz8sBdh5-Oei9B1zGVZF0CsaGjmC-sSQsArHHqMbgqHYXF9hzXx89NYhiuWg==">
	<title>
		_百姓阳光大药房	</title>
	<link href="/x/Public/pc/index1_files/common.css" rel="stylesheet">
<link href="/x/Public/pc/index1_files/font-awesome.min.css" rel="stylesheet">
<link href="/x/Public/pc/index1_files/buttons.css" rel="stylesheet">
<script src="/x/Public/pc/index1_files/jquery-1.8.3.min.js"></script>
<script src="/x/Public/pc/index1_files/jquery.SuperSlide.2.1.1.js"></script></head>
<body class="body-bg">



 <header class="header">
	<div class="toper">
		<div class="toper-meun">

<div class="toper-left">
<span>欢迎光临驼铃商贸！</span>

<?php if($_SESSION['user']== ''): ?><span><a href="/x/index.php/Home/Index/login">登录</a></span>
<span class="color-red"><a href="/x/index.php/Home/Index/reg">注册</a></span>
<?php else: ?>
<span><?php echo ($_SESSION['user']['nick']); ?>&nbsp;&nbsp;您好!</span>
<span><a href="/x/index.php/Home/Index/logout">退出</a></span><?php endif; ?>

</div>

<div class="toper-right">
	<a href="/x/index.php/Home/Index/grzx">会员中心</a>|
	<a href="/x/index.php/Home/Index/olst">我的订单</a>			|
	<a href="">在线客服</a>
</div>

</div>
	</div>
	<div class="content-wrap">
	<div class="gonggao" style="margin-bottom:20px;">

	</div>
		<div class="logo">
			<a href=""><img src="/x/Public/pc/index_files/logo.png" alt=""></a>
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
			<div class="kefu-tel"><img src="/x/Public/pc/index_files/tel-iocn.png" alt="">客服热线：400-060-0002</div>
		</div>
	</div>
	<div class="clear"></div>
</header>









			<div style="clear: both;"></div>



 <script>
        $(function(){
            $(".banner-ny-2").slide({mainCell:".banner-pic-2 ul",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });
            $(".banner-ad").slide({mainCell:".banner-pic-ad ul",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });
            $("#focus-box").slide({ mainCell: ".bd ul", effect: "fold", autoPlay: true, easing: "easeOutCirc", interTime:7000 });
            function addClass() { $(this).addClass("hover"); } function removeClass() { $(this).removeClass("hover"); }
            $(".focus-box").hover(addClass,removeClass);
            $(window).resize(function(e) {
                var windowWidth = $(window).width();
                $(".banner-pic").find("li").width(windowWidth);
            }).resize();
            $(".news-tabs").slide({delayTime:0});
            $(".banner-ad-box").slide({mainCell:"ul",autoPage:true,effect:"topLoop",vis:1,interTime:5000,autoPlay:true});
        });
    </script>
<script>
    	var number=5; //定义条目数
		//www.divcss5.com
		function LMYC() {
		var lbmc;
		    for (i=1;i<=number;i++) {
		        lbmc = eval('LM' + i);
		        lbmc.style.display = 'none';
		    }
		}

		function ShowFLT(i) {
		    lbmc = eval('LM' + i);
		    if (lbmc.style.display == 'none') {
		        LMYC();
		        lbmc.style.display = '';
		    }
		    else {
		        lbmc.style.display = 'none';
		    }
		}
    </script>
<script>
        $(function(){
            $(".yaopin-box").slide({ trigger: "click", delayTime: 0 });
        });
    </script>
<script>
        $(function(){
            function addClass() { $(this).addClass("hover"); } function removeClass() { $(this).removeClass("hover"); }
			$(".tuijian-cp ul li").hover(addClass,removeClass);
        });
    </script>

<div class="content-neiye">
	<div class="content-neiye-box">
	<br>
		<div class="nav-break">
			您现在的位置： <a href="/x/index.php/Home/Index/index">首页</a>
			 &gt; <a href="/x/index.php/Home/Index/index1/aid/<?php echo ($cate0["id"]); ?>"><?php echo ($cate0["catename"]); ?></a>



					</div>
		<div class="case-1">
			<div class="leftsidebar">
<div class="leftsidebar-tit mt15"><?php echo ($cate0["catename"]); ?></div>
<div class="left-chanel">

<?php if(is_array($cate1)): $i = 0; $__LIST__ = $cate1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="no_bd_b "><a href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo["pid"]); ?>"><?php echo ($vo["catename"]); ?><span></span></a>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>

     <div class="liulan">
<div class="liulan-tit">猜你喜欢</div>
<ul>

</ul>
</div>


<?php if(is_array($cnxh)): $i = 0; $__LIST__ = $cnxh;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="list-ad">
<a href="/x/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>"><img style="width:200px;height:200px;" src="/<?php echo ($vo["max_thumb"]); ?>"></a>
</div><?php endforeach; endif; else: echo "" ;endif; ?>





			</div>



							<div class="tuijian-list">

					<div class="mt20">

				<div class="tuijian-list-tit">
					<div class="tuijian-tit-left"><?php echo ($cate0["catename"]); ?></div>
					<!-- <div class="tuijian-tit-right">
					共<b>803</b>个商品 <span>1/41</span>
								</div> -->
</div><div class="tuijian-cp"><ul>



<?php if(is_array($g_res)): $i = 0; $__LIST__ = $g_res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
	<div class="cp-pic">
			<a href="/x/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>"><img src="/<?php echo ($vo["max_thumb"]); ?>" width="230" height="230" alt=""></a>	</div>
	<div class="tuijian-cp-jiage">价格：<span>￥<?php echo ($vo["shop_price"]); ?></span></div>
	<div class="cp-infotext">
		<div class="cp-tit">
		<a href="/x/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>"><?php echo ($vo["goods_name"]); ?></a> 		</div>
		<div class="cp-miaoshu" style="display: none;">
			<a href="/x/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>"></a>
		</div>
		<div class="tuijian-cp-gongneng">
			<div class="tuijian-cp-info">
			<a href="/x/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>"><img src="/x/Public/pc/index1_files/chakan-icon.png" alt="">查看详情</a>
			</div>
			<div class="tuijian-cp-zixun">
			<a href="/x/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>"><img src="/x/Public/pc/index1_files/zixun-icon.png" alt="">立即咨询</a>
			</div>
		</div>
	</div>
</li><?php endforeach; endif; else: echo "" ;endif; ?>



</ul></div><div class="clear"></div>



<!-- <div class="page-box"><div class="page"><ul class=""><li class="first disabled"><span>第一页</span></li>
<li class="prev disabled"><span>上一页</span></li>
<li class="active"><a href="http://www.baxsun.cn/product/1604?page=1" data-page="0">1</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=2" data-page="1">2</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=3" data-page="2">3</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=4" data-page="3">4</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=5" data-page="4">5</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=6" data-page="5">6</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=7" data-page="6">7</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=8" data-page="7">8</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=9" data-page="8">9</a></li>
<li><a href="http://www.baxsun.cn/product/1604?page=10" data-page="9">10</a></li>
<li class="next"><a href="http://www.baxsun.cn/product/1604?page=2" data-page="1">下一页</a></li>
<li class="last"><a href="http://www.baxsun.cn/product/1604?page=41" data-page="40">尾页</a></li></ul></div>
</div> -->


			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$('.pinpai .p1').mouseover(function () {
				$('.pinpai .p1').addClass('buyi')
				$('.pinpai .p2').removeClass('buyi')
				$('.paidang .ul1').addClass('chu')
				$('.paidang .ul2').removeClass('chu')
			})
			$('.pinpai .p2').mouseover(function () {
				$('.pinpai .p2').addClass('buyi')
				$('.pinpai .p1').removeClass('buyi')
				$('.paidang .ul2').addClass('chu')
				$('.paidang .ul1').removeClass('chu')
			})

</script>
<script>
		 $('.more').css('background','#fea211');
		 $('.more').css('color','#fff');
		 var cur_status = "less";
			    $('.more').click(function(){
			    	if(cur_status == "less"){
			    	 $('.goods-top-h').css('height','auto');
				        $(this).html('收起');
				        cur_status = "more";
			    	}else{
			    		$('.goods-top-h').css('height','51');
				        $(this).html('展开');
				        cur_status = "less";
				    	}
				    })

		 </script>
		 <script>
		 $('.more2').css('background','#fea211');
		 $('.more2').css('color','#fff');
		 var cur_status = "less";
			    $('.more2').click(function(){
			    	if(cur_status == "less"){
			    	 $('.goods-top-z').css('height','auto');
				        $(this).html('收起');
				        cur_status = "more";
			    	}else{
			    		$('.goods-top-z').css('height','51');
				        $(this).html('展开');
				        cur_status = "less";
				    	}
				    })

		 </script>	 <div class="clear" style="width: 100%; height: 20px;"></div>





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
				<li><img src="/x/Public/pc/index_files/b1.png">
				</li>
				<li><img src="/x/Public/pc/index_files/b2.png">
				</li>
				<li><img src="/x/Public/pc/index_files/b3.png">
				</li>
				<li><img src="/x/Public/pc/index_files/b4.png">
				</li>
				<li><img src="/x/Public/pc/index_files/b5.png">
				</li>
				<li><img src="/x/Public/pc/index_files/b6.png">
				</li>
				<li><img src="/x/Public/pc/index_files/b.png">
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


</div></body></html>