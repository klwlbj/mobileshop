<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html style="font-size: 78.5333px; zoom: 1;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no,email=no" name="format-detection">
    <title>购物车</title>
    <script type="text/javascript" async="" src="/Public/car_files/ga.js"></script><script language="javascript" type="text/javascript" async="async" src="/Public/car_files/ctr_v2.js"></script>

    <link href="/Public/car_files/vkad.reset.css" rel="stylesheet" type="text/css">
    <link href="/Public/car_files/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="/Public/car_files/m_shopCart.css" rel="stylesheet" type="text/css">
    <link href="/Public/car_files/blue.css" rel="stylesheet" type="text/css">
    <script src="/Public/car_files/Zepto.kad.min.js" type="text/javascript"></script><script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script>
    <script src="/Public/car_files/conversion.js" type="text/javascript"></script>
    <script src="/Public/car_files/tDialog.js" type="text/javascript"></script>
    <script src="/Public/car_files/swiper.min.js" type="text/javascript"></script>
    <style>
        /*CSS3 loading */
        .spinner-box {
            position: fixed;
            z-index: 99999;
            left: 0;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            -webkit-transform: translateY(-50%);
        }

        .spinner {
            margin: 1rem auto;
            width: 1rem;
            height: 1rem;
            position: relative;
        }

        .container1 > div, .container2 > div, .container3 > div {
            width: .2rem;
            height: .2rem;
            background-color: #333;
            border-radius: 100%;
            position: absolute;
            -webkit-animation: bouncedelay 1.2s infinite ease-in-out;
            animation: bouncedelay 1.2s infinite ease-in-out;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        .spinner .spinner-container {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .container2 {
            -webkit-transform: rotateZ(45deg);
            transform: rotateZ(45deg);
        }

        .container3 {
            -webkit-transform: rotateZ(90deg);
            transform: rotateZ(90deg);
        }

        .circle1 {
            top: 0;
            left: 0;
        }

        .circle2 {
            top: 0;
            right: 0;
        }

        .circle3 {
            right: 0;
            bottom: 0;
        }

        .circle4 {
            left: 0;
            bottom: 0;
        }

        .container2 .circle1 {
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s;
        }

        .container3 .circle1 {
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }

        .container1 .circle2 {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
        }

        .container2 .circle2 {
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
        }

        .container3 .circle2 {
            -webkit-animation-delay: -0.7s;
            animation-delay: -0.7s;
        }

        .container1 .circle3 {
            -webkit-animation-delay: -0.6s;
            animation-delay: -0.6s;
        }

        .container2 .circle3 {
            -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s;
        }

        .container3 .circle3 {
            -webkit-animation-delay: -0.4s;
            animation-delay: -0.4s;
        }

        .container1 .circle4 {
            -webkit-animation-delay: -0.3s;
            animation-delay: -0.3s;
        }

        .container2 .circle4 {
            -webkit-animation-delay: -0.2s;
            animation-delay: -0.2s;
        }

        .container3 .circle4 {
            -webkit-animation-delay: -0.1s;
            animation-delay: -0.1s;
        }

        @-webkit-keyframes bouncedelay {
            0%, 80%, 100% {
                -webkit-transform: scale(0.0);
            }

            40% {
                -webkit-transform: scale(1.0);
            }
        }

        @keyframes bouncedelay {
            0%, 80%, 100% {
                transform: scale(0.0);
                -webkit-transform: scale(0.0);
            }

            40% {
                transform: scale(1.0);
                -webkit-transform: scale(1.0);
            }
        }
        /*CSS3 loading End*/

        .taocan {
            height: 1.2rem;
            padding: .3rem 0 .3rem 6.4%;
            border-bottom: solid 1px #eee;
        }

        body {
            background-color: #f8f8f8;
        }

        .how-many {
            color: red;
        }

        .hg-price {
            color: #ff4040;
        }

        .order-btn.cur {
            background-color: #999;
            pointer-events: none;
        }

        .btn a:first-child {
            margin-right: 10px;
        }

        .Popup1 div {
            padding: 15px 10px;
            display: -webkit-box;
        }

        .btn .cancel {
            display: block; /* float: left; */
            background: #565454; /* width: 135px; */
            height: 30px;
            line-height: 30px;
            text-align: center;
            color: #FFF;
            -webkit-border-radius: 3px;
            -webkit-box-flex: 1;
            width: 0;
        }

        .btn .ok {
            display: block; /* float: right; */
            background: #FFF; /* width: 135px; */
            height: 30px;
            line-height: 30px;
            text-align: center;
            color: #000;
            -webkit-border-radius: 3px;
            -webkit-box-flex: 1;
            width: 0;
            -moz-border-radius: 3px;
        }

        .clearIcon {
            background: none;
            text-align: center;
        }
        /*弹出层*/
        .Popup1 {
            position: fixed !important; /*ie7 ff*/
            position: relative;
            background-color: black;
            -moz-opacity: 0.9;
            opacity: 0.9;
            overflow: hidden;
            width: 80%;
            height: auto !important;
            margin-left: -40%;
            left: 50% !important;
            top: 20%;
            text-align: center;
            z-index: 9999;
            display: none;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            box-shadow: 5px 5px 50px #000000;
        }

            .Popup1 .remove {
                padding: 15px 10px 8px 10px;
                border-bottom: 1px #939393 solid;
                color: #FFF;
            }

        /*弹出层及其弹出层里面的元素的CSS样式*/
        .PopupBackground {
            display: none;
            position: fixed !important; /*ie7 ff*/
            position: absolute;
            height: 100%;
            width: 100%;
            top: 0px;
            left: 0px;
            z-index: 99;
            background-color: black;
            -moz-opacity: 0.2;
            opacity: 0.2;
            filter: alpha(opacity=20);
        }
    </style>

    <style>
        .main_layer {
            background: #fff;
            border-radius: 0.1rem;
            width: 5rem;
            position: absolute;
            left: -99999px;
        }

            .main_layer .main_layer_msg p {
                line-height: .5rem;
                padding: .2rem;
                font-size: .34rem;
                text-align: center;
                color: #252525;
            }

            .main_layer .main_layer_footer {
                display: -webkit-box;
                height: 0.8rem;
                border-top: 1px solid #e8e8e8;
            }

                .main_layer .main_layer_footer .main_layer_footer_btn {
                    -webkit-box-flex: 1;
                    width: 0;
                    display: -webkit-box;
                    -webkit-box-align: center;
                    -webkit-box-pack: center;
                    border-right: 1px solid #e8e8e8;
                    font-size: 0.3rem;
                    color: #2d8ef3;
                }

                    .main_layer .main_layer_footer .main_layer_footer_btn:last-child {
                        border: none;
                    }

        #cart-empty .cart-empry-bg {
            width: 100%;
            height: 5rem;
            background: url("/theme/v/img/cart-bg.jpg") center center no-repeat;
            background-size: 4.5rem 4.37rem;
        }

        #cart-empty .cart-empry-cart {
            font-size: 0.34rem;
            color: #adadad;
            line-height: 0.4rem;
            text-align: center;
            margin-bottom: 0.3rem;
        }

        #cart-empty .cart-empry-goshopping {
            display: block;
            width: 100%;
            height: 1rem;
            line-height: 1rem;
            text-align: center;
            font-size: 0.34rem;
            color: #fff;
            background: #2d8ef3;
            border-radius: 0.1rem;
            margin-bottom: .4rem;
        }
    </style>
