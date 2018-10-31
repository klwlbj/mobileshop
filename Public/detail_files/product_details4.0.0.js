/*详情页脚本*/
$(function() {
    /*
     图片延时加载，由于zepto无法计算display=none的元素，故none的图片无效
     */

    $('.ui-imglazyload').imglazyload();

    //验证手机号
    function phonereg(phoneNum) {
        var myreg = /^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
        return myreg.test(phoneNum.val());
    }
    //解决IOS软键盘fixed失效
    $(document).on('click', function(event) {
        var input = document.getElementById('Number');
        if (event.target != input) {
            $("#Number").blur();
        }
        if (event.target.id != 'goMore') {
            $('.details-nav-more').removeClass('cur');
        }
        if (event.target.id != 'moreW') {
            $('.more-wrap').removeClass('cur');
        }
    });
    $('input').on('focus', function() {
        if (isIOS()) {
            $('.details-nav').css('position', 'absolute');
            $('.details-footer').css('position', 'static');
            $('.details-wrap').css('padding-bottom', '0');
        }
    });
    $('input').on('blur', function() {
        if (isIOS()) {
            $('.details-nav,.details-footer').css('position', 'fixed');
            $('.details-wrap').css('padding-bottom', '1rem');
        }
    });
    //判断是否为IOS
    function isIOS() {
        if (/ipad|iphone|mac/i.test(navigator.userAgent)) {
            return true;
        } else {
            return false;
        }
    }
    //轮播图
    var mySwiper = new Swiper('.swiper-container1', {
        loop: false,
        autoplay: 5000, //可选选项，自动滑动
        pagination: '#pagination1'
    });
    //显示隐藏优惠
    $("#discountShow").on('click', function() {
        !$(this).hasClass('cur') ? $(this).addClass('cur').siblings('.discount-cont').show() : $(this).removeClass('cur').siblings('.discount-cont').hide();
    });
    //判断是否有在线咨询
    if ($('#chatGroupIds').val() == undefined) {
        $('.more-wrap').css({ 'height': '0.9rem', 'top': '-1.1rem' });
        $('#MlistWrap ul li:nth-child(1)').hide();
    }

    //右侧导航交互
    $('#moreW').on('click', function(event) {
        $('.more-wrap').hasClass('cur') ? $('.more-wrap').removeClass('cur') : $('.more-wrap').addClass('cur');
    });
    $('#Top').on('click', function() {
        $('body').scrollTop(0);
        $('.details-nav').show();
        $('.details-nav').children('span').eq(0).addClass('cur').siblings('span').removeClass('cur');
    });
    $('.information-product-service').on('click', function() {
        _gaq.push(['_trackEvent', 'wap详情页', '中部-服务与承诺-展开', '0', 0]);
        $('.details-service-wrap').show();
        //服务与承诺
        var mySwiper5 = new Swiper("#swiper5", {
            slidesPerView: 'auto',
            direction: 'vertical',
            observer: true, //修改swiper自己或子元素时，自动初始化swiper
            observeParents: true, //修改swiper的父元素时，自动初始化swiper
            freeMode: true
        });
    });
    // 禁止滑动
    $('.service-bg,#black_bg').on('touchmove', function(e) {
        closeBody();
    });
    //解除禁止
    $('#closeService,#close_package').on("click", function(e) {
        openBody();
        $('.details-service-wrap').hide();
    });
    //分享
    $('.shareicon').on('click', function(event) {
        $('.share-layer').show();
        closeBody();
    });
    $('.share-btn').on('click', function(event) {
        $('.share-layer').hide();
        openBody();
    });

    //禁止滑动
    function closeBody() {
        document.addEventListener("touchmove", function(e) {
            e.returnValue = false;
        }, false);
    }
    //解除禁止
    function openBody() {
        document.addEventListener("touchmove", function(e) {
            e.returnValue = true;
        }, false);
    }
    if ($('#onloadApp').length > 0 && $('#onloadApp').get(0).style.display != 'block') {
        $('#onloadApp').show();
        $('.details-nav-more').css('top', '1rem');
    }
    $('.gomore').on('click', function(event) {
        $('#onloadApp').get(0).style.display == 'block' ? $('.details-nav-more').css('top', '1rem') : $('.details-nav-more').css('top', '1.12rem');
        !$('.details-nav-more').hasClass('cur') ? $('.details-nav-more').addClass('cur') : $('.details-nav-more').removeClass('cur');
    });
    //拖动到底部加载更多
    var scrollt1 = $('.details-information').height(),
        flag2 = false,
        windowH = window.screen.height,
        isShowload = true;
    ProductDetails('.details-Graphic');

    function ProductDetails(b) {
        var startPosition, endPosition, flag = true;
        var checkborder = function() {
            return ($(window).scrollTop() + $(window).height() > $(document).height() - 20) ? 'bottom' : ($(window).scrollTop() < 5) ? 'top' : null;
        };
        touch.on('body', 'touchstart', function(e) {
            e.stopPropagation();
            flag = checkborder();
            var touch = e.touches[0];
            startPosition = {
                x: touch.pageX,
                y: touch.pageY
            };
            endPosition = undefined;
            //touchEventFun();
        });
        touch.on('body', 'touchmove', function(e) {
            e.stopPropagation();
            var touch = e.touches[0];
            endPosition = {
                x: touch.pageX,
                y: touch.pageY
            };
            touchEventFun();
        });
        touch.on('body', 'touchend', function(e) {
            e.stopPropagation();
            touchEventFun();

        });
        var touchEventFun = function() {
            if (!startPosition) {
                return;
            }
            if (!endPosition) {
                return;
            }
            var diance = startPosition.y - endPosition.y;
            scrollt1 = $('.details-information').height();
            clearTimeout(a);
            var a = setTimeout(function() {
                if (!isShowload) return;
                if ($('body').scrollTop() > 50) {
                    // $('#onloadApp').hide();
                    $('.details-nav-more').css('top', '1.12rem');
                } else {
                    // $('#onloadApp').show();
                    $('.details-nav-more').css('top', '1rem');
                }
            }, 200);
            if (startPosition.y > endPosition.y && Math.abs(diance) >= 10) {
                if (flag == 'bottom') {
                    var objStatu = $(b).get(0).style.display;
                    var objStatu2 = $('.details-specification').get(0).style.display;
                    if (objStatu != 'block' && objStatu2 != 'block') {
                        if (!flag2) {
                            flag2 = true;
                            $(b).show();
                            $('.details-specification').hide();
                            $('.detials-adv-wrap').css('display', '-webkit-box');
                        }
                        $('.information-product-morewrap').remove();
                    }
                }
                if (scrollt1 > 0 && $('body').scrollTop() > scrollt1) {
                    $('.details-nav').show();
                } else {
                    //$('.details-nav').hide();
                }
            } else if (startPosition.y < endPosition.y && Math.abs(diance) >= 10) {
                $('.details-nav').show();
            }
            if (scrollt1 > 0 && $('body').scrollTop() > 0) {
                if ($('body').scrollTop() > scrollt1) {
                    $(".active-area").show();
                    $('.details-Graphic').get(0).style.display == 'block' ? $('.details-nav span').eq(1).addClass('cur').siblings('span').removeClass('cur') : $('.details-nav span').eq(2).addClass('cur').siblings('span').removeClass('cur');
                } else {
                    $('.details-nav span').eq(0).addClass('cur').siblings('span').removeClass('cur');
                }
            }
        }

    }

    $('.details-nav span').on('click', function() {
        var index = $(this).index();
        $(this).addClass('cur').siblings().removeClass('cur');
        if (index == 0) {
            $('body').scrollTop(0);
            _gaq.push(['_trackEvent', 'wap详情页', '商品详情-商品详情-按钮', '0', 0]);
        } else if (index == 1) {
            $('.details-Graphic,.active-area').show().siblings('.details-specification').hide();
            $('.information-product-morewrap').remove();
            scrollt1 = $('.details-information').height();
            $('body').scrollTop(scrollt1);
            _gaq.push(['_trackEvent', 'wap详情页', '商品详情-图文详情-按钮', '0', 0]);
        } else {

            $('.details-Graphic,.active-area').hide().siblings('.details-specification').show();
            $('.information-product-morewrap').remove();
            scrollt1 = $('.details-information').height();
            $('body').scrollTop(scrollt1);
            _gaq.push(['_trackEvent', 'wap详情页', '商品详情-商品详情-按钮', '0', 0]);
        }
    });
    /*
     收藏
     */
    var collect = function(callback) {
        var $collectP = $('#collection');
        $.ajax({
            url: '/Favorite/HasCollect?sku=' + $("#kad-productSkuId").val(),
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data.Code == 0) {
                    $collectP.addClass('cur');
                }
                callback && typeof callback == 'function' && callback.call(null, $collectP, data)
            }
        })
    };
    collect(function(obj, data) {
        obj.on('click', function(e) {
            var collect_selected = obj.hasClass('cur'),
                ids = $("#kad-productSkuId").val();
            if (collect_selected) {
                $.ajax({
                    url: '/Favorite/DeleteByProductId?productId=' + ids,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.Code == 0) {
                            obj.removeClass('cur');
                            addTocarTips('取消收藏', 3000);
                        } else {
                            addTocarTips(data.Message, 3000);
                        }
                    }
                })
            } else {
                $.ajax({
                    url: '/Favorite/AjaxCreate?productId=' + ids,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data.Code == 0) {
                            obj.addClass('cur');
                            addTocarTips('收藏成功', 3000);
                        } else {
                            addTocarTips(data.Message, 3000);
                        }
                    }
                })
            }
        })
    });
    /*顶部下载app*/
    // $('#onloadApp').css('margin-top',$('.details-nav').height());
    if ($('#onloadApp').length > 0) {

    }
    $('#closeOnload').on('click', function(event) {
        event.preventDefault();
        $('.details-nav-more').css('top', '1.12rem');

        $(this).parent('#onloadApp').hide();
        isShowload = false;
    });

    //登陆提示
    function gologin() {
        $('#Layer').show();
        closeBody();
        $('#LcontWrap').show();
        $('#LNot').show();
        $('#LOk').show();
        $('#LNow').hide();
        $('#LContSize').hide();
        $('#txtPhoneCall').hide();
        $('#txtemail').hide();
        $('#LTitle').text('亲，登录之后才能收藏哦！');
        $('#LOk').off().on('click', function(event) {
            GotoLoginPage();
        });
        $('#LNot').off().on('click', function(event) {
            $('#LcontWrap').hide();
            $('#Layer').hide();
            openBody();
        });
    }
    //转到登录页
    function GotoLoginPage() {
        var ReturnUrl = window.location.href;
        var url = urlConfig.m + "/Login?ReturnUrl=" + ReturnUrl;
        window.location.href = url;
    }
    /*
    业务逻辑部分
     */
    var config = {
            id: $("#kad-productSkuId").val(),
            checkOphoneArr: [],
            memory: {
                isVirtualMainWareSku: $('#kad-prductIsVirtualMainWareSku').val() === '1',
                txt: '',
                singlePrice: $("#kad-prductSalePrice").val(),
                showPrice: '',
                offMoney: '',
                day: $("#kad-productUseDay").val(),
                vipMoney: $("#kad-prductSalePrice").val(),
                totalMoney: '',
                isStock: false,
                currentNum: [],
                currentPrice: [],
                packageRxType: [],
                packageBuySize: ['加入购物车', '立即参加', '门店登记', '咨询药师', '到货通知'],
                skuBuySize: ['加入购物车', '立即参加', '门店登记', '咨询药师', '到货通知'],
                skuBuySizeIds: ['addCart', 'buyRx', 'buyRx2', 'buyRx3', 'notGoods'],
                maxBuyCount: 0,
                isSeckill: false,
                seckillCount: 0,
            },
            /**
             * 800图位置营销模块
             */
            hotRecommendsConfig: {
                /**
                 * 营销导航模块配置
                 */
                navMoudleCofig: {
                    /**
                     * 本品 默认启用且已初始数据
                     */
                    navMain: {
                        swiperContainerClass: ".swiper-container-thisProducts",
                        swiperPaginationClass: ".swiper-pagination-thisProducts",
                        nestOutsideClass: ".nestOutsideSwiper__tab__item--active",
                        isEnabled: true, //是否启用
                        isReady: true, //是否已准备好
                    },
                    /**
                     * 活动
                     */
                    navAct: {
                        swiperContainerClass: ".swiper-container-activityProducts",
                        swiperPaginationClass: ".swiper-pagination-activityProducts",
                        nestOutsideClass: ".nestOutsideSwiper__tab__item__activityProductsIco",
                        isEnabled: false,
                        isReady: false
                    },
                    /**
                     * 搭配
                     */
                    navPack: {
                        swiperContainerClass: ".swiper-container-matchProducts",
                        swiperPaginationClass: ".swiper-pagination-matchProducts",
                        nestOutsideClass: ".nestOutsideSwiper__tab__item__matchProductsIco",
                        isEnabled: false,
                        isReady: false
                    },
                    /**
                     * 同类
                     */
                    navSame: {
                        swiperContainerClass: ".swiper-container-similarProducts",
                        swiperPaginationClass: ".swiper-pagination-similarProducts",
                        nestOutsideClass: ".nestOutsideSwiper__tab__item__similarProductsIco",
                        isEnabled: false,
                        isReady: false
                    },
                    /**
                     * 获取所有营销模块
                     * 
                     * @returns 所有营销模块数组
                     */
                    getAllNavMoudles: function() {
                        var that = this;
                        var navMoudleArr = [that.navMain, that.navAct, that.navPack, that.navSame];
                        return navMoudleArr;
                    }
                },
                getDefaultPic: function(sku) {
                    var url = window.urlConfig.res + "/theme/default/img/nopic.jpg?sku=" + sku;
                    return url;
                }
            },
            isRx: $('#kad-productIsRx').val().toLowerCase() === true.toString().toLowerCase(), //是否处方
            wareName: ($('.information-product-name').text() || ""), //商品名称
            /**
             * 获取有效的图片url
             */
            getValidPic: function(picUrl) {
                if (picUrl && picUrl != '' && picUrl != '无') {
                    return picUrl;
                }
                return window.urlConfig.multiDomain.res() + "/theme/default/img/nopic.jpg";
            },
        }
        // 初始化
    initButton();
    getPrice(true);
    readStock();
    calculatedPrice();
    showColorSpec();
    showProductPromoteLabel(config.id);
    setTimeout(function() { recommend(); }, 200);
    setTimeout(function() { $(window).bind("scroll", lazyLoadMain); }, 500);
    setTimeout(function() { SetProductHistory(); }, 500);
    showdownLoad();
    //显示大促LOGO图标
    function showProductPromoteLabel(productId) {
        $.ajax({
            url: "/Product/GetProductPromoLabel?productIds=" + productId,
            type: "post",
            cache: false,
            dataType: "json",
            success: function(data) {
                var rd = Math.random();
                for (var i = 0; i < data.length; i++) {
                    var m = $("span[promotionsku='" + data[i].WareSkuCode + "']");
                    if (data[i].PromoLabel > 0) {
                        m.html("<img src=\"" + urlConfig.res + "/theme/mobile/img/iconimg/product/producticon_" + data[i].PromoLabel + ".png?rd=" + rd + "\"  />")
                        m.show();
                    }
                }
            }
        });
    };
    //倒计时
    function TimeCountDonw(time, endTime, timesWarpID, callback) {
        this.startTime = time;
        this.endTime = endTime;
        this.time = this.endTime - this.startTime;
        if (this.time <= 1000) {
            callback && typeof callback == 'function' && callback.call(null);
            return;
        }

        var t, d, h, m, s,
            bd = document.getElementById(timesWarpID),
            foramt = function(a) {
                return a < 10 ? '0' + a : a;
            };
        (function() {
            this.time -= 1000;
            d = Math.floor(this.time / 1000 / 60 / 60 / 24);
            h = Math.floor(this.time / 1000 / 3600 % 24);
            m = Math.floor(this.time / 1000 / 60 % 60);
            s = Math.floor(this.time / 1000 % 60);
            if (d > 0) {
                t = '距结束还剩:<span>' + foramt(d) + '</span>天<span>' + foramt(h) + '</span>时<span>' + foramt(m) + '</span>分<span>' + foramt(s) + '</span>秒';
            } else {
                t = '距结束还剩:<span>' + foramt(h) + '</span>时<span>' + foramt(m) + '</span>分<span>' + foramt(s) + '</span>秒';
            }
            bd.innerHTML = t;
            if (this.time >= 1000) {
                setTimeout(arguments.callee, 1000);
                return;
            }

            callback && typeof callback == 'function' && callback.call(null);
        })()
    };

    function secKillTagShow(SingleQty) {
        if (!SingleQty) return;
        var txt = "<div class='discount-cont-curpon-box show'><span class='discount-cont-type type-child-m1'>限制</span><div class='discount-cont-r'><li><span class='discount-cont-size' >秒杀价格不与其他优惠同时享用！</span></li></div></div><div class='discount-cont-curpon-box show'><span class='discount-cont-type type-child-m2'>限购</span><div class='discount-cont-r'><li><span class='discount-cont-size'>购买" + (SingleQty == 1 ? '1' : '1-' + SingleQty) + "件时享受优惠，超出数量以结算价为准</span></li></div></div>";
        $('.information-product-skillTime').css('display', '-webkit-box');
        $("#discountC").prepend(txt);
        $('#discountW').show();
        $('.information-product-slogan').text("本商品正在参与限量秒杀中，抢完为止。");
    }

    function getPrice(isFirst) {
        var that = config;
        var rd = Math.random();
        var quantity = $("#Number").val();
        var url = "/product/getprice?wareskucode=" + that.id + "&quantity=" + quantity + "&rd=" + rd;
        $.get(url, function(data) {
            that.memory.offMoney = data.StyleInfo.Price.toFixed(2);
            if (isFirst) {
                that.memory.vipMoney = data.StyleInfo.SalePrice.toFixed(2);
                that.memory.singlePrice = data.StyleInfo.Price.toFixed(2);
            }
            var parsefloat = data.StyleInfo.Price.toFixed(2),
                originalPrice = data.StyleInfo.OrigPrice.toFixed(2) || 0,
                priceName = "",
                text = '',
                priceMarket = '';
            if (originalPrice > parsefloat) {
                priceMarket = originalPrice;
            }
            if (data.Style == "SecKillStyle") {
                if (isFirst) {
                    var time = parseInt(new Date().getTime());
                    var endTime = parseInt(data.StyleInfo.SeckillEndTime.slice(6, -2));
                    TimeCountDonw(time, endTime, 'TimeCountDonw', null);
                    secKillTagShow(data.StyleInfo.SingleQty);
                }
                config.memory.seckillCount = data.StyleInfo.SingleQty;
                config.memory.isSeckill = true;
            }
            if (data.Style == "IntervalStyle") {
                parsefloat = data.StyleInfo.MinSalePrice + "-" + data.StyleInfo.MaxSalePrice;
                $('#skillPrice').html('<span>￥</span>' + parsefloat);
            }

            if (data.Style == "LessStyle" && isFirst) {
                $("#salePrice").hide();
                $("#savePrice").hide();
                $(".product-iphone-div .skill-size").html("比PC省" + (data.StyleInfo.PcPrice - data.StyleInfo.Price).toFixed(2) + "元");
                $(".product-iphone-div").show();

            }
            if (data.Style == "ActivityStyle" && isFirst) {
                that.memory.vipMoney = data.StyleInfo.Price.toFixed(2);
                $(".product-mendian-div .box-flex").eq(0).html(data.StyleInfo.Title + data.StyleInfo.ActivityStockNum + "," + data.StyleInfo.LeftStockNum);
                $(".product-mendian-div").show();
            }
            if (data.Style == "SaveStyle" && isFirst) {
                $(".product-sales-div .box-flex").eq(1).html("比平时还省" + data.StyleInfo.LessPrice.toFixed(2) + "元");
                $(".product-sales-div").show();
            }
            if (data.Style == "CourseStyle") {

            }
            $("#AllTreat").html("￥" + (data.StyleInfo.Price * quantity).toFixed(2));
            if (isFirst) {
                $("#salePrice").html("￥" + data.StyleInfo.OrigPrice.toFixed(2));
                $("#skillPrice").html("<span>￥</span>" + parsefloat);
            }
            if (data.StyleInfo.LessPrice > 0 && isFirst) {
                $('#savePrice').text('立省' + data.StyleInfo.LessPrice.toFixed(2) + '元');
            } else if (data.StyleInfo.LessPrice == 0 && isFirst) {
                $('#savePrice').text("");
            }
            if ((data.Style == "CommonStyle" || data.Style == "ActivityStyle") && isFirst) {
                if (data.StyleInfo.OrigPrice > data.StyleInfo.Price) {
                    $('#savePrice').text('立省' + (data.StyleInfo.OrigPrice - data.StyleInfo.Price).toFixed(2) + '元');
                }
            }

            if (data.StyleInfo.LessPrice > 0) {
                $('#SaveTreat').text((data.StyleInfo.LessPrice * quantity).toFixed(2));
            } else if (data.StyleInfo.LessPrice == 0) {
                $('#SaveTreat').text("0.00");
            }
            changeNum(quantity, that);
            if (isFirst) {
                commonSetPackageStep1();
                getSameGeneralNameWares();
            }
        });
    };
    /*
     读取秒杀，限时优惠的公共函数 //TODO del
     */
    function commonReadPriceInfo() {
        var _this = config;
        if (_this.memory.txt != '') {
            $('#skillPrice').html('<span>￥</span>' + _this.memory.showPrice);
            $('#AllTreat').text('￥' + _this.memory.offMoney);
            $('.skill-size').eq(0).text(_this.memory.txt).show();
            $('#salePrice').text(_this.memory.vipMoney).show();
            $('#savePrice').text('立省' + (_this.memory.vipMoney - _this.memory.offMoney).toFixed(2) + '元');
            $('#SaveTreat').text((_this.memory.vipMoney - _this.memory.offMoney).toFixed(2));
        } else {
            $('#skillPrice').html('<span>￥</span>' + _this.memory.showPrice);
        }
    };
    //加载疗程优惠装
    function commonSetPackageStep1() {
        var that = config,
            smiple = '',
            smiple2 = '',
            uDay = that.memory.day;
        //800图营销疗程优惠 最多6条
        var hotRecommends_Special = '<div class="swiper-slide"><div class="activityProducts__treatment flex flex-v flex-pack-center"><span class="activityProducts__treatment__lable">疗程优惠</span>';
        var hotRecommends_Special2 = '',
            thatSpecialCount = 0,
            maxSpecialCount = 5;
        if (uDay <= 0) { $('#UserDay').parent('span').hide(); }
        $.ajax({
            url: '/Product/GetNowActivityList?productId=' + that.id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                var flagshow = false;
                if (data.length > 0) {
                    for (var j = 0; j < data.length; j++) {
                        if (data[j].PrmTypeCode == 'FullAmountSpecial') {
                            flagshow = true;
                            $('.treatment-cont').show();
                            $('.treatment-price-cont').css('padding-top', '.14rem');
                            var flag = false;
                            var special = data[j].Special || [];
                            smiple2 = '<li num="1" total="' + that.memory.singlePrice + '" day="' + Math.floor(uDay) + '" ><span class="treatment-num">1件起</span><span class="treatment-price">' + that.memory.singlePrice + '元/件</span></li>';
                            thatSpecialCount += 1;
                            hotRecommends_Special2 = '<div class="activityProducts__treatment__item block clearfix" num="1"><p class="fl">满1件起</p><p class="fr"><span class="activityProducts__treatment__item__salePrice">' + that.memory.singlePrice + '</span>元/件</p><i class="activityProducts__treatment__item__line"></i></div>';
                            that.memory.currentNum.push(1);
                            that.memory.currentPrice.push(that.memory.vipMoney);
                            for (var i = special.length - 1; i >= 0; i--) {
                                var num = special[i].LimitedAmount || 0,
                                    prmPrice = that.memory.isSeckill && that.memory.seckillCount >= num ? parseFloat(that.memory.singlePrice) : (special[i].PrmPrice || 0),
                                    total = (num * prmPrice).toFixed(2),
                                    days = Math.floor(num * uDay);
                                if (num == 1 && !flag) {
                                    flag = true;
                                    smiple2 = '';
                                    thatSpecialCount -= 1;
                                    hotRecommends_Special2 = '';
                                    that.memory.currentNum.splice(0, 1);
                                    that.memory.currentPrice.splice(0, 1);
                                }
                                smiple += '<li num="' + num + '" total="' + total + '" day="' + days + '" ><span class="treatment-num">' + num + '件起</span><span class="treatment-price">' + prmPrice.toFixed(2) + '元/件</span></li>';
                                if (thatSpecialCount <= maxSpecialCount) {
                                    thatSpecialCount += 1;
                                    hotRecommends_Special += '<div class="activityProducts__treatment__item block clearfix" num="' + num + '"><p class="fl">满' + num + '件起</p><p class="fr"><span class="activityProducts__treatment__item__salePrice">' + prmPrice.toFixed(2) + '</span>元/件</p><i class="activityProducts__treatment__item__line"></i></div>';
                                    if (thatSpecialCount == maxSpecialCount) {
                                        hotRecommends_Special2 = '';
                                    }
                                }
                                that.memory.currentNum.push(special[special.length - i - 1].LimitedAmount);
                                that.memory.currentPrice.push(special[special.length - i - 1].PrmPrice.toFixed(2));
                            }
                            $('#totalPackage').html(smiple + smiple2);
                            $('#totalPackage li').eq(0).addClass('cur');
                            var allPrice = '￥' + $('#totalPackage li').eq(0).attr('total');
                            var SaveTreat = (($('#totalPackage li').eq(0).attr('num') * that.memory.vipMoney) - $('#totalPackage li').eq(0).attr('total')).toFixed(2);
                            $('#AllTreat').text(allPrice);
                            $('#SaveTreat').text(SaveTreat);
                            $('#UserDay').text($('#totalPackage li').eq(0).attr('day'));
                            //TODO 800图营销疗程优惠
                            that.hotRecommendsConfig.navMoudleCofig.navAct.isEnabled = true;
                            $('.swiper-container-activityProducts .swiper-wrapper').append(hotRecommends_Special + hotRecommends_Special2 + '</div></div>');
                            //筛选疗程装
                            $('#totalPackage li,.activityProducts__treatment__item').click(function(e) {
                                e.preventDefault();

                                var num = $(this).attr('num');;
                                //800图营销位置疗程
                                $('.activityProducts__treatment__item[num="' + num + '"]').addClass('activityProducts__treatment__item--active').siblings().removeClass('activityProducts__treatment__item--active');
                                //下面活动位置疗程
                                var $thatLi = $('#totalPackage li[num="' + num + '"]');
                                $($thatLi).addClass('cur').children('.treatment-num').css('border-right', 'solid 1px #fc9494');
                                $($thatLi).siblings('li').removeClass('cur').children('.treatment-num').css('border-right', 'solid 1px #eee');
                                var allPrice = '￥' + $($thatLi).attr('total');
                                var num = $($thatLi).attr('num');
                                var SaveTreat = ((num * that.memory.vipMoney) - $($thatLi).attr('total')).toFixed(2);
                                $('#AllTreat').text(allPrice);
                                $('#SaveTreat').text(SaveTreat);
                                $('#UserDay').text($($thatLi).attr('day'));
                                $('#Number').val(num);
                                num > 1 ? $('#Reduce').removeClass('cur') : $('#Reduce').addClass('cur');
                            });
                        }
                    }
                    setTimeout(function() { $("#totalPackage li").eq(0).click(); }, 300);
                    discount(data);
                    showLiaoChenAtmosphere(data);
                    //isNoneLeftSign();
                } else {
                    config.hotRecommendsConfig.navMoudleCofig.navAct.isReady = true;
                    initHotRecommendsSwiper();
                }
                if (!flagshow) {
                    $('.treatment-cont').hide();
                    $('.treatment-title a').text('数量');
                    var allPrice = that.memory.offMoney == '' ? that.memory.vipMoney : that.memory.offMoney;
                    var SaveTreat = parseInt(0).toFixed(2);
                    $('#AllTreat').text('￥' + allPrice);
                    $('#SaveTreat').text(SaveTreat);
                    $('#UserDay').text(Math.floor(uDay));
                    if ($(".double11-hot-promote").length > 0) {
                        $(".double11-hot-promote").hide();
                    }
                }

                //GetSeckillPrice();
            }

        });
    };

    /*疗程氛围*/
    function showLiaoChenAtmosphere(data) {
        if ($("#double11_lcjh").length <= 0)
            return;
        $("#double11_lcjh").empty();
        var count = 0,
            maxCount = 2;
        for (var j = 0; j < data.length; j++) {
            if (data[j].PrmTypeCode == 'FullAmountSpecial') {
                var special = data[j].Special || [];
                for (var i = special.length - 1; i >= 0; i--) {
                    var num = special[i].LimitedAmount || 0,
                        prmPrice = special[i].PrmPrice || 0;
                    $("#double11_lcjh").append("<span>" + num + "件起<i>" + prmPrice.toFixed(2) + "</i>元/件</span>");
                    count++;
                    if (count >= maxCount) {
                        break;
                    }
                }
            }
        }
        if ($("#double11_lcjh").html().trim() != "") {
            $("#double11_lcjh").show();
            $(".nestOutsideSwiper .swiper-container-thisProducts .thisProducts").height("5.1rem");
            //$(".nestOutsideSwiper .swiper-container-thisProducts").remove();
$('.swiper-container-thisProducts .thisProducts .video-related').css('bottom','1.4rem');
        }
    }
    //加载优惠套餐
    //FullAmtDiscount 满金额减  FullAmountDiscount满数量减 
    //FullAmtAdditionalBuy满金额加价购 FullAmountAdditionalBuy满数量加价购 
    //FullAmtGift满金额赠品 FullAmountGift满数量赠品
    //FullAmtGiftPrm满金额送优惠券 FullAmountGiftPrm满数量送优惠券
    //WareFreeShip免运费 MoneyFreeShip单品免运费 CusGradeFreeShip客户等级免邮费 AreaFreeShip区域免运费
    //CouponFullAmtDiscount优惠券
    function discount(data) {
        var that = config,
            pageData = '',
            pageIner1 = '',
            pageIner2 = '',
            pageIner3 = '',
            pageIner4 = '',
            pageIner5 = '',
            pageIner6 = '',
            prmType = ['FullAmtDiscount', 'FullAmountDiscount', 'FullAmtAdditionalBuy', 'FullAmountAdditionalBuy', 'FullAmtGift', 'FullAmountGift', 'FullAmtGiftPrm', 'FullAmountGiftPrm', 'WareFreeShip', 'MoneyFreeShip', 'CusGradeFreeShip', 'AreaFreeShip', 'CouponFullAmtDiscount'];
        //800图营销满赠/换购
        var recommendsGiftActs = [],
            recommendsAddBuyActs = [];
        for (var i = 0; i < prmType.length; i++) {
            for (var j = 0; j < data.length; j++) {
                var thisPrmType = prmType[i],
                    dataPrmType = data[j].PrmTypeCode;
                if (thisPrmType == dataPrmType) {
                    switch (i) {
                        case 0:
                            var txt = '';
                            for (var k = 0; k < data[j].Condition.length; k++) {
                                if (data[j].Condition[k].CondDesc) {
                                    if (k == data[j].Condition.length - 1) {
                                        txt += data[j].Condition[k].CondDesc;
                                    } else {
                                        txt += data[j].Condition[k].CondDesc + '；';
                                    }

                                }
                            }
                            if (data[j].Condition.length > 1 || mainWareSkuCode != $("#kad-productSkuId").val() || $("#kad-productIsRx").val() == "True" || config.memory.isSeckill) {
                                pageIner1 += '<li><span class="discount-cont-size">' + txt + '</span></li>';
                            } else {
                                pageIner1 += '<li><span class="discount-cont-size">' + txt + '</span>&nbsp<a href="/search/fullmoney?pageText=' + data[j].PrmCode + '" style="color:#06a6f8;">查看更多</a></li>';
                            }

                            break;

                        case 1:
                            var txt = '';
                            for (var k = 0; k < data[j].Condition.length; k++) {
                                if (k == data[j].Condition.length - 1) {
                                    txt += data[j].Condition[k].CondDesc;
                                } else {
                                    txt += data[j].Condition[k].CondDesc + '；';
                                }
                            }
                            pageIner1 += '<li><span class="discount-cont-size">' + txt + '</span></li>';
                            break;

                        case 2:
                            var txt = '';
                            for (var k = 0; k < data[j].Condition.length; k++) {
                                var thatCond = data[j].Condition[k];
                                txt += '<li><span class="discount-cont-size">' + thatCond.CondDesc + '</span></li>';

                                //TODO 800图营销换购
                                var addBuyActHtml = "";
                                var giftWareCodeArr = [];
                                for (var giftIndex = 0; giftIndex < thatCond.GiftSet.length; giftIndex++) {
                                    var thatGift = thatCond.GiftSet[giftIndex];
                                    //TODO 800图营销换购 换购html处理
                                    addBuyActHtml += '<div class="swiper-slide">' +
                                        '<a href="/product/' + thatGift.PrmContentCode + '.shtml?kzone=800dj&warename=' + that.wareName + '&skucode=' + that.id + '" class="activityProducts__redemption block" >' +
                                        '<div class="activityProducts__redemption__lable">' + (that.isRx ? '换取' : '换购') + '</div>' +
                                        '<div style="position: relative;">' +
                                        (thatGift.SingleQty > 1 ? ('<span class="activityProducts__receive__productItem_lable">X' + thatGift.SingleQty + '</span>') : '') +
                                        '<img src="' + that.hotRecommendsConfig.getDefaultPic(thatGift.PrmContentCode) + '" alt="" class="activityProducts__redemption__Pic180 block" />' +
                                        '</div>' +
                                        '<p class="activityProducts__redemption__WareName01">' + ((that.isRx ? '预定' : '买') + that.wareName) + '</p>' +
                                        '<p class="activityProducts__redemption__Advertisement">满' + (thatCond.LimitedAmt.toFixed(2)) + '元+' + ((thatGift.PrmContentPrice * thatGift.SingleQty).toFixed(2)) + '元 即可获得</p>' +
                                        '<p class="activityProducts__redemption__salePrice">价值 ' + (thatGift.Price.toFixed(2)) + '元</p>' +
                                        '<p class="activityProducts__redemption__WareName02">' + thatGift.PrmContentName + '</p>' +
                                        '</a >' +
                                        '</div > ';
                                    giftWareCodeArr.push(thatGift.PrmContentCode);
                                }
                                var giftAct = {
                                    prmCode: thatCond.PrmCode,
                                    LimitedAmt: thatCond.LimitedAmt,
                                    GiftWareCodeArr: giftWareCodeArr,
                                    Html: addBuyActHtml
                                };
                                recommendsAddBuyActs.push(giftAct);
                            }
                            pageIner2 += txt;
                            break;

                        case 3:
                            var txt = '';
                            for (var k = 0; k < data[j].Condition.length; k++) {
                                txt += '<li><span class="discount-cont-size">' + data[j].Condition[k].CondDesc + '</span></li>';
                            }
                            pageIner2 += txt;
                            break;

                        case 4:
                            var txt = '';
                            for (var k = 0; k < data[j].Condition.length; k++) {
                                txt += '<li><span class="discount-cont-size">' + data[j].Condition[k].CondDesc + '</span></li>';
                            }
                            pageIner3 += txt;
                            break;

                        case 5:
                            var txt = '';
                            for (var k = 0; k < data[j].Condition.length; k++) {
                                var thatCond = data[j].Condition[k];
                                txt += '<li><span class="discount-cont-size">' + thatCond.CondDesc + '</span></li>';


                                //系统赠送且赠品数量小于3个才展示 addWay---赠送方式：1-客户选择 2-自动添加商品 3-自动添加活动
                                if (thatCond.addWay != 1 && thatCond.GiftSet.length <= 3) {
                                    var giftActHtml = '';
                                    if (thatCond.GiftSet.length > 1) {
                                        giftActHtml = '<div class="swiper-slide">' +
                                            '<div class="activityProducts__receive03">' +
                                            '<p class="activityProducts__receive__lable">' + (that.isRx ? '满领' : '满赠') + '</p>' +
                                            '<p class="activityProducts__receive__WareName01">' + ((that.isRx ? '预定' : '买') + that.wareName) + '</p>' +
                                            '<p class="activityProducts__receive__Advertisement">满' + thatCond.LimitedAmount + '件 即可获得</p>' +
                                            '<div class="clearfix flex flex-pack-center">';
                                    }
                                    var giftWareCodeArr = [];
                                    for (var giftIndex = 0; giftIndex < thatCond.GiftSet.length; giftIndex++) {
                                        var thatGift = thatCond.GiftSet[giftIndex];
                                        //TODO 800图营销满赠 赠品html处理
                                        //1个赠品的时候
                                        if (thatCond.GiftSet.length === 1) {
                                            giftActHtml += '<div class="swiper-slide">' +
                                                '<a href="/product/' + thatGift.PrmContentCode + '.shtml?kzone=800dj&warename=' + that.wareName + '&skucode=' + that.id + '" class="activityProducts__receive01 block">' +
                                                '<div class="activityProducts__receive__lable">' + (that.isRx ? '满领' : '满赠') + '</div>' +
                                                '<div style="position: relative;">' +
                                                (thatGift.SingleQty > 1 ? ('<span class="activityProducts__receive__productItem_lable">X' + thatGift.SingleQty + '</span>') : '') +
                                                '<img src="' + that.hotRecommendsConfig.getDefaultPic(thatGift.PrmContentCode) + '" alt="" class="activityProducts__receive__Pic180 block" />' +
                                                '</div>' +
                                                '<p class="activityProducts__receive__WareName01">' + ((that.isRx ? '预定' : '买') + that.wareName) + '</p>' +
                                                '<p class="activityProducts__receive__Advertisement">满' + thatCond.LimitedAmount + '件 即可获得</p>' +
                                                '<p class="activityProducts__receive__salePrice">价值 ' + (thatGift.Price.toFixed(2)) + '元</p>' +
                                                '<p class="activityProducts__receive__WareName02">' + thatGift.PrmContentName + '</p>' +
                                                '</a>' +
                                                '</div>';
                                        } else { //多个赠品的时候
                                            giftActHtml += '<a href="/product/' + thatGift.PrmContentCode + '.shtml?kzone=800dj&warename=' + that.wareName + '&skucode=' + that.id + '" class="fl activityProducts__receive__productItem">' +
                                                (thatGift.SingleQty > 1 ? ('<span class="activityProducts__receive__productItem_lable">X' + thatGift.SingleQty + '</span>') : '') +
                                                '<img src="' + that.hotRecommendsConfig.getDefaultPic(thatGift.PrmContentCode) + '" alt="" class="block activityProducts__receive__productItem__pic180" />' +
                                                '<p class="activityProducts__receive__productItem__wareName">' + thatGift.PrmContentName + '</p>' +
                                                '<p class="activityProducts__receive__productItem__salePrice">￥' + (thatGift.Price.toFixed(2)) + ' </p>' +
                                                '</a>' +
                                                (giftIndex < (thatCond.GiftSet.length - 1) ? '<span class="activityProducts__receive__add fl block"></span>' : '');
                                        }
                                        giftWareCodeArr.push(thatGift.PrmContentCode);
                                    }
                                    if (thatCond.GiftSet.length > 1) {
                                        giftActHtml += '</div></div></div>';
                                    }
                                    var giftAct = {
                                        prmCode: thatCond.PrmCode,
                                        LimitedAmount: thatCond.LimitedAmount,
                                        GiftWareCodeArr: giftWareCodeArr,
                                        Html: giftActHtml
                                    };
                                    recommendsGiftActs.push(giftAct);
                                }
                            }
                            pageIner3 += txt;
                            break;

                        case 6:
                            var txt = '';
                            for (var k = 0; k < data[j].Condition.length; k++) {
                                if (k == data[j].Condition.length - 1) {
                                    txt += data[j].Condition[k].CondDesc;
                                } else {
                                    txt += data[j].Condition[k].CondDesc + '；';
                                }
                            }
                            pageIner4 += '<li><span class="discount-cont-size">' + txt + '</span></li>';
                            break;

                        case 7:
                            var txt = '';
                            for (var k = 0; k < data[j].Condition.length; k++) {
                                if (k == data[j].Condition.length - 1) {
                                    txt += data[j].Condition[k].CondDesc;
                                } else {
                                    txt += data[j].Condition[k].CondDesc + '；';
                                }
                            }
                            pageIner4 += '<li><span class="discount-cont-size">' + txt + '</span></li>';
                            break;

                        case 8:
                            if (data[j].Condition[0].CondDesc) {
                                pageIner5 += '<li><span class="discount-cont-size">' + data[j].Condition[0].CondDesc + '</span></li>';
                            }
                            break;

                        case 9:
                            if (data[j].Condition[0].CondDesc) {
                                pageIner5 += '<li><span class="discount-cont-size">' + data[j].Condition[0].CondDesc + '</span></li>';
                            }
                            break;

                        case 10:
                            if (data[j].Condition[0].CondDesc) {
                                pageIner5 += '<li><span class="discount-cont-size">' + data[j].Condition[0].CondDesc + '</span></li>';
                            }
                            break;

                        case 11:
                            if (data[j].Condition[0].CondDesc) {
                                pageIner5 += '<li><span class="discount-cont-size">' + data[j].Condition[0].CondDesc + '</span></li>';
                            }
                            break;

                        case 12:
                            if (data[j].Condition[0].CondDesc) {
                                pageIner6 += '<li><span class="discount-cont-size">' + data[j].Condition[0].CondDesc + '</span><a class="discount-cont-curpon" href="javascript:;" onclick="GetFreeCoupon(' + data[j].PrmCode + ');">领取</a></li>';
                            }
                            break;

                        default:
                            break;
                    }

                }
            }
        }
        if (pageIner1 != '') {
            $('#discountW').show();
            $('#discount_curpon1').append(pageIner1);
            $('#discount_curpon1').parent(".discount-cont-curpon-box").addClass("show");
        }
        if (pageIner2 != '') {
            $('#discountW').show();
            $('#discount_curpon2').append(pageIner2);
            $('#discount_curpon2').parent(".discount-cont-curpon-box").addClass("show");
        }
        if (pageIner3 != '') {
            $('#discountW').show();
            $('#discount_curpon3').append(pageIner3);
            $('#discount_curpon3').parent(".discount-cont-curpon-box").addClass("show");
        }
        if (pageIner4 != '') {
            $('#discountW').show();
            $('#discount_curpon4').append(pageIner4);
            $('#discount_curpon4').parent(".discount-cont-curpon-box").addClass("show");
        }
        if (pageIner5 != '') {
            $('#discountW').show();
            $('#discount_curpon5').append(pageIner5);
            $('#discount_curpon5').parent(".discount-cont-curpon-box").addClass("show");
        }
        if (pageIner6 != '') {
            $('#discountW').show();
            $('#discount_curpon6').append(pageIner6);
            $('#discount_curpon6').parent(".discount-cont-curpon-box").addClass("show");
        }


        //TODO 800图营销满赠 赠品排序处理
        var allGiftWareCodeArr = [];
        if (recommendsGiftActs.length > 0) {
            //大于1才排序
            if (recommendsGiftActs.length > 1) {
                //按产品满件数从大到小
                recommendsGiftActs = recommendsGiftActs.sort(function(a, b) {
                    return b.LimitedAmount - a.LimitedAmount;
                });
                //取前3条
                if (recommendsGiftActs.length > 3) {
                    recommendsGiftActs = recommendsGiftActs.slice(0, 3);
                }
            }
            //获取所有赠品编码
            recommendsGiftActs.forEach(function(giftAct) {
                allGiftWareCodeArr = allGiftWareCodeArr.concat(giftAct.GiftWareCodeArr);
            })
            that.hotRecommendsConfig.navMoudleCofig.navAct.isEnabled = true;
        }
        if (recommendsAddBuyActs.length > 0) {
            //大于1才排序
            if (recommendsAddBuyActs.length > 1) {
                //按换购金额从小到大排序
                recommendsAddBuyActs = recommendsAddBuyActs.sort(function(a, b) {
                    return a.LimitedAmt - b.LimitedAmt;
                });
                //取前3条
                if (recommendsAddBuyActs.length > 1) {
                    recommendsAddBuyActs = recommendsAddBuyActs.slice(0, 1);
                }
            }
            //获取所有换购商品编码
            recommendsAddBuyActs.forEach(function(giftAct) {
                allGiftWareCodeArr = allGiftWareCodeArr.concat(giftAct.GiftWareCodeArr);
            })
            that.hotRecommendsConfig.navMoudleCofig.navAct.isEnabled = true;
        }
        //取赠品图
        if (allGiftWareCodeArr.length > 0) {
            var allGiftWareCodeStr = allGiftWareCodeArr.join(",");
            $.ajax({
                type: 'post',
                url: "/Product/GetWareSkuPics",
                data: { wareSkuCodes: allGiftWareCodeStr },
                dataType: "json",
                success: function(data) {
                    //TODO 800图营销赠品换购图一起拼接
                    if (data && data.length > 0) {
                        data.forEach(function(gift) {
                                var defaultPic = config.hotRecommendsConfig.getDefaultPic(gift.WareCode);
                                //赠品图赋值
                                var thatGiftActs = recommendsGiftActs.filter(function(giftAct) {
                                    return giftAct.GiftWareCodeArr.indexOf(gift.WareCode) > -1;
                                });
                                if (thatGiftActs.length > 0) {
                                    thatGiftActs.forEach(function(giftAct) {
                                        giftAct.Html = giftAct.Html.replace(defaultPic, that.getValidPic(gift.Pic));
                                    })
                                }
                                //换购图赋值
                                var thatAddBuyActs = recommendsAddBuyActs.filter(function(giftAct) {
                                    return giftAct.GiftWareCodeArr.indexOf(gift.WareCode) > -1;
                                });
                                if (thatAddBuyActs.length > 0) {
                                    thatAddBuyActs.forEach(function(giftAct) {
                                        giftAct.Html = giftAct.Html.replace(defaultPic, that.getValidPic(gift.Pic));
                                    })
                                }
                            })
                            //拼装swiper html
                        recommendsGiftActs.forEach(function(giftAct) {
                            $('.swiper-container-activityProducts .swiper-wrapper').append(giftAct.Html);
                        })
                        recommendsAddBuyActs.forEach(function(giftAct) {
                            $('.swiper-container-activityProducts .swiper-wrapper').append(giftAct.Html);
                        })
                        that.hotRecommendsConfig.navMoudleCofig.navAct.isReady = true;
                        initHotRecommendsSwiper();
                    }
                }
            });
        } else {
            that.hotRecommendsConfig.navMoudleCofig.navAct.isReady = true;
            initHotRecommendsSwiper();
        }

        console.log("赠品：")
        console.log(recommendsGiftActs)
        console.log("换购：")
        console.log(recommendsAddBuyActs)
    };

    /**
     * 同类商品
     * 
     */
    function getSameGeneralNameWares() {
        if (config.memory.isVirtualMainWareSku) {
            config.hotRecommendsConfig.navMoudleCofig.navSame.isReady = true;
            initHotRecommendsSwiper();
            return;
        }
        //同类商品
        $.ajax({
            type: 'get',
            url: "/Product/GetSameGeneralNameWares",
            data: { wareSkuCode: config.id, maxCount: 3 },
            dataType: "json",
            success: function(data) {
                //TODO 800图营销相同通用名商品拼接
                if (data && data.length > 0) {
                    config.hotRecommendsConfig.navMoudleCofig.navSame.isEnabled = true;
                    var sameHtml = '';
                    data.forEach(function(sku) {
                        sameHtml += '<div class="swiper-slide">' +
                            '<div class="similarProducts">' +
                            (sku.GeneralTagAdv ? ('<p class="similarProducts__lable">' + sku.GeneralTagAdv + '</p>') : '') +
                            '<a href="/product/' + sku.WareSkuCode + '.shtml?kzone=800dj&warename=' + config.wareName + '&skucode=' + config.id + '" class="similarProducts__pic180 block">' +
                            '<img src="' + config.getValidPic(sku.Pic) + '" alt="' + sku.WareName + '" class="block">' +
                            '</a>' +
                            '<a href="/product/' + sku.WareSkuCode + '.shtml?kzone=800dj&warename=' + config.wareName + '&skucode=' + config.id + '" class="similarProducts__wareName block">' + sku.WareName + '</a>' +
                            '<div class="clearfix">' +
                            '<div class="fl">' +
                            '<div class="similarProducts__salePrice fl">￥' + sku.SalePrice.toFixed(2) + '</div>' +
                            '<div class="similarProducts__marketPrice fl">￥' + sku.MarketPrice.toFixed(2) + '</div>' +
                            '</div>' +
                            '<a href="javascript:;;" class="block similarProducts__btn fr" skucode="' + sku.WareSkuCode + '" rxtype="' + sku.RxType + '" skuname="' + sku.WareName + '">' + config.memory.skuBuySize[sku.RxType] + '</a>' +
                            '</div>' +
                            (sku.Adv ? ('<p class="similarProducts__advertisement">' + sku.Adv + '</p>') : '') +
                            '</div>' +
                            '</div>';
                    })
                    $('.swiper-container-similarProducts .swiper-wrapper').append(sameHtml);
                    $('.swiper-container-similarProducts .swiper-wrapper .similarProducts__btn').click(function(e) {
                        e.preventDefault();
                        var skuCode = $(this).attr('skucode');
                        var skuName = $(this).attr('skuname');
                        var rxType = $(this).attr('rxtype');
                        buyingProcess(config.memory.skuBuySizeIds[rxType], skuCode, 1, false, skuName, '800图位置同类商品-');
                        if (rxType == 0 || rxType == 1) {
                            cartAnimate($(this).parents('.similarProducts').find('img'));
                        }
                    });
                }
                console.log("同类商品:")
                console.log(data);
                config.hotRecommendsConfig.navMoudleCofig.navSame.isReady = true;
                initHotRecommendsSwiper();
            }
        });
    }

    /**
     * 初始化800图营销滑动效果 
     * 
     */
    function initHotRecommendsSwiper() {
        //TODO 800图swiper
        var navMoudleCofig = config.hotRecommendsConfig.navMoudleCofig;
        //各模块已准备好
        if (navMoudleCofig.navMain.isReady &&
            navMoudleCofig.navAct.isReady &&
            navMoudleCofig.navPack.isReady &&
            navMoudleCofig.navSame.isReady) {
            var allNavMoudles = navMoudleCofig.getAllNavMoudles();
            var enabledMoudleCount = 0;
            //移除未启用模块
            allNavMoudles.forEach(function (navMoudle) {
                if (navMoudle.isEnabled) {
                    enabledMoudleCount += 1;
                    var swiperParameters = {
                        nested: true,
                        resistanceRatio: 0,
                        pagination: navMoudle.swiperPaginationClass,
                        onSlideChangeStart: function (swiper) {
                            hotRecommendsGaPush(this.pagination, swiper.activeIndex);
                        }
                    };
                    //本品自动播放
                    if (navMoudle.swiperContainerClass === navMoudleCofig.navMain.swiperContainerClass) {
                        swiperParameters.autoplay = 4000;
                        mainSwiper = new Swiper(navMoudle.swiperContainerClass, swiperParameters);




                    }
                    else {
                        var swiper = new Swiper(navMoudle.swiperContainerClass, swiperParameters);
                    }


                } else {
                    $(navMoudle.swiperContainerClass).parent().remove();
                    $(navMoudle.nestOutsideClass).parent().remove();
                }
            })

            video.isHaveVideo();


            // 各模块宽度
            $('.nestOutsideSwiper__tab__item').width((100 / parseFloat(enabledMoudleCount)) + '%');
            if (enabledMoudleCount > 1) {
                $(".nestOutsideSwiper__tab").show();
            }
            if (enabledMoudleCount > 1) {
                //$(".thisProductsMessage").show();
                // 最外层选项卡
                var nestOutsideSwiper = new Swiper('.nestOutsideSwiper__content', {
                    speed: 500,
                    onSlideChangeStart: function(swiper) {
                        $(".nestOutsideSwiper__tab .nestOutsideSwiper__tab__item--active").removeClass('nestOutsideSwiper__tab__item--active');
                        $(".nestOutsideSwiper__tab a").eq(swiper.activeIndex).addClass('nestOutsideSwiper__tab__item--active');
                        $(".nestOutsideSwiper__tab a").eq(swiper.activeIndex).append("<div class='nestOutsideSwiper__tab__item__triangle'></div>").siblings().find('.nestOutsideSwiper__tab__item__triangle').remove();
                        $(".nestOutsideSwiper__tab__itemNoAfter").removeClass("nestOutsideSwiper__tab__itemNoAfter");
                        $(".nestOutsideSwiper__tab a").eq(swiper.activeIndex).prev().addClass('nestOutsideSwiper__tab__itemNoAfter');
                        //$(".thisProductsMessage").remove();
                        var moduleText = $(".nestOutsideSwiper__tab a").eq(swiper.activeIndex).text();
                        _gaq.push(['_trackEvent', 'wap详情页', '800图-' + moduleText + '-点击按钮', '0', 0]);
                    },
                });
                $(".nestOutsideSwiper__tab .nestOutsideSwiper__tab__item").on('touchstart mousedown', function(e) {
                    e.preventDefault()
                    nestOutsideSwiper.slideTo($(this).index());
                });
            } else {
                //无模块时
                //$(".thisProductsMessage").remove();
                $('.nestOutsideSwiper').addClass('nestOutsideSwiper__tab__itemNone');
            }

            $(function() {
                //公告条
                if ($(".new_title_top").size() > 0) {
                    $(".new_title_top").css("margin-top", $('.details-nav').height());
                } else {
                    $('#onloadApp').css("margin-top", $('.details-nav').height());
                    $('#closeOnload').click(function() {
                        $(".nestOutsideSwiper").css("margin-top", $('.details-nav').height());
                    })
                }
            });

            console.log('一切就绪');
        }
    }

    /**
     * 800图活动ga推送
     * 
     * @param {string} swiperPaginationClass 
     * @param {string} activeIndex 
     */
    function hotRecommendsGaPush(swiperPaginationClass, activeIndex) {
        var navMoudleCofig = config.hotRecommendsConfig.navMoudleCofig;
        switch (swiperPaginationClass) {
            //活动的疗程、换购、赠品
            case navMoudleCofig.navAct.swiperPaginationClass:
                var gaText = $(swiperPaginationClass).siblings('.swiper-wrapper').children().eq(activeIndex).find('.activityProducts__treatment__lable,.activityProducts__receive__lable,.activityProducts__redemption__lable').text();
                _gaq.push(['_trackEvent', 'wap详情页', '800图-活动-' + gaText + '-滑动', '0', 0]);
                break;
        }
    }

    //可享受以下优惠 左边标签控制
    function isNoneLeftSign() {
        $(".discount-cont-r").each(function() {
            var lisize = $(this).children("li").size(),
                index = $(".discount-cont-r").index(this);
            if (lisize > 0) {
                $(".discount-cont-type").eq(index).show();
            } else {
                $(".discount-cont-type").eq(index).hide();
                $(".discount-cont-r li").eq(index).css("border-bottom", "none");
                $(".discount-cont-r").parent(".discount-cont-curpon-box").eq(index).css("border-bottom", "none");
            }
        });
    }

    //判断当个商品是否为处方药 确定是领取还是满赠
    isRx();

    function isRx() {
        var IsRx = $('#kad-productIsRx').val();
        if (IsRx != 'False') {
            $("#manzeng_lingqu").text("满领");
            $("#huangou_huanqu").text("换取");
        } else {
            $("#manzeng_lingqu").text("满赠");
            $("#huangou_huanqu").text("换购");
        }
    }
    //显示购买类型
    function initButton() {
        var defaultRs = $('#kad-productIsRx').val(),
            defalutRxType = $("#kad-productRxType").val();
        defalutCartType = parseInt($("#kad-prductCartType").val());
        defalutIsCanSale = $("#kad-prductIsCanSale").val();
        selectedButton(defalutRxType, defalutCartType, defalutIsCanSale);
        defalutRxType == 0 ? $('.rx-icon').hide() : '';
        defalutRxType > 0 ? $('.warning-size').text('本品为处方药，由康爱多新特药房服务。您成功预订后，药店药师会根据处方审核结果主动与您联系。') : $('.warning-size').text('如发现本网站有任何直接或变相销售处方药行为，请保留证据，拨打12331举报，举报查实给予奖励。');
    };

    function selectedButton(rxType, cartType) {
        var hrefL = window.location.href.indexOf("utm_source=uc-sm");
        if (cartType == 2) {
            $('.details-footer a').hide();
            $('.details-footer a').eq(8).css('display', 'block');
        } else {
            switch (rxType) {
                case '1':
                    if (hrefL > 0) {
                        $('.details-footer a').hide();
                        $('.details-footer a').eq(5).css('display', 'block');
                    } else {
                        $('.details-footer a').hide();
                        $('.details-footer a').eq(4).css('display', 'block');
                    }
                    break;
                case '2':
                    $('.details-footer a').hide();
                    $('.details-footer a').eq(5).css('display', 'block');
                    break;
                case '3':
                    $('.details-footer a').hide();
                    $('.details-footer a').eq(6).css('display', 'block');
                    break;
                case '4':
                    $('.details-footer a').hide();
                    $('.details-footer a').eq(7).css('display', 'block');
                    break;
                default:
                    $('.details-footer a').hide();
                    $('.details-footer a').eq(2).css('display', 'block');
                    $('.details-footer a').eq(3).css('display', 'block');
                    break;
            }
        }
        $('.details-footer a').eq(0).css('display', 'block');
        $('.details-footer a').eq(1).css('display', 'block');
    };
    var send = function(_url, callback) {
        $.ajax({
            url: _url,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                callback && typeof callback == 'function' && callback.call(null, data);
            }
        })
    };
    //购买类型
    $('.details-footer a').on('click', function(event) {
        var that = config,
            ids = this.id,
            num = $('#Number').val();
        if (num == "" || num < 1) {
            addTocarTips("数量不能小于1");
            return false;
        }

        buyingProcess(ids, that.id, num);
    });
	
	function getCookie(name){
            var result = null;
            //对cookie信息进行相应的处理，方便搜索
            var myCookie = ""+document.cookie+";";
            var searchName = ""+name+"=";
            var startOfCookie = myCookie.indexOf(searchName);
            var endOfCookie;
            if(startOfCookie != -1){
                startOfCookie += searchName.length;
                endOfCookie = myCookie.indexOf(";",startOfCookie);
                result = (myCookie.substring(startOfCookie,endOfCookie));
            }
            return result;
        }
		
		function checkUnionCard(wareskucode) {
                var reslut = "1"
                $.ajax({
                    url: "/Cart/IsCanUnionCardById?productId=" + wareskucode,
                    type: "get",
                    dataType: "json",
                    cache: true,
                    async: false,
                    success: function (data) {
                        reslut = data;
                    }
                });
                return reslut;
            }

    /**
     * 购买流程处理
     * 
     * @param {String} ids 购买类型 Telephone--电话回拨 addCart--加入购物车 buyNow--立即购买 buyRx--立即参加 buyRx2--需求登记 buyRx3--电话回拨 notGoods--到货通知
     * @param {String} wareskucode 商品编码
     * @param {Number} qty 商品数量 默认1
     * @param {Boolean} isCurWare 是否当前商品
     * @param {String} wareName 商品名称 非当前商品需传商品名称
     * @param {String} gaPrefix ga跟踪前缀 原购买不用传，同类商品之类新增的传
     * @returns 
     */
    function buyingProcess(ids, wareskucode, qty, isCurWare, wareName, gaPrefix) {
        qty = qty || 1; //默认数量1
        isCurWare = isCurWare || true; //默认当前商品
        wareName = wareName || ($('.information-product-name').text() || "暂无"); //默认当前商品名
        gaPrefix = gaPrefix || '';
        switch (ids) {
            case 'Telephone':
                window.location.href = 'tel:4008808488';
                _gaq.push(['_trackEvent', 'wap详情页', isCurWare ? '底部-电话咨询-按钮' : (gaPrefix + '电话咨询-按钮'), '0', 0]);
                break;
            case 'shopCart':
                window.location.href = '/Cart/Index';
                _gaq.push(['_trackEvent', 'wap详情页', isCurWare ? '底部-购物车-按钮' : (gaPrefix + '购物车-按钮'), '0', 0]);
                break;
            case 'addCart':
                if (isCurWare && !haveSelect()) return;
				if(getCookie('UnionCard_CardNo') != null)
                    {
                        var result=  checkUnionCard(wareskucode);
                        if(result != "全开放")
                        {
                            location.href = "/Home/Error?Msg=抱歉，您选购的商品：" + result + "暂不支持钥匙卡支付。&state=4&returnUrl=" + window.location.href;
                            return false;
                        }
                    }
                var _url = '/Cart/AjaxCreate?productId=' + wareskucode + '&quantity=' + qty;
                send(_url, function(data) {
                    setTimeout(function() { addTocarTips(data.message) }, 600);
                    GetCart();
                });
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '加入购物车-点击按钮', '0', 0]);
                ctrActionsend('add_to_card_wap');
                break;
            case 'buyNow':
                if (isCurWare && !haveSelect()) return;
				 if(getCookie('UnionCard_CardNo') != null)
                    {
                        var result=  checkUnionCard(wareskucode);
                        if(result != "全开放")
                        {
                            location.href = "/Home/Error?Msg=抱歉，您选购的商品：" + result + "暂不支持钥匙卡支付。&state=4&returnUrl=" + window.location.href;
                            return false;
                        }
                    }
                var _url = '/Cart/AjaxBuyProductToCart?productId=' + wareskucode + '&quantity=' + qty;
                send(_url, function(data) {
                    if (data.result) {
                        window.location.href = '/order/GetOrderInfo';
                    } else {
                        addTocarTips(data.message);
                    }
                });
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '立即购买-点击按钮', '0', 0]);
                ctrActionsend('buy_now_wap');
                break;
            case 'buyRx':
                var _url = '/Cart/AjaxCreate?productId=' + wareskucode + '&quantity=' + qty;
                send(_url, function(data) {
                    addTocarTips(data.message);
                    GetCart();
                });
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '立即参加-点击按钮', '0', 0]);
                ctrActionsend('join_now_wap');
                break;
            case 'buyRx2':
                window.location.href = '/Product/IWant?productIds=' + wareskucode + '&quantitys=' + qty;
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '需求登记-点击按钮', '0', 0]);
                ctrActionsend('demand_registration_wap');
                break;
            case 'buyRx3':
                phoneGet(wareskucode, 0, 3);
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '咨询药师-点击按钮', '0', 0]);
                ctrActionsend('fax_call_back');
                break;
            case 'notGoods':
                GoodsChecked(wareskucode, 0, 4);
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '到货通知-点击按钮', '0', 0]);
                ctrActionsend('arrivalnotice');
            default:
                break;
        }
    }

    function GoodsChecked(id, proType, rxType) {
        var productId = id;
        var productType = proType; //产品类型
        var rxType = rxType;
        $('#Layer').show();
        closeBody();
        $('#LcontWrap').show();
        $('#LNot').show();
        $('#LOk').show();
        $('#LNow').hide();
        $('#txtemail').show();
        $('#LTitle').text('到货通知');
        $('#LContSize').show().text('如果该商品在30天内到货，我们将会以短信或邮件的方式通知您。');
        $('#txtPhoneCall').show();
        $('#LOk').off().on('click', function(event) {
            addReurnPhoneData(productType, productId, rxType);
            _gaq.push(['_trackEvent', 'wap详情页', '到货通知-提交按钮', '0', 0]);
        });
        $('#LNot,#LNow').off().on('click', function(event) {
            $('#LcontWrap').hide();
            $('#Layer').hide();
            openBody();
        });
    }

    function phoneGet(id, proType, rxType) {
        var productId = id;
        var productType = proType; //产品类型
        var rxType = rxType;
        $('#h_ProductId_Phone').val(productId); //把截取后的套餐ID或者单品id放到隐藏域
        $('#Layer').show();
        closeBody();
        $('#MlistWrap').addClass('cur');
        $('#MlistWrap ul li:nth-child(1)').off().on('click', function(event) {
            $('#MlistWrap').removeClass('cur');
            $('#Layer').hide();
            openBody();
            changeHref();
            _gaq.push(['_trackEvent', 'wap详情页', '中部-在线咨询-按钮', '0', 0]);
        });
        $('#MlistWrap ul li:nth-child(2)').off().on('click', function(event) {
            $('#MlistWrap').removeClass('cur');
            $('#Layer').hide();
            openBody();
            window.location.href = 'tel:4008808488';
            ctrActionsend('page_rx_400_wap');
            _gaq.push(['_trackEvent', 'wap详情页', '中部-电话-按钮', '0', 0]);
        });
        $('#MlistWrap ul li:nth-child(3)').off().on('click', function(event) {
            $('#MlistWrap').removeClass('cur');
            $('#LcontWrap').show();
            $('#LNot').show();
            $('#LOk').show();
            $('#LNow').hide();
            $('#txtemail').hide();
            $('#LTitle').text('请药师联系我');
            $('#LContSize').show().text('请输入您的手机号，康爱多药师将在10分钟内与您联系，请稍候留意接听电话哦~');
            $('#txtPhoneCall').show();
        });
        $('#MlistWrap ul li:nth-child(4)').off().on('click', function(event) {
            $('#MlistWrap').removeClass('cur');
            $('#Layer').hide();
            openBody();
        });
        $('#LOk').off().on('click', function(event) {
            addReurnPhoneData(productType, productId, rxType);
        });
        $('#LNot,#LNow').off().on('click', function(event) {
            $('#LcontWrap').hide();
            $('#Layer').hide();
            openBody();
        });
    }

    //套餐指定商品移动到最前面
    Array.prototype.moveKitSkuToStart = function(skuCode) {
        if (this.length == 0)
            return this;
        for (var i = 0; i < this.length; i++) {
            if (this[i].WareCode == skuCode) {
                if (i == 0)
                    return this;
                var tempKit = this[i];
                this.splice(i, 1);
                this.unshift(tempKit);
                return this;
            }
        }
    };
    //加载套餐数据
    function commonSetPackageStep2() {
        var that = config;
        var swiperIndex = [];
        $.ajax({
            url: '/product/GetPackageListByProductId?productId=' + that.id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                initHotRecommendKit(data);
                if (data.length > 0 && data.length <= 2) {
                    $("#packNav").css("width", "100%");
                    $(".packNav-r").hide();
                }
                if (data.length > 2) {
                    var pageDta2 = '';
                    for (var i = 2; i < data.length; i++) {
                        swiperIndex.push(i);
                        var PrmName = data[i].PrmName, //套餐名 
                            KitPrice = data[i].KitPrice, //套餐优惠价
                            OriginPrice = data[i].OriginPrice, //套餐原价
                            packageID = data[i].PrmCode, //套餐ID
                            rx = 0; //判断套餐子产品Rx类型
                        pageDta2 += '<li class="swiper-slide vertical-li"><div class="package-cont-wrap"><div class="package-infor"><p class="package-size1">' + (data[i].PrmSubtitle ? data[i].PrmSubtitle : "套餐" + (i + 1)) + '</p>';
                        pageDta2 += '<p class="package-size2">药师点评</p><div class="dp-cont"><p class="package-size3">' + (data[i].Remark ? data[i].Remark : '') + '</p><p class="package-size4"><a class="dp-open" href="javascript:;">展开</a></p></div></div>';
                        pageDta2 += '<div class="package-content swiper-container swiper-container3_' + i + '"><ul class="swiper-wrapper">';
                        if (data[i].kitSubList.length > 0) {
                            data[i].kitSubList.moveKitSkuToStart(that.id);
                            for (var j = 0; j < data[i].kitSubList.length; j++) {
                                var rxChild = data[i].kitSubList[j].RxType;
                                rxChild > rx ? rx = rxChild : '';
                                pageDta2 += '<li productId="' + data[i].kitSubList[j].WareCode + '" num="' + data[i].kitSubList[j].Qty + '" class="swiper-slide"><p class="package-prod-pic"><a href="/product/' + data[i].kitSubList[j].WareCode + '.shtml"><img src="' + (data[i].kitSubList[j].Pic != '' && data[i].kitSubList[j].Pic != '无' ? data[i].kitSubList[j].Pic : window.urlConfig.multiDomain.res() + "/theme/default/img/nopic.jpg") + '"/></a></p><p class="package-prod-name">' + data[i].kitSubList[j].WareName + '</p><p class="package-prod-price">￥' + data[i].kitSubList[j].Price.toFixed(2) + '</p>';
                                if (j != data[i].kitSubList.length - 1) {
                                    pageDta2 += '<p class="package-prod-add"></p>';
                                }
                                pageDta2 += '<p class="package-prod-numbg"></p><p class="package-prod-numsize">×' + data[i].kitSubList[j].Qty + '</p></li>';
                            }
                        }
                        pageDta2 += '</ul><div class="swiper-scrollbar swiper-scrollbar3_' + i + '"></div></div></div>';
                        that.memory.packageRxType[i]=rx;
                        // if (i == 2) {
                            //packageRx2 = rx;
                            //packageid2 = data[i].PrmCode;
                        // }
                        pageDta2 += '<div class="package-settlement display-box"><div class="settlement-left box-flex"><p class="allTreatment-num">合计<i id="PackagePrice">￥' + data[i].KitPrice.toFixed(2) + '</i></p><p class="saveTreatment-num">立省 <i id="packSaveTreat">' + (data[i].OriginPrice.toFixed(2) - data[i].KitPrice.toFixed(2)).toFixed(2) + '</i>元，原价<i id="packAllPrice"> ' + data[i].OriginPrice.toFixed(2) + '</i>元</p></div>';
                        pageDta2 += '<div class="settlement-right box-flex" packageId="' + data[i].PrmCode + '" packageRx="' + (that.memory.isStock ? 4 : rx) + '"><a style="'+ (rx > 1 ? "background:#06a6f8" : "" )+'" href="javascript:;">' + (that.memory.isStock ? that.memory.packageBuySize[4] : that.memory.packageBuySize[rx]) + '</a></div></div></li>';
					}
                    $('#package_more ul').append(pageDta2);
                    packageMoreOpen();
                    packageMoreClose();
                    packageSwiperId('#package_more');
                    for (var index = 0; index < swiperIndex.length; index++) {
                        var cla2 = '.swiper-container3_' + swiperIndex[index];
                        var cla = '.swiper-scrollbar3_' + swiperIndex[index];
                        new Swiper(cla2, {
                            scrollbar: cla,
                            scrollbarHide: true,
                            slidesPerView: 'auto',
                            observer: true,
                            observeParents: true,
                            grabCursor: true
                        });
                    };
                } else {
                    $('#package_more,#black_bg').hide();
                }
                data.length = data.length > 2 ? 2 : data.length;
                if (data.length) {
                    var pageDta = '',
                        pageNav = '',
                        packageRx = 0,
                        packageid = '';
                    for (var i = 0; i < data.length; i++) {
                        var PrmName = data[i].PrmName, //套餐名 
                            KitPrice = data[i].KitPrice, //套餐优惠价
                            OriginPrice = data[i].OriginPrice, //套餐原价
                            packageID = data[i].PrmCode, //套餐ID
                            rx = 0; //判断套餐子产品Rx类型
                        pageDta += '<div class="package-cont-wrap"><div class="package-infor">';
                        pageDta += '<p class="package-size2">药师点评</p><div class="dp-cont"><p class="package-size3">' + (data[i].Remark ? data[i].Remark : '') + '</p><p class="package-size4"><a class="dp-open" href="javascript:;">展开</a></p></div></div>';
                        pageDta += '<div class="package-content swiper-container swiper-container3_' + i + '"><ul class="swiper-wrapper">';
                        if (data[i].kitSubList.length > 0) {
                            data[i].kitSubList.moveKitSkuToStart(that.id);
                            for (var j = 0; j < data[i].kitSubList.length; j++) {
                                var rxChild = data[i].kitSubList[j].RxType;
                                rxChild > rx ? rx = rxChild : '';
                                pageDta += '<li productId="' + data[i].kitSubList[j].WareCode + '" num="' + data[i].kitSubList[j].Qty + '" class="swiper-slide"><p class="package-prod-pic"><a href="/product/' + data[i].kitSubList[j].WareCode + '.shtml"><img class="ui-imglazyload" data-url="' + (data[i].kitSubList[j].Pic != '' && data[i].kitSubList[j].Pic != '无' ? data[i].kitSubList[j].Pic : window.urlConfig.multiDomain.res() + "/theme/default/img/nopic.jpg") + '"/></a></p><p class="package-prod-name">' + data[i].kitSubList[j].WareName + '</p><p class="package-prod-price">￥' + data[i].kitSubList[j].Price.toFixed(2) + '</p>';
                                if (j != data[i].kitSubList.length - 1) {
                                    pageDta += '<p class="package-prod-add"></p>';
                                }
                                pageDta += '<p class="package-prod-numbg"></p><p class="package-prod-numsize">×' + data[i].kitSubList[j].Qty + '</p></li>';
                            }
                        }
                        pageDta += '</ul><div class="swiper-scrollbar swiper-scrollbar3_' + i + '"></div></div></div>';
                        pageNav += '<li packageId="' + packageID + '" kitPrice="' + KitPrice.toFixed(2) + '" originPrice="' + OriginPrice.toFixed(2) + '" rx="' + rx + '"><div>' + (data[i].PrmSubtitle ? data[i].PrmSubtitle : "套餐" + (i + 1)) + '</div><i></i><span></span></li>';
                        that.memory.packageRxType[i]=rx;
                         if (i == 0) {
                            packageRx = rx;
                            packageid = data[0].PrmCode;
                         }
                    }
                    pageDta += '<div class="package-settlement display-box"><div class="settlement-left box-flex"><p class="allTreatment-num">合计<i id="PackagePrice">￥' + data[0].KitPrice.toFixed(2) + '</i></p><p class="saveTreatment-num">立省 <i id="packSaveTreat">' + (data[0].OriginPrice.toFixed(2) - data[0].KitPrice.toFixed(2)).toFixed(2) + '</i>元，原价<i id="packAllPrice"> ' + data[0].OriginPrice.toFixed(2) + '</i>元</p></div>';
                    pageDta += '<div class="settlement-right box-flex" packageId="' + packageid + '" packageRx="' + (that.memory.isStock ? 4 : packageRx) + '"><a style="'+ (packageRx > 1 ? "background:#06a6f8" : "" )+'" class="selChange" href="javascript:;">' + (that.memory.isStock ? that.memory.packageBuySize[4] : that.memory.packageBuySize[packageRx]) + '</a></div></div>';
					$('#packNav').html(pageNav);
                    $('#packageWrap').append(pageDta);
                    $('#packNav li').eq(0).addClass('cur');
                    $('.package-cont-wrap').eq(0).show();
                    $('.ui-imglazyload').imglazyload();
                    packageInteractive(data);
                } else {
                    $('#packageWrap').hide();
                }
            }
        });
    };

    /**
     * 初始800图位置套餐
     * 
     * @param {any} data 套餐数据
     */
    function initHotRecommendKit(data) {
        //TODO 800图营销套餐
        //套餐超过4个产品不调用
        var kits = data.filter(function(kit) {
            return kit.kitSubList.length < 4;
        })
        if (kits.length > 0) {
            config.hotRecommendsConfig.navMoudleCofig.navPack.isEnabled = true;
            //显示前5个套餐
            if (kits.length > 5) {
                kits = kits.splice(0, 5);
            }
            var kitHtml = '';
            kits.forEach(function(kit) {
                kitHtml += '<div class="swiper-slide">' +
                    '<div class="matchProducts" >' +
                    '<p class="matchProducts__lable">' + (kit.PrmSubtitle ? kit.PrmSubtitle : '套餐优惠') + '</p>' +
                    '<div class="clearfix flex flex-pack-center">';
                var kitRxType = 0;
                kit.kitSubList.forEach(function(kitSub, i) {
                    if (kitSub.RxType > kitRxType) {
                        kitRxType = kitSub.RxType;
                    }
                    kitHtml += '<a href="/product/' + kitSub.WareCode + '.shtml?kzone=800dj&warename=' + config.wareName + '&skucode=' + config.id + '" class="fl matchProducts__productItem">' +
                        (kitSub.Qty > 1 ? ('<span class="matchProducts__productItem_lable">X' + kitSub.Qty + '</span>') : '') +
                        '<img src="' + config.getValidPic(kitSub.Pic) + '" alt="" class="block matchProducts__productItem__pic180">' +
                        '<p class="matchProducts__productItem__wareName">' + kitSub.WareName + '</p>' +
                        '<p class="matchProducts__productItem__salePrice">￥' + kitSub.Price.toFixed(2) + ' </p>' +
                        '</a>';
                    if (i < kit.kitSubList.length - 1) {
                        kitHtml += '<span class="matchProducts__add fl block"></span>';
                    }
                });
                kitHtml += '</div>' +
                    '<div class="clearfix">' +
                    '<div class="fl">' +
                    '<div class="matchProducts__packageSalePrice fl">￥' + kit.KitPrice.toFixed(2) + '</div>' +
                    '<div class="matchProducts__packageMarketPrice fl">￥' + kit.OriginPrice.toFixed(2) + '</div>' +
                    '</div>' +
                    '<a href="javascript:;;" class="block matchProducts__btn fr" kitcode="' + kit.PrmCode + '" rxtype="' + kitRxType + '">' + config.memory.packageBuySize[kitRxType] + '</a>' +
                    '</div>' +
                    (kit.Remark ? ('<p class="matchProducts__advertisement"><span class="matchProducts__advertisement__title">药师点评: </span>' + kit.Remark + '</p>') : '') +
                    '</div>' +
                    '</div >';
            })
            $('.swiper-container-matchProducts .swiper-wrapper').append(kitHtml);
            //加入购物车等
            $('.swiper-container-matchProducts .swiper-wrapper .matchProducts__btn').click(function() {
                var kitCode = $(this).attr('kitcode');
                var rxType = parseInt($(this).attr('rxtype'));
                ajaxCreatePackageToCart(kitCode, rxType, '800图-推荐套餐');
                if (rxType == 0 || rxType == 1) {
                    cartAnimate();
                }
            });

            console.log("套餐:")
            console.log(kits);
        }
        config.hotRecommendsConfig.navMoudleCofig.navPack.isReady = true;
        initHotRecommendsSwiper();
    }

    function packageMoreOpen() {
        $(".packNav-r").click(function(event) {
            $("#package_more").addClass('move-up').removeClass('move-down');
            $("#black_bg").show();
        });
    }

    function packageMoreClose() {
        $("#close_package").click(function(event) {
            $("#package_more").removeClass('move-up').addClass('move-down');
            $("#black_bg").hide();
        });
    }

    function packageSwiperId(swiperId) {
        var mySwiper5 = new Swiper(swiperId, {
            slidesPerView: 'auto',
            direction: 'vertical',
            observer: true, //修改swiper自己或子元素时，自动初始化swiper
            observeParents: true, //修改swiper的父元素时，自动初始化swiper
            freeMode: true
        });
    }
    //套餐交互效果
    function packageInteractive(data) {
        var spstr = config.id.split("");
        var id_last = spstr[spstr.length - 1];
        var this_i = parseInt(id_last / 2);
        //添加推荐套餐icon
        if (data.length > 1) {
            if (data.length <= this_i || this_i < 2) {
                this_i = 2;
            }
            $('#packNav li').children('span').removeClass('hot');
            $('#packNav li').eq(this_i - 1).children('span').addClass('hot');
        }
        //判断是否有点评
        var size3 = $('.package-size3');
        for (var k = 0; k < size3.length; k++) {
            if (size3.eq(k).text()) {
                if (size3.eq(k).text().length > 40) {
                    size3.eq(k).siblings('.package-size4').show();
                } else {
                    size3.css('display', '-webkit-box');
                }
            }
        };
        $(".dp-cont").on('click', function() {
            _gaq.push(['_trackEvent', 'wap详情页', '中部-推荐套餐-文字展开', '0', 0]);
            if ($(this).children().children('.dp-open').text() == "展开") {
                $(this).children().children('.dp-open').text("收起");
                $(this).children('.package-size3').css('display', 'block');
                packageSwiperId('#package_more');

            } else {
                $(this).children().children('.dp-open').text("展开");
                $(this).children('.package-size3').css('display', '-webkit-box');
                packageSwiperId('#package_more');
            }

        });
        //套餐tab交互
        $('.package-nav ul li').on('click', function(event) {
            var that = config;
            var index = $(this).index(),
                thisKitPrice = $(this).attr('kitprice'),
                thisOriginPrice = $(this).attr('originprice'),
                thispackSaveTreat = (thisOriginPrice - thisKitPrice).toFixed(2);
            $(this).addClass('cur').siblings().removeClass('cur');
            $('#packageWrap .package-cont-wrap').hide().eq(index).show();
            $('#PackagePrice').text(thisKitPrice);
            $('#packAllPrice').text(thisOriginPrice);
            $('#packSaveTreat').text(thispackSaveTreat);
            $('#packageWrap .settlement-right').attr('packageid', $(this).attr('packageid'));
            $('#packageWrap .settlement-right').attr('packagerx', $(this).attr('rx'));
            $('.settlement-right .selChange').text(that.memory.packageBuySize[that.memory.packageRxType[index]]);

            var cla2 = '.swiper-container3_' + index;
            var cla = '.swiper-scrollbar3_' + index;
            new Swiper(cla2, {
                scrollbar: cla,
                scrollbarHide: true,
                slidesPerView: 'auto',
                observer: true,
                observeParents: true,
                grabCursor: true
            });
			if (parseInt($('.settlement-right .selChange').parent().attr('packageRx')) > 1) {
				$('.settlement-right .selChange').css('background', '#06a6f8');
			}
			else
				 $('.settlement-right .selChange').css('background', '');
		});

        var hrefL = window.location.href.indexOf("utm_source=uc-sm");
        if (parseInt($('.settlement-right .selChange').parent().attr('packageRx')) == 1 && hrefL > 0) {
            $('.settlement-right .selChange').css('background', '#06a6f8');
            $('.settlement-right .selChange').text('门店登记');
        }
        //套餐加入购物车
        $('.settlement-right a').on('click', function (event) {
            var rx = '',
                packageId = '';
            rx = parseInt($(this).parent().attr('packageRx'));
            packageId = $(this).parent().attr('packageid');
            ajaxCreatePackageToCart(packageId, rx, '中部-推荐套餐');
        });
        $('#packageWrap .settlement-right a').click(function(event) {
            var rx = '';
            rx = parseInt($(this).parent().attr('packageRx'));
            if (rx == 0 || rx == 1) {
                cartAnimate2();
            }
        });
        //套餐内容swiper
        new Swiper('.swiper-container3_0', {
            scrollbar: '.swiper-scrollbar3_0',
            scrollbarHide: true,
            slidesPerView: 'auto',
            observer: true,
            observeParents: true,
            grabCursor: true
        });
        //套餐tab swiper
        new Swiper(".swiper-container2", {
            slidesPerView: 'auto',
            freeMode: true,
            observer: true,
            observeParents: true
        });
    };

    /**
     * 套餐加入购物车/立即参加/需求登记/电话回拨/到货通知
     * 
     * @param {String} packageId 套餐id
     * @param {Number} rxType 处方类型
     * @param {String} gaPrefix ga跟踪描述前缀: 中部-推荐套餐|800图-推荐套餐
     */
    function ajaxCreatePackageToCart(packageId, rxType, gaPrefix) {
        var hrefL = window.location.href.indexOf("utm_source=uc-sm");
        switch (rxType) {
            case 0:
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '-加入购物车按钮', '0', 0]);
                $.ajax({
                    url: '/Cart/AjaxCreatePackageToCart?packageId=' + packageId + '&quantity=' + 1,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        if (data == "true") {
                            setTimeout(function() { addTocarTips('成功加入购物车', 1500) }, 600);
                            GetCart();
                        } else {
                            setTimeout(function() { addTocarTips(data, 1500) }, 600);
                        }
                    }
                });
                break;
            case 1:
                //TODO hrefL判断，未知原因，先保留 （hrefL = window.location.href.indexOf("utm_source=uc-sm");)
                if (hrefL > 0) {
                    _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '-需求登记按钮', '0', 0]);
                    window.location.href = '/Product/IWant?packageIds=' + packageId + '&quantitys=' + 1;
                } else {
                    _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '-立即参加按钮', '0', 0]);
                    $.ajax({
                        url: '/Cart/AjaxCreatePackageToCart?packageId=' + packageId + '&quantity=' + 1,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            if (data) {
                                setTimeout(function() { addTocarTips('成功加入购物车', 1500) }, 600);
                                GetCart();
                            } else {
                                setTimeout(function() { addTocarTips(data, 1500) }, 600);
                            }
                        }
                    });
                }
                break;
            case 2:
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '-需求登记按钮', '0', 0]);
                window.location.href = '/Product/IWant?packageIds=' + packageId + '&quantitys=' + 1;
                break;
            case 3:
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '-咨询药师按钮', '0', 0]);
                phoneGet(packageId, 1, 3);
                break;
            case 4:
                _gaq.push(['_trackEvent', 'wap详情页', gaPrefix + '-到货通知按钮', '0', 0]);
                GoodsChecked(packageId, 1, 4);
                break;
            default:
                break;
        }
    }

    //加入成功提示
    function addTocarTips(txt, speed) {
        var _id = $('<div id="J-tips"></div>'),
            speed = speed || 3000,
            timer, txt = txt || '成功加入购物车';
        _id.html(txt).css({ 'fontSize': '0.3rem', 'width': '60%', 'padding': '0.3rem 0', 'background': 'rgba(0,0,0,0.8)', 'color': '#fff', 'position': 'fixed', top: '50%', 'borderRadius': '6px', 'textAlign': 'center', 'left': '21%', 'zIndex': 999, 'display': 'none' });
        _id.appendTo($('body')).css('display', 'block');
        setTimeout(function() {
            _id.remove();
        }, speed)
    };
    //显示购物车数量
    var GetCart = function() {
        $.ajax({
            url: "/Cart/GetCount",
            type: "Get",
            dataType: "json",
            success: function(data) {
                /*$("#cartNum").html(data.cartCount);
                if ($("#cartNum").text().length>1) {
                    $("#cartNum").css('borderRadius', '40%');
                };*/
                if (data.cartCount > 0) {
                    $("#cartNum").css('padding', '.1rem');
                }
            }
        });
    };
    GetCart();
    //计算产品价格
    function calculatedPrice() {
        if ($("#Number").val() == 1) { $('#Reduce').addClass('cur'); }
        $('.treatment-input a').on('click', function(event) {
            event.preventDefault();
            var that = config;
            var this_id = $(this).attr('id');
            var num = $('#Number').val();
            switch (this_id) {
                case 'Reduce':
                    if (num > 1) {
                        num--;
                        $('#Number').val(num);
                        getPrice(false);
                        //changeNum(num,that);
                    } else {
                        return;
                    }
                    break;
                case 'Add':
                    if (num < 999) {
                        num++;
                        $('#Number').val(num);
                        getPrice(false);
                    } else {
                        return;
                    }
                default:
                    break;
            }
        });
        $('#Number').on('input oninput', function(event) {
            var that = config;
            var this_id = $(this).attr('id');
            var num = $('#Number').val();
            if ($(this).get(0).value.length > 3) {
                $(this).get(0).value = $(this).get(0).value.substr(0, 3);
            }
            if (num <= 999) {
                getPrice(false);
            } else {
                return;
            }
        });
        $('#Number').on('blur', function(event) {
            var that = config;
            if ($(this).val() == "" || $(this).val() <= 1) {
                $(this).val(1);
                if (that.memory.currentNum.length > 0) {
                    addStyle(that, 1, 0);
                } else {
                    addStyle2(that, 1);
                }

            }
        });
    }

    //增加&减少算法
    function changeNum(num, that) {
        if (that.memory.currentNum.length > 0) {
            if (num > that.memory.currentNum[that.memory.currentNum.length - 1]) {
                addStyle(that, num, that.memory.currentNum.length - 1);
                return;
            } else {
                for (var i = that.memory.currentNum.length - 1; i >= 0; i--) {
                    if (num >= that.memory.currentNum[i]) {
                        addStyle(that, num, i);
                        return;
                    }
                }
            }
        } else {
            addStyle2(that, num);
        }

    }

    function addStyle(that, num, index) {
        var that = that,
            i = index,
            num = num;
        if (num == 1) {
            $('#Reduce').addClass('cur');
        } else {
            $('#Reduce').removeClass('cur');
        }
        var liLength = $("#totalPackage li").length;
        if (liLength > 0) {
            for (var i = liLength - 1; i >= 0; i--) {
                var liNum1 = parseInt($("#totalPackage li").eq(i).attr("num")) || 1;
                var liNum2 = parseInt((i == 0 ? num + 1 : $("#totalPackage li").eq(i - 1).attr("num")));
                if (num >= liNum1 && num < liNum2) {
                    $("#totalPackage li").removeClass('cur').children('.treatment-num').css('border-right', 'solid 1px #eee');
                    $("#totalPackage li").eq(i).addClass('cur').children('.treatment-num').css('border-right', 'solid 1px #fc9494');
                }
            }
        }
        $('#UserDay').text(Math.floor(that.memory.day * num));
        $("#curNum").html(num);

    }

    function addStyle2(that, num) {
        var that = that,
            num = num;
        if (num == 1) {
            $('#Reduce').addClass('cur');
        } else {
            $('#Reduce').removeClass('cur');
        }
        $("#curNum").html(num);
        $('#UserDay').text(Math.floor(that.memory.day * num));
    }
    // 加载同步推荐
    function recommend() {
        GetRecommendSearchProducts({
            pageType: "product",
            recomm: "hotsale",
            productId: $("#kad-productSkuId").val(),
            orderSouce: 21,
            callback: function(data) {
                if (data.length > 0) {
                    $('#recommendWrap').show();
                    var content = '';
                    for (var i = 0; i < data.length; i++) {
                        content += '<li class="swiper-slide"><p class="recommend-prod-pic"><a href="/product/' + data[i].WareSkuCode + '.shtml?kzone=ultimatelybuy"><img src="' + data[i].Pic180 + '"/></a></p><p class="recommend-prod-name">' + data[i].WareName + '</p><p class="recommend-prod-price">￥' + data[i].SalePrice.toFixed(2) + '</p></li>';
                    }
                    $('#recommendCont').html(content);
                }
                //更多推荐
                new Swiper('.swiper-container4', {
                    loop: false,
                    autoplay: 5000,
                    slidesPerView: 3,
                    slidesPerGroup: 3,
                    spaceBetween: 10,
                    pagination: '#pagination2'
                });
            }
        });
    };

    /*
    检查当前使用的手机或固定电话号码是否存在，不存在则添加到数组中并返回true,否则不添加并返回flase
    */
    function checkOphoneAddArray(val) {
        var isExits = false;
        for (var i = 0; i < config.checkOphoneArr.length; i++) {
            if (config.checkOphoneArr[i] == val) {
                isExits = true;
                break;
            }
        }
        if (!isExits) {
            config.checkOphoneArr.push(val);
        }
        return isExits;
    };
    /*
    添加电话回访记录
    */
    function addReurnPhoneData(productType, productId, rxType) {
        var curHref = window.location.href,
            phone = $('#txtPhoneCall').val(), //获取填写手机号码的input
            email = $('#txtemail').val(),
            arrValue = '',
            regMail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; //验证邮箱
        if (productType < 0 || productType > 1) {
            showLayer2('请输入正确的产品类型!');
            return false;
        }
        if (productId == "" || parseInt(productId) < 1) {
            showLayer2('请选择产品!');
            return false;
        }
        if (rxType == 4) {
            if (!phonereg($('#txtPhoneCall'))) {
                $('#LContSize').text('请输入正确的电话号码!');
                return false;
            }
            if (email != '' && !regMail.test(email)) {
                $('#LContSize').text('请输入正确的邮箱地址!');
                return false;
            }
        } else {
            if (!phonereg($('#txtPhoneCall'))) {
                $('#LContSize').text('请输入正确的电话号码!');
                return false;
            }
        }
        $("#h_ProductType_Phone").val(productType); //产品类型，1:套餐,0:单品
        $("#h_ProductId_Phone").val(productId); //产品或套餐Id
        $("#h_Productemail_Phone").val(email); //邮箱地址
        $('#h_CurrentUrl').val(curHref);
        $('#txtPhoneCall').val(phone);
        if (curHref.indexOf('?ref=kadtouch') > -1) { //判断本页面链接是否出现?ref=kadtouch 这个字符串
            $("#ocRef_p").val("kadtouch");
        }
        if (rxType == 3) {
            arrValue = productId + '' + phone; //套餐或是单品ID+电话号码 
            if (checkOphoneAddArray(arrValue)) { //在前端页面判断是否重复输入用户登记信息
                showLayer2('你已提交成功，请耐心等候。');
                return false;
            }
            $.ajax({
                type: 'get',
                url: "/OrderCheck/CreateCheckOrderPhone",
                dataType: "json",
                data: {
                    txtPhoneCall: $("#txtPhoneCall").val(), //手机号码
                    h_ProductId_Phone: $("#h_ProductId_Phone").val(), //产品ID或者套餐ID
                    h_ProductType_Phone: $("#h_ProductType_Phone").val(), //类型 0
                    h_Qty: $("#h_Qty").val(), // 数量 1
                    ocRef_p: $("#ocRef_p").val(), //空或者kadtouch
                    h_CurrentUrl: $("#h_CurrentUrl").val(), // 本产品链接
                    department: $("#department").val() //空
                },
                success: function(data) {
                    if (data[0] == '0') {
                        $('#txtPhoneCall').val('');
                        showLayer2('电话登记成功，稍后药师将联系您！');
                    } else if (data[0] == '5') {
                        config.checkOphoneArr.pop();
                        showLayer2('抱歉，系统升级中，暂时不能提交！');
                    } else {
                        config.checkOphoneArr.pop(); //当提交失败后，把保存在数组中的当前数据删除，以便再次操作
                        showLayer2('提交失败！');
                    }

                }
            });
        } else if (rxType == 4) {
            arrValue = productId + '' + phone + '' + email; //套餐或是单品ID+电话号码 
            if (checkOphoneAddArray(arrValue)) { //在前端页面判断是否重复输入用户登记信息
                showLayer2('你已提交成功，请耐心等候。');
                return false;
            }
            $.ajax({
                url: "/Product/CreateNotice",
                type: 'get',
                dataType: 'json',
                data: {
                    MobilePhone: $("#txtPhoneCall").val(), //手机号码
                    Email: $("#h_Productemail_Phone").val(), //邮箱地址
                    WareCode: $("#h_ProductId_Phone").val(), //产品ID
                    WareName: $('.information-product-name').text()
                },
                success: function(data) {
                    if (!data.Success) {
                        config.checkOphoneArr.pop();
                        showLayer2('抱歉，系统升级中，暂时不能提交！');
                    } else {
                        $('#txtPhoneCall').val('');
                        $('#LNot').hide();
                        $('#LOk').hide();
                        $('#LNow').show();
                        $('.layer-input').hide();
                        $('.layer-input2').hide();
                        $('#LContSize').hide();
                        $('#LTitle').text('登记成功');
                    }
                }
            });
        } else {
            return false;
        }
    };

    function showLayer2(text) {
        var txt = text || '';
        $('#LNot').hide();
        $('#LOk').hide();
        $('#LNow').show();
        $('.layer-input').hide();
        $('.layer-input2').hide();
        $('#LContSize').text(txt);
    };
    //判断是否缺货
    /*库存状态:1-禁售缺货 2-禁售有货 3-现在有货 4-货源紧张 5-库存有限 6-暂时缺货*/
    function readStock() {
        var that = config;
        $.ajax({
            url: '/product/GetStockByProductId?sku=' + that.id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                if (data == 1 || data == 2 || data == 6) {
                    that.memory.isStock = true;
                    $('.details-footer a').hide();
                    $('.details-footer a').eq(0).css('display', 'block');
                    $('.details-footer a').eq(1).css('display', 'block');
                    $('.details-footer a').eq(7).css('display', 'block');
                };
                switch (data) {
                    case 3:
                        $('#inventory_status').siblings().css('width', '100%');
                        break;
                    case 4:
                        $("#inventory_status").text("货源紧张");
                        $('#inventory_status').siblings().css('width', '78%');
                        break;
                    case 5:
                        $("#inventory_status").text("库存有限");
                        $('#inventory_status').siblings().css('width', '78%');
                        break;
                    case 6:
                        $("#inventory_status").text("商品已售完");
                        $('#inventory_status').siblings().css('width', '78%');
                        break;
                }
                commonSetPackageStep2();
            }
        })
    };
    //隐形眼镜交互
    var degreesSelected = 0,
        flagY = false;

    function tdialog(content, callback) {
        $('.mt-color-cont li').attr('notClick', 'not');
        $("#show_ts").text(content).show();
        setTimeout(function() {
            $('.mt-color-cont li').attr('notClick', '');
            $("#show_ts").hide();
            if (typeof(callback) == "function") {
                callback();
            }
        }, 3000);
    }
    $('.m-eyes-title').on('click', function(event) {
        $(this).hasClass('cur') ? $(this).removeClass('cur').siblings('.mt-info-cont').show() : $(this).addClass('cur').siblings('.mt-info-cont').hide();
    });
    var colorSpecJson;
    var colorName;
    var specName;
    var lastName;

    function showColorSpec() {
        var wareSkuCode = $("#kad-productSkuId").val();
        var productCode = $("#h_ProductCode").val();
        $.ajax({
            type: "Get",
            url: "/product/GetColorSpec?wareSkuCode=" + wareSkuCode + "&productCode=" + productCode,
            cache: false,
            dataType: "jsonp",
            json: "callback",
            success: function(data) {
                if (!data.Data.IsShow)
                    return;
                $(document.body).append("<input type=\"hidden\" id=\"IsColorSpec\" />");
                config.memory.isVirtualMainWareSku = data.Data.IsVirtualMainWareSku;
                $('.m-eyes-wrap').show();
                colorSpecJson = data.Data.PropertyGroupList;
                colorName = config.memory.isVirtualMainWareSku ? "颜色分类" : data.Data.PropertyName["颜色"];
                specName = config.memory.isVirtualMainWareSku ? "度数" : data.Data.PropertyName["度数"];
                $("#curColor").html(colorName);
                $("#curSpec").html(specName);
                $("#curNum").html($("#Number").val() + "件");
                if (config.memory.isVirtualMainWareSku) { $("#curNum").hide(); }
                loadColor(data.Data.PropertyList["颜色"]);
                loadSpec(data.Data.PropertyList["度数"]);
            }
        });
    }

    function loadColor(color) {
        $("#ypColor").html("");
        for (var i = 0; i < color.length; i++) {
            var className = color[i].Name == colorName ? "cur" : "";
            var colorSpec = color[i].Name + "-" + specName;
            if (colorSpecJson[colorSpec] == undefined) {
                className = "not";
            }
            if (config.memory.isVirtualMainWareSku) {
                className = "";
            }
            var li = "<li class=\"" + className + "\" value=\"" + color[i].Name + "\">" + color[i].Name + "</li>";
            $("#ypColor").append(li);
        }
        colorCliek();
    }

    function loadSpec(spec) {
        $("#ypDegrees").html("");
        for (var i = 0; i < spec.length; i++) {
            var className = spec[i].Name == specName ? "cur" : "";
            var colorSpec = colorName + "-" + spec[i].Name;
            if (colorSpecJson[colorSpec] == undefined) {
                className = "not";
            }
            if (config.memory.isVirtualMainWareSku) {
                className = "";
            }
            var li = "<li class=\"" + className + "\" value=\"" + spec[i].Name + "\">" + spec[i].Name + "</li>";
            $("#ypDegrees").append(li);
        }
        specCliek();
    }

    function colorCliek() {
        $("#ypColor li").click(function() {
            if ($(this).hasClass("cur")) {
                return;
            }
            $(this).siblings().removeClass("cur");
            $(this).siblings().removeClass("not");
            $(this).removeClass("not");
            $(this).addClass("cur");
            jump();
        })
    }

    function specCliek() {
        $("#ypDegrees li").click(function() {
            if ($(this).hasClass("not"))
                return;
            if ($(this).hasClass("cur")) {
                return;
            }
            $(this).siblings().removeClass("cur");
            $(this).addClass("cur");
            jump();
        })
    }

    //选择跳转
    function jump() {
        var color = $("#ypColor .cur").attr("value");
        var spec = $("#ypDegrees .cur").attr("value");
        var colorSpec = color + "-" + spec;
        var wareSkuCode = colorSpecJson[colorSpec];
        if (wareSkuCode == undefined && color != undefined) {
            //$("#ypDegrees li").removeClass("cur");
            $("#ypDegrees li").each(function() {
                var thisSpec = $(this).attr("value");
                colorSpec = color + "-" + thisSpec;
                if (colorSpecJson[colorSpec] == undefined) {
                    $(this).removeClass("cur");
                    $(this).addClass("not");
                } else {
                    $(this).removeClass("cur");
                    $(this).removeClass("not");
                }
            });
            tdialog("请重新选择度数！");
            return;
        } else if (wareSkuCode == undefined && spec != undefined) {
            $("#ypColor li").each(function() {
                var thisColor = $(this).attr("value");
                colorSpec = thisColor + "-" + spec;
                if (colorSpecJson[colorSpec] == undefined) {
                    $(this).removeClass("cur");
                    $(this).addClass("not");
                } else {
                    $(this).removeClass("cur");
                    $(this).removeClass("not");
                }
            });
            return;
        }
        window.location.href = "/product/" + wareSkuCode + ".shtml#colorSpec"
    }

    function haveSelect() {
        if ($("#IsColorSpec").length <= 0)
            return true;

        if ($("#ypColor li.cur").length <= 0) {
            tdialog("请选择颜色");
            return false;
        }
        if ($("#ypDegrees li.cur").length <= 0) {
            tdialog("请选择度数");
            return false;
        }
        if (config.memory.isVirtualMainWareSku) {
            return false;
        }
        return true;
    }
    //隐形眼镜交互 end

    //保存浏览历史 begin

    function SetProductHistory() {
        var wareSkuCode = $("#kad-productSkuId").val();
        $.ajax({
            type: 'GET',
            url: window.urlConfig.m + '/Product/SaveProductHistory',
            data: { productId: wareSkuCode },
            dataType: "jsonp",
            jsonp: "callback",
            success: function(data) {
                var b = JSON.stringify(data);
                $.fn.cookie("KadProductHistory", b, { expires: 365, domain: '360kad.com', path: '/' });
            }
        });
    }
    //保存浏览历史 end

    //数据懒加载入口 begin
    function lazyLoadMain() {
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
            if ((kItem.height() !== 0 || top !== 0) && top <= tool.getScrollTop() + screenHeight * 1.1) {
                var functionName = kItem.attr("data-func");
                var newFunc = eval(functionName);
                newFunc();
                kItem.removeAttr("data-lazyname");
            }
        });
    };
    /*懒执行加载活动专区*/
    function GetProductSeoDesp() {
        $.ajax({
            type: 'GET',
            url: window.urlConfig.m + '/Product/GetProductSeoDesp?wareskuCode=' + config.id,
            dataType: "json",
            jsonp: "callback",
            success: function(data) {
                $(".active-area").append(data.Data);
            }
        });
    }

    //数据懒加载入口 end
});

