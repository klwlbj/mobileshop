var popup = {
	config : {
		wrap : $('.popup-wrap'),
		container : $('.popup-container'),
		closeWrap : $('.popup-close'),
		title : $('.popup-title'),
		btn1 : $('.popup-btn-left'),
		btn2 : $('.popup-btn-right'),
		mask : $('.mask-wrap')
	},
	init : function(){
		this.resets();
	},
	isScroll : function(bools){
		var istrue = bools;
		document.addEventListener("touchmove",function(e){
	        e.returnValue = istrue;
	    },false);
	},
	resets : function(){
		var _that = this.config,that = this;
		_that.container.html('').show();
		_that.title.text('').show();
		_that.btn1.text('').show();
		_that.btn2.text('').show();
		_that.closeWrap.children().show(); 
	},
	showPopup : function(isShow,content,callback1,callback2){
		var that = this,
			cont = {
				container :　content.container || '',
				closeWrap : content.close || false,
				title : content.title || '',
				btn1 : content.btn1 || '',
				btn2 : content.btn2 || ''
			},
			$thisWrap = that.config.wrap,
			flag = isShow;
		if(flag){
			that.resets();
			$thisWrap.show();
			that.config.mask.show();
			that.isScroll(false);
			cont.container == '' ? that.config.container.hide() : that.config.container.html(cont.container);
			cont.title == '' ? that.config.title.hide() : that.config.title.text(cont.title);
			!cont.closeWrap ? that.config.closeWrap.children().hide() : '';
			cont.btn1 == '' ? that.config.btn1.hide() : that.config.btn1.text(cont.btn1);
			cont.btn2 == '' ? that.config.btn2.hide() : that.config.btn2.text(cont.btn2);
		}else{
			 $thisWrap.hide();
			 that.config.mask.hide();
			 that.isScroll(true);
		}
		that.config.btn1.unbind().on('click',function(){
			callback1 && typeof callback1 == 'function' && callback1.call()
		});
		that.config.btn2.unbind().on('click',function(){
			callback2 && typeof callback2 == 'function' && callback2.call()
		});
		that.config.closeWrap.on('click',function(){
			$thisWrap.hide();
			 that.config.mask.hide();
			 that.isScroll(true);
		});
	}
}
//初始化弹出层
popup.init();
