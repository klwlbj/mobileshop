$(function(){
	//禁止滑动
    function closeBody(){
        document.addEventListener("touchmove",function(e){
            e.returnValue = false;
        },false);
    }
    //解除禁止
    function openBody(){
        document.addEventListener("touchmove",function(e){
            e.returnValue = true;
        },false);
    }
   
    //$('.hg-btn').on('click',function(){
    //	$('.hg-cont-wrap').show();
    //	showMask('.hg-cont-swiper');
    //});
    //$('.zp-btn').on('click',function(){
    //	$('.zp-cont-wrap').show();
    //	showMask('.zp-cont-swiper');
    //});
    //function showMask(classes){
    //	closeBody();
    //	$('.layer-wrap').show();
    //	new Swiper(classes,{
    //        slidesPerView: 'auto',
    //        direction: 'vertical',
    //        observer:true,//修改swiper自己或子元素时，自动初始化swiper
    //        observeParents:true,//修改swiper的父元素时，自动初始化swiper
    //        freeMode: true
    //    });
    //}
    //$('.hg-title-close,.hg-close').on('click',function(){
    //	openBody();
    //	$('.hg-cont-wrap').hide();
    //	$('.layer-wrap').hide();
    //	$('.slide-select').removeClass('cur');
    //});
    //$('.zp-title-close,.zp-close').on('click',function(){
    //	openBody();
    //	$('.zp-cont-wrap').hide();
    //	$('.layer-wrap').hide();
    //	$('.slide-select').removeClass('cur');
    //});
    //$('.hg-cont-swiper ul li').on('click',function(){
    //	$('.hg-cont-swiper ul li .slide-select').removeClass('cur');
    //	$(this).addClass('cur');
    //});
    //$('.zp-cont-swiper ul li').on('click',function(){
    //	$('.zp-cont-swiper ul li .slide-select').removeClass('cur');
    //	$(this).children('.slide-select').addClass('cur');
    //});
    ////选项交互
    //$('body').on("click", "#allSelect", function () {
    //    if ($(this).hasClass('cur')) {
    //        $(this).removeClass('cur');
    //        $('.title-select,.prod-select').removeClass('cur');
    //    } else {
    //        $(this).addClass('cur');
    //        $('.title-select,.prod-select').addClass('cur');
    //    }
    //});
    //$('.title-select').on('click',function(){
    //	if($(this).hasClass('cur')){
    //		$(this).removeClass('cur');
    //		$('.Allselect').removeClass('cur');
    //		$(this).parent('.conter-title').siblings('.shopCart-conter').children().children().children('.prod-select').removeClass('cur');
    //	}else{
    //		$(this).addClass('cur');
    //		$(this).parent('.conter-title').siblings('.shopCart-conter').children().children().children('.prod-select').addClass('cur');
    //		$('.title-select').size() == $('.title-select.cur').size() ? $('.Allselect').addClass('cur') :'';
    //	}
    //});
    //$('.prod-select').on('click',function(){
    //	if($(this).hasClass('cur')){
    //		$(this).removeClass('cur');
    //		$('.Allselect').removeClass('cur');
    //		$(this).parents('.shopCart-conter').siblings('.conter-title').children('.title-select').removeClass('cur');
    //	}else{
    //		$(this).addClass('cur');
    //		var thisSelectSize = $(this).parents('.shopCart-conter').children('.conter-prod-warp').size();
    //		var thisSelectedSize = $(this).parents('.shopCart-conter').children('.conter-prod-warp').children().children('.prod-select.cur').size()
    //		thisSelectSize == thisSelectedSize ? $(this).parents('.shopCart-conter').siblings('.conter-title').children('.title-select').addClass('cur') : '';
    //		$('.title-select').size() == $('.title-select.cur').size() ? $('.Allselect').addClass('cur') :'';
    //	}
    //});
    $('#editBtn').on('click',function(){
    	if($(this).text() == '编辑'){
    	    $(this).text('取消');
    	    $('#balanceBtn').addClass('cur');
    		$('#balanceBtn').text('删除');
    	}else{
    		$(this).text('编辑');
    		$('#balanceBtn').text('去结算');
    	}
    });

    initNow();
    function initNow() {
        $('.num-input').each(function (e) {
            $(this).val() <= 1 ? $(this).prev('.num-reduce').addClass('cur') : $(this).prev('.num-reduce').removeClass('cur');
            $(this).val() >= 999 ? $(this).next('.num-add').addClass('cur') : $(this).next('.num-add').removeClass('cur');
        });
        $('.prod-select.cur').size() > 0 ? $('#balanceBtn').removeClass('cur') : $('#balanceBtn').addClass('cur');
    }
    //$('.treatment-input a.num-reduce').on('click',function(){
    //	var num = $(this).siblings('.num-input').val();
    //	if(num > 1){
    //		if(num == 2){
    //			$(this).addClass('cur');
    //		}
    //		num--;
    //		$(this).siblings('.num-add').removeClass('cur');
    //		$(this).siblings('.num-input').val(num);
    //		return;
    //	}else{
    //		$(this).addClass('cur');
    //		return;
    //	}
    //});
    // $('.treatment-input a.num-add').on('click',function(){
    //	var num = $(this).siblings('.num-input').val();
    //	if(num < 999){
    //		if(num == 998){
    //			$(this).addClass('cur');
    //		}
    //		num++;
    //		$(this).siblings('.num-reduce').removeClass('cur');
    //		$(this).siblings('.num-input').val(num);
    //		return;
    //	}else{
    //		$(this).addClass('cur');
    //		return;
    //	}
    //});
    $("body").children().on("input oninput", ".num-input", function (event) {
    //$('.num-input').on('input oninput', function(event) {
        var num = $(this).val();
        if($(this).get(0).value.length > 3)   {  
           $(this).get(0).value = $(this).get(0).value.substr(0, 3); 
           $(this).val(999);
        }
        if(num == 1){
            $(this).siblings('.num-reduce').addClass('cur');
        }else if(num > 1 && num < 999){
        	$(this).siblings('.num-reduce').removeClass('cur');
            $(this).siblings('.num-add').removeClass('cur');
        }else if(num == 999){
        	$(this).siblings('.num-add').addClass('cur');
        }else{
        	return;
        }
    });

    $("body").children().on("blur", ".num-input", function () {
    //$('.num-input').on('blur', function(event) {
        if ($(this).val() == "" || $(this).val() <= 1) {
            $(this).val(1);
            //alert('val初始化为1');
        }
    });
    //if($('.num-input').val() > 1){
    //	$('.num-reduce').removeClass('cur');
    //}else{
    //	$('.num-reduce').addClass('cur');
    //}
    $(".num-input").each(function (a, b) {
        if ($(b).val() <= 1) {
            $(b).prev().addClass("cur");
        }
        if ($(b).val() >= 999) {
            $(b).next().addClass("cur");
        }
    });
});