function GetFreeCoupon(activityId) {
    $.ajax({
        url: "/Coupon/FreeCoupon?ActivityID=" + activityId + "&rd=" + new Date().getTime(),
        dataType: "json",
        cache: false,
        success: function(data) {
            if (data == "请先登录") {
                alert("请先登录");
            } else if (data == "添加成功") {
                alert("领取成功！");
            } else if (data.indexOf("不能重复领取！") >= 0) {
                alert("您已经领取过该券了，不能重复领取！");
            } else {
                alert(data); /*领取失败*/
            }
        }
    });
}


function flyToCart(fromDom, begin, destinationId) {
    if (fromDom == null) {
        return;
    }
    var flyElm = fromDom.clone().css('opacity', '0.9').addClass("clone");
    flyElm.css({
        'z-index': 9000,
        'display': 'block',
        'position': 'absolute',
        'top': $('#' + begin).offset().top + 'px',
        'left': $('#' + begin).offset().left + 'px',
        'width': $('#' + begin).width() + 'px',
        'height': $('#' + begin).height() + 'px',
    });
    $('body').append(flyElm);
    flyElm.animate({
        top: $('#' + destinationId).offset().top,
        left: $('#' + destinationId).offset().left,
        width: 30,
        height: 30,
    }, 600, function() {
        $(".clone").remove();
    });
};

