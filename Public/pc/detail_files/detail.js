


$(document).ready(function(){
	$(".addtofavorite").click(function(){
		var url = $(this).attr("href");
		$.get(url,function(data){
			alert(data);
			
		});
		return false;
		
	});
});



var myplate = {
	init: function() {
		// lazyInit();
	},
	bindevent: function() {
		// showRx();
		imgList();
		jqzoom();

	}
};

function lazyInit() {
	if($('[data-lazyname="lazy-func"]').length <= 0) {
		return;
	}
	setTimeout(lazyLoadProduct, 500);
	$(window).bind("scroll", lazyLoadProduct);
};

function lazyLoadProduct() {
	var tool = {
			getScrollTop: function() {
				return document.documentElement.scrollTop || document.body.scrollTop;
			},
			getClientHeight: function() {
				return document.documentElement.clientHeight || document.body.clientHeight;
			}
		},
		screenHeight = tool.getClientHeight();
	$('[data-lazyname="lazy-func"]').each(function() {
		var kItem = $(this),
			top = kItem.offset().top;
		if((kItem.height() !== 0 || top !== 0) && !kItem.is(":hidden") && top <= tool.getScrollTop() + screenHeight * 1.1) {
			kItem.removeAttr("data-lazyname");
			var functionName = kItem.attr("data-func");
			var newFunc = eval(functionName);
			setTimeout(newFunc, 50);
		}
	});
};

function imgList() {
	var proImg = $("#mainproductimg_lar");
	var i = $("#minPicScroll ul li").length;
	$("#minPicScroll .prev").hide();
	if(i > 3) {
		$("#minPicScroll .nextNo").hide()
		$("#minPicScroll .next").click(function() {
			$("#minPicScroll li:lt(5)").hide();
			$("#minPicScroll .prevNo").hide();
			$("#minPicScroll .prev").show();
			$("#minPicScroll .next").hide();
			$("#minPicScroll .nextNo").show();
		})
		$("#minPicScroll .prev").click(function() {
			$("#minPicScroll li:lt(5)").show();
			$("#minPicScroll .prevNo").show();
			$("#minPicScroll .prev").hide();
			$("#minPicScroll .next").show();
			$("#minPicScroll .nextNo").hide();
		})
	} else {
		$("#minPicScroll .next").hide();
	}
	if($("#minPicScroll ul li").length <= 5) {
		$("#minPicScroll .next").hide();
		$("#minPicScroll .nextNo").show();
	}
	$("#minPicScroll li").mouseover(function() {
		$(this).addClass("w-dtl-smr-cur").siblings().removeClass("w-dtl-smr-cur");
		var src = $(this).find("img").attr("data-url").replace('_100x100.jpg', '');
		var jqimg = $(this).find("img").attr("jqimg");
		//alert(jqimg);
		proImg.attr({
			jqimg: jqimg,
			src: src
		});

	});
	$("#minPicScroll li").eq(0).trigger("mouseover");
}
function jqzoom() {
	$("#product_bigimg").jqueryzoom({
		xzoom: 500,
		yzoom: 500,
		offset: 10,
		position: "right",
		preload: 1
	});
};
myplate.bindevent();
myplate.init();