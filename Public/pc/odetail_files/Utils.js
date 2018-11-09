//存cookie||读cookie
function GetOrSetCookies(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        var path = options.path ? '; path=' + options.path : '';
        var domain = options.domain ? '; domain=' + options.domain : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
}

//取得上级网页地址
function GetReferrerUrl() {
    var tempReferrer = "";
    try {
        tempReferrer = SetDataX(document.referrer, tempReferrer);
        tempReferrer = SetDataX(top.document.referrer, tempReferrer);
        tempReferrer = SetDataX(window.parent.document.referrer, tempReferrer);
    } catch (e) {
    }
    if (tempReferrer != "")
        tempReferrer = tempReferrer.toString().replace(/[&]/gim, "$").replace(/http:\/\//gim, "").replace(/#/g, "*");

    return tempReferrer;
}

function GetRefUrls() {
    var strRefer = "";
    try {
        strRefer = SetDataX(document.referrer, strRefer);
        strRefer = SetDataX(top.document.referrer, strRefer);
        strRefer = SetDataX(window.parent.document.referrer, strRefer);
    } catch (e) {
    }
    return strRefer;
}

function SetDataX(dataSource, data) {
    tempdata = data;
    try {
        if (dataSource && dataSource != '') {
            if (tempdata == '') {
                tempdata = dataSource;
            }
        }
    }
    catch (e) { }
    return tempdata;
}
//取得当前页面地址
function GetCurrenttURL() {
    var uri = "";
    try {
        uri = SetDataX(document.URL, uri);
        uri = SetDataX(window.location, uri);
        uri = SetDataX(window.parent.location, uri);
    } catch (e) { }
    //if (!/\?/.test(uri))
    //    uri = uri + "?";
    if (uri != "")
        uri = uri.toString().replace(/[&]/gim, "$").replace(/http:\/\//gim, "").replace(/#/g, "*");
    return encodeURI(uri);
}

//取得网页标题
function InitTitleX() {
    var docTitle = document.title;
    try {
        if (typeof docTitle == 'undefined' || docTitle == null || docTitle == '') {
            var t_titles = document.getElementsByTagName("title");
            if (typeof t_titles != 'undefined' && t_titles && t_titles.length > 0) {
                docTitle = t_titles[0].innerText;
            } else {
                docTitle = "";
            }
        }
    } catch (e) { }
    return docTitle;
}

function GetUrlArgs(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
    var r = window.location.search.substr(1).match(reg);  //匹配目标参数
    if (r != null) return decodeURIComponent(r[2]); return null; //返回参数值
}

function GetRefUrlftype() {
    var returnVal = "0";
    if (GetReferrerUrl() != "") {
        var r = GetReferrerUrl().toLowerCase(); //转为小写
        var aSites = new Array('.baidu.com', '.google.', '.soso.com', '.so.com', '.sogou.com', '.yahoo.', '.youdao.', '.bing.', '.sm.cn');
        for (var i=0;i<aSites.length;i++) {
            if (r.indexOf(aSites[i]) > 0) {
                returnVal = (i + 2).toString();
                break;
            }
        }
        if (returnVal == "0") {
            returnVal = "1";
        }
    }
    return returnVal;
}

//获取URL参数字符串
function GetURLParams() {
    var strParam = "";
    var url = window.location.search; //获取url中"?"符后的字串
    if (url.indexOf("?") > -1) {
        strParam = "?" + url.split('?')[1];
    }
    return strParam;
}

function CallBack() {
            var phoneTxt = $("#swtnumber").val();
            if (phoneTxt == "") {
                alert("请填写回访电话！");
                $("#swtnumber").focus();
                return false;
            }
            //获取当前href
            var referrer = document.referrer;
            var href = window.location.href;
            var mobilePhoneReg = /^(\d{11}$)/;
            var telphoneReg = /^\d{3,4}-\d{7,8}$/;
            if (mobilePhoneReg.exec(phoneTxt) || telphoneReg.exec(phoneTxt)) {              
$.ajax({
                    type: 'get',
                    url: '//order.jianke.com/ajax/CallSend',
                    data: { phone: phoneTxt, hotline: '4000602819', referrer: referrer, href: href, NoCache: Math.random() },
                    dataType: 'jsonp',
                    error: function (error) {
                        alert(error.error);
                    },
                    success: function (result) { $("#swtnumber").val("");alert(result.status); 
                             }
                });
        return true;
            }
            else {
                alert("请输入正确的电话号码！如手机号：13900000000或电话：010-66666666或0662-8989888！");
                $("#swtnumber").focus();
                return false;
            }
        }


function swtFocus() {
    //$("#swtnumber").css("color", "#484848");
    if ($("#swtnumber").val() == "请输入您的电话号码")
        $("#swtnumber").val("");
}

function swtblur() {
    //$("#swtnumber").css("color", "#c7c7c7");
    if ($("#swtnumber").val() == "")
        $("#swtnumber").val("请输入您的电话号码");
}


function CallBack1(hotlines) {//4000602819
            var phoneTxt = $("#swtnumber").val();
            if (phoneTxt == "") {
                alert("请填写回访电话！");
                $("#swtnumber").focus();
                return false;
            }
            //获取当前href
            var referrer = document.referrer;
            var href = window.location.href;
            var mobilePhoneReg = /^(\d{11}$)/;
            var telphoneReg = /^\d{3,4}-\d{7,8}$/;
            if (mobilePhoneReg.exec(phoneTxt) || telphoneReg.exec(phoneTxt)) {
                $.ajax({
                    type: 'get',
                    url: '//order.jianke.com/ajax/CallSend',
                    data: { phone: phoneTxt, hotline: hotlines, referrer: referrer, href: href, NoCache: Math.random() },
                    dataType: 'jsonp',
                    error: function (error) {
                        alert(error.error);
                    },
                    success: function (result) {
                        $("#swtnumber").val(""); alert(result.status);
                    }
                });
                return true;
            }
            else {
                alert("请输入正确的电话号码！如手机号：13900000000或电话：010-66666666或0662-8989888！");
                $("#swtnumber").focus();
                return false;
            }
        }


function CallBack2() {
    var hottell = "";

    var phoneTxt = $("#swtnumber").val();
    if (phoneTxt == "") {
        alert("请填写回访电话！");
        $("#swtnumber").focus();
        return false;
    }
  hottell = GetTell().replace(/\-/g,"");  //获取当前href
    var referrer = document.referrer;
    var href = window.location.href;
    var mobilePhoneReg = /^(\d{11}$)/;
    var telphoneReg = /^\d{3,4}-\d{7,8}$/;
    if (mobilePhoneReg.exec(phoneTxt) || telphoneReg.exec(phoneTxt)) {
        $.ajax({
            type: 'get',
            url: '//order.jianke.com/ajax/CallSend',
            data: { phone: phoneTxt, hotline: hottell, referrer: referrer, href: href, NoCache: Math.random() },
            dataType: 'jsonp',
            error: function (error) {
                alert(error.error);
            },
            success: function (result) {
                $("#swtnumber").val(""); alert(result.status);
            }
        });
        return true;
    }
    else {
        alert("请输入正确的电话号码！如手机号：13900000000或电话：010-66666666或0662-8989888！");
        $("#swtnumber").focus();
        return false;
    }
}

//获取对应产品线电话
function GetTell() {
    var number = 0;
    if (LKconfig.WebSiteNumber != null) {
        number = LKconfig.WebSiteNumber;
    }
    var TellNum = "";
    if (TellNumber != undefined && TellNumber != null) {
        for (var item in TellNumber) {
            if (item != undefined && item != null && item == "Tell" + number) {
                if (TellNumber[item] != undefined && TellNumber[item] != null) {
                    TellNum = TellNumber[item].toString();
                    break;
                }
            }
        }
    }
    return TellNum;
}