function cartAnimate(fromDom) {
    var dom = fromDom || $('.swiper-container-thisProducts .thisProducts:first').find('img');
    flyToCart(dom, 'cart_float', 'shopCart');
};

function cartAnimate2() {
    var dom = $('.swiper-container-thisProducts .thisProducts:first').find('img');
    flyToCart(dom, 'packcart_float', 'shopCart');
};

function showdownLoad() {
    var utm_source = getQueryString("utm_source");
    var utm_medium = getQueryString("utm_medium");
    if (utm_source == null) {
        $("#onloadApp").show();
        return;
    }
    if (utm_source == "jianeka" && utm_medium.toLowerCase() == "cps") {
        $("#onloadApp").hide();
        return;
    }
    if ($("#onloadApp").length <= 0) {
        return;
    }
    $("#onloadApp").show();
};

function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
};

//2018-08-21 修改
if ($('#online').length > 0) {
    $('#online,#Telephone,#shopCart').css('width', '16%');
    $('#addCart,#buyNow').css('width', '26% ');
    $('.details-footer a.shopCart span#cartNum').css('left', '.7rem')
}





/*
* 800图视频播放功能
* by xiefu
* 2017/11/29
*/

var video = {
    //初始化视频
    initVideo: function () {
        $('#first-video-playButton').show();
        $('#first-video-related').show();
        $('#thisVideo').remove();
        $('#relatedVideo').remove();
        $('#video-close').hide();
        $('.video-play').siblings('.thisProducts__pic180').show();
        $('.video-play').css('background', '#fff');
    },

    //播放视频
    playVideo: function (domId, videoId) {
        $(domId).click(function () {
            mainSwiper.stopAutoplay();
            $(domId).after(videoId);
            $('#first-video-playButton').hide();
            $('#first-video-related').hide();
            $('#video-close').show();
            $('.video-play').siblings('.thisProducts__pic180').hide();
            $('.video-play').css('background', '#000');
        });
    },

    //判断是否有本品视频或者相关视频
    isHaveVideo: function () {
        if ($("#produceVideoUrl").val() != "" || $("#videoUrl").val() != "") {
            $('.swiper-container-thisProducts .swiper-pagination-bullet').eq(0).addClass('video-pagination');
        }
    }

}

