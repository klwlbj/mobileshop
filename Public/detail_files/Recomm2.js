/* 
@SEO专用
RecommSettings参数详情
 ----------------------------------------------------
 pageType:页面类型   必传
 
 product(商品详情页)
 category(类别页)
 cart(购物车页)
 search(搜索页)
 vippage(会员页)
 --------------------------------------------------
 recomm：推荐区域   必传
     
 hotsale(人气推荐区域);
 attentionlist(关注排行);
 historylist(浏览排行);
 similarbuy(相似购买);
 alsobuyWithThekey(搜索该关键词的用户还买了);
 popular(热销):
 alsobuy(购物车页面的买了的人还买了);
 guesslike(VIP页面的猜你喜欢);
 similarrecomm(类似商品)
 --------------------------------------------------
 productId：商品SkuCode(商品详情页必须有)
 --------------------------------------------------
 keyword: 搜索关键词(搜索页面必须有)
 --------------------------------------------------
 userid: 会员id(Vip页必须有)
 --------------------------------------------------
 filterids：过滤id   “1234+5678+7890”  非必传  可有多个
 containerId：父容器ID
 callback:回调函数,如果组装商品逻辑不适用,则使用此函数自定义组装或者其他逻辑,该函数包含data参数.
 orderSouce:订单来源(OrderSouceEnum的数字值,PC则不需要传)
  --------------------------------------------------

 */
