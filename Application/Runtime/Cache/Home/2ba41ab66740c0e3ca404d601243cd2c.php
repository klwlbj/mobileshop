<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0056)https://www.jianke.com/shoppingcart/index.html?isRx=true -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>健客-中国最大网上药店,做最优质,最低价,最便捷的网上药店,网上买药首选</title>
<meta name="author" content="JianKe Pharmacies">
<meta name="Copyright" content="jianke.com">
<link rel="stylesheet" href="/Public/pc/car_files/index-7638f9d721.css">
<link rel="stylesheet" href="/Public/pc/car_files/base-d53c4711ce.css">
<link rel="shoutcut icon" href="https://www.jianke.com/favicon.ico">
<link rel="stylesheet" href="/Public/pc/car_files/header-b3a45a43aa.css">
<link rel="stylesheet" href="/Public/pc/car_files/footer-41df6fe17e.css">

<link rel="stylesheet" type="text/css" href="/Public/pc/car_files/wccotact.css">
</head>
<body>

<div class="shortcut">
<div class="w clearfix">
<div class="fl top_nav_off"><a class="fav" href="javascript:;" target="_blank" title="收藏网站">收藏网站</a> <span>欢迎来到健客网上药店！</span><a href="https://www.jianke.com/user/login" class="log_in" target="_blank" title="登录">登录</a> <a href="https://www.jianke.com/user/register" target="_blank" title="免费注册">免费注册</a></div>
<div class="fl top_nav_on hide"><a class="fav" href="javascript:;" target="_blank" title="收藏网站">收藏网站</a> <span>你好,欢迎来到健客网上药店！</span> <a class="logout" href="javascript:;" title="安全退出">【安全退出】</a>
</div>
<ul class="fr shortcut-right">
<li class="my-jianke"><p class="shortcut-title"><a href="https://www.jianke.com/user" target="_blank" title="我的健客">我的健客</a><span class="triicon"></span></p><ul class="dropdown-layer"><li><a href="https://www.jianke.com/user/order/mine/all" id="myorder" target="_blank" title="我的订单">我的订单</a></li><li><a href="https://www.jianke.com/user/account/integral" id="myintegral" target="_blank" title="我的积分">我的积分</a></li><li><a href="https://www.jianke.com/user/account/coupon" id="mycoupon" target="_blank" title="我的优惠券">我的优惠券</a></li></ul></li>
<li class="customer-service"><p class="shortcut-title">客户服务<span class="triicon"></span></p><ul class="dropdown-layer"><li><a href="https://www.jianke.com/help/ordermethods.html" target="_blank" title="购物指南">购物指南</a></li><li><a href="https://www.jianke.com/help/express.html" target="_blank" title="配送方式">配送方式</a></li><li><a href="https://www.jianke.com/help/paymethods.html" target="_blank" title="支付方式">支付方式</a></li><li><a href="https://www.jianke.com/help/orderreturn.html" target="_blank" title="售后服务">售后服务</a></li></ul></li>
<li class="mobile-version"><p class="shortcut-title"><em class="phoneicon"></em><a href="https://www.jianke.com/app/" title="手机版" target="_blank">手机版</a> <span class="triicon"></span></p><div class="dropdown-layer"><div class="clearfix"><em class="qrcode-pic"></em><div class="qrcode-detail"><p><a href="https://www.jianke.com/app/" title="健客网上药店" target="_blank">健客网上药店</a></p><p class="jk-red">首次下单立减10元</p><a class="iphone-sys" title="下载iphone版" target="_blank" href="https://itunes.apple.com/cn/app/jian-ke-shang-cheng/id984804729?mt=8"><b></b><span>iphone</span></a> <a class="android-sys" title="下载android版" href="https://www.jianke.com/DownLoad/app?appName=JianKeMall.apk"><b></b><span>Android</span></a></div></div><div class="clearfix code"><p class="qr_code icon_ew"></p><div class="qr_other"><p>微信购药更方便</p><p class="down_tips">扫码关注，专业药师免费咨询</p></div></div></div></li>
<li class="shopping_cart"><p class="shortcut-title"><em class="carticon"></em> <a href="https://www.jianke.com/shoppingcart/index.html" title="购物车" target="_blank">购物车<span class="jk-red goods_all_num"><?php echo (count($cars)); ?></span><span class="jk-red">件</span></a></p>

<div class="shopping_xx dropdown-layer" id="shopping_xx">

  <ul id="top_shopcart">

<?php if(is_array($cars)): $i = 0; $__LIST__ = $cars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="mtr_1539582227777">
          <a title="拉莫三嗪片(利必通)" target="_blank" href="/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>">
            <img src="<?php echo ($vo["original"]); ?>">
            <span class="sh_xx_1"><?php echo ($vo["goods_name"]); ?></span>
            <span class="sh_xx_2">
              <span class="jkn_blue">
                <b>￥</b>
                <b><?php echo ($vo["shop_price"]); ?></b>
              </span>
              <b>×<?php echo ($vo["num"]); ?></b>
            </span>
          </a>

        </li><?php endforeach; endif; else: echo "" ;endif; ?>




  </ul>


</div>
</li>

<li class="site-nav"><p class="shortcut-title"><em class="navicon"></em>网站导航</p>

</li></ul>


</div></div>

