<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0031)http://www.baxsun.cn/uc/default -->
<html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
 <meta name="renderer" content="webkit|ie-comp|ie-stand">
 <!--[if lt IE 9]>
<script src="/static/js/html5.js"></script>
<script src="/static/js/css3-mediaqueries.js"></script>
<![endif]-->
     <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="kOYgz79h_vXODMdQSQDINvWsKpi4-dbMueTjtaL5OAuk1FiZjQm0k612sj4oQaZRocJI7M7O4I3pvKKC76BBYA==">
    <title>会员中心_百姓阳光大药房</title>
    <link href="/Public/pc/grzx_files/common.css" rel="stylesheet">
<link href="/Public/pc/grzx_files/UC.css" rel="stylesheet">
<link href="/Public/pc/grzx_files/font-awesome.min.css" rel="stylesheet">
<link href="/Public/pc/grzx_files/buttons.css" rel="stylesheet">
<link href="/Public/pc/grzx_files/UC_index.css" rel="stylesheet" 0="app\assets\MemberAsset">
<script src="/Public/pc/grzx_files/jquery-1.8.3.min.js"></script>
<script src="/Public/pc/grzx_files/layer.js"></script><link rel="stylesheet" href="/Public/pc/grzx_files/layer.css" id="layui_layer_skinlayercss">
<script src="/Public/pc/grzx_files/UC.js"></script></head>

<body>


<header class="header">
	<div class="toper">
		<div class="toper-meun">
			<div class="toper-left">
<?php echo ($_SESSION['user']['phone']); ?>&nbsp;&nbsp;您好!    <span>欢迎光临百姓阳光大药房</span>
			</div>
			<div class="toper-right">
                <a href="http://sun.bxyg.com/">客户服务</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://www.chinabizpay.com/CKR/Account_Login.aspx">储值卡余额查询</a>&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="http://www.baxsun.cn/uc">会员中心</a>|<a href="http://www.baxsun.cn/uc/login/logout">退出登录</a> | <a href="http://www.baxsun.cn/uc/favorite">我的收藏</a> | <a href="http://www.baxsun.cn/uc/booking">我的订单</a>				 <!-- <span><a href="#">需求清单 0 </a> -->
				<a href="http://www.baxsun.cn/cart">需求清单</a>			| <a href="http://chat.53kf.com/webCompany.php?arg=baxsun&amp;style=1&amp;keyword=http%3A//www.baxsun.cn/index.php&amp;kf=">在线客服</a>
			</div>
		</div>
	</div>
	<div class="content-wrap">
	<div class="gonggao" style="margin-bottom:20px;">

	</div>
		<div class="logo">
			<a href="http://www.baxsun.cn/"><img src="/Public/pc/grzx_files/logo.png" alt=""></a>
		</div>
		<div class="search">
		<form id="form" action="http://www.baxsun.cn/search" method="get">
			<div class="search-s">
				<div>


						<input name="_csrf" type="hidden" id="_csrf" value="kOYgz79h_vXODMdQSQDINvWsKpi4-dbMueTjtaL5OAuk1FiZjQm0k612sj4oQaZRocJI7M7O4I3pvKKC76BBYA=="> <input name="key" type="text" class="search-s1">

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
				<a href="http://www.baxsun.cn/search?key=%E9%BB%84%E8%8A%AA%E7%B2%BE">黄芪精</a> <a href="http://www.baxsun.cn/search?key=%E6%84%9F%E5%86%92">感冒</a> <a href="http://www.baxsun.cn/search?key=%E4%B8%87%E8%89%BE%E5%8F%AF">万艾可</a> <a href="http://www.baxsun.cn/search?key=%E5%B8%8C%E7%BD%97%E8%BE%BE">希罗达</a> <a href="http://www.baxsun.cn/search?key=%E5%AE%89%E5%AE%AB%E7%89%9B%E9%BB%84%E4%B8%B8">安宫牛黄丸</a>
			</div>
		</div>
		<div class="kefu">
			<div class="kefu-text">周一至周日（9:00 - 18:00）</div>
			<div class="kefu-tel"><img src="/Public/pc/grzx_files/tel-iocn.png" alt="">客服热线：400-060-0002</div>
		</div>
	</div>
	<div class="clear"></div>
</header>


	<div class="content">
			<div id="site">
				您现在的位置：首页&gt;
				<a href="http://www.baxsun.cn/uc" style="color: #bd0202;">&nbsp;会员中心</a>			</div>
			<div class="row">
					<div class="row-left" id="vipContent">
	<p class="totalKind">交易管理</p>
	<p class="kindContent ">
		<a href="http://www.baxsun.cn/uc/booking">我的订单</a>	</p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/points">我的积分</a></p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/coupon">我的优惠券</a></p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/favorite">我的收藏</a></p>
	<p class="totalKind">账户资料</p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/security">安全中心</a></p><p></p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/info">个人资料</a></p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/account">账户资产</a></p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/address">收货地址</a></p>
	<p class="totalKind">售后服务</p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/refund">退款记录</a></p>
	<p class="kindContent"><a href="http://www.baxsun.cn/uc/service">售后服务</a></p>
	<p class="totalKind"><a href="http://www.baxsun.cn/uc/myshow">我的晒单</a></p>
	<p class="totalKind" style="border-bottom: none; margin-bottom: 0; padding-bottom: 0px;">我参与的活动</p>
