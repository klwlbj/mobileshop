// JavaScript Document
$(document).ready(function(e) {
    $(".login_but").click(function(e) {
		var td = document.loginform;
        var pass = td.password.value;
		var user = td.user.value;
		var code = td.code.value;
		var url = td.url.value;
		if(user.length==0){
			$(".err_tip").html("用户名不能为空！");
			td.user.focus();
			return false;
		}
		if(pass.length==0){
			$(".err_tip").html("密码不能为空！");
			td.password.focus();
			return false;
		}
		if(code=="" || code.length<4){
			$(".err_tip").html("验证码有误");
			td.code.focus();
			return false;
		}
		$(".err_tip").html('');
		td.login.value = '登录中..';
		ajax({
		 method : 'post',
		 url : think+'/login/index',
		 data : {
			'user' : user,
			'pwd' : pass,
			'code' : code,
		 },
		 success : function (text) {
		  var text = eval("(" + text + ")");
		  td.login.value = '登  录';
		  gcode();
		  if(text==1){
			window.location.href = think+'/index/index';
		  }else if(text==2){
			$(".err_tip").html("密码错误！");
			return false;
		  }else if(text==3){
			$(".err_tip").html("验证码有误！");
			return false;
		  }else if(text==4){
			$(".err_tip").html("登录信息不完全！");
			return false;
		  }else if(text==5){
			$(".err_tip").html("禁止登陆！");
			return false;
		  }else if(text==6){
			$(".err_tip").html("用户名不存在！");
			return false;
		  }else if(text==0){
			$(".err_tip").html("登录信息不完全！");
			return false;
		  }else{
		  	$(".err_tip").html(text);
			return false;
		  }
		},
		 async : true
	   });
  	   return false;
    });
});