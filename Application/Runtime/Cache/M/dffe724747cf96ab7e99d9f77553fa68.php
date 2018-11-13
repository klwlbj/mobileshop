<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0038)http://m.360kad.com/Order/GetOrderInfo -->
<html style="font-size: 247.867px; zoom: 1;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <title>确认订单</title>

    <link href="/Public/order_files/vkad.reset.css" rel="stylesheet" type="text/css">
    <link href="/Public/order_files/orderDetails.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" async="" src="/Public/order_files/ga.js"></script><script src="/Public/order_files/conversion.js" type="text/javascript"></script><script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script>
    <script src="/Public/order_files/jquery-1.5.1.min.js" type="text/javascript"></script>
    <script src="/Public/order_files/jquery.cookie.js" type="text/javascript"></script>
    <style type="text/css">
        /*弹出层及其弹出层里面的元素的CSS样式*/
        .PopupBackground { position: fixed !important; /*ie7 ff*/ position: absolute; height: 100%; width: 100%; top: 0px; left: 0px; z-index: 99; background-color: black; -moz-opacity: 0.2; opacity: 0.2; filter: alpha(opacity=20); display: none; }
        /*弹出层*/
        .Popup1, .Popup2 { position: fixed !important; /*ie7 ff*/ position: relative; background-color: black; -moz-opacity: 0.9; opacity: 0.9; filter: alpha(opacity=90); /*height:120px;*/ width: 220px; top: 50%; left: 50%; text-align: center; z-index: 9999; margin-left: -105px !important; margin-top: -50px !important; -webkit-border-radius: 5px; -moz-border-radius: 5px; box-shadow: 5px 5px 50px #000000; display: none; }

        .Popup_closs_a { width: 22px; height: 22px; font-size: 16px; line-height: 22px; font-weight: bold; color: #000000; background-color: #FFFFFF; position: absolute; top: 2px; right: 2px; display: none; }

        .Popup1 .remove, .Popup2 .remove { padding: 20px 10px 8px 16px; border-bottom: 1px #939393 solid; color: #FFF; font-size: 16px; line-height: 28px; text-align: center; }

        .remove span { display: block; width: 28px; height: 28px; margin: 0px; background-image: url(//res.360kad.com/theme/mobile/img/qd_ico1.png); background-repeat: no-repeat; background-position: 0px 0px; position: absolute; left: 16px; top: 20px; }

        .remove i { font-style: normal; color: #FF0000; padding: 0 2px; text-indent: 0px; }

        .Popup1 .btn, .Popup2 .btn { padding: 10px; height: 30px; }

        .btn .ok { display: block; float: left; background: #FFF; width: 90px; height: 30px; line-height: 30px; text-align: center; color: #000; -webkit-border-radius: 3px; -moz-border-radius: 3px; }

        .btn .cancel { display: block; float: right; background: #FFF; width: 90px; height: 30px; line-height: 30px; text-align: center; color: #000; -webkit-border-radius: 3px; -moz-border-radius: 3px; }

        .btn .ok2 { display: block; margin: 0 auto; background: #FFF; width: 90px; height: 30px; line-height: 30px; text-align: center; color: #000; -webkit-border-radius: 3px; -moz-border-radius: 3px; }
    </style>
</head>
<body>





<form action="/index.php/M/Index/dd" id="orderSubmit" method="post">
    <section class="order-details-wrap">
        <div class="order-details-title">
            <span class="title-left" onclick="javascript: history.go(-1);"></span>
            <span class="title-center">确认订单</span>
        </div>

<input type="hidden" id="cartType" name="cartType" value="0">
            <input type="hidden" id="IsUsedPoints" name="IsUsedPoints" value="0">
            <input type="hidden" id="h_Points" value="200">

                        <div class="order-details-content">
                            <div class="details-title clearfix">
                                <p class="details-title-size">驼铃商贸</p>
                                <p class="details-title-price">
                                    合计<span>￥<?php echo ($hj); ?></span>
                                </p>
                            </div>

<?php if(is_array($res)): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="details-content-wrap" onclick="window.location.href='/index.php/M/Index/detail/id/<?php echo ($vo["id"]); ?>'">
    <div class="details-content-prod">
        <div class="prod-wrap display-box">
            <p class="prod-pic box-flex">
                <img src="<?php echo ($vo["max_thumb"]); ?>">
            </p>
            <div class="prod-cont box-flex">
                <p class="prod-name"><?php echo ($vo["goods_name"]); ?></p>
                <p class="prod-price">
                    <span class="sale-price">
                        价格：<i>
                            ¥<?php echo ($vo["shop_price"]); ?>
                        </i>
                    </span>
                    <span class="price-num">x<?php echo ($vo["count"]); ?></span>
                </p>
            </div>
        </div>
    </div>
</div><?php endforeach; endif; else: echo "" ;endif; ?>
                            <style>
                                .address{
                                    max-width: 10%;
                                    display: inline;
                                    appearance:radio;
                                    -moz-appearance:radio; /* Firefox */
                                    -webkit-appearance:radio; /* Safari 和 Chrome */
                                }
                            </style>
</div>
<style>
    .add{
        display: block;
        width:auto;
        margin:auto;
        margin-top: 5%;
        height:10%;
        border:none;
        border-radius: 6px;

    }
</style>
            <div class="order-details-remarks display-box" style="margin-bottom: 0rem; height: auto;">
                <i style="color: #f60;font-family: serif;margin-right: 3px;">*</i>
                <p style="display: inline;" class="remarks-left box-flex">地址选择：</p><br>
                <?php if((count($address) == 0)): ?><button class="add" onclick="location='/index.php/M/Index/addaddress'">点击 新增收货地址</button><?php endif; ?>
                <?php if(is_array($address)): $i = 0; $__LIST__ = $address;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><label><input class="address" name="address" type="radio" value="<?php echo ($vo["id"]); ?>" <?php if(count($address)==1)echo'checked'; if($vo['set']==1)echo'checked';?>/>地址：<?php echo ($vo["province"]); echo ($vo["city"]); echo ($vo["district"]); echo ($vo["address"]); ?><br>联系人：<?php echo ($vo["username"]); ?>&nbsp手机号：<?php echo ($vo["phone"]); ?></label><br><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>


            <div class="order-details-remarks display-box">
                <p class="remarks-left box-flex">订单备注：</p>
                <p class="remarks-right box-flex"><input type="text" name="msg" id="Remark" value="" placeholder="限50字内" maxlength="50" onblur="OrderRemark()"></p>
            </div>

            <div class="order-details-invoice clearfix">
                <div class="invoice-title">
                    <p class="invoice-left">是否需要发票</p>
                    <div class="invoice-right">
                        <div id="isInvoice" class="choice-btn">
                            <i></i>
                        </div>
                    </div>
                </div>
                <div class="invoice-content" style="display: none;">
                    <p class="invoice-type">发票类型：普通发票</p>
                    <p class="invoice-input"><input type="text" name="fptt" id="InvoiceTitle" value="" placeholder="请输入发票抬头" maxlength="20" onblur="Invoice()"></p>
                </div>
            </div>

            <div class="order-details-footer">
                <p class="footer-title clearfix">
                    <span class="footer-title-left">商品金额</span><span class="footer-title-right">
                        ￥<?php echo ($hj); ?>
                    </span>
                </p>
                <div class="footer-cont">
                    <p class="footer-cont-size clearfix">
                        <span class="footer-cont-left">运费</span><span class="footer-cont-right">￥0.00</span>
                    </p>
                </div>
            </div>
            <div class="order-details-nav display-box">
                <div class="order-nav-left box-flex">总计：<span id="sumprice">¥<?php echo ($hj); ?></span></div>
                <div class="order-nav-right box-flex " <?php if(count($address)>0)echo'onclick="return checkFrom();"'; else echo'onclick="return address();"';?> id="orderSubmit">提交订单</div>
            </div>
       <!-- 弹出层背景-->
        <div class="PopupBackground" id="PopupBackground"></div>
        <!-- 第一个弹出层-->
        <div class="Popup1" id="Popup1">
            <p class="remove" id="alertBoxMsg">提示信息</p>
            <p class="btn" id="btn"><a class="ok2" onclick="btnYesButton();">确定</a></p>
        </div>
    </section>
<input type="hidden" name="data" value="json_decode(<?php echo ($res); ?>)" />
</form>




    <!-- 谷歌统计 start -->
    <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-3051632-5']);
        _gaq.push(['_setDomainName', '.360kad.com']);
        _gaq.push(['_setAllowHash', false]);
        _gaq.push(['_addOrganic', 'soso', 'w']);
        _gaq.push(['_addOrganic', 'youdao', 'q']);
        _gaq.push(['_addOrganic', 'sogou', 'query']);
        _gaq.push(['_addOrganic', '360', 'q']);
        _gaq.push(['_addOrganic', 'baidu', 'word']);
        _gaq.push(['_addOrganic', 'baidu', 'q1']);
        _gaq.push(['_addOrganic', 'so.com', 'q']);
        _gaq.push(['_trackPageview']);

        (function () {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : '//www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

    </script>
    <script language="javascript" type="text/javascript" async="async" src="/Public/order_files/ctr_v2.js"></script>
    <script type="text/javascript">
        $('input').focus(function(){
            if(isIOS()){
                $('.order-details-nav').css('position','static');
                $('.order-details-wrap').css('padding-bottom','0');
            }
        });
        $('input').blur(function(){
            if(isIOS()){
                $('.order-details-nav').css('position', 'fixed');
                $('.order-details-wrap').css('padding-bottom','1.2rem');
            }
        });
        //判断是否为IOS
        function isIOS(){
            if (/ipad|iphone|mac/i.test(navigator.userAgent)){
                return true;
            }else{
                return false;
            }
        }
        function showdiv1(msg, action) {
            $("#alertBoxMsg").html(msg);
            document.getElementById("Popup1").style.display = "block";
            document.getElementById("PopupBackground").style.display = "block";
            if (typeof(action)==='function') {
                $('.ok2').unbind('click').bind('click',function(){
                    btnYesButton();
                    action.call();
                });
            }
        }
        function btnYesButton() {
            document.getElementById("Popup1").style.display = 'none';
            document.getElementById("PopupBackground").style.display = 'none';
        }
        // $("button").click(function(){
        //     $("p").slideToggle();
        // });
        function address(){
            showdiv1('请创建新地址！', 0);
            $('.order-nav-right.box-flex').removeClass('end');
        }
        function checkFrom() {
            $('.order-nav-right.box-flex').addClass('end');
            _gaq.push(['_trackEvent', '确认订单页面', '提交订单-按钮', '0', 0]);
            if($('#isInvoice').hasClass('on'))
            {
                if($('#InvoiceTitle').val().length==0)
                {
                    showdiv1('请输入发票抬头！', 0);
                    $('.order-nav-right.box-flex').removeClass('end');
                    return false;
                }
            }


            if($("label.address").checked==true ||$(".address").val==null)
            {
                showdiv1('请选择地址！', 0);
                $('.order-nav-right.box-flex').removeClass('end');
                return false;
            }
            //
            // if($('#truename').val().length < 2 || $('#truename').val().length >10)
            // {
            //     showdiv1('姓名不正确！', 0);
            //     $('.order-nav-right.box-flex').removeClass('end');
            //     return false;
            // }

            // if($('#address').val().length < 10 || $('#address').val().length >80)
            // {
            //     showdiv1('请输入详细地址！', 0);
            //     $('.order-nav-right.box-flex').removeClass('end');
            //     return false;
            // }



            ctrActionsend('submit_order');
            $('#orderSubmit').submit();
        }


        function Invoice()
        {
            if($('#InvoiceTitle').val().length>0)
            {
                $.cookie('InvoiceTitle',$('#InvoiceTitle').val(),{ expires: 1, path: '/', domain: '360kad.com' })
            }
        }

        function back()
        {
            window.location.href="/Cart/Index";
        }

        function OrderRemark()
        {
            if($('#Remark').val().length>0)
            {
                $.cookie('Remark',$('#Remark').val(),{ expires: 1, path: '/', domain: '360kad.com' })
            }
            else
            {$.cookie('Remark','',{ expires: 1, path: '/', domain: '360kad.com' })}
        }
        $(function () {
            if(0==0)
            {
                $('.order-all-discount').hide();
            }
            if($.cookie('IsUsePoint')==1)
            {
                $('#isIntegral').addClass('on');
                $('.footer-cont-size.clearfix').each(function () {
                    if ($(this).find('.footer-cont-left').text() == '积分抵扣') {
                        if ($(this).find('.footer-cont-right').text().replace('-￥', '') == '0.00') {
                            if ($('.choice-btn').hasClass('on')) {
                                $(this).find('.footer-cont-right').text('-￥' + $('#point').val());
                                $('#sumprice').text("¥" + (parseFloat($('#sumprice').text().replace('¥', '')) - parseFloat($('#point').val())).toFixed(2));
                                $('#IsUsedPoints').val(1);
                                $.cookie('IsUsePoint',"1",{ expires: 1, path: '/', domain: '360kad.com' });
                            }
                        }
                    }
                })
            }
            if($.cookie('IsNeedInvoice')==1)
            {
                $('#isInvoice').addClass('on')
                $('.invoice-content').show();
                $('#InvoiceTitle').val($.cookie('InvoiceTitle'));
            }
            if($.cookie('Remark'))
            {
                $('#Remark').val($.cookie('Remark'))
            }

            $('.tc-wrap .discount-cont').click(function () {
                $(this).hasClass('cur') ? $(this).removeClass('cur').siblings('.tc-cont').show() : $(this).addClass('cur').siblings('.tc-cont').hide();
            });
            //是否积分抵扣按钮
            $('#isIntegral').click(function () {
                $(this).hasClass('on') ? $(this).removeClass('on') : $(this).addClass('on');
                $('.footer-cont-size.clearfix').each(function () {
                    if ($(this).find('.footer-cont-left').text() == '积分抵扣') {
                        if ($(this).find('.footer-cont-right').text().replace('-￥', '') == '0.00') {
                            if ($('.choice-btn').hasClass('on')) {
                                $(this).find('.footer-cont-right').text('-￥' + $('#point').val());
                                $('#sumprice').text("¥" + (parseFloat($('#sumprice').text().replace('¥', '')) - parseFloat($('#point').val())).toFixed(2));
                                $('#IsUsedPoints').val(1);
                                $.cookie('IsUsePoint',"1",{ expires: 1, path: '/', domain: '360kad.com' });
                            }
                        }
                        else {
                            //if (!$('.choice-btn').hasClass('on')) {
                            $(this).find('.footer-cont-right').text('-￥0.00')
                            $('#sumprice').text("¥" + (parseFloat($('#sumprice').text().replace('¥', '')) + parseFloat($('#point').val())).toFixed(2));
                            $('#IsUsedPoints').val(0);
                            $.cookie('IsUsePoint',"0",{ expires: 1, path: '/', domain: '360kad.com' });
                            //}
                        }
                    }
                })
            });
            //是否发票
            $('#isInvoice').click(function () {
                if ($(this).hasClass('on')) {
                    $(this).removeClass('on');
                    $('.invoice-content').hide();
                    $.cookie('IsNeedInvoice', "0",{ expires: 1, path: '/', domain: '360kad.com' });
                } else {
                    $(this).addClass('on');
                    $('.invoice-content').show();
                    $.cookie('IsNeedInvoice', "1",{ expires: 1, path: '/', domain: '360kad.com' });
                }
            });

        });
    </script>



</body></html>