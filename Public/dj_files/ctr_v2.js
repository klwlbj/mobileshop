var d = document;
var openid = ctrCookie("kadUnionId");
var K2_Web_UserCode = ctrCookie("K2_Web_UserCode");

if(document.addEventListener){
	 document.addEventListener("DOMContentLoaded",domReady,false);
}else{
	IEContentLoaded(domReady);
}

 //兼容IE的domReady
function IEContentLoaded(fn){
	 var done = false,
	 init = function(){
		 if(!done){
			 done = true;
			 fn();
		 }
	 };
	 (function(){
		 try {
			 d.documentElement.doScroll('left');
		 }catch(e){
			 setTimeout(arguments.callee,50);
			 return;
		 }
		 init();
	 })(); 
	 d.onreadystatechange = function(){
		 if(d.readyState == 'complete'){
			 d.onreadystatechange = null;
			 init();
		 }
	 }
}


/*    2.0版本代码   */
function domReady(){
	var tq_online = getElementsByClassName("tq_online","*");
	var tq_box = getElementsByClassName("tq_box","*");
	var tq_r_box = getElementsByClassName("tq_r_box","*");
	var fax_call_back = getElementsByClassName("fax_call_back","*");
	var biz_box = getElementsByClassName("biz_box","*");
	var biz_r_box = getElementsByClassName("biz_r_box","*");
	var tq_cs_box = getElementsByClassName("tq_cs_box","*");
	var add_to_card = getElementsByClassName("add_to_card","*");
	var reg_button_land = getElementsByClassName("reg_button_land","*");
	var reg_button_succ = getElementsByClassName("reg_button_succ","*");
	var reg_button_fail = getElementsByClassName("reg_button_fail","*");
	var land_button_home = getElementsByClassName("land_button_home","*");
	var land_button_succ = getElementsByClassName("land_button_succ","*");
	var land_button_fail = getElementsByClassName("land_button_fail","*");
	var demand_registration = getElementsByClassName("demand_registration","*");
	var join_now_wap = getElementsByClassName("join_now_wap","*");
	
	if (document.addEventListener) {		//非IE8或以下版本
		for(var i=0;i<tq_online.length;i++){
			tq_online[i].addEventListener("click", function() {ctr_v2(event,"tq_online")} , false);
		} 
		
		for(var i=0;i<tq_box.length;i++){
			tq_box[i].addEventListener("click", function() {ctr_v2(event,"tq_box")} , false);
		} 
		
		for(var i=0;i<tq_r_box.length;i++){
			tq_r_box[i].addEventListener("click", function() {ctr_v2(event,"tq_r_box")} , false);
		} 
		
		for(var i=0;i<fax_call_back.length;i++){
			fax_call_back[i].addEventListener("click", function() {ctr_v2(event,"fax_call_back")} , false);
		} 
		
		for(var i=0;i<biz_box.length;i++){
			biz_box[i].addEventListener("click", function() {ctr_v2(event,"biz_box")} , false);
		} 
		
		for(var i=0;i<biz_r_box.length;i++){
			biz_r_box[i].addEventListener("click", function() {ctr_v2(event,"biz_r_box")} , false);
		} 
		
		for(var i=0;i<tq_cs_box.length;i++){
			tq_cs_box[i].addEventListener("click", function() {ctr_v2(event,"tq_cs_box")} , false);
		} 
		
		for(var i=0;i<add_to_card.length;i++){
			add_to_card[i].addEventListener("click", function() {ctr_v2(event,"add_to_card")} , false);
		} 
		
		for(var i=0;i<reg_button_land.length;i++){
			reg_button_land[i].addEventListener("click", function() {ctr_v2(event,"reg_button_land")} , false);
		} 
		
		for(var i=0;i<reg_button_succ.length;i++){
			reg_button_succ[i].addEventListener("click", function() {ctr_v2(event,"reg_button_succ")} , false);
		} 
		
		for(var i=0;i<reg_button_fail.length;i++){
			reg_button_fail[i].addEventListener("click", function() {ctr_v2(event,"reg_button_fail")} , false);
		} 
		
		for(var i=0;i<land_button_home.length;i++){
			land_button_home[i].addEventListener("click", function() {ctr_v2(event,"land_button_home")} , false);
		} 
		
		for(var i=0;i<land_button_succ.length;i++){
			land_button_succ[i].addEventListener("click", function() {ctr_v2(event,"land_button_succ")} , false);
		} 
		
		for(var i=0;i<land_button_fail.length;i++){
			land_button_fail[i].addEventListener("click", function() {ctr_v2(event,"land_button_fail")} , false);
		} 
		
		for(var i=0;i<demand_registration.length;i++){
			demand_registration[i].addEventListener("click", function() {ctr_v2(event,"demand_registration")} , false);
		} 
		
		for(var i=0;i<join_now_wap.length;i++){
			join_now_wap[i].addEventListener("click", function() {ctr_v2(event,"join_now_wap")} , false);
		}
	}
}

 
 
 

