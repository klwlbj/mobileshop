document.write("<script type=\"text/javascript\" src=\"" + LKconfig.WebURL + "/swfobject.js\"></script>");
document.write("<script type=\"text/javascript\" src=\"" + LKconfig.WebURL + "/web_socket.js\"></script>");
var LKId = LKconfig.WebSiteId;
if (LKconfig.PSiteId != undefined && LKconfig.PSiteId != null && LKconfig.PSiteId != "") {
    LKId = LKconfig.PSiteId + "/" + LKconfig.WebSiteId;
}
document.write("<script type=\"text/javascript\" src=\"" + LKconfig.WebURL + "/Scripts/" + LKId + ".js\"></script>");
document.write("<script type=\"text/javascript\" src=\"" + LKconfig.MUrls + "/Scripts/m/Utils.js\"></script>");
document.write("<script type=\"text/javascript\" src=\"" + LKconfig.MUrls + "/Scripts/Template.js\"></script>");
if (LKconfig.WebSiteId == "lq") {
    document.write("<script type=\"text/javascript\" src=\"" + LKconfig.WebURL + "/Scripts/m/Tell.js\"></script>");
}

var ws;
var WEB_SOCKET_SWF_LOCATION = LKconfig.WebURL + "/WebSocketMainInsecure.swf";
var isAddTrace = 0, tc = null, objWin = null, connectTime = 0, eng = "0", ckLine = null, IsActive = 0;
var AllWebSite = "fh,sun,tw", popFlag = true;;
var ExistWebsite = AllWebSite.indexOf(LKconfig.WebSiteId) != -1 ? true : false;

var ctk = null;
function CheckTalk() {
    if (objWin == undefined || objWin == null || objWin.closed) {
        InitCenterWindow();
        clearInterval(ctk);
        Gtimes = 3;
    }
}

