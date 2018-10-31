<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0062)http://m.360kad.com/Product/IWant?productIds=73574&quantitys=6 -->
<html lang="UTF-8" style="font-size: 247.867px; zoom: 1;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script type="text/javascript" async="" src="/Public/dj_files/ga.js"></script><script language="javascript" type="text/javascript" src="/Public/dj_files/envconfig.js"></script><script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script>
<script language="javascript" type="text/javascript" async="async" src="/Public/dj_files/ctr_v2.js"></script>
<!--布局:m_product_iwant-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta content="telephone=no" name="format-detection">
    <title>预订登记</title>
    <script src="/Public/dj_files/jquery-1.11.0.min.js" type="text/javascript"></script>
    <script src="/Public/dj_files/Zepto.kad.min.js" type="text/javascript"></script>
    <script src="/Public/dj_files/conversion.js" type="text/javascript"></script>
    <link href="/Public/dj_files/layer.css" rel="stylesheet" type="text/css">
    <link href="/Public/dj_files/details_order.css" rel="stylesheet" type="text/css">
    <link href="/Public/dj_files/Newstore_reg.css" rel="stylesheet" type="text/css">
    <link href="/Public/dj_files/vkad.reset.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="orderRx-title"><i class="go-back" onclick="javascript:history.back(-1);"></i>预定登记</div>
    <div class="orderRx-wrap">
        <div class="orderRx-pro-wrap display-box">
                <div class="orderRx-pro-left box-flex">
                    <a href="javascript:void(0);"><img src="/<?php echo ($goods["original"]); ?>"></a>
                </div>
                <div class="orderRx-pro-right">
                    <p class="orderRx-pro-name"><a href="javascript:void(0)"><?php echo ($goods["goods_name"]); ?></a></p>
                    <div class="orderRx-pro-price">
                        <span class="size1">会员价</span>
                        <span class="size2">￥<?php echo ($goods["shop_price"]); ?></span>
                        <span class="size3">￥<?php echo ($goods["market_price"]); ?></span>
                    </div>

                </div>
        </div>

        <form style="margin-top: .3rem;" action="" method="post">
            <div class="orderRx-pack-info">

                    <!-- <div class="info-input-wrap display-box">
                    <p class="phone-left info-size box-flex">登录名：</p>
                    <p class="phone-right box-flex"><a class="loginSize">已注册会员请快速登录，获取常用地址！</a></p>
                    </div> -->

                <div class="info-input-wrap display-box">
                    <p class="phone-left info-size box-flex"><span style="color:red">*</span>姓名：</p>
                    <p class="phone-right box-flex">
                        <input id="Consignee" class="must" name="truename" type="text" value="" placeholder="输入姓名" onfocus="this.placeholder=&#39;&#39;" onblur="if (this.placeholder==&#39;&#39;)this.placeholder=&#39;输入姓名&#39;" maxlength="30">
                    </p>
                </div>
                <div class="info-input-wrap display-box">
                    <p class="phone-left info-size box-flex"><span style="color:red">*</span>手机：</p>
                    <p class="phone-right box-flex"><input id="MobilePhone" class="must" name="phone" type="text" value="" placeholder="填写11位手机号码" onfocus="this.placeholder=&#39;&#39;" onblur="if (this.placeholder==&#39;&#39;)this.placeholder=&#39;填写11位手机号码&#39;" maxlength="11"></p>
                </div>
                <div class="info-select-wrap display-box">
                    <p class="phone-left info-size box-flex"><span style="color:red">*</span>地址：</p>
                    <div class="select-right box-flex">
                        <div class="grid_r">
                            <p class="addr_p">
                                <select id="ProvinceId" name="ProvinceId" onchange="GetRegionCity()" class="fs">
                                    <option value="-1">请选择省份</option>
                                            <option value="110000">北京</option>
                                            <option value="120000">天津</option>
                                            <option value="130000">河北省</option>
                                            <option value="140000">山西省</option>
                                            <option value="150000">内蒙古自治区</option>
                                            <option value="210000">辽宁省</option>
                                            <option value="220000">吉林省</option>
                                            <option value="230000">黑龙江省</option>
                                            <option value="310000">上海</option>
                                            <option value="320000">江苏省</option>
                                            <option value="330000">浙江省</option>
                                            <option value="340000">安徽省</option>
                                            <option value="350000">福建省</option>
                                            <option value="360000">江西省</option>
                                            <option value="370000">山东省</option>
                                            <option value="410000">河南省</option>
                                            <option value="420000">湖北省</option>
                                            <option value="430000">湖南省</option>
                                            <option value="440000">广东省</option>
                                            <option value="450000">广西壮族自治区</option>
                                            <option value="460000">海南省</option>
                                            <option value="500000">重庆</option>
                                            <option value="510000">四川省</option>
                                            <option value="520000">贵州省</option>
                                            <option value="530000">云南省</option>
                                            <option value="540000">西藏自治区</option>
                                            <option value="610000">陕西省</option>
                                            <option value="620000">甘肃省</option>
                                            <option value="630000">青海省</option>
                                            <option value="640000">宁夏回族自治区</option>
                                            <option value="650000">新疆维吾尔自治区</option>
                                </select>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="info-input-wrap display-box">
                    <p class="phone-left info-size box-flex"><span style="color:red">*</span>详细地址：</p>
                    <p class="phone-right box-flex">
                        <input id="Address" class="must" name="address" type="text" value="" placeholder="" onfocus="this.placeholder=&#39;&#39;" onblur="if (this.placeholder==&#39;&#39;)this.placeholder=&#39;请输入详细地址&#39;" maxlength="50">
                    </p>
                </div>




<style>
    .patient-information-title {
        margin-top: .2rem;
        margin-bottom: .2rem;
    }

    .patient-information input {}
</style>


                <div class="info-input-wrap info-input-last display-box">
                    <p class="phone-left info-size box-flex">留言：</p>
                    <p class="phone-right box-flex">
                        <input id="Msg" name="msg" type="text" value="" placeholder="如有特殊要求，可在此填写" onfocus="this.placeholder=&#39;&#39;" onblur="if (this.placeholder==&#39;&#39;)this.placeholder=&#39;如有特殊要求，可在此填写&#39;" maxlength="50">
                    </p>
                </div>
            </div>

            <section class="grid footer-control">
                <!--部件开始:m_iwant_holiday_tel,分组:广告部件-->
<div class="orderRx-pack-ts">如紧急，请拨打药师电话<span onclick="window.location.href=&#39;tel:4008808488&#39;;$(this).css(&#39;color&#39;,&#39;#06a6f8&#39;)">4008808488</span></div>
<!--部件结束:m_iwant_holiday_tel-->
            </section>
            <!-- <a class="sub btn btn-red">提交登记</a> -->
            <input type="hidden" name="sid" value="<?php echo ($_GET['sid']); ?>" />
            <input class="sub btn btn-red" type="submit" value="提交登记">
        </form>
    </div>




</body>
</html>