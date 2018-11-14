<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0021)http://www.baxsun.cn/ -->
<html lang="zh"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>驼铃商贸</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
	<meta name="csrf-param" content="_csrf">
	<title>
		驼铃商贸
	</title>
<link href="/x/Public/pc/index_files/common.css" rel="stylesheet">
<link href="/x/Public/pc/index_files/reset.css" rel="stylesheet">
<link href="/x/Public/pc/index_files/first.css" rel="stylesheet">
<script src="/x/Public/pc/index_files/jquery-1.8.3.min.js"></script>
<script src="/x/Public/pc/index_files/jquery.lazyload.min.js"></script></head>
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



<div class="nav-box main-nav">
<div class="nav">
<div class="nav-left">
<div class="nav-left-text" style="text-align: center; padding-left: 50px;">全部商品分类</div>
<div class="index-menu">





<div class="cate-menu">
<div class="index-menu-content">

<?php if(is_array($lm)): $i = 0; $__LIST__ = $lm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="pro-cate ">
<a class="main-cate " href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo["cid"]); ?>"><?php echo ($vo["name"]); ?></a>
<div class="index-menu-detail">

<?php if(is_array($vo["cate"])): $i = 0; $__LIST__ = $vo["cate"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><dl>
<dt class="second"><a class="" href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo["cid"]); ?>"><?php echo ($vv["catename"]); ?></a></dt>
<dd class="third">

<?php if(is_array($vv["cate"])): $i = 0; $__LIST__ = $vv["cate"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?><a class="a" href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo["cid"]); ?>"><span><?php echo ($vvv["catename"]); ?></span></a><?php endforeach; endif; else: echo "" ;endif; ?>

</dd>
</dl><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>

</div>
</div>






	<script type="text/javascript">
		/*
		$('.third a').mousemove(function () {
			$(this).css('color','red');
		})
		$('.third a').mouseout(function () {
			$(this).css('color','#000');
		})
		$(function(){
			$('.second a').css('color','#666');
			$('.second a').mousemove(function () {
				$(this).css('color','red');
			})
			$('.second a').mouseout(function () {
				$(this).css('color','#666');
			})
		})*/
	</script>
	<!--全部商品的右边的二级菜单-->

</div>				</div>
<div class="nav-right a333">

<ul>
<li><a href="/x">首页</a></li>


<?php if(is_array($lm)): $k = 0; $__LIST__ = $lm;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k < 6): ?><li><a href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo["cid"]); ?>"><?php echo ($vo["name"]); ?></a>
<ul>
<?php if(is_array($vo["cate"])): $i = 0; $__LIST__ = $vo["cate"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?><li><a href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo["cid"]); ?>"><?php echo ($vv["catename"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

</ul>

</div>
			</div>
			<div class="clear"></div>
		</div>
			<div style="clear: both;"></div>

<div class="banner-wrap">

 <div class="banner-pic">
	<ul style="position: relative; width: 1582px; height: 398px;">

	     			<li style="background-color: rgb(6, 148, 220); position: absolute; width: 1582px; left: 0px; top: 0px; display: list-item;">

	     			<a href="http://bxyg.com/huodong/20180611yptg.html" target="_blank"><img src="/x/Public/pc/index_files/1527763326_4537.jpg" alt=""></a>
	     			</li>

	     			<li style="background-color: rgb(242, 204, 142); position: absolute; width: 1582px; left: 0px; top: 0px; display: none;">

	     			<a href="http://bxyg.com/huodong/20180501znq.html" target="_blank"><img src="/x/Public/pc/index_files/1525330544_9309.jpg" alt=""></a>
	     			</li>

	     			<li style="background-color: rgb(255, 1, 1); position: absolute; width: 1582px; left: 0px; top: 0px; display: none;">

	     			<a href="http://www.baxsun.cn/" target="_blank"><img src="/x/Public/pc/index_files/1518501916_2689.jpg" alt=""></a>
	     			</li>
	     										        </ul>