</div>				<div class="row-right" id="remind">
					<div class="tab" style="display: block;">
						<div class="index">
							<div class="picture">
							<img src="/Public/pc/grzx_files/putong.jpg" alt="">
							</div>
							<div class="welcome">
								<p class="welcome_top"><b><?php echo ($_SESSION['user']['phone']); ?>，欢迎您！</b></p>
								<div class="line">
									<div class="data">
										<div class="data_1">资料完整度&nbsp;:</div>
										<div class="progress">
											<div id="bar" style="width:0%;"></div>
										</div>
										<span id="total"></span>
										<span><a href="http://www.baxsun.cn/uc/info">&nbsp;立即完善</a></span>

									</div>
									<div class="data">
										<div class="data_2">账户安全级别&nbsp;:</div>
										<div class="progress_1">
											<div id="bar1" style="width:30%;"></div>
										</div>
										<span style="color: #f40;">&nbsp;中&nbsp;<a href="http://www.baxsun.cn/uc/security">&nbsp;立即提升</a></span>
									</div>
								</div>
								<div class="data">
								<img src="/Public/pc/grzx_files/phone.jpg" alt="">								 手机：
										<img src="/Public/pc/grzx_files/yes.jpg" alt="" style="color: #f40;">已验证
									<img src="/Public/pc/grzx_files/mail.jpg" alt="" style="margin-left:20px;">邮箱：
									<a class="td2 address-btn" href="http://www.baxsun.cn/uc/uc/info">您还没有验证邮箱</a>								</div>
							</div>
							<div class="points">
								<p class="head">
								<img src="/Public/pc/grzx_files/jifen.jpg" alt="">									 <b>可用积分</b>
								</p>
								<p class="count">
									<b>500</b>
								</p>
								<a class="detail" href="http://www.baxsun.cn/uc/points">查看积分</a>							</div>
							<div class="points">
								<p class="head"><img src="/Public/pc/grzx_files/youhui.jpg" alt="">								 <b>可用优惠券</b>
								</p>
								<p class="count">
									<b>0</b><span>张</span>
								</p>
								<a class="detail" href="http://www.baxsun.cn/uc/coupon">查看优惠券</a>
							</div>
							<div class="points">
								<p class="head"><img src="/Public/pc/grzx_files/shoucang.jpg" alt="">									<b>我已收藏</b>
								</p>
								<p class="count" style="border-right: none;">
									<b>0</b><span>件</span>
								</p>
								<a class="detail" href="http://www.baxsun.cn/uc/favorite">查看收藏</a>
							</div>
						</div>
						<div class="member">[普通会员]</div>
						<div class="remind">

							<div>
								<div class="warm_1">
									待付款<span><b>2</b></span>
								</div>
								<div class="warm_1">
									待确认收货<span><b>2</b></span>
								</div>
								<div class="warm_1">
									交易完成<span><b>0</b></span>
								</div>
								<div class="warm_2"><a href="http://www.baxsun.cn/uc/booking">查看所有订单&gt;</a></div>


							</div>
						</div>
						<div class="table">
 								<table width="100%" border="0" cellspacing="1" bgcolor="#ccc">
								  <tbody>
								  	<tr>
									  <th width="300">订单商品</th>
									  <th width="60">收货人</th>
									  <th width="60">金额</th>
									  <th width="60">订单状态</th>
									  <th width="60">操作</th>
									</tr>

								  									  </tbody>
								</table>


							  </div>
						<div id="totalCount">
							数量：<span>2</span>共<span>1</span>页

						</div>
					</div>
				</div>
			</div>
		</div> <div class="clear" style="width: 100%; height: 20px;"></div>
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
			<a href="http://www.baxsun.cn/about">关于我们</a>			|
			<a href="http://www.baxsun.cn/about/service">服务指南</a>			|
			<a href="http://www.baxsun.cn/about/after-sales">售后服务</a>			|
			<a href="http://www.baxsun.cn/about/contact-us">联系我们</a>
			<span>
								<a href="http://www.baxsun.cn/about/index?id=105"> 互联网药品信息服务资格证书：（京）-非经营性-2010-0030</a> | <a href="http://www.baxsun.cn/about/index?id=105">药品经营许可证 </a>| <a href="http://www.baxsun.cn/about/index?id=105">医疗器械经营许可证 </a>| <a href="http://www.baxsun.cn/about/index?id=105">食品卫生许可证 </a>| <a href="http://www.baxsun.cn/about/index?id=105">企业营业执照</a> | <a href="http://www.baxsun.cn/about/index?id=105">GSP认证证书</a> <br>
	京公网安备110102002709-1号 | 京ICP备10029123号-1 | Copyright © 2007-2012 www.Baxsun.cn  北京百姓阳光大药房网上药店
							</span>
		</div>
		<div class="b-icon">
			<ul>
				<li><img src="/Public/pc/grzx_files/b1.png">
				</li>
				<li><img src="/Public/pc/grzx_files/b2.png">
				</li>
				<li><img src="/Public/pc/grzx_files/b3.png">
				</li>
				<li><img src="/Public/pc/grzx_files/b4.png">
				</li>
				<li><img src="/Public/pc/grzx_files/b5.png">
				</li>
				<li><img src="/Public/pc/grzx_files/b6.png">
				</li>
				<li><img src="/Public/pc/grzx_files/b.png">
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





</body></html>