function GetRecommendProducts(settings) {
   
    var RecommSettings = {
        pageType: settings.pageType || "category",
        recomm: settings.recomm || "historylist",
        productId: settings.productId || "",
        keyword: settings.keyword || "",
        userid:settings.userid||"",
        filterIds: settings.filterIds || "",
        containerId: settings.containerId || "",
        callback: settings.callback || null,
        orderSouce: settings.orderSouce||""
    }
    var html = "";
    $.ajax({
        type: "get",
        url: window.urlConfig.multiDomain.pc() + "/product/GetRecommdProductList2",
        data: { pagetype: RecommSettings.pageType, recomm: RecommSettings.recomm, productid: RecommSettings.productId, filterids: RecommSettings.filterIds, keyword: RecommSettings.keyword, userid: RecommSettings.userid, orderSouce: RecommSettings.orderSouce },
        cache: false,
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            var rec = urlConfig.multiDomain.res() || "http://res.360kad.com";
            for (var i = 0; i < data.length; i++) {
                var pic180 = data[i].Pic180 || "无";
                if (pic180 == "无") {
                    data[i].Pic180 = rec + "/theme/default/img/nopic.gif";
                }
            }
            if (RecommSettings.callback != null && (typeof RecommSettings.callback) === "function") {
                    RecommSettings.callback(data);
                    return;
            }
            //以下是老版的调用
            if (data.length > 0) {
                //组装推荐商品数据
                $.each(data, function (i) {
                    html += "<li>";
                    html += "<p class=\"Yimg\"><a href=\"/product/" + data[i].WareSkuCode + ".shtml\" target=\"_blank\">";
                    html += "<img src=\"" + data[i].Pic180 + "\" border=\"0\" alt=\"" + data[i].WareName + "\" title=\"" + data[i].WareName + "\"></a></p>";
                    html += "<p class=\"Yname\"><a href=\"/product/" + data[i].WareSkuCode + ".shtml\" target=\"_blank\" title=\"" + data[i].WareName + "\">" + data[i].WareName;
                    if (data[i].Model!=null&&data[i].Model != "")
                        html += "<span class=\"Yspec\">" + data[i].Model + "</span></a></p>";
                    if (data[i].Adv!=null&&data[i].Adv != "")
                        html += "<p class=\"Yadv\">" + data[i].Adv + "</p>";
                    html += "<p class=\"RMB Ypri\">￥" + ToMoney(data[i].SalePrice) + "</p>";
                    html += "</li>";
                });

                $("#" + RecommSettings.containerId).html(html);
            } else {
                $("#" + RecommSettings.containerId).parent().hide();
            }
        }

    });
}
/*
@PC搜索专用
*/
function GetRecommendSearchProducts(settings) {

    var RecommSettings = {
        pageType: settings.pageType || "category",
        recomm: settings.recomm || "historylist",
        productId: settings.productId || "",
        keyword: settings.keyword || "",
        userid: settings.userid || "",
        filterIds: settings.filterIds || "",
        containerId: settings.containerId || "",
        callback: settings.callback || null,
        orderSouce: settings.orderSouce || ""
    }
    var html = "";
    $.ajax({
        type: "get",
        url: window.urlConfig.multiDomain.pc() + "/product/GetRecommdProductListSearch",
        data: { pagetype: RecommSettings.pageType, recomm: RecommSettings.recomm, productid: RecommSettings.productId, filterids: RecommSettings.filterIds, keyword: RecommSettings.keyword, userid: RecommSettings.userid, orderSouce: RecommSettings.orderSouce },
        cache: false,
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            var rec = urlConfig.multiDomain.res() || "http://res.360kad.com";
            for (var i = 0; i < data.length; i++) {
                var pic180 = data[i].Pic180 || "无";
                if (pic180 == "无") {
                    data[i].Pic180 = rec + "/theme/default/img/nopic.gif";
                }
            }
            if (RecommSettings.callback != null && (typeof RecommSettings.callback) === "function") {
                RecommSettings.callback(data);
                return;
            }
            //以下是老版的调用
            if (data.length > 0) {
                //组装推荐商品数据
                $.each(data, function (i) {
                    html += "<li>";
                    html += "<p class=\"Yimg\"><a href=\"/product/" + data[i].WareSkuCode + ".shtml\" target=\"_blank\">";
                    html += "<img src=\"" + data[i].Pic180 + "\" border=\"0\" alt=\"" + data[i].WareName + "\" title=\"" + data[i].WareName + "\"></a></p>";
                    html += "<p class=\"Yname\"><a href=\"/product/" + data[i].WareSkuCode + ".shtml\" target=\"_blank\" title=\"" + data[i].WareName + "\">" + data[i].WareName;
                    if (data[i].Model != null && data[i].Model != "")
                        html += "<span class=\"Yspec\">" + data[i].Model + "</span></a></p>";
                    if (data[i].Adv != null && data[i].Adv != "")
                        html += "<p class=\"Yadv\">" + data[i].Adv + "</p>";
                    html += "<p class=\"RMB Ypri\">￥" + ToMoney(data[i].SalePrice) + "</p>";
                    html += "</li>";
                });

                $("#" + RecommSettings.containerId).html(html);
            } else {
                $("#" + RecommSettings.containerId).parent().hide();
            }
        }

    });
}
/*
@SEO专用
*/
function GetSeoRecommendProducts(settings) {
    var RecommSettings = {
        keyword: settings.keyword || "",
        containerId: settings.containerId || "",
        callback: settings.callback || null
    }
    var html = "";
    $.ajax({
        type: "get",
        url: window.urlConfig.multiDomain.pc() + "/dataplatform/GetSeoRecommProducts?keyWord="+RecommSettings.keyword,
        cache: false,
        dataType: "jsonp",
        jsonp: "callback",
        success: function (data) {
            var rec = urlConfig.multiDomain.res() || "http://res.360kad.com";
            for (var i = 0; i < data.length; i++) {
                var pic180 = data[i].Pic180 || "无";
                if (pic180 == "无") {
                    data[i].Pic180 = rec + "/theme/default/img/nopic.gif";
                }
            }
            if (RecommSettings.callback != null && (typeof RecommSettings.callback) === "function") {
                RecommSettings.callback(data.Data);
                return;
            }
            //以下是老版的调用
            if (data.length > 0) {
                //组装推荐商品数据
                $.each(data, function (i) {
                    html += "<li>";
                    html += "<p class=\"Yimg\"><a href=\"/product/" + data[i].WareSkuCode + ".shtml\" target=\"_blank\">";
                    html += "<img src=\"" + data[i].Pic180 + "\" border=\"0\" alt=\"" + data[i].WareName + "\" title=\"" + data[i].WareName + "\"></a></p>";
                    html += "<p class=\"Yname\"><a href=\"/product/" + data[i].WareSkuCode + ".shtml\" target=\"_blank\" title=\"" + data[i].WareName + "\">" + data[i].WareName;
                    if (data[i].Model != null && data[i].Model != "")
                        html += "<span class=\"Yspec\">" + data[i].Model + "</span></a></p>";
                    if (data[i].Adv != null && data[i].Adv != "")
                        html += "<p class=\"Yadv\">" + data[i].Adv + "</p>";
                    html += "<p class=\"RMB Ypri\">￥" + ToMoney(data[i].SalePrice) + "</p>";
                    html += "</li>";
                });

                $("#" + RecommSettings.containerId).html(html);
            } else {
                $("#" + RecommSettings.containerId).parent().hide();
            }
        }

    });
}
    /*得到金额（获取两位小数点）*/
    function ToMoney(x) {
        var f_x = parseFloat(x);
        if (isNaN(f_x)) { return false; }
        var f_x = Math.round(x * 100) / 100, s_x = f_x.toString(), pos_decimal = s_x.indexOf('.');
        if (pos_decimal < 0) {
            pos_decimal = s_x.length;
            s_x += '.';
        }
        while (s_x.length <= pos_decimal + 2) {
            s_x += '0';
        }
        return s_x;
    }