</head>
<body>






<form style="margin-top: .3rem;" action="/index.php/M/Index/order" method="post">
    <!--/*内容部分*/-->
    <section class="shop-cart-wrap">

            <div id="cart-content">
                <div class="shopCart-header">
                    <span onclick="history.go(-1);" class="header-left"></span>
                    <span class="header-size">购物车</span>
                    <!--<span id="editBtn1" class="header-right">删除</span>-->
                </div>

        <!--非处方药--><?php if(empty($cars))echo'<div style="margin: auto; text-align: center">购物车快餓瘪了T.T</div><div style="margin: auto; text-align: center"><a
            href="/index.php/M/Index/index">快给我挑点东西吧</a><div><div style="width: 20%; border-radius: 8px;padding:2%; margin: auto; text-align: center;border-color:#ff6400;border: 1px solid #ff6400;"><a
            href="/index.php/M/Index/index">去逛逛</a><div>'; else echo'<div class="conter-title clearfix">
        <p class="title-select cur"></p><p class="title-size">驼铃商贸</p></div><div class="shopCart-conter">'?>

                                    <!--主商品-->


<?php if(is_array($cars)): $k = 0; $__LIST__ = $cars;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="conter-prod-warp" data="6f73495f3efe4b7a8bf05d8ea9ab9a85">
    <div class="prod-wrap display-box">
        <!--选择框-->
        <p class="prod-select box-flex cur" id="6f73495f3efe4b7a8bf05d8ea9ab9a85"></p>
        <p class="prod-pic box-flex">
            <a href="/index.php/M/Index/detail/id/<?php echo ($vo["id"]); ?>"><img src="/.<?php echo ($vo["original"]); ?>"></a>
        </p>
        <div class="prod-right box-flex">
            <p class="cont-name"><a href="/index.php/M/Index/detail/id/<?php echo ($vo["id"]); ?>"><span><?php echo ($vo["goods_name"]); ?></span></a></p>
            <div class="cont-bottom">
                <div class="cont-price">¥<?php echo ($vo["shop_price"]); ?></div>
                <span style="display:inline-block;margin-top: 1em;margin-left: 0.5em;"><a href="/index.php/M/Index/delcar/id/<?php echo ($vo["id"]); ?>">删除</a></span>
                <div class="treatment-input">
                    <a href="javascript:;" class="num-reduce"></a>
                    <a href="javascript:;" class="num-reduce" style="display: none;"></a>
                    <input class="num-input" onkeyup="this.value=this.value.replace(/\D/g)" onafterpaste="this.value=this.value.replace(/\D/g)" type="number" name="number<?php echo ($k); ?>" value="1">
                    <a href="javascript:;" class="num-add"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="id<?php echo ($k); ?>" value="<?php echo ($vo["id"]); ?>" /><?php endforeach; endif; else: echo "" ;endif; ?>





                            </div>
        <!--处方药-->



                <div class="order-balance display-box">
                    <div class="order-all-price box-flex">
                        <!--<p id="allSelect" class="Allselect"></p>-->
                        <!--<p class="Allselect-size">全选</p>-->
                        <input id="giftcode" type="hidden">
                        <input id="giftqty" type="hidden">
                    <!--     <div class="all-price-cont">
                        <p class="all-price-top">
                            <span class="all-price-size">总计：</span>
                            <span id="allPrice" class="all-price-sale">￥21.00</span>
                        </p>
                        <p id="freightPrice" class="all-price-bottom clearfix">该订单已包邮</p>
                    </div> -->
                        </div>
                        <!-- <a href="javascript:;" id="" class="order-btn box-flex">去结算</a> -->
                        <input class="order-btn box-flex" <?php if($cars!=null) echo'type="submit"';else echo 'type="button"';?> value="去结算">


                        <input type="hidden" name="hidIsgotoOrder" id="hidIsgotoOrder" value="1">
                    </div>
                </div>
    </section>


