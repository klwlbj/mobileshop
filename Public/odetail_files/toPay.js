var onlineState=true;
if(document.domain.substring(0,3) != 'pre'){
	onlineState = true;
}else{
	onlineState = false;
}
function setCookie(name,value,iDay){
	if(iDay){
		var oDate=new Date();
		oDate.setDate(oDate.getDate()+iDay);
		document.cookie=name+'='+value+' ;Domain=.ddky.com ;path=/ ;expires='+oDate.toGMTString();
	}else{
		document.cookie=name+'='+value+'; Domain=.ddky.com; path=/';
	}
}
function getCookie(name){
	var arr=document.cookie.split('; ');	
	
	for(var i=0; i<arr.length; i++){
		var arr2=arr[i].split('=');
		if(arr2[0]==name){
			return arr2[1];
		}
	}
	return '';
}
function removeCookie(name){
	setCookie(name,'asdfasdf',-10);
}
var replace=false;
if(document.referrer.indexOf('goodscar-list.html')!=-1){
	replace=true;
}

var toPay={
	/***tocash  跳转收银台  <script src="pre_m.ddky.com/common/pay/js/toPay.js"></script>    
	 * {number} 公共收银台 order-sure页面需要配置 payType 判断订单支付的支付方式 0---微信和支付宝    1--weixin   2---支付宝  不传默认两个方式都支持（微信以外的只有支付宝）
	 * {number} 订单ID
	 * {string} 支付成功以后跳转的配置页面，各种活动特有的支付成功页的地址链接，不传默认进通用的   @example   https://m.ddky.com/success.html   请写完整带http协议头的url
	 * {string}	支付失败以后跳转的配置页面，各种活动特有的支付失败页的地址链接，不传默认进通用的   @example   https://m.ddky.com/fail.html   请写完整带http协议头的url
	 * {string} 订单类别  o2o/b2c
	 *   		调用方式  toPay.toCash(0,123,'https://m.ddky.com/success.html','https://m.ddky.com/fail.html','b2c');
	 * */
	toCash:function(type,orderId,success,fail,payment,tfzf){
		/*$.cookie('successUrl',null,{expires:2,domain:'.ddky.com',path:'/'});
		$.cookie('failUrl',null,{expires:2,domain:'.ddky.com',path:'/'});
		$.cookie('successUrl',success,{expires:2,domain:'.ddky.com',path:'/'});
		$.cookie('failUrl',fail,{expires:2,domain:'.ddky.com',path:'/'});*/
		payment=payment||'b2c';
		removeCookie('successUrl');
		removeCookie('failUrl');
		setCookie('successUrl',success,1);
		setCookie('failUrl',fail,1);
		if(!orderId)return;
		if(isNaN(type)||type<0){
			if(onlineState){
				//线上      去收银台
				if(replace){
					location.replace('https://m.ddky.com/common/pay/cashier.html?orderId='+orderId+'&payment='+payment);
				}else{
					window.location.href='https://m.ddky.com/common/pay/cashier.html?orderId='+orderId+'&payment='+payment;
				}
				
			}else{
				//预发布   去收银台
				if(replace){
					location.replace('https://prem.ddky.com/common/pay/cashier.html?orderId='+orderId+'&payment='+payment);
				}else{
					window.location.href='https://prem.ddky.com/common/pay/cashier.html?orderId='+orderId+'&payment='+payment;
				}
				
			}
		}else{
			if(onlineState){
				if(tfzf == 'tfzf'){
					//线上      去收银台
					if(replace){
						location.replace('https://m.ddky.com/common/pay/cashier.html?payType='+type+'&orderId='+orderId+'&payment='+payment+'&channel=tfzf');
					}else{
						window.location.href='https://m.ddky.com/common/pay/cashier.html?payType='+type+'&orderId='+orderId+'&payment='+payment+'&channel=tfzf';
					}
				}else{	
					//线上      去收银台
					if(replace){
						location.replace('https://m.ddky.com/common/pay/cashier.html?payType='+type+'&orderId='+orderId+'&payment='+payment);
					}else{
						window.location.href='https://m.ddky.com/common/pay/cashier.html?payType='+type+'&orderId='+orderId+'&payment='+payment;
					}				
				}
			}else{
				if(tfzf == 'tfzf'){
					//预发布   去收银台
					if(replace){
						location.replace('https://prem.ddky.com/common/pay/cashier.html?payType='+type+'&orderId='+orderId+'&payment='+payment+'&channel=tfzf');
					}else{
						window.location.href='https://prem.ddky.com/common/pay/cashier.html?payType='+type+'&orderId='+orderId+'&payment='+payment+'&channel=tfzf';
					}
				}else{
					//预发布   去收银台
					if(replace){
						location.replace('https://prem.ddky.com/common/pay/cashier.html?payType='+type+'&orderId='+orderId+'&payment='+payment);
					}else{
						window.location.href='https://prem.ddky.com/common/pay/cashier.html?payType='+type+'&orderId='+orderId+'&payment='+payment;
					}
				}
			}
		}
	}
};
