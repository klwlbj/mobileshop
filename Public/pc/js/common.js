var abspath = '';
/* 创建异步方法 */
function createXHR() {
	if (typeof XMLHttpRequest != 'undefined') {
		return new XMLHttpRequest();
	} else if (typeof ActiveXObject != 'undefined') {
		var version = [
									'MSXML2.XMLHttp.6.0',
									'MSXML2.XMLHttp.3.0',
									'MSXML2.XMLHttp'
		];
		for (var i = 0; version.length; i ++) {
			try {
				return new ActiveXObject(version[i]);
			} catch (e) {
				//跳过
			}	
		}
	} else {
		throw new Error('您的系统或浏览器不支持XHR对象！');
	}
}
//名值对转换为字符串
function paramsjoin(data) {
	var arr = [];
	for (var i in data) {
		arr.push(encodeURIComponent(i) + '=' + encodeURIComponent(data[i]));
	}
	return arr.join('&');
}
//封装ajax
function ajax(obj) {
	var xhr = createXHR();
	obj.url = obj.url + '/rand/' + Math.random();
	obj.data = paramsjoin(obj.data);
	if (obj.method === 'get') obj.url += obj.url.indexOf('?') == -1 ? '?' + obj.data : '&' + obj.data;
	if (obj.async === true) {
		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4) {
				callback();
			}
		};
	}
	xhr.open(obj.method, obj.url, obj.async);
	if (obj.method === 'post') {
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.send(obj.data);	
	} else {
		xhr.send(null);
	}
	if (obj.async === false) {
		callback();
	}
	function callback() {
		if (xhr.status == 200) {
			obj.success(xhr.responseText);			//回调传递参数
		} else {
			//alert('获取数据错误！错误代号：' + xhr.status + '，错误信息：' + xhr.statusText,'error');// 屏蔽错误信息
		}	
	}
}
/* JS常用函数 v.0.0.1 */
function G(objName){if(document.getElementById(objName)){return eval('document.getElementById("'+objName+'")')}else{return eval('document.all.'+objName)}} //取得Id的对象
function hide(a){
/*	a = G(a);
	if(!a) return;
	a.style.display = "none";
	a.style.visibility = 'hidden'; */
	movechild(a);
}
function movechild(a){a=G(a);if(!a) return;document.body.removeChild(a);}
/* 获取物理高度 */
var getheight=function(){
	var f=document,a=f.body,d=f.documentElement,c=f.compatMode=="BackCompat"?a:f.documentElement;
	return Math.max(d.scrollHeight,a.scrollHeight,c.clientHeight)
};
/* 获取物理宽度 */
var getwidth=function(){
	var f=document,a=f.body,d=f.documentElement,c=f.compatMode=="BackCompat"?a:f.documentElement;
	return Math.max(d.scrollWidth,a.scrollWidth,c.clientWidth)
};
//影藏遮罩层
function Hide(){
 hide('vmask');
 movechild('vmask');
}
/* 创建遮罩层 */
function cmask(){
	theBody=document.body;
	v = document.createElement("div");
	v.id = "vmask";
	v.className = "cscreen";
	v.style.display = "block";
	v.style.visibility = 'visible';
    v.style.width = getwidth()+"px";
	v.style.height = getheight()+"px";
    theBody.appendChild(v);
}
/* 优化遮罩层 ps:随着屏幕的扩大或者缩小自动铺满 */
window.onresize = function(){
  if(G("vmask")){
    var obj = G("vmask");
	obj.style.width = getwidth() + 'px';
	obj.style.height = getheight() + 'px';
  }
}
/* js判断元素是否在下标内 */
function in_array(key,array){
 for(var i in array){
	 if(array[i]==key){
		return true;
	 }
 }
 return false;
}
/* 确定元素所在的下标 */
function sub_array(needle, haystack){
	 var result = [];
	 for (i in haystack) {
		 if (haystack[i] == needle){
			 result.push(i);
		 }
	 }
	 return result;
}

/*
我的提示框
tipinfo:提示内容;
tiptype:提示内容;
time:显示时间;
loading:是否是loading显示 0或者不填 为正常显示
cgs:是否创建虚拟层 0或者不填 不创建
*/
function showtip(tipinfo,tiptype,time,cgs,loading){
	/*屏幕的宽*/
	var w=window.screen.availWidth;
	theBody=document.body;
	if($(".mytip_box").length==0){
		d = document.createElement("div");
		if(tiptype=='' || tiptype==undefined){ var tiptype = "提示";}
		if(time=='' || time==undefined){ var time = 2000;}
		if(cgs==1){cmask();}
		if(loading==undefined || loading==0){d.className="mytip_box";content='<h2><span>'+tiptype+'</span><a href="javascript:hidetip()">&times;</a></h2><h3>'+tipinfo+'</h3>';}else{d.className="mytip_box tiploading";content='<h2><span>'+tiptype+'</span></h2><h3 class="textright">'+tipinfo+'</h3>';}
		d.innerHTML=content;
		theBody.appendChild(d);
	}
	$(".mytip_box").css("left",parseInt((w-280)/2));
	$(".mytip_box").show();
	if(loading==undefined || loading==0){
		setTimeout(function(){
		  hidetip();
		},time);
	}
}
/*隐藏
cgs:是否创建虚拟层 0或者不填 不创建
*/
function hidetip(cgs){$(".mytip_box").hide().remove();if(cgs==undefined || cgs==0){}else{hide('cscreen')}}
$(document).ready(function(e) {
	//gototopicon
	$(window).scroll(function(){
	   var oheight = $(document).scrollTop();
	   if($(".goto_top").length>0){
		 (oheight>400) ? $(".goto_top").show() : $(".goto_top").hide();
	   }
	 });
	 $(".goto_top").click(function(e) {
	   $('html,php,body').animate({
				 scrollTop: 0
				}, 500
	   );   
	});  
});

/*检索*/
function checkseach(){
	if($("#seakeyword").val()==""){showtip('请输入您要检索的关键字！');return false;}
}

/*基本 提示框*/
function systip(tips){
	var tips = (tips == ''  || tips == undefined)  ? '提示' : tips;
	SimplePop.alert(tips,{type: "alert"});
}
/*加载中 提示框*/
function loading($tips){
	var tips = (tips == ''  || tips == undefined)  ? '数据加载中...' : tips;
	SimplePop.load(tips,{type: "load"});
}
/*确定 提示框*/
function sysconfirm(tips,fun1,fun2){
	var tips = (tips == ''  || tips == undefined)  ? '您确认此操作吗?' : tips;
	SimplePop.confirm(tips,{
		type: "error",
		confirm: function(){
			(fun1 == ''  || fun1 == undefined) ? "":fun1();
		},
		cancel: function(){
			(fun2 == ''  || fun2 == undefined) ? "":fun2();
		}
	});
}
function losepop(){
	 $(".popMain,.popMask").remove();
}
//关闭 SimplePop.closeSimplePop














