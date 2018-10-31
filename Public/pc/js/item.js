/* 显示放大的 */
$(document).ready(function(e) {
    $(".moveable").hover(function(e) {
	 $(".moveable").removeClass('hover');
     $(this).addClass('hover'); 
   }); 
   /* 换一换产品 */
  $(".changegoods").click(function(e) {
      var id = $(this).data("id");
	  $(".goodsmask").show();
	  ajax({
	      method : 'post',
		  url : think+'/product/changegoods',
		  data : {
			 'ctag' : id
		  },
		  success : function(data){
			$(".goodsmask").hide();
			var data = eval("(" + data + ")");
			if(data!=''){
		      $(".same_otherlist ul").html(data);
			}
		  },
		  async : true
	  });
    });
  /* 异步分页->产品评价 */
	$(".consult_page a").live("click",function(e){
	  var page = $(this).data("page");
	  var id = $('#proid').val();
	  var h = $(".commentlist_box").height()-10;
	  $(".comment_mask").css("height",h+'px').show();
	  ajax({
	      method : 'post',
		  url : think+'/product/commentpage',
		  data : {
			 'page' : page,
			 'id' : id
		  },
		  success : function(data){
			var data = eval("(" + data + ")");
			if(data!=''){
		      $(".commentlist_box").html(data);
			  $(".comment_mask").hide();
			}
		  },
		  async : true
	  }); 
	});
   /*属性*/
   var attr = getattr();
   var id = $('#proid').val();
   if(attr!=0){
	 getobj(attr,id);
   }else{
	 $(".priceshow b").text(0.00);
   }
   //点击选中
  $(".b_p_flist li").click(function(e){
	$(this).parent().parent().find("li").removeClass("selected");
	$(this).addClass("selected");
	getobj(getattr(),id);
  });
   /*立即购买*/
  $('.buy_now').click(function(){
 	 var selectattr=getattr();
	 var buyattr=getbuyattr();
	 buynow(selectattr,buyattr);
  })
  /*加入购物车*/
  $('.join_mycart').click(function(){
 	 var selectattr=getattr();
	 var buyattr=getbuyattr();
	 addmycart(selectattr,buyattr);
  })
  /*收藏*/
  $('.prodcollect').click(function(){
	  var uid=$(this).data('id');
	  var proid = $('#proid').val();
	  var count = parseInt($(".prodcollect span").text());
	  var selectattr=getattr();
	  var buyattr=getbuyattr();
	  if(uid==0){
		  sysconfirm('请先登录您的账号吧？',function(){location.href = think+'/login/index/';});
		  return false;
	  }
	  if(proid==0){systip("选择你要收藏的产品！");return false;}
	  loading('数据操作中...');
	  ajax({
			method : 'post',
			url : think+'/cart/prodcollect',
			data : {
				'selectattr' : selectattr,
				'buyattr' : buyattr,
				'proid' : proid,
			},
			success : function (text) {
				losepop()//数据返回
				if(text==1){
				  systip('产品收藏成功');
				  $(".prodcollect").find("span").text(count+1);
				}else if(text==403){
				  systip('产品已经存在您的收藏夹中,请不要重复收藏！');
				}else if(text==404){
				  systip('收藏失败,产品不存在，或者刷新一下试试吧');
				}else if(text==0){
				  systip('收藏失败，或者刷新一下试试吧');
				}else{
				  systip.tip(text);
				}
			},
			async : true
	  });
	  //结束
  });
    
});
//检测属性
function getattr(){
   var attrobj = $(".b_p_flist li.selected");
   if(attrobj.length>0){
	 var attr = ""; 
	 for(var i=0;i<attrobj.length;i++){
		attr += attrobj.eq(i).text();
	 }
   }else{
	 attr = 0;//表示没有可选属性 
   }  
   return attr;
}
//检测+属性类别+属性
function getbuyattr(){
   var attrobj = $(".b_p_flist li.selected");
   if(attrobj.length>0){
	 var attr = ""; 
	 for(var i=0;i<attrobj.length;i++){
		attr += ';'+ $.trim(attrobj.eq(i).data('title'))+":"+attrobj.eq(i).text();
	 }
	 attr = (attr!='') ? attr.substr(1) : 1; 
   }else{
	 attr = 0;//表示没有可选属性 
   }
   return attr;
}
//加入购物车
function addmycart(selectattr,buyattr){
	var proid = $('#proid').val();
	var count = parseInt($("#buy_num").val());
	var goodsprice = $(".goods_mkprice span").text();//因为class写反
	if($('.join_mycart').data('id')==0){
		sysconfirm('请先登录您的账号吧？',function(){location.href = think+'/login/index/';});
		return false;
	}
	if(proid==0){systip("抱歉产品ID为空！");return false;}
	if(count==0){systip("至少选择一件产品！");return false;}
	loading('数据操作中...');
	ajax({
		method : 'post',
		url : think+'/cart/addmycart',
		data : {
			'selectattr' : selectattr,
			'buyattr' : buyattr,
			'proid' : proid,
			'count' : count,
			'goodsprice' : goodsprice
		},
		success : function (text) {
			losepop()//数据返回
			if(text==1){
			  systip('加入购物成功');
			  $("#mycartnum").text(parseInt($('#mycartnum').text())+1);
			}else if(text==404){
			  systip('产品不存在，或者刷新一下试试吧');
			}else if(text==403){
			  systip('该产品库存不够，请刷新再试！');
			}else if(text==0){
			  systip('加入购物失败，或者刷新一下试试吧');
			}else{
			  systip.tip(text);
			}
		},
		async : true
  });
  //结束
}
//立即购买
function buynow(selectattr,buyattr){
	var proid = $('#proid').val();
	var count = parseInt($("#buy_num").val());
	var goodsprice = $(".goods_mkprice span").text();//因为class写反
	if($('.join_mycart').data('id')==0){
		sysconfirm('请先登录您的账号吧？',function(){location.href = think+'/login/index/';});
		return false;
	}
	if(proid==0){systip("抱歉产品ID为空！");return false;}
	if(count==0){systip("至少选择一件产品！");return false;}
	loading('数据操作中...');
	ajax({
		method : 'post',
		url : think+'/cart/buynow',
		data : {
			'selectattr' : selectattr,
			'buyattr' : buyattr,
			'proid' : proid,
			'count' : count,
			'goodsprice' : goodsprice
		},
		success : function (text) {
			losepop()//数据返回
			if(text==1){
			  $("#mycartnum").text(parseInt($('#mycartnum').text())+1);
			   window.location.href = think+'/order/index';
			}else if(text==404){
			  systip('产品不存在，或者刷新一下试试吧');
			}else if(text==403){
			  systip('该产品库存不够，请刷新再试！');
			}else if(text==0){
			  systip('加入购物失败，或者刷新一下试试吧');
			}else{
			  systip.tip(text);
			}
		},
		async : true
  });
  //结束
}



