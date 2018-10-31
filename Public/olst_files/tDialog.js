/**
 * @description 弹窗类
 * @constructor sam
 */
    var tDialog = function(op){
    this.args = {
        obj: null,
        confirmBtn: null,
        cancelBtn: null,
        closeBtn: null,
        onshow: null,
        onclose: null,
        onsure: null,
        oncancel:null,
        events:'click'
    };

    this.init = function(){
        $.extend(this.args,op||{});
        typeof this.args.obj == "string" && (this.args.obj = $(this.args.obj));$('body').append(this.args.obj);
        var self = this,args = self.args;
        args.obj.on('touchstart',function(e){
            //e.preventDefault();
        });
        args.confirmBtn && args.obj.find(args.confirmBtn).on(args.events,function(e){
            e.preventDefault();
            args.onsure ? (args.onsure.call(null,args.obj)):null;
            args.mask?args.mask.hide():null;
            self.close();
        });
        args.cancelBtn && args.obj.find(args.cancelBtn).on(args.events,function(e){
            e.preventDefault();
            args.oncancel ? (args.oncancel.call(null,args.obj)):null;
            args.mask?args.mask.hide():null;
            self.close();
        })
        args.closeBtn && args.obj.find(args.closeBtn).on(args.events,function(e){
            e.preventDefault();
            args.onclose ? (args.onclose.call(null,args.obj)):null;
            args.mask?args.mask.hide():null;
            self.close();
        });
        this.createMask();
    };
    this.createMask = function(){
        var $maskObj = $('<div class="mask-layer" id="J-MASK' + new Date().getTime() + '"style="position:fixed;z-index:98;background:rgba(0,0,0,0.5);left:0;top:0;display: none;width:' + (document.documentElement.clientWidth + document.body.clientWidth) + 'px; height:' + (document.documentElement.clientHeight + document.body.clientHeight) + 'px;"></div>');
        $('body').append($maskObj);
        $($maskObj).on('touchstart',function(e){
            e.preventDefault();
        })
        this.args.mask = $maskObj;
    };
    this.show = function () {
        var _arguments = arguments, self = this, args = self.args;
        var _x = ($(window).width() - args.obj.width())/2;
        var _y = ($(window).height() - args.obj.height()) / 2;
        this.args.mask.show();
        this.args.obj.css({'position':'fixed','zIndex':999,'top': _y, 'left': _x}).show();
        this.args.onshow ? this.args.onshow.call(this, _arguments) : null;
    };
    this.close = function () {
        this.args.obj.css({left:'9999px'});
        this.args.mask?this.args.mask.hide():null;
        this.args.onclose ? this.args.onclose.call(this) : null;
    };
    this.init();
    };
    window.tDialog = tDialog;
    window.$ = $ = Zepto;

