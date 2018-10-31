/* 
@author:guandy
@version v1.1.0
@基于jqeruy,用于可视化商品数据懒加载,CONFIG.screenNum 首次加载1.5屏的商品数据
@适用于m站
商品相关(kadmall="kadproductlist")
kadautoprice(秒杀价-最小价-销售价)
kadminprice(最小价格)
kadprice（销售价）
kadmarketprice（市场价）
kadpic180（图片）
kadpic800（图片）
kadproductname(商品名称)
kadadv（通用名专题广告语-详情页广告语）
kadproductadv（详情页广告语）
kadgadv(通用名专题广告语)
kadgtagadv(通用名标签广告语)
kadbuybutton（按钮）
kadkillprice(秒杀价)
kadkilltime(秒杀计时)
    -kadkillday（天）
    -kadkillhour（时）
    -kadkillmin（分）
    -kadkillsec（秒）

*/
$(function () {

    var CONFIG = {
        kadproductlist: "/Topic/ProductList?wareSkuCodes=",
        screenNum: 1.5,
        tag: ['kadautoprice', 'kadminprice', 'kadprice', 'kadmarketprice', 'kadkillprice', 'kadpic180', 'kadpic800', 'kadproductname', 'kadadv', 'kadproductadv', 'kadgadv', 'kadgtagadv', 'kadbuybutton', 'kadkilltime', 'kadkillday', 'kadkillhour', 'kadkillmin', 'kadkillsec'],
        cart: ['cartbuy', 'cartinvo', 'cartkill', 'shopbook']
    },
    tool = {
        getScrollTop: function () {
            return document.documentElement.scrollTop || document.body.scrollTop;
        },
        getClientHeight: function () {
            return document.documentElement.clientHeight || document.body.clientHeight;
        }
    },
    screenHeight = tool.getClientHeight();

    function init() {
        setTimeout(function () {
            check();
        }, 100);
        $(window).bind("scroll", check);
    };

    /**
* 获取sku
* @private
*/
    function getSku(kItem) {
        for (var i = 0; i < CONFIG.tag.length; i++) {
            if (kItem.attr(CONFIG.tag[i]) == undefined)
                continue;
            return kItem.attr(CONFIG.tag[i]);
        }
    };
    /**
* 移除已加载数据的kadmall
* @private
*/
    function removeSkuAttr(sku) {
        for (var i = 0; i < CONFIG.tag.length; i++) {
            if (typeof ($("[" + CONFIG.tag[i] + "='" + sku + "']") != "undefined")) {
                $("[" + CONFIG.tag[i] + "='" + sku + "']").removeAttr("kadmall");
            }
        }
    };

    /**
 * 检测并请求商品数据
 * @private
 */
    function check() {
        var arrSkuId = [],
            resultArr = [];
        $('[kadmall="kadproductlist"]').each(function () {
            var kItem = $(this),
                top = kItem.offset().top;
            if ((kItem.height() !== 0 || top !== 0) && top <= tool.getScrollTop() + screenHeight * CONFIG.screenNum) {
                //根据加载标示来加载
                var sku = getSku(kItem);
                if (sku == undefined || sku == null || sku == "") return true;
                removeSkuAttr(sku);
                arrSkuId.push(sku);
            }
        });
        // 去除数组重复skuId
        for (var i = 0, l = arrSkuId.length; i < l; i++) {
            for (var j = i + 1; j < l; j++) {
                if (arrSkuId[i] === arrSkuId[j]) {
                    j = ++i;
                }
            }
            resultArr.push(arrSkuId[i]);
        };
        resultArr.length && loadPrice(resultArr);
    };

    /**
 * 请求价格并替换价格标签内容，每次至多请求20个sku
 * @param arrSku    skuId组成的数组
 */
    function loadPrice(arrSku) {
        if (arrSku && arrSku.length) {
            for (var i = 0; i < arrSku.length; i += 20) {
                jsonpPrice(arrSku.slice(i, i + 20));
            }
        };
    };

    /**
 * 使用jsonp方式请求价格
 * @param arr
 */
    function jsonpPrice(arr) {
        $.ajax({
            url: CONFIG.kadproductlist + arr.join(","),
            dataType: "jsonp",
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    setData(data[i]);
                }

            }
        });
    };
    /**
* 设置数据
* @private
*/
    function setData(data) {
        if (typeof ($("[kadprice='" + data.WareSkuCode + "']") != "undefined") && data.SalePrice != null) {
            $("[kadprice='" + data.WareSkuCode + "']").html("￥" + data.SalePrice);
        }
        if (typeof ($("[kadmarketprice='" + data.WareSkuCode + "']") != "undefined") && data.MarketPrice != null) {
            $("[kadmarketprice='" + data.WareSkuCode + "']").html("￥" + data.MarketPrice);
        }
        if (typeof ($("[kadminprice='" + data.WareSkuCode + "']") != "undefined")) {
            if (data.MinPrice != null && data.MinPrice < data.SalePrice) {
                $("[kadminprice='" + data.WareSkuCode + "']").html("￥" + data.MinPrice + "<font class='minprice'>起</font>");
            }
            else {
                $("[kadminprice='" + data.WareSkuCode + "']").html("￥" + data.SalePrice);
            }
        }
        if (typeof ($("[kadpic180='" + data.WareSkuCode + "']") != "undefined") && data.Pic180 != null) {
            $("[kadpic180='" + data.WareSkuCode + "']").attr("src", data.Pic180);
        }
        if (typeof ($("[kadpic800='" + data.WareSkuCode + "']") != "undefined") && data.Pic800 != null) {
            $("[kadpic800='" + data.WareSkuCode + "']").attr("src", data.Pic800);
        }
        if (typeof ($("[kadproductname='" + data.WareSkuCode + "']") != "undefined") && data.WareName != null) {
            $("[kadproductname='" + data.WareSkuCode + "']").html(data.WareName);
        }
        if (typeof ($("[kadproductadv='" + data.WareSkuCode + "']") != "undefined") && data.Advertisement != null) {
            $("[kadproductadv='" + data.WareSkuCode + "']").html(data.Advertisement);
        }
        if (typeof ($("[kadadv='" + data.WareSkuCode + "']") != "undefined")) {
            if (data.GeneralSpecialAdv != null && $("[kadadv='" + data.WareSkuCode + "']").html() == "") {
                $("[kadadv='" + data.WareSkuCode + "']").html(data.GeneralSpecialAdv);
            }
            else {
                if (data.Advertisement != null && $("[kadadv='" + data.WareSkuCode + "']").html() == "") {
                    $("[kadadv='" + data.WareSkuCode + "']").html(data.Advertisement);
                }
            }
        }
        if (typeof ($("[kadkillprice='" + data.WareSkuCode + "']") != "undefined") && data.IsKill) {
            $("[kadkillprice='" + data.WareSkuCode + "']").html(data.Kill.PrmPrice);
        }
        if (typeof ($("[kadautoprice='" + data.WareSkuCode + "']") != "undefined")) {
            if (data.IsKill) {
                $("[kadautoprice='" + data.WareSkuCode + "']").html(data.Kill.PrmPrice);
            }
            else {
                if (data.MinPrice != null && data.MinPrice < data.SalePrice) {
                    $("[kadautoprice='" + data.WareSkuCode + "']").html("￥" + data.MinPrice + "<font class='minprice'>起</font>");
                }
                else {
                    $("[kadautoprice='" + data.WareSkuCode + "']").html("￥" + data.SalePrice);
                }
            }
        }
        if (typeof ($("[kadgadv='" + data.WareSkuCode + "']") != "undefined") && data.GeneralSpecialAdv != null) {
            $("[kadgadv='" + data.WareSkuCode + "']").html(data.GeneralSpecialAdv);
        }
        if (typeof ($("[kadgtagadv='" + data.WareSkuCode + "']") != "undefined")) {
            if (data.GeneralTagAdv != null) {
                $("[kadgtagadv='" + data.WareSkuCode + "']").html(data.GeneralTagAdv);
            }
            else {
                if ($("[kadgtagadv='" + data.WareSkuCode + "']").html() == "") {
                    $("[kadgtagadv='" + data.WareSkuCode + "']").hide();
                }
                //$("[kadgtagadv='" + data.WareSkuCode + "']").hide();
            }
        }
        if (typeof ($("[kadbuybutton='" + data.WareSkuCode + "']") != "undefined") && data.Button != null) {
            $("[kadbuybutton='" + data.WareSkuCode + "']").html(data.Button);
            $("[kadbuybutton='" + data.WareSkuCode + "']").attr("clstag", data.ButtonEvent);
            $("[kadbuybutton='" + data.WareSkuCode + "']").on("click", buyClick);
            $("[kadbuybutton='" + data.WareSkuCode + "']").addClass(data.ButtonEvent);
        }
        if (typeof ($("[kadkilltime='" + data.WareSkuCode + "']") != "undefined") && data.IsKill) {
            killTime(data);
        }
    };
    /**
* 秒杀倒计时
* @private
*/
    function killTime(data) {
        if (data == undefined)
            return;
        var endTime = new Date(parseInt(data.Kill.EndTime.slice(6, -2))).getTime();
        var nowTime = new Date();
        var t = endTime - nowTime.getTime();
        var d = Math.floor(t / 1000 / 60 / 60 / 24);
        var h = Math.floor(t / 1000 / 60 / 60 % 24);
        var m = Math.floor(t / 1000 / 60 % 60);
        var s = Math.floor(t / 1000 % 60);
        $("[kadkillday='" + data.WareSkuCode + "']").html(d);
        $("[kadkillhour='" + data.WareSkuCode + "']").html(h);
        $("[kadkillmin='" + data.WareSkuCode + "']").html(m);
        $("[kadkillsec='" + data.WareSkuCode + "']").html(s);
        if ((t + d + h + m + s) < 0)//活动已结束
        {
            $("[kadkilltime='" + data.WareSkuCode + "']").hide();
        }
        else {
            $("[kadkilltime='" + data.WareSkuCode + "']").show();
            setTimeout(function () { killTime(data); }, 1000);
        }
    };


    /**
* 购买点击事件
* @private
*/
    function buyClick() {
        var wareSkuCode = $(this).attr("kadbuybutton");
        var clstag = $(this).attr("clstag");
        if (clstag == "cartbuy" || clstag == "cartinvo" || clstag == "cartkill") {
            kadmobile.addCart(wareSkuCode, 1);
        }
        else {
            kadmobile.goBook(wareSkuCode, 1);
        }
    };
    init();
});

