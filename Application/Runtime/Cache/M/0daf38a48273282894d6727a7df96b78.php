<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!-- saved from url=(0029)http://m.360kad.com/Register/ -->
<html style="font-size: 250.667px; zoom: 1;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <meta content="yes" name="apple-mobile-web-app-capable">
    <meta content="black" name="apple-mobile-web-app-status-bar-style">
    <meta content="telephone=no" name="format-detection">
    <title>登录页</title>
    <link href="/Public/reg_files/mkad.reset.css" rel="stylesheet" type="text/css">
    <link href="/Public/reg_files/mkad.common.css" rel="stylesheet" type="text/css">
    <link href="/Public/reg_files/Registration.css" rel="stylesheet" type="text/css">
    <script src="/Public/reg_files/conversion.js" type="text/javascript"></script>
    <style>
        .background-gray { background-color: #b5b5b5; }
    </style>
<script type="text/javascript">navigator.__defineGetter__('userAgent', function () { return 'Mozilla/5.0 (Linux; U; Android 4.1.1; zh-cn;  MI2 Build/JRO03L) AppleWebKit/534.30 (KHTML, like Gecko) Version/4.0 Mobile Safari/534.30 XiaoMi/MiuiBrowser/1.0'; });</script></head>
<body>
    <header id="header">
        <section class="header_logo"><a href="javascript:history.go(-1)">返回</a></section>
        <span class="header_t">用户登录</span>
        <section class="header_r"><a href="<?php echo U('Index/index');?>"></a></section>
    </header>

    <form action="" method="post">
    <section class="m-registration-wrap">
        <div class="reg-input-wrap display-box">
            <p class="reg-left box-flex1">手机号码 ：</p>
            <p class="reg-right box-flex1 input"><input type="number" name="phone" id="phone" value="" placeholder="请输入手机号码" oninput="checkTextLength(this, 11)" onkeyup="this.value=this.value.replace(/\D/g)" onafterpaste="this.value=this.value.replace(/\D/g)" onblur="IfRegistered();"></p>
        </div>

        <div class="reg-input-wrap relative display-box">
            <p class="reg-left box-flex1">密<i class="textIndent1"></i> 码 ：</p>
            <p class="reg-right pass-word box-flex1 input"><input  name="password" id="password" value="" maxlength="20" placeholder="请输入密码"></p>
            <!-- <p id="isShowpwd" class="reg-eye"></p> -->
        </div>

        <input class="submit_btn" type="submit" value="登录">
    </section>

    </form>

    <div class="space">
        <a class="register" href="/index.php/M/Index/reg">
            立即注册&gt;&gt;
        </a>
        <a class="forgetpwd" href="">
            忘记密码？
        </a>
    </div>

<style>

.space {
    padding: 10px 10px 0 10px;
    line-height: 20px;
}
 .space a {
    color: #1264ba;
    display: inline-block;
    line-height: 20px;
    font-size: 14px;
}

.register {
    text-align: left;
}

.forgetpwd {
    float: right;
}





.submit_btn{
    border-radius: 5px;
    background-color: #f03030;
    height: 45px;
    text-align: center;
    display: block;
    color: #FFF;
    font-size: 16px;
    line-height: 45px;
    border: none;
    margin-top: 10px;
    padding: 0 10px;
    width: 100%;
    outline: none;
    -webkit-appearance: button;
}
</style>
    <script src="/Public/reg_files/Zepto.kad.min.js" type="text/javascript"></script>
    <script src="/Public/reg_files/popupJS.js" type="text/javascript"></script>
    <script type="text/javascript">

        /*function ifShow() {
            var phone = $("#phone").val();
            var nick = $("#phone").val();
            var password = $("#nick").val();
            if (phone.length == 11 && password.length >= 6 && nick.length  >= 6) {
                $("#registration").removeClass("background-gray");
            }
            else {
                $("#registration").addClass("background-gray");
            }
        }*/

    </script>

</body>
</html>