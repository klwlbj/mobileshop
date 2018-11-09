define(['jquery'], function ($) {

    /**
     * 初始化锚点导航---自动滚动
     * @param {string} menuId 系统生成的menuId
     * @param {Number} type 0-有下拉 1-无下拉
     */
    function initNavAnchor(menuId, type) {
        var $tabview = $('#' + menuId);
        var extmenuid = $tabview.parents('.k-module').prop("id");
        var $menus = $('.k-module[data-extmenuid="' + extmenuid + '"]');
        if ($menus && $menus.length > 0) {
            var class_items_html = '';
            $menus.each(function (i) {
                var $that = $(this);
                var thatId = $that.prop("id");
                var that_extmenutitle = $that.attr("data-extmenutitle");
                var active_class = '';
                if (i == 0) {
                    active_class = ' active';
                }
                class_items_html += '<a class="class_item ' + active_class + '" auchor_module_id="' + thatId + '" href="javascript:;;">' + that_extmenutitle + '</a>';
            });
            $tabview.find('.class_box').empty().append(class_items_html);
            if (type === 0) {
                $tabview.find('.class_cats').empty().append(class_items_html);
            }
        }
        else {
            $tabview.parents('.k-module').remove();
        }

        //anchor
        var auchor_module_id = getAuchorCache();
        var _left = 0;
        if (auchor_module_id) {
            selectedTab(auchor_module_id);
        } else {
            $tabview.find('.class_item').eq(0).addClass('active');
        }
        $tabview.find('.class_box a').click(function () {
            if (!$(this).hasClass('active')) {
                $(this).addClass('active').siblings().removeClass("active");
                if (type === 0) {
                    $tabview.find('.class_cats a').eq($(this).index()).addClass('active').siblings().removeClass("active");
                }
            }
            if ($tabview.find('.class_tab').hasClass('class_show')) {
                $tabview.find('.class_tab').removeClass('class_show');
            }
            _left = $tabview.find('.class_box a').width() * ($(this).index() - 1);
            $tabview.find(".class_box").scrollLeft(_left);

            var auchor_module_id = $(this).attr("auchor_module_id");
            $("html,body").scrollTop($("#" + auchor_module_id).offset().top - $tabview.height());
            setAuchorCache(auchor_module_id);
        });
        if (type === 0) {
            $tabview.find('.class_cats a').click(function () {
                if (!$(this).hasClass('active')) {
                    $(this).addClass('active').siblings().removeClass("active");
                    $tabview.find('.class_box a').eq($(this).index()).addClass('active').siblings().removeClass("active");
                }
                if ($tabview.find('.class_tab').hasClass('class_show')) {
                    $tabview.find('.class_tab').removeClass('class_show');
                }
                _left = $tabview.find('.class_box a').width() * ($(this).index() - 1);
                $tabview.find(".class_box").scrollLeft(_left);

                var auchor_module_id = $(this).attr("auchor_module_id");
                $("html,body").scrollTop($("#" + auchor_module_id).offset().top - $tabview.height());
                setAuchorCache(auchor_module_id);
            });
            $tabview.find('.class_arrow').click(function () {
                if ($(this).parent().hasClass('class_show')) {
                    $tabview.find('.class_tab').removeClass('class_show');
                } else {
                    $tabview.find('.class_tab').addClass('class_show');
                }
            });
            $tabview.find('.class_tab_bg').click(function () {
                $tabview.find('.class_tab').removeClass('class_show');
            });
        }

        $(window).on("scroll", onScroll);
        onScroll();

        function onScroll() {
            //滚动时不要展开
            $tabview.find('.class_tab').removeClass('class_show');
            var tabview_top = $tabview.offset().top;
            var window_top = $(this).scrollTop();
            //导航展示隐藏
            var $last_anchor_module = $('.k-module[data-extmenuid="' + extmenuid + '"]:last');
            var last_anchor_top = $last_anchor_module.offset().top + $last_anchor_module.height() - $tabview.height();
            if (window_top >= tabview_top && window_top <= last_anchor_top) {
                $tabview.addClass("class_fixed");
                $tabview.find('.class_tabview div').eq(0).css('height', $tabview.find('.class_tabview').height());

            } else {
                $tabview.removeClass("class_fixed");
                $tabview.find('.class_tabview div').eq(0).css('height', 0);
            }
            //根据模块选中导航
            var $menus = $('.k-module[data-extmenuid="' + extmenuid + '"]');
            if ($menus && $menus.length > 0) {
                $menus.each(function (i) {
                    var anchor_module_top = $(this).offset().top;
                    var min = anchor_module_top - $tabview.height() - 20;
                    var max = anchor_module_top + $(this).height();
                    if (window_top > min && window_top < max) {
                        selectedTab($(this).prop("id"));
                        return;
                    }
                });
            }
        }
        function selectedTab(auchor_module_id) {
            $tabview.find('.class_tab .class_item').each(function () {
                if ($(this).attr('auchor_module_id') == auchor_module_id) {
                    $(this).addClass('active').siblings().removeClass("active");
                    _left = $tabview.find('.class_box a').width() * ($(this).index() - 1);
                }
            });
            $tabview.find(".class_box").scrollLeft(_left);
        }
        function setAuchorCache(auchor_module_id, cacheSecond) {
            if (!cacheSecond) {
                cacheSecond = 30;
            }
            if (window.localStorage) {
                var obj = {
                    value: auchor_module_id,
                    expires: cacheSecond,
                    date: new Date().getTime()
                };
                localStorage.setItem("auchor_module_id", JSON.stringify(obj));
            }
        }
        function getAuchorCache() {
            if (window.localStorage) {
                var cacheStr = localStorage.getItem("auchor_module_id");
                if (cacheStr) {
                    var cacheObj = JSON.parse(cacheStr);
                    //过期
                    var cached_time = (new Date().getTime() - cacheObj.date) / 1000;
                    if (cached_time > cacheObj.expires) {
                        return "";
                    }
                    return cacheObj.value;
                }
            }
            return "";
        }
    }

    /**
     * 初始化简单锚点导航---无滚动等
     * 
     * @param {string} menuId 系统生成的menuId
     */
    function initSimpleNavAnchor(menuId) {
        var $ul = $('#' + menuId);
        var extmenuid = $ul.parents('.k-module').prop("id");
        var $menus = $('.k-module[data-extmenuid="' + extmenuid + '"]');
        if ($menus && $menus.length > 0) {
            var class_items_html = '';
            $menus.each(function (i) {
                var $that = $(this);
                var thatId = $that.prop("id");
                var that_extmenutitle = $that.attr("data-extmenutitle");
                var active_class = '';
                if (i == 0) {
                    active_class = ' swiper-slide-active licur';
                }
                class_items_html += '<li class="swiper-slide clearfix ' + active_class + '" auchor_module_id="' + thatId + '"><span></span><font>' + that_extmenutitle + '</font></li>';
            });
            $ul.empty().append(class_items_html);
            var swiper_container = '.swiper-container-' + menuId;
            var swiper = new Swiper(swiper_container, {
                slidesPerView: 'auto',
                freeMode: true
            });
            $('#' + menuId + ' li').click(function () {
                var index = $(this).index();
                $(this).children('span').addClass("redbg").parent().siblings().children('span').removeClass("redbg");
                $(this).addClass("licur").siblings().removeClass("licur");
                /*由于异步加载数据导致页面高度发生变化 导致定位不准*/
                var id = $(this).attr("auchor_module_id");
                var menuH = $('#' + menuId).parents('.scroll-menu').height();
                if ($(window).scrollTop() > 0) {
                    $("html,body").animate({ scrollTop: ($("#" + id).offset().top - menuH) }, 500);
                } else {
                    $("html,body").animate({ scrollTop: ($("#" + id).offset().top - menuH * 2) }, 500);
                }
            });
            //导航条
            $(window).on('scroll', simpleNavAnchorScroll);
            simpleNavAnchorScroll();
        }
        else {
            $ul.parents('.k-module').remove();
        }
        function simpleNavAnchorScroll(params) {
            //导航展示隐藏
            var $scroll_menu = $ul.parents('.scroll-menu');
            var scroll_menu_top = $scroll_menu.parents('.k-module').offset().top;
            var window_top = $(this).scrollTop();
            var $last_anchor_module = $('.k-module[data-extmenuid="' + extmenuid + '"]:last');
            //var last_anchor_top = $last_anchor_module.offset().top + $last_anchor_module.height() - $scroll_menu.height();
            var last_anchor_top = $last_anchor_module.offset().top;
            if (window_top > scroll_menu_top && window_top < last_anchor_top) {
                // if (window_top > 0) {
                $('#' + menuId).parents(".scroll-menu").css({ "z-index": "99", "position": "fixed", "left": "0", "top": "0" });
            } else {
                $('#' + menuId).parents(".scroll-menu").css({ "z-index": "auto", "position": "static", "left": "auto", "top": "auto" });
            }
        }
    }
    return {
        initNavAnchor: initNavAnchor,
        initSimpleNavAnchor: initSimpleNavAnchor
    };
});