//解决横屏后再竖屏，800图错位的问题
$('.nestOutsideSwiper .swiper-container').width($(window).width());

//点击播放按钮播放视频
var thisVideo = '<div id="thisVideo" class="this-video"><iframe border="0" src="' + $("#produceVideoUrl").val() + '?embed=video" frameborder="no"></iframe></div>';
var relatedVideo = '<div id="relatedVideo" class="related-video"><iframe border="0" src="' + $("#videoUrl").val() + '?embed=video" frameborder="no"></iframe></div>';
var videoPlayButton = $('#first-video-playButton');
var videoRelated = $('#first-video-related');
video.playVideo(videoPlayButton, thisVideo);
video.playVideo(videoRelated, relatedVideo);

//点击关闭按钮初始化视频
$('#video-close').click(function () {
    video.initVideo();
})

//滑动到服务与承诺初始化视频视频
$(window).scroll(function () {
    if ($('.information-product-service').offset().top - $(window).scrollTop() <= 0) {
        video.initVideo();
    }
})

//ios UC浏览器视频播放会进入后台模式，返回后前台后刷新
var hiddenProperty = 'hidden' in document ? 'hidden' :
    'webkitHidden' in document ? 'webkitHidden' :
        'mozHidden' in document ? 'mozHidden' :
            null;
var visibilityChangeEvent = hiddenProperty.replace(/hidden/i, 'visibilitychange');
var onVisibilityChange = function () {
    if (!document[hiddenProperty]) {
        //回到前台
        video.isHaveVideo();
        video.initVideo();

    } else {
        //进入后台
    }
}
document.addEventListener(visibilityChangeEvent, onVisibilityChange);