<div class="w"><div class="header clearfix" id="header"><a class="header_l fl" href="https://www.jianke.com/" title="健客" target="_blank"><img src="/Public/pc/car_files/logo.png" alt="健客LOGO" width="221" height="36"></a><h2 class="cart_name fl">需求清单</h2><div class="flow-wrapper fr clearfix">
<div class="flow-wrapper fr clearfix">
<ul class="header_r fr order-flow fourth clearfix">

    <li class="action" style="width: 33.333333333333336%">
        <span>1</span>
        <p>选择产品</p>
    </li>

    <li class="" style="width: 33.333333333333336%">
        <span>2</span>
        <p>填写核对订单信息</p>
    </li>

    <li class="" style="width: 33.333333333333336%">
        <span>3</span>
        <p>成功提交订单</p>
    </li>

</ul>
</div>
</div></div></div>




<div class="my_cart song w">
<div class="tabs"><div data-type="false" class="tab-item  active">购物车</div><div data-type="true" class="tab-item">需求清单</div></div><div class="my_cart_goods"><div class="goods_info clearfix deep_grey"><label class="labelly fl" for="checkall"><span class="label_check fl label_on"><input type="checkbox" value="全选" name="toggle_checkboxes" id="checkall"></span></label><span class="labelspan fl pad_top">全选</span><p class="goods_msg">商品信息</p><p class="goods_price">单价（元）</p><p class="goods_num">数量</p><p class="goods_count">小计（元）</p><p class="goods_ctrl">操作</p></div><div id="product_container">



  <div class="product_contain">

    <ul class="orderbox clearfix">





<form style="margin-top: .3rem;" action="/index.php/Home/Index/order" method="post">

<?php if(is_array($cars)): $k = 0; $__LIST__ = $cars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li class="clearfix" id="item_1539582123486">
            <dl class="clearfix">
              <dd class="product_class clearfix choose">
                <label class="labelly label_on " for="checkbox_1539582123486_">
                  <input type="checkbox" name="order_box" class="order_shop" id="checkbox_1539582123486_" checked="">
                  <input type="hidden" class="goodsId" value="1539582123486">
                  <input type="hidden" class="goodsProductCode" data-productcode="12428">
                  <input type="hidden" class="ourPrice" value="53000">
                  <input type="hidden" class="price_dif" value="0">
                  <input type="hidden" class="price_dif_sum" value="0">
                </label>
                <a href="/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>" title="片仔癀(片仔癀)" target="_blank" class="imgbox">
                  <img src="<?php echo ($vo["original"]); ?>" onerror="src=&#39;https://image.jianke.com/jk2/images/noprev.gif&#39;" alt="片仔癀(片仔癀)">
                </a>
                <div class="products_name">
                  <p class="shop_name fl">
                    <a href="/index.php/Home/Index/detail/id/<?php echo ($vo["id"]); ?>" title="片仔癀(片仔癀)" target="_blank"><?php echo ($vo["goods_name"]); ?></a>
                  </p>
                </div>

                <div class="price_info">
                  <p class="final_price deep_grey" id="preferential_price_1539582123486"><?php echo ($vo["shop_price"]); ?></p>
                </div>
                <div class="shop_num">
                  <a class="reduce fl" href="javascript:;" title="减少">-</a>
                  <input type="text" maxlength="4" id="product_num_1539582123486" data-productcode="12428" class="fl product_nums" name="number<?php echo ($k); ?>" value="<?php echo ($vo["num"]); ?>">
                  <a class="increase fr" href="javascript:;" title="增加">+</a>
                </div>

                <p class="shop_ctrl clearfix">
                  <a href="javascript:;" id="fav_shop_1539582123486" title="移入收藏夹" class="move_to_fav">移入收藏夹</a>
                  <a href="javascript:;" id="del_shop_1539582123486" title="删除" class="delete_shop">删除</a>
                </p>
                <div class="donation">
                </div>
              </dd>
            </dl>
          </li>
<input type="hidden" name="id<?php echo ($k); ?>" value="<?php echo ($vo["id"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>


    </ul>
  </div>



</div>


<div id="invlidPro"><ul class="orderbox clearfix" id="invlidContainer"></ul></div></div>
<div class="cart_toolbar"><div class="clearfix w tool_bar_position"><label class="labelly fl" for="checkall_down"><span class="label_check label_on"><input type="checkbox" value="全选" name="toggle_checkboxes" id="checkall_down"></span></label><span class="labelspan fl deep_grey pad_top">全选</span> <span class="labelspan fl deep_grey tool_box"><a href="javascript:;" class="del deep_grey">删除选中的商品</a> <a href="javascript:;" class="collect deep_grey">移到我的收藏夹</a> <a href="javascript:;" class="clear_pro deep_grey">清除下柜商品</a></span><div class="error-msg"><p class="ui-dialog cart-alert"></p><span class="treatment-icon"><i></i></span></div>

<!-- <a href="javascript:;" onclick="bigeater_cilck(&quot;1110201&quot;)" title="去结算" class="settlementAll account otc fr yahei " style="display: inline;">去结算</a> -->

<input class="settlementAll account otc fr yahei " style="display: inline;" type="submit" value="去结算">

</form>


<div class="fr total">

<!-- <p>总价：<span class="yahei" id="total_sum">￥4862.00</span></p> -->

<p class="total_save" style="display: none;">已节省：<span>-￥<em>0.00</em></span></p></div>

<!-- <p class="fr goods_num">已选择<i id="isSelectNum">10</i>件商品<span>(不含运费)</span></p> -->
</div>
</div>
</div>




</body>
</html>