function connectServer() {
    var key = "website=" + LKconfig.WebSiteId + "&number=" + LKconfig.WebSiteNumber + "&ftype=" + LKconfig.FromType;
    if (GetOrSetCookies(LKconfig.WebSiteId + "uname") != null && GetOrSetCookies(LKconfig.WebSiteId + "uname") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "uname") != "") {
        key += "&area=" + encodeURI(GetOrSetCookies(LKconfig.WebSiteId + "uname"));
    }
    if (GetOrSetCookies(LKconfig.WebSiteId + "uid") != null && GetOrSetCookies(LKconfig.WebSiteId + "uid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "") {
        key += "&user=" + GetOrSetCookies(LKconfig.WebSiteId + "uid");
    }
    if (GetOrSetCookies(LKconfig.WebSiteId + "lsid") != null && GetOrSetCookies(LKconfig.WebSiteId + "lsid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "lsid") != "") {
        key += "&psid=" + GetOrSetCookies(LKconfig.WebSiteId + "lsid");
    }
    if (GetOrSetCookies(LKconfig.WebSiteId + "sid") != null && GetOrSetCookies(LKconfig.WebSiteId + "sid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "sid") != "") {
        key += "&staff=" + GetOrSetCookies(LKconfig.WebSiteId + "sid");
    }

    eng = GetRefUrlftype();
    key += "&eng=" + eng;
    key += "&refurl=" + GetCurrenttURL();
    IsActive = 1;

    ws = new WebSocket(LKconfig.WsCoonectStr + key); //初始页请求+ key
    ws.onopen = function () { };
    ws.onclose = function () { };
    ws.onmessage = function (evt) { RecieveMsg(evt); }
}

function RecieveMsg(evt) {
    var Msg = eval('(' + evt.data + ')');
    if (Msg.Type == "欢迎消息") {
        GetOrSetCookies(LKconfig.WebSiteId + "usercookie", Msg.CustomSessionID, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        if (GetOrSetCookies(LKconfig.WebSiteId + "uid") == null || GetOrSetCookies(LKconfig.WebSiteId + "uid") == undefined) {
            GetOrSetCookies(LKconfig.WebSiteId + "uid", Msg.TID, { expires: 360, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        }
        else if (GetOrSetCookies(LKconfig.WebSiteId + "uid") != Msg.TID) {
            GetOrSetCookies(LKconfig.WebSiteId + "uid", Msg.TID, { expires: 360, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        }
        if (connectTime < 1) {
            AddUserInfo();
        }
        connectTime++;
        ckLine = setInterval(sendOnlineMsg, 12000);
    }
    else if (Msg.Type == "邀请消息")//客服邀请对话
    {
        GetOrSetCookies(LKconfig.WebSiteId + "Isinvite", 1, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        GetOrSetCookies(LKconfig.WebSiteId + "sid", Msg.StaffSessionID, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        InitCenterWindow();
    }
    else if (Msg.Type == "客服注销") { //客服注销
        GetOrSetCookies(LKconfig.WebSiteId + "Isinvite", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        $("#LRdiv1").hide();
        $("#LRdiv0").show();
    }
    else if (Msg.Type == "关闭客户连接") { //后台断开用户连接
        GetOrSetCookies(LKconfig.WebSiteId + "usercookie", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
    }
    else if (Msg.Type == "取消邀请") {
        GetOrSetCookies(LKconfig.WebSiteId + "Isinvite", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        GetOrSetCookies(LKconfig.WebSiteId + "sid", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        if ($("#LRdiv1").length > 0) {
            $("#LRdiv1").hide();
        }
        InitRightWindow();
    }
    else if (Msg.Type == "客服在线") {
        if (Msg.Msg == "0" && !SysConfig.NoStaffShow) {
            $("#LRdiv0").hide();
            $("#LRdiv1").hide();
            clearTimeout(tc);
        }
    }
}

//保存用户信息
function AddUserInfo() {
    if (GetOrSetCookies(LKconfig.WebSiteId + "uid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "uid") != null && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "" && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "null") {
        var info = "timezone=" + (new Date()).toTimeString().substr(9, 8).replace("+", "A").replace("-", "B");
        info += "&screencolor=" + encodeURI(screen.colorDepth);
        info += "&resolution=" + screen.width + "×" + screen.height;
        info += "&isaddtrace=" + isAddTrace + "&website=" + LKconfig.WebSiteId;
        info += "&pronumber=" + LKconfig.WebSiteNumber;
        info += "&referrer=" + GetReferrerUrl();
        info += "&ftype=" + LKconfig.FromType;
        $.getJSON(LKconfig.WebURL + "/XYAjax/MsgChange.ashx?type=saveuser&id=" + GetOrSetCookies(LKconfig.WebSiteId + "uid") + "&jsoncallback=?", info, function (data) { });
    }
}

//保存用户轨迹
function AddUserTrace() {
    if (isAddTrace == 0) {
        if (GetOrSetCookies(LKconfig.WebSiteId + "uid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "uid") != null && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "" && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "null") {
            var info = "id=" + GetOrSetCookies(LKconfig.WebSiteId + "uid");
            info += "&website=" + LKconfig.WebSiteId;
            info += "&referrer=" + GetReferrerUrl();
            $.getJSON(LKconfig.WebURL + "/XYAjax/MsgChange.ashx?type=SaveUserTrace&jsoncallback=?", info, function (data) { });
        }
    }
}

/*获取参数信息*/
function GetParamsInfo() {
    var Urlstr = "?utype=2";
    if (GetOrSetCookies(LKconfig.WebSiteId + "lsid") != null && GetOrSetCookies(LKconfig.WebSiteId + "lsid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "lsid") != "") {
        Urlstr = "?utype=1";
        Urlstr += "&psid=" + GetOrSetCookies(LKconfig.WebSiteId + "lsid");
    }
    if (GetOrSetCookies(LKconfig.WebSiteId + "sid") != null && GetOrSetCookies(LKconfig.WebSiteId + "sid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "sid") != "") {
        Urlstr = "?utype=1";
        Urlstr += "&sid=" + GetOrSetCookies(LKconfig.WebSiteId + "sid");
    }

    Urlstr += "&ftype=" + LKconfig.FromType;
    if (LKconfig.WebSiteId != null && LKconfig.WebSiteId != undefined && LKconfig.WebSiteId != "")
        Urlstr += "&siteid=" + LKconfig.WebSiteId;

    if (LKconfig.WebSiteNumber != null && LKconfig.WebSiteNumber != undefined && LKconfig.WebSiteNumber != "")
        Urlstr += "&number=" + LKconfig.WebSiteNumber;

    if (GetOrSetCookies(LKconfig.WebSiteId + "uid") != null && GetOrSetCookies(LKconfig.WebSiteId + "uid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "")
        Urlstr += "&uid=" + GetOrSetCookies(LKconfig.WebSiteId + "uid");

    if (GetOrSetCookies(LKconfig.WebSiteId + "uname") != null && GetOrSetCookies(LKconfig.WebSiteId + "uname") != undefined || GetOrSetCookies(LKconfig.WebSiteId + "uname") != "")
        Urlstr += "&uname=" + encodeURI(GetOrSetCookies(LKconfig.WebSiteId + "uname"));

    if (GetOrSetCookies(LKconfig.WebSiteId + "ismember") != null && GetOrSetCookies(LKconfig.WebSiteId + "ismember") != undefined || GetOrSetCookies(LKconfig.WebSiteId + "ismember") != "")
        Urlstr += "&ismember=" + encodeURI(GetOrSetCookies(LKconfig.WebSiteId + "ismember"));

    if (GetOrSetCookies(LKconfig.WebSiteId + "umembertoken") != null && GetOrSetCookies(LKconfig.WebSiteId + "umembertoken") != undefined || GetOrSetCookies(LKconfig.WebSiteId + "umembertoken") != "")
        Urlstr += "&memToken=" + encodeURI(GetOrSetCookies(LKconfig.WebSiteId + "umembertoken"));

    if (LKconfig.PSiteId != undefined && LKconfig.PSiteId != null && LKconfig.PSiteId != "")
        Urlstr += "&psiteid=" + LKconfig.PSiteId;

    Urlstr += "&eng=" + eng + "&act=" + IsActive + "&refurl=" + GetCurrenttURL();
    return Urlstr;
}

//弹出聊天框 (i: 1 接受邀请，2 拒绝邀请)
function openkfWin(i) {
    if (i < 3) { //接受邀请
        try {
            CloseWs(3);
            var vote = "";
            try {
                if (lotteryResult != undefined && lotteryResult != null) {
                    var encrypted = encodeURI(lotteryResult[0].Code + "," + lotteryResult[0].Name + "," + lotteryResult[0].Phone);
                    vote = "&vote=" + encrypted;
                }
            } catch (e) { }
            //lgl 2015-09-22 判断弹出验证框
            var boolCode = CheckPageOrSite() ? CheckVisitsTime() : false;
            if (boolCode) {
                var param = '' + GetParamsInfo();
                if (window.SysConfig && SysConfig.ReceptionType && typeof (SysConfig.ReceptionType) == 'string') { //售前售后
                    param = param.replace(/^\?/, (i == 2 ? '?rtype=2&' : '?rtype=1&')); //开启后 i: 2 售后，其他售前
                }
                var target = LKconfig.WebURL + '/chat.aspx' + param + vote;
                if (objWin == undefined || objWin == null || objWin.closed) {
                    objWin = window.open(target, 'chat', 'height=540, width=715, top=300, left=300, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
                } else {
                    objWin.location.replace(target);
                }
                setTimeout(function () { CheckTalkState(2) }, 10000);
                ctk = setInterval(CheckTalk, 5000);
            } else return;
        } catch (e) { }
    } else {
        if (ws) {
            if ((GetOrSetCookies(LKconfig.WebSiteId + "Isinvite") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "Isinvite") != null && GetOrSetCookies(LKconfig.WebSiteId + "Isinvite") != "")) {
                var msgjson = '{"Type":"邀请消息","Msg":"-1","TID":"","CustomSessionID":"","StaffSessionID":"' + GetOrSetCookies(LKconfig.WebSiteId + "sid") + '",StaffName:"",WebSiteId:"' + LKconfig.WebSiteId + '",MsgFrom:"0"}';
                ws.send(msgjson);
                GetOrSetCookies(LKconfig.WebSiteId + "Isinvite", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
            }
        }
    }
    //if ((GetOrSetCookies('bigeater_AB_index') + "") != 'B')
    //    GetOrSetCookies('bigeater_AB_index', 'B', { expires: 7, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain }); //AB测，使用B方案
    HideCenterWin(i);
}

function CloseWs(i) {
    try {
        if (ckLine != null)
            clearInterval(ckLine);
        if (ws) {
            if (i != undefined && i != null) {
                var msgjson = '{"Type":"跳转聊天","Msg":"","TID":""}';
                ws.send(msgjson);
            }
            else {
                ws.close();
            }
        }
    } catch (ex) { }
}

/*关闭右侧窗口*/
function CloseWin() {
    $("#LRdiv0").hide();
    $("#LRdiv1").hide();
    setTimeout(ShowRightChatDiv, SysConfig.closeShowts);
    if (tc != undefined && tc != null)
        clearTimeout(tc);
}

function ShowRightChatDiv() {
    $("#LRdiv0").show();
    if ($("#LRdiv1").attr("IsShow") == 1)
        tc = setTimeout(InitCenterWindow, SysConfig.InviteShowts);
}

function HideCenterWin(typeId) {
    $("#LRdiv1").hide();
    if ($("#LRdiv0").attr("IsShow") == 1)
        $("#LRdiv0").show();
    if (tc != undefined && tc != null)
        clearTimeout(tc);
    if ($("#LRdiv1").attr("IsShow") == 1 && typeId > 2) {
        //tc = setTimeout(InitCenterWindow, SysConfig.InviteShowts);
        //if (SysConfig.IsTlakShow)
        //var setWebsite = 'tw';
        //if (setWebsite.indexOf(LKconfig.WebSiteId) >= 0 && !(/^(0|1)$/.test(GetOrSetCookies(LKconfig.WebSiteId + 'notpop') + ''))) //不再弹窗设置
        //    GetOrSetCookies(LKconfig.WebSiteId + "notpop", (confirm('是否不再弹出该窗口？') ? 0 : 1), { expires: 30, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
    }
}

function InitRightWindow() {
    if ($("#LRdiv0").length < 1)
        $("body").append(TemplateConfig.LeftTemplate);

    if ($("#tellNum").length > 0) {
        var ss = GetTell();
        $("#tellNum").text(ss);
    }

    if ($("#LRdiv0").attr("IsShow") == 1)
        $("#LRdiv0").show();
}

function InitCenterWindow() {
    if ($("#LRdiv1").length < 1)
        $("body").append(TemplateConfig.CenterTemplate);
    $("#LRdiv1").hide();
    // A=照常，B=不弹
    //var site = 'a101|tw';
    //var r = new RegExp('\\b(' + LKconfig.WebSiteId + ')\\b', 'i');
    //if (popFlag == false &&  r.test(site) && (GetOrSetCookies('bigeater_AB_index') + '') == 'B') {
    //    return;
    //}
    //popFlag = false;
    //if ($("#LRdiv1").attr("IsShow") == 1) {
    //    $("#LRdiv0").hide();
    //    $("#LRdiv1").show();
    //}
    if ($("#LRdiv1").attr("IsShow") == 1) {
        checkShowCenterWindow();
    }
}

//商务通中间div弹出逻辑
function checkShowCenterWindow() {
    //如果已经弹窗，直接结束
    if (GetOrSetCookies(LKconfig.WebSiteId + "ShowCenterWindow") == "1") {
        return;
    }
    //请求后台 根据ip做相应逻辑
    $.getJSON(LKconfig.WebURL + "/XYAjax/MsgChange.ashx?type=CheckShowWin&jsoncallback=?", { website: LKconfig.WebSiteId }, function (data) {
        try {
            if (data.isShow == "1") {
                //弹窗
                $("#LRdiv0").hide();
                $("#LRdiv1").show();
                GetOrSetCookies(LKconfig.WebSiteId + "ShowCenterWindow", data.isShow, { expires: 1, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
            } else {
                /*
                if (GetOrSetCookies(LKconfig.WebSiteId + "ShowCenterWindow") == null) {
                    //弹窗
                    $("#LRdiv0").hide();
                    $("#LRdiv1").show();
                    GetOrSetCookies(LKconfig.WebSiteId + "ShowCenterWindow", data.isShow, { expires: 1, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
                }
                */
            }
        } catch (e) {
        }
    });
}

function sendOnlineMsg() {
    if (ws) {
        if (GetOrSetCookies(LKconfig.WebSiteId + "uid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "uid") != null && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "" && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "null") {
            var msgjson = '{"Type":"用户在线响应","TID":"","Msg":"","CustomSessionID":"' + GetOrSetCookies(LKconfig.WebSiteId + "uid") + '","WebSiteId":"' + LKconfig.WebSiteId + '"}';
            ws.send(msgjson);
        } else {
            ws.close();
            if (ckLine != null)
                clearInterval(ckLine);
        }
    }
}

function GetUserInfoOrArea() {
    if (GetOrSetCookies(LKconfig.WebSiteId + "uname") == null || GetOrSetCookies(LKconfig.WebSiteId + "uname") == "null" || GetOrSetCookies(LKconfig.WebSiteId + "uname") == undefined || GetOrSetCookies(LKconfig.WebSiteId + "uname") == "") {
        $.getJSON(LKconfig.WebURL + "/XYAjax/MsgChange.ashx?type=GetUserArea&jsoncallback=?", null, function (data) {
            GetOrSetCookies(LKconfig.WebSiteId + "uname", data.Area, { expires: 7, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
            connectServer();
        })
    }
    else {
        connectServer();
    }
}

$(function () {
    InitRightWindow();
    GetOrSetCookies(LKconfig.WebSiteId + "IsExistCookie", "1", { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
    GetOrSetCookies(LKconfig.WebSiteId + "umembertoken", "", { path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
    //先执行判断一下登录状态
    memberSync();
    memberModule();
    var action = GetUrlArgs("action");
    if (action == "openChat") {
        openkfWin(2);
    }
    if (GetOrSetCookies(LKconfig.WebSiteId + "IsExistCookie") == "1") {//没有禁用cookie
        GetOrSetCookies(LKconfig.WebSiteId + "IsExistCookie", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        if (GetOrSetCookies(LKconfig.WebSiteId + "uid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "uid") != null && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "" && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "null") {
            if (connectTime < 1) {
                AddUserInfo();
                connectTime++;
                isAddTrace++;
            }
        }
        else {
            GetOrSetCookies(LKconfig.WebSiteId + "sid", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
            GetOrSetCookies(LKconfig.WebSiteId + "usercookie", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
            GetOrSetCookies(LKconfig.WebSiteId + "Isinvite", null, { expires: 0, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
        }
        var flage = false;
        if (GetOrSetCookies(LKconfig.WebSiteId + "Isinvite") == undefined || GetOrSetCookies(LKconfig.WebSiteId + "Isinvite") == null || GetOrSetCookies(LKconfig.WebSiteId + "Isinvite") == "") {//记录客服未发出聊天邀请
            if (GetOrSetCookies(LKconfig.WebSiteId + "usercookie") == undefined || GetOrSetCookies(LKconfig.WebSiteId + "usercookie") == null) {//未连接
                CheckChatWin();
                flage = true;
            }
        }
        if (!flage) {
            ShowCenterWin();
        }
        AddUserTrace();
    }
    else {
        //alert("您的浏览器不支持cookie,请开启浏览器的Cookies");
    }
});

$(window).bind("beforeunload", function () { CloseWs(); });
$(window).bind("unload", function () { CloseWs(); });

function ShowCenterWin() {
    if (objWin == undefined || objWin == null || objWin.closed) {
        tc = setTimeout(InitCenterWindow, SysConfig.FirstShowts);
    }
}

function CheckChatWin() {
    if (objWin == undefined || objWin == null || objWin.closed) {
        GetUserInfoOrArea();
        ShowCenterWin();
    }
}

var Gtimes = 0;
function CheckTalkState(typeId) {
    if (GetOrSetCookies(LKconfig.WebSiteId + "uid") != undefined && GetOrSetCookies(LKconfig.WebSiteId + "uid") != null && GetOrSetCookies(LKconfig.WebSiteId + "uid") != "") {
        $.getJSON(LKconfig.WebURL + "/XYAjax/MsgChange.ashx?type=CheckTalkState&jsoncallback=?", { userId: GetOrSetCookies(LKconfig.WebSiteId + "uid"), website: LKconfig.WebSiteId, types: typeId }, function (data) {
            if (data.Msg != undefined && data.Msg != null && data.Msg.length > 10 && typeId == 2) {
                GetOrSetCookies(LKconfig.WebSiteId + "lsid", data.Msg, { expires: 7, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain });
                Gtimes = 0;
            } else {
                if (Gtimes < 3) {
                    setTimeout(function () { CheckTalkState(2) }, 10000);
                    Gtimes = Gtimes + 1;
                }
            }
        });
    }
}



function GookieVal(offset)
//获得Cookie解码后的值 
{
    var endstr = document.cookie.indexOf(";", offset);
    if (endstr == -1)
        endstr = document.cookie.length;
    return unescape(document.cookie.substring(offset, endstr));
}
function Gookie(name)
//获得Cookie的原始值
{
    var arg = name + "=";
    var alen = arg.length;
    var clen = document.cookie.length;
    var i = 0;
    while (i < clen) {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg)
            return GookieVal(j);
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0) break;
    }
    return null;
}
function Sookie(name, value)
//设定Cookie值
{
    var argv = Sookie.arguments;
    var argc = Sookie.arguments.length;
    var expires = (argc > 2) ? argv[2] : null;
    var path = (argc > 3) ? argv[3] : null;
    var domain = (argc > 4) ? argv[4] : null;
    var secure = (argc > 5) ? argv[5] : false;
    document.cookie = name + "=" + escape(value) + ((expires == null) ? "" : ("; expires=" + expires.toGMTString()))
        + ((path == null) ? "" : ("; path=" + path)) + ((domain == null) ? "" : ("; domain=" + domain)) + ((secure == true) ? "; secure" : "");
}
function Dookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = Gookie(name);
    document.cookie = name + "=" + cval + '';
    expires = '' + exp.toGMTString();
}

//lgl 2015-09-22 网页或站点拦截
function CheckPageOrSite() {
    var openCode = false;
    if (SysConfig.SiteVisits)
        openCode = true;
    else if (SysConfig.PageVisits != undefined && SysConfig.PageVisits != '') {
        var url = window.location.href.split('?')[0].replace(/^http:\/\//gi, '');
        var urlList = SysConfig.PageVisits.split('|');
        var pageStr = '';
        for (var row in urlList) {
            urlList[row] = urlList[row].replace(/\/$/g, '');
            pageStr += (urlList[row].replace(/\./g, '\\\.') + '[\\\/]?|');
        }
        pageStr = pageStr.substr(0, pageStr.length - 1);
        var r = new RegExp('^(' + pageStr + ')$', 'gi');
        if (r.test(url))
            openCode = true;
    }

    if (openCode) {
        var sssdd = SetCheckdiv();
        //加入验证码div代码
        $(document.body).append(sssdd);
        if (!ExistWebsite) {
            createCode();
        }
        else {
            if ($("#imgCode").length > 0) {
                document.getElementById("txtIdentifyingCode").value = "";
                document.getElementById("imgCode").click();
            }
        }

        //显示验证码弹框
        document.getElementById('light').style.display = 'block';
        document.getElementById('fade').style.display = 'block';

        return false;
    }
    return true;
}

//访问次数拦截
function CheckVisitsTime() {
    var expdate = new Date();
    var myDate = new Date();
    var numberOfTimes = SysConfig.NumberOfTimes != undefined && SysConfig.NumberOfTimes != null ? SysConfig.NumberOfTimes : '';
    var times = 0, number = 0;
    if (numberOfTimes != '') {
        numberOfTimes = numberOfTimes.split('|');
        if (numberOfTimes.length == 2) {
            times = StringIsInt32(numberOfTimes[0]);
            number = StringIsInt32(numberOfTimes[1]);
        }
    }
    expdate.setTime(expdate.getTime() + (60 * 60 * 1000));
    if (!(visits = Gookie("visitsTime"))) {
        var mytime = myDate.getTime();     //获取当前时间
        visits = 1;
        Sookie("visitsTime", visits, expdate, "/", null, false);
        Sookie("Time", mytime, expdate, "/", null, false);
    }
    else {
        var mytime = myDate.getTime();     //获取当前时间
        var diff = (mytime - Gookie("Time")) / 1000;
        var visitsTime = times;
        if (diff <= visitsTime) {      //N秒了点击的次数
            visits++;
            Sookie("visitsTime", visits, expdate, "/", null, false);
        } else {     //超过N秒重新计算
            var mytime = myDate.getTime();     //获取当前时间
            visits = 1;
            Sookie("visitsTime", visits, expdate, "/", null, false);
            Sookie("Time", mytime, expdate, "/", null, false);
        }
    }

    //lgl 2015-09-17 VisitsCodeOpen保存的Cookie值判断
    var visitsCodeOpen = Gookie('VisitsCodeOpen');
    var timeNumber = number;
    var showCode = false;
    if (timeNumber > 0) {
        if ((visitsCodeOpen && visitsCodeOpen == 1) || visits > timeNumber)
            showCode = true;
    }

    if (showCode) {
        //加入验证码div代码
        $(document.body).append(SetCheckdiv());
        createCode();
        //显示验证码弹框
        document.getElementById('light').style.display = 'block';
        document.getElementById('fade').style.display = 'block';

        //lgl 2015-09-16 添加cookie标识符VisitsCodeOpen = 1
        Sookie('VisitsCodeOpen', 1);
        return false;
    }
    return true;
}

//验证码div块
function SetCheckdiv() {
    var tem = '<input type=\"text\" onclick=\"createCode()\" readonly=\"readonly\" id=\"checkCode\" style=\"border:0;width: 80px;height:35px;cursor: pointer;font-size:18px;background:#3DB743;text-align:center;\" title=\"点击刷新\" />';

    if (ExistWebsite) {
        var yzm = LKconfig.WebURL + '/IdentifyingCode.aspx';
        tem = '<img id=\"imgCode\" src=\"' + yzm + '\" style=\"height:40px;\"  alt=\"点击刷新\" onclick=\"javascript:var time = new Date().getTime(); this.src=this.src + \'?\' + time;\" />'
    }

    return '<div id=\"light\" style=\"display: none;position: fixed ! important;left: 50%; margin-left: -150px ! important; top: 50%; margin-top: -110px ! important;text-align:center;width: 250px;height: 180px;padding: 16px;border: 16px solid orange;background-color: white;z-index:9999999648991;\"><table align=\"center\" cellpadding=\"5\" cellspacing=\"5\"><tr><td colspan=\"2\" style=\"color:red;\">请输入验证码！</td></tr><tr><td><input id=\"txtIdentifyingCode\"  style=\"display: inline-block;height: 35px;line-height: 20px;color: #000000;font-size:16px;background: #fff;vertical-align: middle;width: 100px;\"placeholder=\"验证码\" title=\"验证码\" type=\"text\" /></td><td>' + tem + '</td></tr><tr style=\"text-align:center;margin-bottom: 30px;\"><td><input value=\"确  定\" id=\"btnSubmit\" type=\"submit\" style=\"display: block;height:40px; width: 100px;color: #fff;border: 2px solid #ECEFF1;background: #33B5E5;cursor: pointer;\" onclick=\"validate()\" /></td><td><input value=\"关  闭\" id=\"btnCancel\"  type=\"submit\" style=\"display: block;height:40px;width: 100px;color: #fff;border: 2px solid #ECEFF1;background: #33B5E5;cursor: pointer;\" onclick=\"document.getElementById(\'light\').style.display = \'none\';document.getElementById(\'fade\').style.display = \'none\'\" /></td></tr></table></div><div id=\"fade\" style=\"display: none;position: fixed ! important;top: 0%;left: 0%;width: 100%;height: 100%;background-color: black;z-index: 21001;-moz-opacity: 0.8;opacity: .80;filter: alpha(opacity=80);\"></div>';
}

var code; //在全局定义验证码   
//产生验证码  
function createCode() {
    code = "";
    var codeLength = 4;//验证码的长度  
    var checkCode = document.getElementById("checkCode");
    var random = new Array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
        'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');//随机数  
    for (var i = 0; i < codeLength; i++) {//循环操作  
        var index = Math.floor(Math.random() * 36);//取得随机数的索引（0~35）  
        code += random[index];//根据索引取得随机数加到code上  
    }
    checkCode.value = code;//把code值赋给验证码  
}

//将字符串转化为整数，否侧返回默认值 0
function StringIsInt32(s) {
    var reg = /^\d+$/;
    if (reg.test(s))
        return parseInt(s);
    else
        return 0;
}

//校验验证码  
function validate() {
    var inputCode = document.getElementById("txtIdentifyingCode").value.toUpperCase(); //取得输入的验证码并转化为大写        
    if (inputCode.length <= 0) { //若输入的验证码长度为0  
        alert("请输入验证码！"); //则弹出请输入验证码  
        return false;
    }
    else {
        if (ExistWebsite) {
            $.ajax({
                type: "get",
                async: false,
                url: LKconfig.WebURL + "/XYAjax/MsgChange.ashx?type=Identify&NoNumber=" + inputCode,
                dataType: "jsonp",//数据类型为jsonp  
                jsonp: "jsonCallback",//服务端用于接收callback调用的function名的参数  
                success: function (data) {
                    if (data.Msg == "0") {
                        alert("验证码输入错误！"); //则弹出验证码输入错误
                        document.getElementById("txtIdentifyingCode").value = "";//清空文本框
                        return false;
                    }
                    else {
                        //关闭验证码弹框
                        document.getElementById("light").style.display = "none";
                        document.getElementById("fade").style.display = "none";
                        //跳转正常连接页面

                        var vote = "";
                        try {
                            if (lotteryResult != undefined && lotteryResult != null) {
                                var encrypted = encodeURI(lotteryResult[0].Code + "," + lotteryResult[0].Name + "," + lotteryResult[0].Phone);
                                vote = "&vote=" + encrypted;
                            }
                        } catch (e) { }
                        var target = LKconfig.WebURL + '/chat.aspx' + GetParamsInfo() + vote;
                        if (objWin == undefined || objWin == null || objWin.closed) {
                            objWin = window.open(target, 'chat', 'height=540, width=715, top=300, left=300, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
                        } else {
                            objWin.location.replace(target);
                        }
                        setTimeout(function () { CheckTalkState(2) }, 10000);
                        ctk = setInterval(CheckTalk, 5000);
                        HideCenterWin(2);

                        return true;
                    }
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    //$("div").html(textStatus);
                    //$("div").append("<br/>" + XMLHttpRequest.status);
                    //$("div").append("<br/>" + XMLHttpRequest.readyState);
                    //$("div").append("<br/>" + XMLHttpRequest.responseText);
                    alert("验证码错误！"); //则弹出验证码输入错误
                    return false;
                }
            });
        }
        else {
            if (inputCode != code) { //若输入的验证码与产生的验证码不一致时  
                alert("验证码输入错误！"); //则弹出验证码输入错误  
                createCode();//刷新验证码  
                document.getElementById("txtIdentifyingCode").value = "";//清空文本框  
                return false;
            }
            else { //输入正确时  
                //重新设置cookie
                Sookie('VisitsCodeOpen', 0);
                var expdate = new Date();
                var myDate = new Date();
                expdate.setTime(expdate.getTime() + (60 * 60 * 1000));
                Sookie("visitsTime", 0, expdate, "/", null, false);
                Sookie("Time", myDate.getTime(), expdate, "/", null, false);
                //关闭验证码弹框
                document.getElementById("light").style.display = "none";
                document.getElementById("fade").style.display = "none";
                //跳转正常连接页面

                var vote = "";
                try {
                    if (lotteryResult != undefined && lotteryResult != null) {
                        var encrypted = encodeURI(lotteryResult[0].Code + "," + lotteryResult[0].Name + "," + lotteryResult[0].Phone);
                        vote = "&vote=" + encrypted;
                    }
                } catch (e) { }
                var target = LKconfig.WebURL + '/chat.aspx' + GetParamsInfo() + vote;
                if (objWin == undefined || objWin == null || objWin.closed) {
                    objWin = window.open(target, 'chat', 'height=540, width=715, top=300, left=300, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
                } else {
                    objWin.location.replace(target);
                }
                setTimeout(function () { CheckTalkState(2) }, 10000);
                ctk = setInterval(CheckTalk, 5000);
                HideCenterWin(2);

                return true;
            }
        }
    }
}

//初始化售前售后弹窗功能
window.SelectRType = function () {
    var obj = $('#chatUl'); //document.getElementById('chatUl');
    if (obj.length == 0) {
        var temp = '<ul id="chatUl" class="chatUl" style="display: none"><li class="chat_sq" onclick="openkfWin(1);$(this).parent().hide();return false;"><em></em>售前咨询</li><li class="chat_sh" onclick="openkfWin(2);$(this).parent().hide();return false;"><em></em>售后咨询</li></ul>';
        $('#LRdiv0').append(temp);
        obj = $(document.getElementById('chatUl'));
    }
    if (obj.css('display') != 'none')
        obj.hide();
    else
        obj.show();
}


function memberCallback() {
    try {
        memberSync();
    } catch (e) {

    }
    memberModule();
}

//会员模块
function memberModule() {
    setTimeout(memberCallback, 5000);
}

//会员同步模块
function memberSync() {
    var memberToken = GetOrSetCookies("MemberToken");
    var uMemberToken = GetOrSetCookies(LKconfig.WebSiteId + "umembertoken");
    if (memberToken == uMemberToken || (memberToken == undefined && uMemberToken == '') || (memberToken == undefined && uMemberToken == 'null')
        || (memberToken == '' && uMemberToken == 'null') || (memberToken == '' && uMemberToken == undefined)
        || (memberToken == 'null' && uMemberToken == '') || (memberToken == 'null' && uMemberToken == undefined)
    ) {
        return;
    }
    var optional = { expires: 360, path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain };
    var sessionOptional = { path: LKconfig.CookiesPath, domain: LKconfig.Cookiesdomain };
    //会员没有登录
    if (memberToken == null || memberToken == undefined || memberToken == 'null' || memberToken == '') {
        GetOrSetCookies(LKconfig.WebSiteId + "uid", NewGuid(), optional);
        GetOrSetCookies(LKconfig.WebSiteId + "umembertoken", "", sessionOptional);
        GetOrSetCookies(LKconfig.WebSiteId + "ismember", "0", sessionOptional);
        if (objWin != undefined && objWin != null && !objWin.closed) {
            objWin.close();
        }
    }
    //会员登录
    if (memberToken != null && memberToken != undefined && memberToken != 'null' && memberToken != '') {
        GetOrSetCookies(LKconfig.WebSiteId + "umembertoken", memberToken, sessionOptional);
        GetOrSetCookies(LKconfig.WebSiteId + "ismember", "1", sessionOptional);
        //发送uid+memtoken到后台请求商务通的对应id
        var uid = GetOrSetCookies(LKconfig.WebSiteId + "uid");
        $.getJSON(LKconfig.WebURL + "/XYAjax/MsgChange.ashx?type=GetMemberUid&jsoncallback=?", { userId: uid, website: LKconfig.WebSiteId, membertoken: memberToken }, function (data) {
            if (data.uid != 'null' && uid != 'null' && data.uid != uid && data.uid != null && uid != null && data.uid != undefined && uid != undefined) {
                GetOrSetCookies(LKconfig.WebSiteId + "uid", data.uid, optional);
            }
            if (data.vip == '1') {
                GetOrSetCookies(LKconfig.WebSiteId + "ismember", "3", sessionOptional);
            }
            if (objWin != undefined && objWin != null && !objWin.closed) {
                refreshChatWindow();
            }
        });
    }
}
//刷新聊天窗口
function refreshChatWindow() {
    var vote = "";
    try {
        if (lotteryResult != undefined && lotteryResult != null) {
            var encrypted = encodeURI(lotteryResult[0].Code + "," + lotteryResult[0].Name + "," + lotteryResult[0].Phone);
            vote = "&vote=" + encrypted;
        }
    } catch (e) { }
    var target = LKconfig.WebURL + '/chat.aspx' + GetParamsInfo() + vote;
    if (objWin != undefined && objWin != null) {
        objWin.location.replace(target);
    }
}
//跨域监听方法，暂时用这个吧
window.onmessage = function(e) {
    this.focus();
    //防止捣乱。
    if (e.source === objWin) {
        this.location.href = e.data;   
    }
    //alert(e.data);
}