</div>
  <div class="hd">
		        <ul><li class="on"></li><li class=""></li><li class=""></li></ul>
		    </div>

	<div class="a-shutiao2">
		<div class="b-shutiao2">
			<div class="shutiao2">
				<ol>
		<img src="/x/Public/pc/index_files/yao1.png" alt="">		<p>药店动态</p>
				</ol>
				<ol>
		<img src="/x/Public/pc/index_files/yao2.png" alt="">		<p>用药指导</p>
				</ol>
				<ol>
		<img src="/x/Public/pc/index_files/yao3.png" alt="">		<p>健康咨询</p>
				</ol>


	<!--     <div class="weChat-focus">
    <img src="/x/Public/pc/index_files/yao4.png" alt="">
    <span>微信关注</span>
                </div> -->

			</div>
		</div>
	</div>

</div>





<?php if(is_array($g_res)): $k1 = 0; $__LIST__ = $g_res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k1 % 2 );++$k1;?><div class="container">
<div style="margin-top:15px;margin-bottom:0px;"><a href="" target="_blank"><img src="/x/Public/pc/index_files/<?php echo ($vo["sjs"]); ?>.jpg" alt=""></a>
</div>
</div>
<div class="container mt25">
<div class="i-section">
<div class="F7">
<div class="div">F<?php echo ($k1); ?>&nbsp;&nbsp;<a href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["catename"]); ?></a></div>

	<ul>
	</ul>
	<div class="more"><a href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo["id"]); ?>">查看更多</a></div>
	<div class="clear"></div>
</div>
</div>
</div>



<div class="yang yang7 ">
<div class="yang-top">
<ul class="ul">


<li class="border-btm ">
    <dl class="product-blanking"></dl>
    <div align="center">
        <a href="/x/index.php/Home/Index/detail/id/<?php echo ($vo['goods'][0]['id']); ?>"><img src="/x<?php echo ($vo['goods'][0]['max_thumb']); ?>" width="165" height="165" alt="<?php echo ($vo['goods'][0]['goods_name']); ?>"></a></div>
    <dt><a href="/x/index.php/Home/Index/detail/id/<?php echo ($vo['goods'][0]['id']); ?>"><?php echo ($vo['goods'][0]['goods_name']); ?></a></dt>
    <dd>￥<?php echo ($vo['goods'][0]['shop_price']); ?></dd>
</li>

<li>
<div class="dbox">
<div id="w7">
<div class="banner-pic">
<ul class="bd" style="position: relative; width: 1582px; height: 242px;">
<li style="width: 1582px; position: absolute; left: 0px; top: 0px;"><a href="/x/index.php/Home/Index/index1/aid/<?php echo ($vo['id']); ?>" target="_blank"><img src="/x/Public/pc/f8/f<?php echo ($k1); ?>.jpg" alt=""></a></li>
</ul>
<div class="hd">
<ul><li class="on" style="width: 1582px;"></li></ul>
</div>
</div>
</div>
</div>
</li>

