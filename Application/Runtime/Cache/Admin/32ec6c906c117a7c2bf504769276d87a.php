<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"><!--Head--><head>
    <meta charset="utf-8">
    <title>商城-源多享</title>
    <meta name="description" content="login page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="http://www.shop.com/Application/Admin/Public/style/bootstrap.css" rel="stylesheet">
    <link href="http://www.shop.com/Application/Admin/Public/style/font-awesome.css" rel="stylesheet">
    <!--Beyond styles-->
    <link id="beyond-link" href="http://www.shop.com/Application/Admin/Public/style/beyond.css" rel="stylesheet">
    <link href="http://www.shop.com/Application/Admin/Public/style/demo.css" rel="stylesheet">
    <link href="http://www.shop.com/Application/Admin/Public/style/animate.css" rel="stylesheet">
</head>
<!--Head Ends-->
<!--Body-->

<body>
    <div class="login-container animated fadeInDown">
        <form action="" method="post">
            <div class="loginbox bg-white">
                <div class="loginbox-title">SIGN IN</div>
                <div class="loginbox-textbox">
                    <input value="admin" class="form-control" placeholder="username" name="username" type="text">
                </div>
                <div class="loginbox-textbox">
                    <input class="form-control" placeholder="password" name="password" type="password">
                </div>
                <div class="loginbox-textbox">
                    <input  class="form-control" style="width:120px; height:50px; float:left;" placeholder="验证码" name="verify" type="text">
                    <img src="/x/index.php/Admin/Login/verify" style="cursor:pointer;" onclick="this.src='/x/index.php/Admin/Login/verify/'+Math.random();" height="50" width="100" border="0" >
                </div>
                <div class="loginbox-submit">
                    <input class="btn btn-primary btn-block" value="Login" type="submit">
                </div>
            </div>
                <div class="logobox">
                    <p class="text-center">商城-源多享</p>
                </div>
        </form>
    </div>
    <!--Basic Scripts-->
    <script src="http://www.shop.com/Application/Admin/Public/style/jquery.js"></script>
    <script src="http://www.shop.com/Application/Admin/Public/style/bootstrap.js"></script>
    <script src="http://www.shop.com/Application/Admin/Public/style/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="http://www.shop.com/Application/Admin/Public/style/beyond.js"></script>




</body><!--Body Ends--></html>