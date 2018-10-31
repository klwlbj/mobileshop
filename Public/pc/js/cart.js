// JavaScript Document
// JavaScript Document
$(document).ready(function(e) {
 $(".cartselectall").click(function(e) { //获取全选购物车的点击事件
	var ai = $(":input");
	if(this.checked==true){
	 for(var j=0;j<ai.length;j++){if(ai[j].type == "checkbox"){ai[j].checked = true;$(".selectall").html('取消');}}
	 if($(".goodselect").length>0){//更新余额
			loading();
			ajax({
				method : 'post',
				url : think+"/cart/checkallcart",
				data : {
				},
				success : function (text) {
					losepop();
					if(text!=''){
					  $("#goodsprice").html("¥"+text+"");
					  $("#allgoodsprice").html("¥"+text+"");    
					}
				},
				async : true
			 });
		 $("#gotocartpay").removeClass("nogotocartpay").addClass("gotocartpay"); 
	 }
	}else{
	 for(var j=0;j<ai.length;j++){if(ai[j].type == "checkbox"){ai[j].checked = false;$(".selectall").html('全选');}}
	 $("#gotocartpay").removeClass("gotocartpay").addClass("nogotocartpay"); 
	 $("#goodsprice").html('¥00.00'); //设为zero
	 $("#allgoodsprice").html('¥00.00');
	 //结束
	}
 });
 /* 单选操作 */
 $(":input.goodselect").click(function(e) {
	var cartno = 0;
	var ai = $(":input");
    if(this.checked==true){
	  $("#gotocartpay").removeClass("nogotocartpay").addClass("gotocartpay");  
	  //更新余额
	  upprice();
	}else{
	  for(var i=0;i<ai.length;i++){if(ai[i].checked == true && ai[i].name=="goodsid[]"){cartno++;}} //取出是否有数据
	  if(cartno>0){   
	   $("#gotocartpay").removeClass("nogotocartpay").addClass("gotocartpay"); 
	    //更新余额
		upprice();
	  }else{
	   $("#gotocartpay").removeClass("gotocartpay").addClass("nogotocartpay"); 
	   $("#goodsprice").html('¥00.00');//设为zero
	   $("#allgoodsprice").html('¥00.00');
	   //结束
	  }
	}
	if($(":input.goodselect").length == $(":input.goodselect:checked").length){
      $(".cartselectall").attr("checked",true);
	  $(".selectall").text('取消');
	}else{
	  $(".cartselectall").attr("checked",false);
	  $(".selectall").text('全选');
	}
 });
 /* 结束 */
 
 /* 更新余额 */
  function upprice(){
   var cartid = "";
   var ci = $(":input.goodselect");
   for(var c=0;c<ci.length;c++){
	if(ci[c].checked == true){cartid += ","+ci[c].value;}
   }
   cartid = (cartid!='') ? cartid.substr(1) : "";
   if(cartid!=''){ 
   loading();
	ajax({
		method : 'post',
		url : think+"/cart/checkonecart",
		data : {
			'cartid' : cartid,
		},
		success : function (text) {
			losepop();
			if(text!=''){
			  $("#goodsprice").html("¥"+text+"");
			  $("#allgoodsprice").html("¥"+text+"");    
			} 
		},
		async : true
	 }); 
   }
 }
 
 
 /* 增加数量 */ 
 $(".adds").click(function(e) {
   var id = $(this).data("id");
   var stock = $(this).data("stock");
   var count = parseInt($(this).parent().parent().find("#cartquantity").val());
   var _thisc = $(this).parent().parent().find("#cartquantity");
   var _thisp = $(this).parent().parent().parent().find("#summary");
   if(count+1>stock){
	  systip("您所购买的商品数量超过库存，无法增加");
	  return false;
   }else{
	  loading();
	  ajax({
		method : 'post',
		url : think+'/cart/addcartcount',
		data : {
			'id' : id,
		},
		success : function (text) {
			losepop();
			if(text!=''){
			  if(text==404){
			   systip("抱歉，ID未找到!"); return false;
			  }else if(text==403){
			   systip("您所购买的商品数量超过库存，无法增加");return false;
			  }else{
			    var obj = eval("(" + text + ")");
				if(obj.statue){
				  _thisc.val(count+1);
				  _thisp.text(obj.price);
				  upprice();//更新余额
				}else{
				  systip("操作失败，请检查网络!");return false;
				}
			  }
			}
		},
		async : true
	  });
   } 
 });
 /* 减去数量 */
 $(".minus").click(function(e) {
   var id = $(this).data("id");
   var count = parseInt($(this).parent().parent().find("#cartquantity").val());
   var _thisc = $(this).parent().parent().find("#cartquantity");
   var _thisp = $(this).parent().parent().parent().find("#summary");
   if(count-1==0){
	  systip('数量不能少于1！');
	  return false;
   }else{
	  loading();
	  ajax({
		method : 'post',
		url : think+'/cart/minuscount',
		data : {
			'id' : id,
		},
		success : function (text) {
			losepop();
			if(text!=''){
			  if(text==404){
			   systip("抱歉，ID未找到!"); return false;
			  }else if(text==403){
			   systip("您所购买的商品数量超过库存，无法增加");;return false;
			  }else{
			    var obj = eval("(" + text + ")");
				if(obj.statue){
				  _thisc.val(count-1);
				  _thisp.text(obj.price);
				  upprice();//更新余额
				}else{
				 systip("操作失败，请检查网络!");return false;
				}
			  }
			}
		},
		async : true
	  });
   } 
 });
 /* 结束 */
 /*直接更新数量*/
 $('.cartcounts').change(function(){
	var id    = $(this).data("id");
	var count = $(this).val();
	var _oneprice = $(this).data('oneprice');
	var _thisc = $(this).parent().find("#cartquantity");
    var _thisp = $(this).parent().parent().find("#summary");
	if(count<1){
		 _thisc.val(1);
		_thisp.text(_oneprice);
		systip('数量不能少于1！');return false;
	}
	else{
		loading();
		ajax({
			method : 'post',
			url : think+'/cart/upcount',
			data : {
				'id' : id,
				'buycount' : count,
			},
			success : function (text) {
				losepop();
				if(text!=''){
				  if(text==404){
				   systip("抱歉，ID未找到!"); return false;
				  }else if(text==403){
				    _thisc.val(1);
					_thisp.text(_oneprice);
				    upprice();//更新余额
				    systip("您所购买的商品数量超过库存，无法更新");return false;
				  }else{
					var obj = eval("(" + text + ")");
					if(obj.statue){
					  _thisp.text(obj.price);
					  upprice();//更新余额
					}else{
					 systip("操作失败，请检查网络!");return false;
					}
				  }
				}
			},
		 async : true
	  });
	}
 })
 
 /* 批量删除 */
 $("#cartdel").click(function(e) {
    var ai = $(":input");
	var cartno = 0;
	for(var i=0;i<ai.length;i++){if(ai[i].checked == true && ai[i].name=="goodsid[]"){cartno++;}}
	if(cartno==0){
	  systip('请选择需要批量删除的商品！');return false;
	}else{
	  //获取到选中的ID
      var delid = "";
	  var ci = $(":input.goodselect");
	  for(var c=0;c<ci.length;c++){
	    if(ci[c].checked == true){delid += ","+ci[c].value;}
	  }
	  delid = (delid!='') ? delid.substr(1) : "";
	  sysconfirm('您确认要删除这些产品吗？',function(){location.href = think+'/cart/delsomepro/delid/'+delid;});
	}
 });
 /* 结束 */
 
 /* 清空购物车 */
  $("#clearcart").click(function(e) {
	  sysconfirm('您确认要清空购物车吗？',function(){location.href = think+'/Cart/cleancart';});
  });
 /* 结束 */
 
 /* 删除一个产品 */
  $(".delcartone").click(function(e) {
    var id = $(this).data("id");
	sysconfirm('您确认要删除该产品吗？',function(){location.href = think+'/cart/delonepro/delid/'+id;});
  });
 /* 结束 */
 
 /* 加入收藏 */
   $(".tomovefav").click(function(e) {
     var id = $(this).data("id");
	 var _this = $(this).parent().parent();
	 //判断节点
	 var len = $(":input.goodselect").length;
	 if(id!=0){
	  loading();
	  ajax({
		method : 'post',
		url : think+'/Cart/tomovefav',
		data : {
			'id' : id
		},
		success : function (text) {
			losepop();
			if(text!=''){
		      if(text==404){
			   systip('抱歉，ID未找到!！');return false;
			  }else if(text==403){
			   systip('抱歉，该产品已经在收藏夹里面');return false;
			  }else if(text==0){
			   systip('抱歉，操作失败，请检查网络');return false;
			  }else if(text==1){
			    systip('已成功移入收藏夹');
				_this.hide().remove();
			  }else{
			   systip(text);
			  }
			}
		},
		async : true
	  });
	 } 
  });
 /* 结束 */
 
  /* 切换场景 */
   $(".recent_cart ul li").click(function(e) {
     var subid = $(this).data("id");
	 $(".recent_cart ul li").removeClass("recent_select");
	 $(this).addClass("recent_select");
	 $(".recent_cart_pro").hide();
	 $(".recent_cart_pro").eq(subid).show();
   });
  /* 结束 */
  
  /* 去结算 */
 $("#gotocartpay").click(function(e) {
    var ai = $(":input");
	var cartno = 0;
	for(var i=0;i<ai.length;i++){if(ai[i].checked == true && ai[i].name=="goodsid[]"){cartno++;}}
	if(cartno==0){
	  systip('请至少选择一个产品去结算！');return false;
	}else{
	  var cartid = "";
	   var ci = $(":input.goodselect");
	   for(var c=0;c<ci.length;c++){
		if(ci[c].checked == true){cartid += ","+ci[c].value;}
	   }
	   cartid = (cartid!='') ? cartid.substr(1) : "";
	   loading();
	   ajax({
		method : 'post',
		url : think+'/cart/gotopay',
		data : {
			'cartid' : cartid,
		},
		success : function (text) {
			var text = eval("("+text+")");
			losepop();
			if(text==1){
			  location.href = think+'/order/index';
			}else{
		      systip('存在失效或商品属性失效的商品，请刷新重试','error');
			  
			}
		},
		async : true
	  });
	   //结束
	}    
  });
  /* 结束 */
  
});