<?php if(is_array($vo["goods"])): $k = 0; $__LIST__ = $vo["goods"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($k % 2 );++$k; if(($k > '1') AND ($k < '9')): ?><li class="border-btm ">
    <dl class="product-blanking"></dl>
    <div align="center">
        <a href="/x/index.php/Home/Index/detail/id/<?php echo ($vv['id']); ?>"><img src="/x<?php echo ($vv["max_thumb"]); ?>" width="165" height="165" alt="<?php echo ($vv["goods_name"]); ?>"></a></div>
    <dt><a href="/x/index.php/Home/Index/detail/id/<?php echo ($vv['id']); ?>"><?php echo ($vv["goods_name"]); ?></a></dt>
    <dd>￥<?php echo ($vv["shop_price"]); ?></dd>
</li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

</ul>
</div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>














<div class="eee">
	<div class="feimao">




</div>
</div>
<div class="container mt25">

 <div class="tab-second">
            <div class="youpin">
                <div class="pinpai">
                    <p class="p1 buyi">品牌专区</p>
                    <p class="p2">友情链接</p>
 				<div class="clear"></div>
                </div>

                <div class="paidang">
                    <ul class="chu ul1">

                        <li>
							<a href="http://www.baxsun.cn/baidu" target="_blank"><img src="/x/Public/pc/index_files/1494752162_2356.jpg" width="120" height="71" alt="百多邦"></a>
                        </li>

                        <li>
							<a target="_blank"><img src="/x/Public/pc/index_files/1494752176_2858.jpg" width="120" height="71" alt=""></a>
                        </li>

                        <li>
							<a target="_blank"><img src="/x/Public/pc/index_files/1494752183_2607.jpg" width="120" height="71" alt=""></a>
                        </li>

                        <li>
							<a target="_blank"><img src="/x/Public/pc/index_files/1494752189_1020.jpg" width="120" height="71" alt=""></a>
                        </li>

                        <li>
							<a target="_blank"><img src="/x/Public/pc/index_files/1494752196_9364.jpg" width="120" height="71" alt=""></a>
                        </li>

                        <li>
							<a target="_blank"><img src="/x/Public/pc/index_files/1494752202_1151.jpg" width="120" height="71" alt=""></a>
                        </li>

                        <li>
							<a target="_blank"><img src="/x/Public/pc/index_files/1494752209_8097.jpg" width="120" height="71" alt=""></a>
                        </li>

                        <li>
							<a target="_blank"><img src="/x/Public/pc/index_files/1494752224_2003.jpg" width="120" height="71" alt=""></a>
                        </li>

                    </ul>
                    <ul class="ul2">
                        <li>

                            <a href="http://sports.39.net/" target="">39健身</a> |

                            <a href="http://www.51daifu.com/" target="">医生在线网</a> |

                            <a href="http://www.tangfc.com/" target="">织发</a> |

                            <a href="http://cm.39.net/" target="">中医养生</a> |

                            <a href="http://www.yaozh.com/" target="">药智网</a> |

                            <a href="http://www.baicaolu.com/" target="">药品大全</a> |

                            <a href="http://www.zyccst.com/" target="">中药材市场</a> |

                            <a href="http://www.999ask.com/" target="">快速问答网</a> |

                            <a href="http://www.xizangshop.com/" target="">冬虫夏草</a> |

                            <a href="http://www.baiyangwang.com/" target="">百洋商城</a> |

                            <a href="http://www.fitnes.cn/" target="">健身</a> |

                            <a href="http://www.bjp321.com/" target="">保健品招商</a> |

                            <a href="http://www.7lk.com/" target="">网上大药房</a> |

                            <a href="http://www.yaozui.com/" target="">国药准字查询</a> |

                            <a href="http://www.360bzl.com/" target="">药房网</a> |

                            <a href="http://www.yaofangwang.com/" target="">药房网商城</a> |

                        </li>

                    </ul>
                </div>

            </div>
        </div>
<script>
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
</script></div>	 <div class="clear" style="width: 100%; height: 20px;"></div>



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
	<script src="/x/Public/pc/index_files/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript">jQuery(function ($) {

         $(".banner-wrap").slide({mainCell:".banner-pic ul",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });
         $(window).resize(function(e) {
            var windowWidth = $(window).width();
            $(".banner-pic").find("li").width(windowWidth);
         }).resize();


         $("#w1").slide({mainCell:".banner-pic ul.bd",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });


         $("#w2").slide({mainCell:".banner-pic ul.bd",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });


         $("#w3").slide({mainCell:".banner-pic ul.bd",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });


         $("#w4").slide({mainCell:".banner-pic ul.bd",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });


         $("#w5").slide({mainCell:".banner-pic ul.bd",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });


         $("#w6").slide({mainCell:".banner-pic ul.bd",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });


         $("#w7").slide({mainCell:".banner-pic ul.bd",effect:"fold", autoPlay: true, delayTime: 1000, interTime: 5000 });

$("img").lazyload({  effect : "fadeIn"});
});</script>
</body></html>