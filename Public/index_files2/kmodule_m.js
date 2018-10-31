//屏幕适配
(function(doc, win) {
	var docEl = doc.documentElement,
		resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
		recalc = function() {
			var clientWidth = docEl.clientWidth;
			if (!clientWidth) return;
			var size=htmlFontSize=100 * (clientWidth / 750);
			docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
		};
	if (!doc.addEventListener) return;
	win.addEventListener(resizeEvt, recalc, false);
	doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);



$(function(){
	/*swiper滑动*/
	var swiper = new Swiper('#menu-swiper-container', {
		slidesPerView: 'auto',
		freeMode: true
   }); 
   
   $("#menu-swiper-container ul li").on('click',function(){
	   var index = $(this).index();
	   $(this).addClass("cur").siblings().removeClass("cur");
	   $(this).children(".li-ye").show().parent().siblings().children(".li-ye").hide();
	   $("#menu2-swiper-container ul li").eq(index).addClass("cur").siblings().removeClass("cur");
	   $("#menu2-swiper-container ul li").eq(index).children(".li-ye").show().parent().siblings().children(".li-ye").hide();
	   $(".pro-box .pro-box-inner").eq(index).show().siblings().hide();
	});
	
	$(".menu-r").on('click',function(){
		$(".menu").hide();
		$(".menu2").show();
	});
	
	$("#menu2-swiper-container ul li").on('click',function(){
	   var index = $(this).index();
	   $(this).addClass("cur").siblings().removeClass("cur");
	   $(this).children(".li-ye").show().parent().siblings().children(".li-ye").hide();
	   $("#menu-swiper-container ul li").eq(index).addClass("cur").siblings().removeClass("cur");
	   $("#menu-swiper-container ul li").eq(index).children(".li-ye").show().parent().siblings().children(".li-ye").hide();
	   $(".pro-box .pro-box-inner").eq(index).show().siblings().hide();
	});
	
	$(".menu2-topr").on('click',function(){
		$(".menu").show();
		$(".menu2").hide();
	});
})