//获取金额数组
function getobj(attr,id){
	ajax({
		method : 'post',
		url : think+'/product/goodsstockprice',
		data : {
			'id' : id,
			'attr' : attr
		},
		success : function (data) {
			if(data!=''){
			  if(data==0){
				$(".priceshow b").text(0.00);
			  }else{
				var obj = eval("(" + data + ")");
				$(".goods_mkprice span").text(obj.price);
				$(".dpro_stock span").text(obj.stock);
				if(obj.prono!=""){
					$('.pronumber span').text(obj.prono)
				}else{
					$('.pronumber span').text($('.pronumber').data('number'));
				}
			  }
			}
		},
		async : true
	});
}



function chgPic() {
 if($.browser.msie) {
   $(".thumbnails .moveable a").hover(function() {
	 if(resolution == 1280) {
		$("#midImg").attr("src", $(this).children("img").attr("ref380"));
	 } else {
		$("#midImg").attr("src", $(this).children("img").attr("ref340"));
	 }
	 $("#bigImg").attr("href", $(this).children("img").attr("ref2"));
	  imgcenter();
   });
 } else {
   $(".thumbnails .moveable a").mouseover(function() {
	if(resolution == 1280) {
		$("#midImg").attr("src", $(this).children("img").attr("ref380"));
	} else {
		$("#midImg").attr("src", $(this).children("img").attr("ref340"));
	}
	$("#bigImg").attr("href", $(this).children("img").attr("ref2"));
	 imgcenter();
 });
 }
}

function imgcenter(){
   	var imgW=$(".show_big_pic img").width();
	var imgH=$(".show_big_pic img").height();
	if(imgW>imgH){
		var _top=parseInt((400-imgH)/2);
		$(".show_big_pic img").css('margin-top',_top+'px');
	}
	else{
		$(".show_big_pic img").css('margin','0px');
	}
   
}
