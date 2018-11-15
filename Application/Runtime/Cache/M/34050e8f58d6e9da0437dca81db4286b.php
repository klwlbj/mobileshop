<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0029)http://m.360kad.com/Register/ -->
<html style="font-size: 250.667px; zoom: 1;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <title>注册页</title>
    <link href="/Public/reg_files/mkad.reset.css" rel="stylesheet" type="text/css">
    <link href="/Public/reg_files/mkad.common.css" rel="stylesheet" type="text/css">
    <link href="/Public/reg_files/Registration.css" rel="stylesheet" type="text/css">
    <script src="/Public/reg_files/conversion.js" type="text/javascript"></script>
    <script src="/Public/js/jquery.min.js" type="text/javascript"></script>
    <style>
        .background-gray { background-color: #b5b5b5; }
    </style>
<script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script></head>
<body>
    <header id="header">
        <section class="header_logo"><a href="javascript:history.go(-1)">返回</a></section>
        <span class="header_t">用户注册</span>
        <section class="header_r"><a href="<?php echo U('Index/index');?>"></a></section>
    </header>
    <script>
        $(function(){
            $('.phone').cbLen(11,12);$('.phone').cbPhone();
            $('.cbSpecialCharacter').cbSpecialCharacter();
        })
    </script>
    <form action="" method="post">
    <section class="m-registration-wrap">
        <div class="reg-input-wrap display-box">
            <p class="reg-left box-flex1">手机号码 ：</p>
            <p class="reg-right box-flex1 input"><input class="phone" type="number" name="phone" id="phone" value="" placeholder="请输入手机号码" oninput="checkTextLength(this, 11)" onkeyup="this.value=this.value.replace(/\D/g)" onafterpaste="this.value=this.value.replace(/\D/g)" onblur="IfRegistered();"></p>
        </div>
        <div class="reg-input-wrap relative display-box">
            <p class="reg-left box-flex1">昵<i class="textIndent1"></i> 称 ：</p>
            <p class="reg-right box-flex1 input"><input type="" name="nick" id="nick" value="" maxlength="20" placeholder="请设置6位数以上字母,数字"></p>
        </div>
        <div class="reg-input-wrap relative display-box">
            <p class="reg-left box-flex1">密<i class="textIndent1"></i> 码 ：</p>
            <p class="reg-right pass-word box-flex1 input"><input class="cbSpecialCharacter" type="password" name="password" id="password" value="" maxlength="20" placeholder="请设置6位数以上密码"></p>
            <!-- <p id="isShowpwd" class="reg-eye"></p> -->
        </div>


        <div  class="reg-input-wrap relative display-box"style="width: 50%; display: inline-block;" >

            <p class="reg-left box-flex1"style="width: 50%;">验证码 ：</p>
            <p class="reg-right pass-word box-flex1 input"><input class="cbSpecialCharacter" type="text" name="verify" id="" value="" maxlength="20" placeholder="验证码"></p>

            <!-- <p id="isShowpwd" class="reg-eye"></p> -->

        </div>
        <div style="display: inline; width:20%;" id="captcha-container"><img width="40%" class="left15" height="50" alt="验证码" src="<?php echo U('M/Index/verify',array());?>" title="点击刷新"></div>






        <!--<div id="isSelected" class="reg-sm-wrap clearfix"><i id="ty" class=""></i><span><a href="#">同意注册协议</a></span></div>-->


        <input id="registration" class="btn btn-blue background-gray"  type="submit" value="注册">


    </section>

    </form>
    <div style="text-align: center;margin-top: 5%;font-size: 18px">密码请输入六位及以上数字及英文</div>
    <script>
        // 验证码生成  
        var captcha_img = $('#captcha-container').find('img')
        var verifyimg = captcha_img.attr("src");
        captcha_img.attr('title', '点击刷新');
        captcha_img.click(function(){
            if( verifyimg.indexOf('?')>0){
                $(this).attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(this).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });

    </script>
    <script src="/Public/reg_files/Zepto.kad.min.js" type="text/javascript"></script>
    <script src="/Public/reg_files/popupJS.js" type="text/javascript"></script>
    <script type="text/javascript" src="/Public/js/base_form.js" ></script>
    <script type="text/javascript">

        //选中radio
        // $("#isSelected").click(function () {
        //     $(this).children('i').hasClass('end') ? $(this).children('i').removeClass('end') : $(this).children('i').addClass('end');
        //     ifShow();
        // });


        // function ifShow() {
        //     var an = $("#ty").attr("class")
        //     alert(an);
        //
        //     var phone = $("#phone").val();
        //     var nick = $("#nick").val();
        //     var password = $("#password").val();
        //
        //     if (phone.length >= 11 && password.length >= 6 && nick.length  >= 6) {
        //         $("#registration").removeClass("background-gray");
        //         $('#registration').attr("disabled",false);
        //     }
        //     else {
        //         $('#registration').attr("disabled",true);
        //         $("#registration").addClass("background-gray");
        //
        //     }
        // }

    </script>


</body>
</html>