window.kadmobile = {
    //跳转到详情页
    goProduct: function (wareSkuCode) {
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            kad.goGoodsDetail(wareSkuCode);
        }
        else {
            window.location.href = "/product/" + wareSkuCode + ".shtml";
        }
    },
    //需求登记
    goBook: function (wareSkuCode, quantity) {
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            kad.goGoodsDetail(wareSkuCode);
        }
        else {
            quantity=(quantity==undefined?1:quantity);
            window.location.href = "/Product/IWant?productIds=" + wareSkuCode + "&quantitys=" + quantity;
        }
    },
    //套餐需求登记
    goPackageBook: function (packageId, quantity) {
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            //kad.goGoodsDetail(wareSkuCode);
        }
        else {
            quantity = (quantity == undefined ? 1 : quantity);
            window.location.href = "/Product/IWant?packageIds="+packageId+"&quantitys="+quantity
        }
    },
    //加入购物车
    addCart: function (wareSkuCode, quantity, callback) {
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            kad.addGoodsToShoppingCar(wareSkuCode);
        }
        else {
            quantity = (quantity == undefined ? 1 : quantity);
            var _url = '/Cart/AjaxCreate?productId=' + wareSkuCode + '&quantity=' + quantity;
            $.ajax({
                url: _url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (callback != null && callback != undefined && (typeof callback) === "function") {
                        callback(data);
                        return;
                    };
                    if (!data) {
                        alert(data);
                        return;
                    }
                    window.location.href = "/cart";
                }
            });
        }
    },
    //加入套餐
    addPackage: function (packageId, quantity, callback) {
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            kad.addPackageToShoppingCar(packageId);
        }
        else {
            quantity = (quantity == undefined ? 1 : quantity);
            var _url = '/Cart/AjaxBuyPackageToCart?packageId=' + packageId + '&quantity=' + quantity;
            $.ajax({
                url: _url,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (callback != null && callback != undefined && (typeof callback) === "function") {
                        callback(data);
                        return;
                    };
                    if (!data.result) {
                        alert(data.message);
                        return;
                    }
                    window.location.href = "/cart";
                }
            });
        }
    },
    //判断是否登录
    isLogin: function () {
        var result = false;
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            result = (kad.isLogin() != 0);
        }
        else {
            $.ajax({
                url: "/Login/GetUserInfo",
                type: "Get",
                dataType: "json",
                cache: false,
                async: false,
                success: function (data) {
                    result = data["LoginName"] != null;
                }
            });
        }
        return result;
    },
    //去登录
    goLogin: function () {
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            kad.goLogin();
        }
        else {
            var _returnUrl = window.location.href;
            var _url = urlConfig.m + "/Login?ReturnUrl=" + _returnUrl;
            window.location.href = _url;
        }
    },
    //领取优惠券
    getCoupon: function (activityId, callback) {
          if (!kadmobile.isLogin()) {
                kadmobile.goLogin();
                return;
            }
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            kad.getCoupon(activityId);
        }
        else {
            $.ajax({
                url: "/Coupon/FreeCoupon?ActivityID="+activityId+"&rd="+new Date().getTime(),
                dataType: "json",
                cache: false,
                success: function (data) {
                    if (callback != null && callback != undefined && (typeof callback) === "function") {
                        callback(data);
                        return;
                    };
                    if (data == "请先登录") {
                        
                        alert("请先登录");
                        kadmobile.goLogin();
                    }
                    else if (data == "添加成功") {
                        alert("领取成功！");
                    } else if (data.indexOf("不能重复领取！") >= 0) {
                        alert("您已经领取过该券了，不能重复领取！");
                    } else {
                        alert(data);/*领取失败*/
                    }
                }
            });
        }
    },
    //actType：1，免费领取，2，换购;origin为平台
    buyChange: function (giftWareSkuCode, actType, origin, callback) {
        if (!kadmobile.isLogin()) {
                kadmobile.goLogin();
            }
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            $.ajax({
                url: urlConfig.app + "/Cart/FreeGet?productID=" + giftWareSkuCode + "&actType=" + actType,
                type: "Get",
                cache: false,
                dataType: "jsonp",
                jsonp: "callback",
                success: function (data) {
                    if (callback != null && callback != undefined && (typeof callback) === "function") {
                        callback(data);
                        return;
                    }
                    if (data == "true") { alert("领取成功"); } else { alert(data); }
                }
            });
        }
        else {
            $.ajax({
                url: urlConfig.cart + "/Cart/FreeGet?giftWareCode=" + giftWareSkuCode + "&actType=" + actType + "&origin=" + origin,
                type: "Get",
                cache: false,
                dataType: "jsonp",
                jsonp: "callback",
                success: function (data) {
                    if (callback != null && callback != undefined && (typeof callback) === "function") {
                        callback(data);
                        return;
                    }
                    alert(data.Message);
                }
            });
        }
    },
    getPlat: function () {
        var plat = "";
        if (typeof (kad) != "undefined" && kad.getAppVersionNo() != undefined) {
            plat = kad.getDeviceType();
            return plat.toLowerCase();
        }
        else {
            if (/(iOS|iPad|iPod|iPhone)/i.test(navigator.userAgent))
            {
                return "ios";
            }
            return "android";
        }
    },

};