function ctr_v2(event,act) {
	function t(e) {
        return encodeURIComponent(e)
    }
    function n(e) {
        return decodeURIComponent(e)
    }
    function r(t) {
        t.indexOf('"') === 0 && (t = t.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\"));
        try {
            t = decodeURIComponent(t.replace(e, " "))
        } catch(n) {
            return
        }
        return t
    }
    function i(e) {
        var t = new Date;
        return t.setDate(t.getDate() + e),
        t.toUTCString()
    }
    function s(e, n, r, s, o) {
        document.cookie = [t(e), "=", t(n), r ? "; expires=" + i(r) : "", s ? "; path=" + s: "", o ? "; domain=" + o: ""].join("")
    }

    function o(e) {
        var t = "",
        i = document.cookie ? document.cookie.split("; ") : [];
        for (var s = 0,
        o = i.length; s < o; s++) {
            var u = i[s].split("="),
            a = n(u.shift()),
            f = u.join("=");
            if (e === a) {
                t = r(f);
                break
            }
        }
        return t
    }
    function u() {
        var e = (new Date).valueOf(),
        t = (Math.random() * 1e12).toFixed(0),
        n = e + "" + t;
        return n
    }
    function a(e) {						//新建image对象,通过请求image src的方式传递拼接好的信息给服务器端
        var t = new Image(1, 1);
		//alert(e);
        t.src = e
    }
    function f() {
        var e = arguments[0],
        n = "0";
        e || (n = "1", e = u(), s("__juid", e, 3650, "/", ".360kad.com"));
        var r = document.URL,
        i = document.referrer,
        a = window.screen.width + "*" + window.screen.height,
        f = (Math.random() * 1e6).toFixed(0),
        l = o("__newnuid");
		
		var nuid_1;

		if(K2_Web_UserCode=="" || K2_Web_UserCode==undefined ||K2_Web_UserCode=='undefined'){
			if(openid=="" || openid==undefined ||openid=='undefined'){
				nuid_1 = t(e);
			}else{
				nuid_1 = openid;
			}
			
		}else{
			nuid_1=K2_Web_UserCode;
		}	
		
        return "http://ctr.360kad.com/?juid=" + nuid_1 + "&url=" + t(r) + "&ref_url=" + t(i) + "&sr=" + t(a) + "&rand=" + t(f) + "&newnuid=" + t(l) + "&isnew=" + t(n);
    }
    var e = /\+/g;
	if(act==undefined||act==""){
    	a(f(o("__juid")))					//刷新页面调用方法,不加上action行为参数
	}
	else{
		a(f(o("__juid")) + "&action=" + t(act))
	}
	
	ctrActionsend = function() {		//点击事件触发该方法加上action行为
		if(arguments[1] != undefined && arguments[1] != null && arguments[1] != ''){
			if(arguments[2] != undefined && arguments[2] != null && arguments[2] != ''){
				a(f(o("__juid")) + "&action=" + t(arguments[0]) + "&p_id=" + t(arguments[1]) + "&p_type=" + t(arguments[2]));
			}
			else{
				a(f(o("__juid")) + "&action=" + t(arguments[0]) + "&p_id=" + t(arguments[1]));
			}
		}else{
			a(f(o("__juid")) + "&action=" + t(arguments[0]));
		}
    }
	
    ctrActionsend2 = function() {		//在搜索后的页面会调用该方法
        var e = arguments[0],
        n = arguments[1],
        r = arguments[2],
        i = arguments[3];
        a(f(o("__juid")) + "&action=" + t(arguments[0]) + "&mainpage=" + t(arguments[1]) + "&area=" + t(arguments[2]) + "&pids=" + t(arguments[3]))
    }
};
ctr_v2()


function getElementsByClassName(className,tagName) { 		//兼容IE低版本getElementsByClassName方法
    tagName=tagName||"*";                                    //参数tagName可以不写。
    if (document.getElementsByClassName) {                    //如果浏览器支持getElementsByClassName就直接用
        return document.getElementsByClassName(className);
    }/*else { 
        var tag= document.getElementsByTagName(tagName);    //获取指定元素
        var tagAll = [];                                    //用于存储符合条件的元素
        for (var i = 0; i < tag.length; i++) {                //遍历获得的元素
            for(var j=0,n=tag[i].className.split(' ');j<n.length;j++){    //遍历此元素中所有class的值,如果包含指定的类名,就赋值给tagnameAll
                if(n[j]==className){
                    tagAll.push(tag[i]);
                    break;
                }
            }
        }
        return tagAll;
    }*/
}




/*	  1.0版本兼容代码    */

function ctrAddtocart() {
    ctrActionsend("addtocart")
}
function ctrCallback() {
    ctrActionsend("callback")
}
function ctrOnlinechat() {
    ctrActionsend("onlinechat")
}
function ctrTqBox() {
    ctrActionsend("tq_box")
}
function ctrTqBoxR() {
    ctrActionsend("tq_r_box")
}
function ctrTqOnline() {
    ctrActionsend("tq_online")
}
function ctrBizBox() {
    ctrActionsend("biz_box")
}
function ctrBizBoxR() {
    ctrActionsend("biz_r_box")
}
function ctrFaxCallBack() {
    ctrActionsend("fax_call_back")
}

function ctrCookie(name) {
    var arr = document.cookie.match(new RegExp("(^| )" + name + "=([^;]*)(;|$)"));
    if (arr != null) return unescape(arr[2]);
    return null;
}