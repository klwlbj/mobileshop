function getRequestURL_code(e,t){var n="6C57AB91A1308E26B797F4CD382AC79D",i=new Date,o=i.getFullYear(),s=i.getMonth()+1,a=i.getDate(),c=i.getHours(),r=i.getMinutes(),u=i.getSeconds(),d=o+"-"+s+"-"+a+" "+c+":"+r+":"+u;t.put("t",d),t.put("v","1.0"),t.containsKey("versionName")||t.put("versionName","3.3.3"),t.put("plat",$$.getPlat()),t.put("platform",$$.getPlatform()),t.containsKey("userId")&&(t.containsKey("loginToken")||t.put("loginToken",$$.getLoginToken()),t.containsKey("uDate")||t.put("uDate",$$.getUDate()));var p=t.keys().sort(),g="";p.length;for(var l in p){var h=p[l];g+=h+t.get(h)}for(var w=t.get("method")+g+n,m=$.md5(w),f=e+"?sign="+m,y=0;y<p.length;y++)f+="pageUrl"==p[y]?"&"+p[y]+"="+encodeURIComponent(t.get(p[y])):"&"+p[y]+"="+t.get(p[y]);return f}var Weixin={_url:$$.isPre?"http://premcp.ddky.com/weixin/rest.htm":"https://mcp.ddky.com/weixin/rest.htm",enc:$$.getQueryString("enc")||$.cookie("enc"),wuenc:$$.getQueryString("wuenc")||$.cookie("wuenc"),openId:$$.getQueryString("oenc")||$.cookie("oenc"),act:$$.getQueryString("act")||"",upd:$$.getQueryString("upd")||"",shareInfo:"",init:function(){$$.isWX?(this.toShare(),this.getEnc()):this.getEnc()},getEnc:function(){var e=this;if(this.enc)if(this.act&&"mydlBindWx"==this.act&&this.upd){var t=new $$.DMap;t.put("method","ddky.user.weixin.enc.check.bind"),t.put("enc",e.enc),t.put("upd",e.upd);var n=$$.getRequestURL(e._url,t);$.ajax({type:"get",url:n,cache:!0,async:!1,dataType:"jsonp",success:function(t){1==t.code?($.cookie("enc","",{expires:-1,domain:domain_way}),$$.alert({width:"260",height:"120",msg:"绑定失败，当前微信已绑定其他账号"})):0==t.code&&(e.toSaveUser(t.result),$.cookie("enc","",{expires:-1,domain:domain_way}))}})}else{var t=new $$.DMap;t.put("method","ddky.promotion.user.check"),t.put("enc",e.enc);var n=$$.getRequestURL(e._url,t);$.ajax({type:"get",url:n,cache:!0,async:!1,dataType:"jsonp",success:function(t){e.toSaveUser(t),$.cookie("enc","",{expires:-1,domain:domain_way})}})}else if(this.wuenc)if($$.getUserId()){var i=new $$.DMap;i.put("method","ddky.promotion.wxuser.bind"),i.put("wuenc",e.wuenc),i.put("userId",$$.getUserId());var o=$$.getRequestURL(e._url,i);$.ajax({type:"get",url:o,dataType:"jsonp",cache:!0,success:function(e){if(0==e.code)$.cookie("wuenc","",{expires:-1,domain:domain_way});else if(3008!=e.code&&3018!=e.code)return void console.log(e.msg)}})}else $.cookie("wuenc",this.wuenc,{domain:domain_way,path:"/"});else if(this.openId)if($$.getUserId()){var i=new $$.DMap;i.put("method","ddky.promotion.wxuser.bind"),i.put("oenc",e.openId),i.put("userId",$$.getUserId());var o=$$.getRequestURL(e._url,i);$.ajax({type:"get",url:o,dataType:"jsonp",cache:!0,success:function(e){if(0==e.code)$.cookie("oenc","",{expires:-1,domain:domain_way});else if(3008!=e.code&&3018!=e.code)return void console.log(e.msg)}})}else $.cookie("oenc",this.openId,{domain:domain_way,path:"/"});else if(window.location.href.indexOf("/coupons")!=-1)if($$.getUserId()){if(window.thisPageInit)window.thisPageInit();else if(window.thisPageApp)try{thisPageApp.init()}catch(e){}}else;else if(window.location.href.indexOf("/order-goods")!=-1)if($$.getUserId()){if(window.thisPageInit)window.thisPageInit();else if(window.thisPageApp)try{thisPageApp.init()}catch(e){}}else window.location.href="login.html";else if(window.thisPageInit)window.thisPageInit();else if(window.thisPageApp)try{thisPageApp.init()}catch(e){}},getShare:function(){var e=this,t=window.location.href,n=new $$.DMap;n.put("method","com.ddky.promotion.page.share.conf"),n.put("pageUrl",t);var i=getRequestURL_code(url_user,n);$.ajax({cache:"true",dataType:"jsonp",url:i,success:function(n){return console.log(n),0!=n.code?void $$.alert({width:"260",height:"120",msg:n.msg}):(e.shareInfo=n.result,n.result.shareUrl?e.shareInfo.pageUrl=n.result.shareUrl:e.shareInfo.pageUrl=n.result.pageUrl,e.toShare(t),void 0)}})},toShare:function(){var e=window.location.href,t=encodeURIComponent(e),n="http://m.ddky.com/index.html",i="用了叮当快药后感觉不错？赶快给好友发个红包来体验吧？自己也能领哦！",o="https://mcp.ddky.com/weixin/getWxConfig?url="+t;$.ajax({type:"get",cache:!0,dataType:"jsonp",url:o,success:function(e){console.log(e);var t=e;t.jsApiList=["onMenuShareTimeline","onMenuShareAppMessage"],wx.config(t),wx.ready(function(){wx.onMenuShareTimeline({title:i,link:n,imgUrl:"https://img.ddky.com/c/wap/images/huodong/weixin/quanminyingxiao/logo2.jpg",success:function(){}}),wx.onMenuShareAppMessage({title:i,desc:"叮当快药28分钟免费送到家",link:n,imgUrl:"https://img.ddky.com/c/wap/images/huodong/weixin/quanminyingxiao/logo2.jpg",type:"link",success:function(){}})})}})},toSaveUser:function(e){if(0==e.code){var t={};t.userid=e.result.userId,t.tel=e.result.login,t.loginToken=e.result.loginToken,t.uDate=e.result.uDate,$$.saveUser(t),$.removeCookie("enc",{path:"/"}),thisPageApp&&thisPageApp.init()}else console.log(e.msg)}};Weixin.init();