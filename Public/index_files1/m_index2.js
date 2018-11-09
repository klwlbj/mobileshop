/**
 * 
 * @authors zhuofangjun
 * @date    2016-10-14 
 * @version M站首页
 */
/*屏幕适配*/
(function (doc, win) {
    var docEl = doc.documentElement,
        resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
        recalc = function () {
            var clientWidth = docEl.clientWidth;
            if (!clientWidth) return;
            var size = htmlFontSize = 100 * (clientWidth / 750);
            docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
        };
    if (!doc.addEventListener) return;
    win.addEventListener(resizeEvt, recalc, false);
    doc.addEventListener('DOMContentLoaded', recalc, false);
})(document, window);

$(function () {
    var pageConfig = {
        likePageIndex: 1,/*猜你喜欢当前加载第几页*/
        TotalPage: -2,/*猜你喜欢可以加载的总页数*/
        flag: true,/*猜你喜欢一页是否加载完标志*/
        allflag: false,/*猜你喜欢是否全部加载完毕*/
        likeDataLenth: 1,/*猜你喜欢数据长度*/
        evenFunc: function () {
            searchJump();
            loginTop();
            scrollTopStyle();
            lunBo(1);
	    lunBo(2);
	    lunBo(3);
            lrSwiper('skill_list');
            lrSwiper('xklj_list');
            online();
            keFuLink();
            isShowBackTop();
            backTop();
            isLogin();
            //downloadApp(".download_app");
            closeDownload();
            showdownLoad();
        },
        ajaxFunc: function () {
            beginTime();
            getMkillList(100021);
            likeList();
            IsScrollFooter(likeList);
        }
    };
    /*搜索跳转*/
    function searchJump() {
        $("#search_value").focus(function (event) {
            window.location.href = urlConfig.m + "/search/SearchEntrance?KeyWord=";
        });
    };
    /*滚过轮播顶部改版样式*/
    function scrollTopStyle(){
        $(window).scroll(function() {
            var top = $(window).scrollTop();
            var top2 = $(".navlist").offset().top;
            var opacity = 0;
            if (top / top2 >= 0.85) {
              opacity = 0.85;
            } else {
              opacity = top / top2;
            }
            $(".opc-change").css("opacity", opacity);
            /*if ($("#search_value").is(":focus")) {
              $("#search").css({"opacity": 1});
            };*/
        });
    };
    /*轮播*/
    function lunBo(lunboIndex) {
        var mySwiper = new Swiper('#lunbo'+lunboIndex, {
            loop: true,
            autoplay: 3000,
            pagination: '#pagination'+lunboIndex,
			autoplayDisableOnInteraction:false
        });
    };
    /*Swiper左右滑动*/
    function lrSwiper(id){
        new Swiper('#'+id, {
            scrollbarHide: true,
            slidesPerView: 'auto',
            observer:true,
            observeParents:true,
            grabCursor: true
        });
    };
    /*开始执行倒计时*/
    function beginTime() {
        var time = parseInt(new Date().getTime()),//服务器当前时间
        endTime = new Date(),//秒杀结束时间
        hours = endTime.getHours();
        (hours >= 9 && hours < 21) ? endTime.setHours(11, 59, 59) : hours >= 21 ? endTime.setHours(23, 59, 59) : endTime.setHours(00, 00, 00);
        console.log(endTime);
        endTime = endTime.getTime() + 9 * 60 * 60 * 1000;
        skillTimeOut(time, endTime, 'skill_timeout', null);
    };
    /*倒计时*/
    function skillTimeOut(time, endTime, timesWarpID, callback) {
        this.startTime = time;  //获取当前时间,毫秒
        this.endTime = endTime;//结束时间,毫秒
        this.time = this.endTime - this.startTime; //开始和结束时相差的毫秒数
        if (this.time <= 1000) {  //如果已结到了结束时间了，那么就执行callback,回调函数
            callback && typeof callback == 'function' && callback.call(null);
            return; //时间到了就不必执行下面的代码，省点性能啦
        }
        var txt, d, h, m, s,
            bdId = document.getElementById(timesWarpID),
            prvh = new Date().getHours(),
            foramt = function (a) {  //结式化，就是保证两位数咯
                return a < 10 ? '0' + a : a;
            };
        (function () {  //匿名函数
            this.time -= 1000;  //倒计时，每1秒减1000
            d = Math.floor(this.time / 1000 / 60 / 60 / 24);
            h = Math.floor(this.time / 1000 / 60 / 60 % 24);
            m = Math.floor(this.time / 1000 / 60 % 60);
            s = Math.floor(this.time / 1000 % 60);
            if (d == 0) {
                if (prvh >= 9 && prvh < 21) {
                    txt = '9点场<span>' + foramt(h) + '</span>:<span>' + foramt(m) + '</span>:<span>' + foramt(s) + '</span>';
                } else {
                    txt = '21点场<span>' + foramt(h) + '</span>:<span>' + foramt(m) + '</span>:<span>' + foramt(s) + '</span>';
                }
            } else {
                if (prvh >= 9 && prvh < 21) {
                    txt = '9点场<span>' + foramt(d) + '</span>:<span>' + foramt(h) + '</span>:<span>' + foramt(m) + '</span>:<span>' + foramt(s) + '</span>';
                } else {
                    txt = '21点场<span>' + foramt(h) + '</span>:<span>' + foramt(m) + '</span>:<span>' + foramt(s) + '</span>';
                }
            }
            bdId.innerHTML = txt;
            if (this.time >= 1000) { //如果还没到结束时间的话1秒钟后调用自身 arguments.callee
                setTimeout(arguments.callee, 1000);
                return;
            };
            //时间到了的话就不执行上面的if了，直接回调函数callback了
            callback && typeof callback == 'function' && callback.call(null);
        })()
    };
    /*获取秒杀商品列表*/
    function getMkillList(skillId) {
        var url = '/SecKill/GetSecKillList?page=1&pageSize=10&type=1&channelCode=' + skillId + '&sort=4';
        $.get(url, function (data) {
            if (data == null || data.Data.length <= 0) {
                $("#skill_sec").hide();
                return;
            }
            var txt = '';
            for (var i = 0; i < data.Data.length; i++) {
                txt += '<li class="swiper-slide">\
                            <a href="/zhuanti/m_new_seckill.shtml" onclick="_gaq.push([\'_trackEvent\', \'wap首页\', \'秒杀-产品-图片\', \'0\', 0]);">\
                                <span class="skill-promotion">' + (data.Data[i].PrmPrice / data.Data[i].Price * 10).toFixed(1) + '折</span>\
                                <p class="skill-img"><img src="' + data.Data[i].wareInfo.Pic + '" alt="' + data.Data[i].wareInfo.WareName + '"></p>\
                                <p class="skill-vipprice">￥<span>' + data.Data[i].PrmPrice.toFixed(1) + '</span></p>\
                                <p class="skill-marprice">￥' + data.Data[i].Price.toFixed(1) + '</p>\
                            </a>\
                        </li>';
            }
            $("#skill_list ul").append(txt);
            lrSwiper('skill_list');
        });
    };
    /*猜你喜欢商品列表*/
    function likeList() {
        if (pageConfig.allflag) {
            return;
        }
        var url = '/DataPlatform/GetIndexGuessLikeProducts?pagesize=8&pageindex=' + pageConfig.likePageIndex;
        if (pageConfig.flag) {
            pageConfig.flag = false;
            $('.load-more').show();
            $.get(url, function (data) {
                var txt = '';
                pageConfig.likePageIndex++;
                pageConfig.likeDataLenth = data.Data.length;
                pageConfig.TotalPage = data.TotalPage;
                if (data.TotalCount <= 0)
                {
                    $('.user-like,.load-more').hide();
                    pageConfig.allflag = true;
                    return;
                }
                if (pageConfig.likePageIndex <= data.TotalPage && pageConfig.likePageIndex > 5) {
                    $('.load-more').hide();
                    pageConfig.allflag = true;
                }
                
                if (data.Data.length > 0) {
                    for (var i = 0; i < data.Data.length; i++) {
                        var pic180 = (data.Data[i].Pic180 != "" && data.Data[i].Pic180 != null && data.Data[i].Pic180 != "无" ? data.Data[i].Pic180 : window.urlConfig.multiDomain.res() + "/theme/default/img/nopic.jpg");
                        txt += '<li>\
                                        <a href="/product/' + data.Data[i].WareSkuCode + '.shtml?kzone=find_maybe_vindex" onclick="_gaq.push([\'_trackEvent\', \'wap首页-猜你喜欢\',\'' + data.Data[i].WareName + '\', \'0\', 0]);">\
                                            <p class="likepro-img"><img src="' + pic180 + '" alt="' + data.Data[i].WareName + '"></p>\
                                            <p class="likepro-name plr26 text-elli">' + data.Data[i].WareName + '</p>\
                                            <p class="likepro-price clearfix plr26"><span class="fl">￥<span>' + data.Data[i].SalePrice.toFixed(1) + '</span></span><span class="fr">￥' + data.Data[i].MarketPrice.toFixed(1) + '</span></p>\
                                        </a>\
                                    </li>';
                    }
                    $('#like_list ul').append(txt);
                }
                $('.load-more').hide();
                pageConfig.flag = true;
            });
        }

    };
    /*是否滚到底部*/
    function IsScrollFooter(callback, obj, distance) {
        var sY = 0;
        var r, scrollTop = 0, clientH = 0, scrollHeight = 0;
        var initDistance = distance || 150;
        /*获取scrollTop(当前滚动的top值)/clientH(当前窗口的高度)/scrollHeight(当前文档可滚动的高度)*/
        function getOptions() {
            scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
            clientH = window.innerHeight;
            scrollHeight = document.body.scrollHeight || document.documentElement.scrollHeight;
        };
        document.addEventListener("touchstart", function (event) {
            sY = event.touches[0].pageY;
        }, false);
        document.addEventListener("touchmove", function (event) {
            r = event.touches[0].pageY - sY;
            getOptions();
        }, false);
        document.addEventListener("touchend", function () {
            if (scrollTop + clientH >= scrollHeight - initDistance && r < 0) {
                callback(obj);
            }
        }, false);
        document.addEventListener("scroll", function () {
            getOptions();
            if (scrollTop + clientH >= scrollHeight - initDistance) {
                callback(obj);
            }
        });
    };
    /*在线客服*/
    function online() {
        $('#moreW').on('click', function (event) {
            $('.more-wrap').hasClass('cur') ? $('.more-wrap').removeClass('cur') : $('.more-wrap').addClass('cur');
            _gaq.push(['_trackEvent', 'wap新首页', '左侧-咨询浮标-图片', '0', 0]);
        });
    };
    /*客服链接跳转*/
    function keFuLink() {
        $('.zx2').on('click', function (event) {
            changeHref();
            _gaq.push(['_trackEvent', 'wap新首页', '右侧-在线咨询-按钮', '0', 0]);
        });
    };
    /*客服链接跳转判断*/
    function changeHref() {
        var url = "/Chat/GetGroupStateAndUrl?groupId=0105010";
        $.get(url, function (data) {
            if (data.indexOf("SessionId") == -1) {
                document.location = data + "?url=" + document.location + "&platform=2";
            } else {
                document.location = data + "&platform=2";
            }
        });
    };
    /*返回顶部按钮是否显示*/
    function isShowBackTop() {
        $(window).scroll(function () {
            var scrollTop = $(this).scrollTop();
            var scrollHeight = $(document).height();
            var windowHeight = $(this).height();
            if (scrollTop > 1000) {
                $(".index-top-wrap,.top-bg").show();
            }
            else if (scrollTop < 1000) {
                $(".index-top-wrap,.top-bg").hide();
            }
            if (scrollTop + windowHeight < scrollHeight - 100)
                return;
        });
    };
    /*返回顶部*/
    function backTop() {
        $(".index-top-wrap").click(function (event) {
            $("html,body").animate({ scrollTop: 0 }, 500);
        });
    };
    /*顶部登陆跳转*/
    function loginTop() {
        $('#indexLogin').on('click', function () {
            var ReturnUrl = window.location.href;
            var url = "/Login?ReturnUrl=" + ReturnUrl;
            window.location.href = url;
        });
    };
    /*判断是否登录*/
    function isLogin() {
        var url = '/Login/GetUserInfo';
        $.get(url, function (data) {
            if (data["LoginName"] == null) {
                $("#indexLogin").text('登录').removeClass('cur');
                $('#IsLogin a:nth-child(1)').text('登录');
            } else {
                $("#indexLogin").text('').addClass('cur');
                $('#IsLogin a:nth-child(1)').text('个人中心');
                $('#IsLogin').css('margin-left', '.6rem');
            }
        });
    };
    /*下载渠道*/
    function downloadApp(obj) {
        document.querySelector(obj).setAttribute("href", "http://m.360kad.com/zhuanti/kad_appdown_kad-wdbtcs.shtml?kzone=Mshouyetanchuang_dibu");
        /*var regIos = /iphone|ios|ipad|ipod/i;
        if(regIos.test(navigator.userAgent)){
            document.querySelector(obj).setAttribute("href","http://um0.cn/4dW9i7");
        }else{
            document.querySelector(obj).setAttribute("href","http://res.360kad.com/app/k/kad-wap1.apk");
        }*/
    };
    /*关闭底部固定下载渠道*/
    function closeDownload() {
        $('#closeFNav').on('click', function (event) {
            $('#lonw_warp').addClass('if-navcur');
            $('.index-kf-wrap, .kf-bg, .index-top-wrap, .top-bg').css('bottom', '1rem');
	$("body").removeClass("m_t");
	$("#search").removeClass("search_top");
        });
    };
    function showdownLoad() {
        var utm_source = getQueryString("utm_source");
        var utm_medium = getQueryString("utm_medium");
        if (utm_source == null) {
            $("#lonw_warp").show();
            return;
        }
        if (utm_source == "jianeka" && utm_medium.toLowerCase() == "cps") {
            $("#lonw_warp").hide();
            return;
        }
        if ($("#lonw_warp").length <= 0) {
            return;
        }
        $("#lonw_warp").show();
    };
    function getQueryString(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
        var r = window.location.search.substr(1).match(reg);
        if (r != null) return unescape(r[2]); return null;
    };
    pageConfig.evenFunc();
    pageConfig.ajaxFunc();
});

/*判断是电脑浏览器还是手机浏览器从而改变样式*/
$(function () {
(function(){
    var system ={}; 
    var p = navigator.platform;      
    system.win = p.indexOf("Win") == 0; 
    system.mac = p.indexOf("Mac") == 0; 
    system.x11 = (p == "X11") || (p.indexOf("Linux") == 0);    
    if(system.win||system.mac||system.xll){
//如果是电脑
        $('.skillt-r').css({
              'background':'url(http://res1.360kad.com/theme/mobile/img/m_index/go1.jpg) no-repeat right 0.1rem',
             'background-size':'0.14rem 0.24rem'
         });
    }else{  
//如果是手机
        $('.skillt-r').css({
              'background':'url(http://res1.360kad.com/theme/mobile/img/m_index/go1.jpg) no-repeat right 0.07rem',
             'background-size':'0.14rem 0.24rem'
         });
    }

})();
});

