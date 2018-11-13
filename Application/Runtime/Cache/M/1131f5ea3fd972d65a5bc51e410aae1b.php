<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0061)https://m.ddky.com/dingdanxiangqing.html?orderid=416424720267 -->
<html lang="zh-cn" style="font-size: 81.3333px;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=320,maximum-scale=1.3,user-scalable=no"><meta name="keywords" content="源多享"><meta name="description" content="源多享"><meta name="format-detection" content="telephone=no, email=no"><title>订单详情</title>

<link rel="stylesheet" href="/Public/odetail_files/base.css">
<link href="/Public/odetail_files/dingdanxiangqing.css" rel="stylesheet">

<style>
	.foot-bar .foot-bar-p .to_yszd {
		color: #cc3333;border:1px solid #cc3333;
	}
	.msg-box p span{
		float: right;
	}
</style>

</head>
<body style="">


<header id="header">
    <section class="header_logo"><a href="javascript:history.go(-1)">返回</a></section>
    <span class="header_t">
        <i class="c_inav_i">
            我的订单
        </i>
    </span>
    <section class="header_r"><a href="/index.php/M/Index/index"></a></section>
    <div class="header_ul_box">
    </div>
</header>
<style>
#header { min-width: 300px; height: 45px; padding: 0 10px; text-align: center;  background-color:#FFFFFF;}

.header_logo {
float: left;
height: 45px;
background: url(//res2.360kad.com/theme/mobile/img/backIcon.png) no-repeat left;
background-size: 11px 19px;
}
.header_logo a img {
    width: 94px;
}
.header_logo a { display: inline-block; width: 50px; line-height: 48px; color: #808080; text-align: left; text-indent: 15px; overflow: hidden; }

.header_t { line-height: 45px; font-size: 16px; color: #000000; }

.header_r { float: right; margin-top: 13px; }

.header_r a {
    display: inline-block;
    width: 18px;
    height: 19px;
    background: url(//res1.360kad.com/theme/mobile/img/shouye.png) no-repeat left;
    background-size: 18px 17px;
}
</style>


<div class="orders-box">


<div class="orders-msg">

<ul class="oreders-list">

<li class="first"><h1 style="font-size: 14px;">订单编号：<?php echo ($oder_list['sn']); ?></h1></li>


<?php if(is_array($oder_list['data'][0])): $i = 0; $__LIST__ = $oder_list['data'][0];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li onclick="window.location.href='/index.php/M/Index/detail/id/<?php echo ($vo->id); ?>'" id="Li" class="id=535851&amp;shopId=202132&amp;skuId=50047873" detailurl="null">
<div class="left fl"><img src="<?php echo ($vo->max_thumb); ?>"></div>
<dl class="right fr"><dt><strong><?php echo ($vo->goods_name); ?></strong></dt><dd><p class="type"></p><p class="cl"><span class="num">数量：<?php echo ($vo->count); ?></span><i class="price">¥<?php echo ($vo->shop_price); ?></i></p></dd>
</dl>
</li><?php endforeach; endif; else: echo "" ;endif; ?>

</ul>

<ul class="rate-list">
<li class="rate-msg">
<p>商品金额：<span>¥<?php echo ($oder_list['data'][1]); ?></span></p>
<p>优惠金额：<span>¥0.00</span></p>
<p>运费：<span>¥ 0.00</span></p>
</li>
<li class="rate-total">
<p>金额合计：<span>¥<?php echo ($oder_list['data'][1]); ?></span></p>
</li>
</ul>

<ul class="address-msg mt-10">
<li>支付方式：<span class="fr">货到付款</span></li>
<li>下单时间：<span class="fr"><?php echo (date('Y-m-d H:i:s',$oder_list["time"])); ?></span></li>
<li class="remark">备注:<?php echo ($oder_list["msg"]); ?></li>
<li class="msg-box"><p>收  货  人：<?php echo ($oder_list["truename"]); ?></p><p>联系电话：<?php echo ($oder_list["phone"]); ?></p><p>收货地址：<?php echo ($oder_list["address"]); ?></p></li>
</ul>

</div>
</div>

</body>
</html>