<!-- <input class="sub btn btn-red" type="submit" value="提交登记"> -->
</form>












<?php $cd=3?>
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



    <div class="layer-wrap" id="zzlayer"></div>

    <!--弹出层背景-->
    <div class="PopupBackground" id="PopupBackground" style="display: none;"></div>
    <div style="display:none" class="Popup1" id="Popup3">

    </div>

    <!--CSS3 loading-->
    <div class="spinner-box" id="css3Loading" style="display: none;">
        <div class="spinner">
            <div class="spinner-container container1">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container2">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
            <div class="spinner-container container3">
                <div class="circle1"></div>
                <div class="circle2"></div>
                <div class="circle3"></div>
                <div class="circle4"></div>
            </div>
        </div>
    </div>
    <!--CSS3 loading end-->
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-3051632-5']);
        _gaq.push(['_setDomainName', '']);
        _gaq.push(['_setAllowHash', false]);
        _gaq.push(['_addOrganic', 'soso', 'w']);
        _gaq.push(['_addOrganic', 'youdao', 'q']);
        _gaq.push(['_addOrganic', 'sogou', 'query']);
        _gaq.push(['_addOrganic', '360', 'q']);
        _gaq.push(['_addOrganic', 'baidu', 'word']);
        _gaq.push(['_addOrganic', 'baidu', 'q1']);
        _gaq.push(['_addOrganic', 'so.com', 'q']);
        _gaq.push(['_trackPageview']);

        window.cartConfig = {
            cartFreePostage:"该订单已包邮",
            /*cartPostage: "还差{0}元包邮",
            postage: 58*/
            }

        function panDuanTaocan(){
            $(".taocan").parents(".conter-prod-warp").addClass("conter-package-wrap");
        }

        function shuaxin(){
            $('.discount-wrap').each(function(e){
                var index = $(this).children('.discount-prod').size();
                if(!index)return;
                if($(this).parent('.conter-prod-warp').hasClass('conter-package-wrap')){
                    $(this).children('.discount-prod').eq(0).addClass('first-child');
                    $(this).children('.discount-prod').eq(index-1).addClass('last-child');
                }
                $(this).children('.discount-prod').eq(0).children('.discount-border').addClass('first-child');
                $(this).children('.discount-prod').eq(index-1).children('.discount-border').addClass('last-child');
            });
        }



        function numAmend()
        {
            $(".num-input").each(function(a,b){
                if($(b).val()<=1){
                    $(b).prev().addClass("cur");
                }
                if ($(b).val()>=999) {
                    $(b).next().addClass("cur");
                }
                if ($(b).val()>999) {
                    $(b).val(999);
                }
            });
        }

        function hidePop3() {
            document.getElementById("Popup3").style.display = 'none';
            document.getElementById("PopupBackground").style.display = 'none';
        }

        //confirmPop,str:提示语，btnRinghtClick：确定按钮点击事件,iconStr:！,√,？等
        function confirmPop(str, btnRinghtClick, iconStr) {
            $("#confirmMsg").html(str);
            document.getElementById("Popup3").style.display = "block";
            document.getElementById("PopupBackground").style.display = "block";
            $('.confirmPop_right').unbind('click.ok').bind('click.ok', btnRinghtClick).bind('click.ok', hidePop3);
            $('.confirmPop_cancel').unbind('click.cancel').bind('click.cancel', hidePop3);
        }

        function checkForm() {
            if ($('.prod-select.cur').length > 0) {
                var existCannotBuyWare = '0';
                if (parseInt(existCannotBuyWare) == 1) {
                    var cannotBuyTips = '';
                    confirmPop(cannotBuyTips, function () {
                        _gaq.push(['_trackEvent', '加入购物车页面', '马上结算-按钮', '0', 0]);


                        // window.location = '/Order/GetOrderInfo';


                    }, "！");
                }
                else {
                    _gaq.push(['_trackEvent', '加入购物车页面', '马上结算-按钮', '0', 0]);


                    // window.location = '/Order/GetOrderInfo';


                }
            }
            //else {
            //    alertPop("请至少选中一件商品！", function () { }, '！')
            //}
        }

        function ifHideOrderFavorable() {

            if ($(".order-title").siblings().size()>0) {
                $('.shopCart-order-discount').show();
            }
            else {
                $('.shopCart-order-discount').hide();
            }
        }

        function isChangeBodyColor(){
            if ($(".shop-cart-not").size()==1) {
                $("body").css("background-color","white");
            }
        }

        $(document).ready(function () {
            isChangeBodyColor();

            panDuanTaocan();//如果有套餐 在主商品加上class
            shuaxin();//动态加载套餐子商品的Class
            numAmend();

         /*   if (parseInt($("#hidIsgotoOrder").val())) {
                location.href = "/cart/Index";
            }*/
            var config = {
                //编辑取消按钮//显示删除购物车弹出层
                btnEdit: $("#editBtn"),
                //删除、结算按钮
                btnCartDelete: $("#balanceBtn"),
                //左拉动删除单个商品
                btnDelete: $(".remove-cont"),
                //全选 按钮
                btnPackageSelectAll: $("#allSelect"),
                //选择商品 按钮
                btnPackageSelect: $(".prod-select"),
                //已选择商品按钮
                btnPackageSelected: $(".prod-select.box-flex.cur"),
                //增加购买数量 按钮
                btnAddNumber: $(".num-add"),
                //减少购买数量 按钮
                btnReductionNumber: $(".num-reduce"),
                //购买数量的input
                inputNumber: $(".num-input"),
                //选中的购物车商品 数量
                //cartPackageNumber: $("#cart-num"),
                //应付总额
                spanTotalPayPrice: $("#allPrice"),
                //共省金额
                //spanTotalSavePrice: $(".od-save-price-num"),
                //提示
                pPrompt: $("#freightPrice"),
                //弹层内容dom
                hintText: $(".main_layer_msg_hint"),
                //弹层关闭按钮
                hintCloseBtn: $(".main-layer-close"),
            };

            ifHideOrderFavorable();

            $("body").children().on('click', '.prod-select', function ()
            {
                if ($(this).hasClass('cur')) {
                    // loadTagShow(2);
                    $(this).parents(".prod-wrap").find(".num-input").attr("value","0");
                    updateCartSelectState($(this).attr("id"), false);
                    $(this).removeClass('cur');
                    $('#allSelect').removeClass('cur');
                    $(this).parents(".shopCart-conter").prev().find(".title-select").removeClass('cur');
                } else {
                    $(this).addClass('cur');
                    $(this).parents(".prod-wrap").find(".num-input").attr("value","1");
                    var thisSelectSize =  $(this).parents(".conter-prod-warp").siblings(".conter-prod-warp").size();
                    var thisSelectedSize = $(this).parents(".conter-prod-warp").siblings(".conter-prod-warp").find(".prod-select.box-flex.cur").size();
                    thisSelectSize == thisSelectedSize ? $(this).parents(".shopCart-conter").prev().find(".title-select").addClass('cur') : '';
                    $(".title-select").size() == $('.title-select.cur').size() ? $('#allSelect').addClass('cur') : '';
                    // loadTagShow(2);
                    updateCartSelectState($(this).attr("id"), true);
                }
                $('.prod-select.box-flex.cur').size() > 0 ? $('#balanceBtn').removeClass('cur') : $('#balanceBtn').addClass('cur');

            })

            $("body").children().on("click", ".hg-btn", function (e) {
                var _this = e.target;
                var prmcode = $(_this).attr("data");
                if (prmcode) {
                    if ($(_this).text() == '删除') {
                        // loadTagShow(4);


                    /*    $.ajax({
                            type: "GET",
                            contentType: "application/json",
                            url: "/Cart/ChooseGifts?prmCode=" + prmcode + "&qty=0",
                            success: function (Result) {
                                loadTagShow(-1);//隐藏加载按钮
                                var cart = $('.conter-prod-warp')[0];
                                var cartId = $(cart).attr("data");
                                var inputVal = $(cart).find('.num-input').val();
                                getPackagePrice(cartId, inputVal, function (data, dom) {
                                    refreshhtml(data, dom);
                                })
                            },
                            error:function(){
                                loadTagShow(-5);//隐藏加载按钮
                                alert("异步失败");
                            }
                        })*/
                    }
                    else {
                        closeBody();
                        $("#hg-" + prmcode + "").show();
                        $('#zzlayer').show();
                        $("#hg-" + prmcode + "").find(".slide-select").eq(0).parent().click();//默认选择第一个
                        new Swiper(".hg-cont-swiper", {
                            slidesPerView: 'auto',
                            direction: 'vertical',
                            observer: true,//修改swiper自己或子元素时，自动初始化swiper
                            observeParents: true,//修改swiper的父元素时，自动初始化swiper
                            freeMode: true
                        });
                    }
                }
            })

            $("body").children().on("click", ".swiper-slide", function (e) {
                $('#giftcode').val($(this).find('.slide-select').attr('data'));
                $('#giftqty').val($(this).find('.slide-select').attr('data-id'));
            })

            $("body").children().on("click", ".zp-btn", function (e) {
                var _this = e.target;
                var prmcode = $(_this).attr("data");
                if (prmcode) {
                    if ($(_this).text() == '删除') {
                        // loadTagShow(3);


                       /* $.ajax({
                            type: "GET",
                            contentType: "application/json",
                            url: "/Cart/ChooseGifts?prmCode=" + prmcode + "&qty=0",
                            success: function (Result) {
                                loadTagShow(-1);
                                var cart = $('.conter-prod-warp')[0];
                                var cartId = $(cart).attr("data");
                                var inputVal = $(cart).find('.num-input').val();
                                getPackagePrice(cartId, inputVal, function (data, dom) {
                                    refreshhtml(data, dom);
                                })
                            },
                            error:function(){
                                loadTagShow(-5);
                                alert("异步失败");
                            }
                        })*/


                    }
                    else {
                        closeBody();
                        $("#zp-" + prmcode + "").show();
                        $('.layer-wrap').show();
                        $("#zp-" + prmcode + "").find(".slide-select").eq(0).parent().click();//默认选择第一个
                        new Swiper(".zp-cont-swiper", {
                            slidesPerView: 'auto',
                            direction: 'vertical',
                            observer: true,//修改swiper自己或子元素时，自动初始化swiper
                            observeParents: true,//修改swiper的父元素时，自动初始化swiper
                            freeMode: true
                        });
                    }
                }
            })

            $("body").children().on("click", ".hg-close", function (e) {
                var _this = e.target;
                var giftid = $('#giftcode').val();
                var toqty = $('#giftqty').val();
                if (giftid && toqty) {
                    // loadTagShow(4);


                  /*  $.ajax({
                        type: "GET",
                        contentType: "application/json",
                        url: "/Cart/ChooseGiftsById?giftId=" + giftid + "&qty=" + parseInt(toqty),
                        success: function (result) {
                            loadTagShow(-1);
                            var cart = $('.conter-prod-warp')[0];
                            var cartId = $(cart).attr("data");
                            var inputVal = $(cart).find('.num-input').val();
                            getPackagePrice(cartId, inputVal, function (data, dom) {
                                refreshhtml(data, dom);
                            })
                        },
                        error:function(){
                            loadTagShow(-5);
                            window.location.href="/cart";
                        }
                    });*/


                }
            })

            $("body").children().on("click", ".zp-close", function (e) {
                var _this = e.target;
                var giftid = $('#giftcode').val();
                var toqty = $('#giftqty').val();
                if (giftid && toqty) {
                    // loadTagShow(4);

/*
                    $.ajax({
                        type: "GET",
                        contentType: "application/json",
                        url: "/Cart/ChooseGiftsById?giftId=" + giftid + "&qty=" + parseInt(toqty),
                        success: function (result) {
                            loadTagShow(-1);
                            var cart = $('.conter-prod-warp')[0];
                            var cartId = $(cart).attr("data");
                            var inputVal = $(cart).find('.num-input').val();
                            getPackagePrice(cartId, inputVal, function (data, dom) {
                                refreshhtml(data, dom);
                            })
                        },
                        error:function(){
                            loadTagShow(-5);
                            window.location.href="/cart";
                        }
                    });*/


                }
            })

            function closeBody() {
                document.addEventListener("touchmove", function (e) {
                    e.returnValue = false;
                }, false);
            }

            function openBody() {
                document.addEventListener("touchmove", function (e) {
                    e.returnValue = true;
                }, false);
            }

            $("body").children().on('click', '.hg-title-close,.hg-close', function () {
                openBody();
                $('.hg-cont-wrap').hide();
                $('.layer-wrap').hide();
                $('.slide-select').removeClass('cur');
                $(".how-many").text("0");
            })

            $("body").children().on('click', '.zp-title-close,.zp-close', function () {
                openBody();
                $('.zp-cont-wrap').hide();
                $('.layer-wrap').hide();
                $('.slide-select').removeClass('cur');
                $(".how-many").text("0");
            })

            $("body").children().on('click', '.hg-cont-swiper ul li', function () {
                $('.hg-cont-swiper ul li .slide-select').removeClass('cur');
                $(this).children('.slide-select').addClass('cur');
            })

            $("body").children().on('click', '.zp-cont-swiper ul li', function () {
                $('.zp-cont-swiper ul li .slide-select').removeClass('cur');
                $(this).children('.slide-select').addClass('cur');
            })

            //选择换购或者赠品 展示选择的数量
            // $("body").children().on("click",".swiper-slide",function(){
            //     var selectNum= $(this).parents(".swiper-wrapper").find(".slide-select.box-flex.cur").size();
            //     if ($(this).parents(".zp-cont-wrap").find(".how-many").size()>0) {
            //         $(this).parents(".zp-cont-wrap").find(".how-many").text(selectNum);
            //     }
            //     if ($(this).parents(".hg-cont-wrap").find(".how-many").size()>0) {
            //         $(this).parents(".hg-cont-wrap").find(".how-many").text(selectNum);
            //     }
            //
            // });

            $("body").children().on('click', '.remove-cont', function (e) {
                var _this = $(e.target);
                var packageIds = [];
                packageIds[0] = _this.parent(".relative-wrap").attr("data");
                deletePackage(packageIds, function () {
                    //console.log("删除成功的回调函数");
                });
            })
            //判断是否为IOS
            function isIOS() {
                if (/ipad|iphone|mac/i.test(navigator.userAgent)) {
                    return true;
                } else {
                    return false;
                }
            }
            $("body").children().on('focus', '.num-input', function () {
                if(isIOS()){
                    $('.order-balance').css('position','static');
                }
            })
            $("body").children().on('blur', '.num-input', function () {
                if(isIOS()){
                    $('.order-balance').css('position','fixed');
                }
                // loadTagShow(3);
                setBuyPackageNumber($(this), "change");
            })

            $("body").children().on('click', '.title-select', function () {
                if ($(this).hasClass('cur')) {
                    $(this).removeClass('cur');
                    $(".num-input").attr("value","0");
                    $('#allSelect').removeClass('cur');
                    $(this).parent().next().find(".conter-prod-warp").find(".prod-select").removeClass('cur');
                    var cartIds = [], select = $(".prod-select"), len = $(select).length;
                    for (var i = 0; i < len; i++) {
                        if (!$(select).eq(i).hasClass("cur") && $(select).eq(i).attr("id") != "" && $(select).eq(i).attr("id") != "undefined") {
                            cartIds[i] = $(select).eq(i).attr("id");
                        }
                    }
                    if (cartIds.length > 0) {
                        // loadTagShow(2);
                        updateCartSelectState(cartIds.join(","), false);
                    }


                } else {
                    $(this).addClass('cur');
                    $(".num-input").attr("value","1");
                    $(this).parent('.conter-title').next().find(".prod-select").addClass('cur');
                    $('.title-select').size() == $('.title-select.cur').size() ? $('#allSelect').addClass('cur') : '';
                    var cartIds = [], select = $(".prod-select.cur"), len = $(select).length;
                    for (var i = 0; i < len; i++) {
                        if ($(select).eq(i).hasClass("cur") && $(select).eq(i).attr("id") != "" && $(select).eq(i).attr("id") != "undefined") {
                            cartIds[i] = $(select).eq(i).attr("id");
                        }
                    }
                    if (cartIds.length > 0) {
                        // loadTagShow(2);
                        updateCartSelectState(cartIds.join(","), true);
                    }
                }
                $('.title-select.cur').size() > 0 ? $('#balanceBtn').removeClass('cur') : $('#balanceBtn').addClass('cur');
            })



            //弹层
            var deleteDialog = new tDialog({
                obj: $(".main_layer_delete"),
                closeBtn: $(".main-layer-close"),
                confirmBtn: $(".mlfb-ok"),
                onsure: function () {
                    getPackageIds();
                }
            });
            //弹层
            var hintDialog = new tDialog({
                obj: $(".main_layer_hint"),
                closeBtn: $(".main-layer-close")
            });
            showSelectGroup();
            showSelectAll();
            //页面加载完后显示选中购物车产品总金额,总共省金额,是否可以点击结算按钮
            setCartPackageNumber();

            //选项交互
            $('#allSelect').on("click", function () {
                if ($(this).hasClass('cur')) {
                    $(this).removeClass('cur');
                    $('#balanceBtn').addClass('cur');
                    $('.title-select,.prod-select').removeClass('cur');
                } else {
                    $(this).addClass('cur');
                    $('#balanceBtn').removeClass('cur');
                    $('.title-select,.prod-select').addClass('cur');
                }
            });

            //勾选商品按钮 all
            $("body").children().on("click", "#cart-content",function (e) {
                var _this = $(e.target);
                //选择全部商品
                if (_this.hasClass("Allselect")) {
                    var cartIdArr = [], len = $(config.btnPackageSelect).length;
                    for (var i = 0; i < len; i++) {
                        cartIdArr[i] = $(config.btnPackageSelect).eq(i).attr("id");
                    }
                    if (_this.hasClass("cur")) {
                        // loadTagShow(2);
                        updateCartSelectState(cartIdArr.join(","), true);
                    } else {
                        // loadTagShow(2);
                        updateCartSelectState(cartIdArr.join(","), false);
                    }
                }
                //单个商品选择
                //if (_this.hasClass("select-wrap2")) {
                //    updateCartSelectState(_this.attr("id"), true);
                //    setCartPackageNumber();
                //}
                //加
                if (_this.hasClass("num-add")) {
                    var num = _this.siblings('.num-input').val();
                    if (num < 999) {
                        num++;
                        _this.siblings('.num-reduce').removeClass('cur');
                        $(this).parent().parent().parent().parent().find(".prod-select").addClass('cur');
                        _this.siblings('.num-input').attr("value",num);

                        if (num >= 0) {
                            _this.siblings('.num-reduce').removeClass('cur');
                        } else {
                            _this.siblings('.num-reduce').addClass('cur');
                        }
                        // loadTagShow(3);
                        setBuyPackageNumber(_this, "add");
                        return;
                    } else {
                        _this.addClass('cur');
                        // loadTagShow(3);
                        setBuyPackageNumber(_this, "add");
                        return;
                    }
                }
                //减
                if (_this.hasClass("num-reduce")) {
                    var num = _this.siblings('.num-input').val();
                    if (num >= 0) {
                        if (num == 1) {
                            _this.addClass('cur');
                        }
                        num--;
                        _this.siblings('.num-input').attr("value",num);;
                        // loadTagShow(3);
                        setBuyPackageNumber(_this, "reduction");
                        return;
                    } else {
                        _this.addClass('cur');
                        // loadTagShow(3);
                        setBuyPackageNumber(_this, "reduction");
                        return;
                    }
                }
            })


            //显示删除购物车弹出层
            $("body").children().on("click","#balanceBtn",function(){
                if ($("#balanceBtn").text() == "删除") {
                    if ($(".prod-select.box-flex.cur").length == 0) {
                        $(".main_layer_msg_hint").text("请选择商品");
                        hintDialog.show();
                        return;
                    } if ($("#balanceBtn").text() == "删除")
                        deleteDialog.show();
                }
                else if ($("#balanceBtn").text() == "去结算") {
                    if(getCookie('UnionCard_CardNo') != null)
                    {
                        var result=  checkUnionCard();
                        if(result != "全开放")
                        {
                            // location.href = "http://m.360kad.com/Home/Error?Msg=抱歉，您选购的商品：" + result + "暂不支持钥匙卡支付，请在购物车自行删除。&state=4&returnUrl=" + window.location.href;
                            return false;
                        }
                    }
                    checkForm();
                    goPay();
                }
            });

            config.btnEdit.on("click", function () {
                if ($('#editBtn').text() == '删除') {
                    $('#allSelect').removeClass('cur');
                    $('.title-select').removeClass('cur');
                    $('.prod-select').removeClass('cur');
                    // loadTagShow(1);
                    setCartPackageNumber();
                }
            });

            //重新绑定input输入
            function reBindInput() {
                $(".num-input").on("change", function () {
                    // loadTagShow(3);
                    setBuyPackageNumber($(this), "change");
                })
            }

            //删除商品
            function deletePackage(packageIds, call) {


              /*  $.ajax({
                    type: "post",
                    data: { cartIds: packageIds.join(",") },
                    url: "/Cart/DeleteByIds",
                    success: function (data) {
                        loadTagShow(-1);//隐藏加载按钮
                        if (data == true) {
                            window.location.href = '/Cart/Index';
                        } else {
                            $(".main_layer_msg_hint").text("删除失败！");
                            hintDialog.show();
                        }
                    },
                    error:function(){
                        loadTagShow(-5);
                        //alert("异步失败");
                        window.location.href = '/Cart/Index';
                    }
                });
*/

            }
            //册除选中的购物车产品信息
            function getPackageIds() {
                var packageIds = [], select = $(".prod-select.box-flex.cur"), len = $(select).length;
                for (var i = 0; i < len; i++) {
                    packageIds[i] = $(select).eq(i).attr("id");
                }
                // loadTagShow(1);
                //调用删除接口
                deletePackage(packageIds, function () {
                    //console.log("删除成功的回调函数");
                });
            }

            function showSelectGroup() {
                $(".shopCart-conter").each(function () {
                    if ($(this).find(".prod-select").length == $(this).find(".prod-select.cur").length) {
                        $(this).prev().find(".title-select").addClass("cur");
                    }
                });
            }

            //跳转到确认订单页
            function goPay() {
                if ($(".prod-select.box-flex.cur").length < 1) {
                    $(".main_layer_msg_hint").text("没有选择任何商品！");
                    hintDialog.show();
                } else {
                    // loadTagShow(1);
                    setTimeout(function(){ loadTagShow(-1); },2000);
                    //location.href = "/Order/GetOrderInfo?from=cart&ranparam=" + new Date().getTime();


                    // _gaq.push(['_trackEvent', '加入购物车页面', '马上结算-按钮', '0', 0]);


                    // location.href = "/Order/GetOrderInfo";


                }
            }

            //控制全选按钮
            function showSelectAll() {
                config.btnPackageSelected = $(".prod-select.box-flex.cur");
                if (config.btnPackageSelect.length == config.btnPackageSelected.length) {
                    config.btnPackageSelectAll.addClass("cur");
                } else {
                    config.btnPackageSelectAll.removeClass("cur");
                }
            }
            //显示购物车选中了多少商品
            function setCartPackageNumber() {
                setTotalPrice(getTotalPrice());
            };
            //设置单个商品的购买数量 来自于按钮和input的输入
            function setBuyPackageNumber(obj, type) {
                var inputDom, inputVal, reductionDom, addDom, cartId = $(obj).parents(".conter-prod-warp").attr("data");
            /*    if (cartId == "") {
                    return false;
                }
                switch (type) {
                    case "add":
                        inputDom = obj.prev();
                        addDom = obj;
                        reductionDom = inputDom.prev();
                        inputVal = parseInt(inputDom.val());
                        break;
                    case "reduction":
                        inputDom = obj.next();
                        addDom = inputDom.next();
                        reductionDom = obj;
                        inputVal = parseInt(inputDom.val());
                        break;
                    case "change":
                        inputDom = obj;
                        reductionDom = inputDom.prev();
                        addDom = inputDom.next();
                        inputVal = inputDom.val() == "" ? 1 : parseInt(inputDom.val());
                        break;
                    default:
                        break;
                }
                if (inputVal < 2) {
                    inputVal = 1;
                    reductionDom.addClass("cur");
                } else if (inputVal > 1) {
                    reductionDom.removeClass("cur");
                };
                inputDom.val(inputVal);
                //套餐或者商品ID + 数量 + 回调函数 + 父级dom
                getPackagePrice(cartId, inputVal, function (data, dom) {
                    setPackagePrice(data, dom);
                }, inputDom.closest(".package-info-price"));*/
            };
            //设置价格
            function setPackagePrice(data, dom) {
                var result = data.result;
                var msg = data.msg;
                var buyMax = data.buyMax;
                var input = dom.find(".product-select-num");
                if (result) {
                    refurbishCart();
                } else {
                    loadTagShow(-5);
                    input.val(input.attr("old-value"));
                    $(".main_layer_msg_hint").text(msg);
                    hintDialog.show();
                }
            }

            function refreshhtml(data, dom) {
                if (data.result) {
                    refurbishCart();
                }
            }

            var ifReq=true;
            function refurbishCart()
            {

                if (ifReq)
                {
                    ifReq=false;


                  /*  $.ajax({
                        method:"get",
                        url:"/cart/mincart",
                        dataType:"html",
                        success:function(result){
                            ifReq=true;
                            loadTagShow(-1);
                            if(result.length <=30) {
                                return;
                            }
                            if (result.indexOf("购物车还是空的哦")!=-1) {
                                $(".order-balance").hide();
                                $(".shopCart-header").hide();
                            }
                            $(".conter-title.clearfix").remove();//驼铃商贸网上药店 新特药房云景店
                            $(".shopCart-conter").remove();//商品内容
                            $(".shopCart-order-discount").remove();//订单优惠
                            //$(".order-balance.display-box").remove();//全选去结算
                            $(".shopCart-header").after(result);
                            if ($(".shop-cart-not").size()>0) {  //购物车为空就不执行下面的
                                $("body").css("background-color","white");
                                $(".order-balance").hide();
                                loadTagShow(-5);
                                return;
                            }
                            panDuanTaocan();
                            shuaxin();
                            ifHideOrderFavorable();//是否隐藏订单优惠
                            showSelectGroup();//是否勾选平台
                            $(".title-select").size() == $('.title-select.cur').size() ? $('#allSelect').addClass('cur') : '';//是否全选
                            numAmend();
                            setCartPackageNumber();
                            $(".layer-wrap").hide();
                            isChangeBodyColor();

                        },
                        error:function(){
                            ifReq=true;
                            loadTagShow(-5);
                            window.location.href='/cart/pcart';
                        }
                    });*/


                    showSelectGroup();
                    reBindInput();
                    $('.num-input').each(function () {
                        $(this).val() == 0 ? $(this).prev('.num-reduce').addClass('cur') : $(this).prev('.num-reduce').removeClass('cur');
                        $(this).val() >= 999 ? $(this).next('.num-add').addClass('cur') : $(this).next('.num-add').removeClass('cur');
                    });

                }
            }


            //获取商品价格
            function getPackagePrice(cartId, quantity, call, dom) {


               /* $.ajax({
                    type: 'GET',
                    url: "/Cart/AjaxChangeQuantity",
                    timeout: 5000,
                    data: { cartId: cartId, quantity: quantity, time: new Date().getTime() },
                    cache: false,
                    dataType: "json",
                    success: function (data) {
                        loadTagShow(-1);
                        //$("#css3Loading").hide();//隐藏加载按钮
                        //用于回调的返回对象
                        var reObj = {
                            result: true,
                            buyMax: false,
                            cartId: null,
                            cartView: null,
                            msg: null
                        };
                        if (data.Result == true) {
                            reObj.result = true;
                            reObj.cartId = cartId;
                            reObj.cartView = data.CartView;
                        } else {
                            reObj.result = false;
                            if (data.IsOverLimit) {
                                reObj.msg = data.OverLimitTips;
                                reObj.buyMax = true;
                            } else {
                                reObj.msg = data.Message;
                            }
                        }
                        if (typeof call == "function") {
                            call.call(call, reObj, dom);
                        } else {
                            console.log("请把本函数的第3个设为回调函数");
                        }
                    },
                    complete: function (XMLHttpRequest, status) {
                        if (status == "timeout") {
                            loadTagShow(-5);
                            config.hintText.text("网络异常，将为您重新加载...");
                            config.hintCloseBtn.find("span").text("知道了");
                            config.hintCloseBtn.bind("click", function onclose() {
                                $(this).find("span").text("关闭");
                                window.location.reload();
                                return;
                            })
                            hintDialog.show();
                        }
                    }
                })*/


            };

            //获取选中购物车产品总金额
            function getTotalPrice() {
                var payPrice = 0;
                var hg = 0;
                $(".prod-select.box-flex.cur").each(function () {
                    var package_list = $(this).closest(".conter-prod-warp");
                    payPrice += parseFloat(package_list.find(".cont-price").text().replace("¥", "")) * parseFloat(package_list.find(".num-input").val());
                });
                $('.discount-wrap').each(function () {
                    if ($('.prod-select.box-flex.cur').length > 0) {
                        if ($(this).find('.discount-icon').text() == '换购') {
                            if ($(this).find(".discount-salePrice").length > 0) {
                                hg += parseFloat($(this).find(".discount-salePrice").text().replace("¥", "") * $(this).find(".discount-num").text().replace("x", ""));
                            }
                        }
                    }
                });
                payPrice = (payPrice + hg).toFixed(2);
                return {
                    payPrice: payPrice
                }
            };

            //设置显示选中购物车产品总金额,总共省金额,订单显示是否免运费
            function setTotalPrice(opts) {
                if (opts.payPrice!="0.00" && $("#editBtn").text()=="取消") {
                    $("#balanceBtn").removeClass("cur");
                }
                config.spanTotalPayPrice.text("￥"+opts.payPrice);
                $("#hidIsgotoOrder").val(1);
                var tips = "满39元包邮";
                if (opts.payPrice <= 0) {
                    loadTagShow(-5);
                    config.pPrompt.text(cartConfig.cartPostage.replace("{0}", cartConfig.postage));
                } else {
                    //$("#css3Loading").show();//显示加载按钮


                  /*  $.ajax({
                        url: "/Cart/GetSelectedCartFreight?time=" + new Date().getTime(),
                        timeout: 5000,
                        type: "post",
                        cache: false,
                        dataType: "json",
                        success: function (data) {
                            loadTagShow(-1);
                            if (data.Code == 0) {
                                if (data.TotalFreightCost == 0) {
                                    config.pPrompt.text(cartConfig.cartFreePostage);
                                } else {
                                    config.pPrompt.text(cartConfig.cartPostage.replace("{0}", (cartConfig.postage-data.totalPrice).toFixed(2) ));
                                }
                            } else {
                                config.pPrompt.text(cartConfig.cartPostage.replace("{0}", (cartConfig.postage-data.totalPrice).toFixed(2)));
                            }
                        },
                        complete: function (XMLHttpRequest, status) {
                            if (status == "timeout") {
                                loadTagShow(-5);
                                config.hintText.text("网络异常，将为您重新加载...");
                                config.hintCloseBtn.find("span").text("知道了");
                                config.hintCloseBtn.bind("click", function onclose() {
                                    $(this).find("span").text("关闭");
                                    window.location.reload();
                                    return;
                                })
                                hintDialog.show();
                            }
                        }
                    });*/


                }
            };

            //更新购物车选择状态
            function updateCartSelectState(cartIds, selected) {

/*
                $.ajax({
                    url: "/Cart/UpdateCartSelectState",
                    data: { cartIds: cartIds, selected: selected, time: new Date().getTime() },
                    type: "post",
                    success: function (data) {
                        loadTagShow(-1);
                        setCartPackageNumber();
                    },
                    error:function(){
                        loadTagShow(-5);
                        //alert("异步失败");
                        window.location.href="/cart";
                    }
                });*/


            }

            function checkUnionCard() {
                var reslut = "1"


               /* $.ajax({
                    url: "/Cart/IsCanUnionCard",
                    type: "get",
                    dataType: "json",
                    cache: true,
                    async: false,
                    success: function (data) {
                        reslut = data;
                    }
                });*/



                return reslut;
            }
        });

        var loadTagNum=0;


        function loadTagShow(num){
            loadTagNum+=num;
            if(loadTagNum>0)
            {
                $("#PopupBackground").show();
                $("#css3Loading").show();
            }
            else
            {
                $("#PopupBackground").hide();
                $("#css3Loading").hide();
                loadTagNum=0;
            }
        }


    </script>

    <script src="/Public/car_files/m_shopCart.js" type="text/javascript"></script>


</body>
</html>