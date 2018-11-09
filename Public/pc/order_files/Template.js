var TemplateConfig = { LeftTemplate: "", CenterTemplate: "", MiniChatWin: "" };
var HtmlLeftStr = "", HtmlCenterStr = "", HtmlCWinStr = "";

function InitHtmlTeplateConfig() {
    var number = LKconfig.WebSiteNumber;
    var siteId =LKconfig.WebSiteId;
    var Mtop = 87
    var BTop = 50;
    if (siteId == "a3")
        Mtop = 0;
    if (siteId == "BangQi")
         BTop=40;
    if (siteId == "a1rexiao" && (number == "1" || number=="6"))
         BTop=40;
    if (siteId == "a1rexiao" && number=="7")
         BTop=30;
    if (siteId == "a3" && number=="97")
         BTop=30;
    

    if (SysProduct != undefined && SysProduct != null) {
        var Flage = false;
        for (var item in SysProduct) {
            if (item != undefined && item != null && item != "" && item == "ProNumber" + number) {
                if (SysProduct[item] != undefined && SysProduct[item] != null && SysProduct[item] != "") {
                    var strPro = SysProduct[item].toString().split("|");
                    if (strPro.length > 3) {
                        HtmlLeftStr = "<div id=\"LRdiv0\" IsShow=\"" + (strPro[0].indexOf('block') > -1 ? 1 : 0) + "\" style=\"z-index:999999; " + strPro[0] + " position: fixed ! important; right:0px; top: " + Mtop + "px; _position: absolute; _bottom: auto; _top: expression(eval(document.documentElement.scrollTop)); _margin-top:87px;\">";
                        if (strPro[2] != undefined && strPro[2] != null && strPro[2] != "")
                            HtmlLeftStr += strPro[2];

                        HtmlLeftStr += "</div>";

                        HtmlCenterStr = "<div id=\"LRdiv1\" IsShow=\"" + (strPro[3].indexOf('block') > -1 ? 1 : 0) + "\" style=\"" + strPro[3] + " z-index: 999999; position: fixed !important; left: 50%; margin-left: -211px !important; top: "+BTop+"%; margin-top: -110px !important;\">";
                        if (strPro[5] != undefined && strPro[5] != null && strPro[5] != "")
                            HtmlCenterStr += strPro[5];

                        HtmlCenterStr += "</div>";
                        Flage = true;
                        break;
                    }
                }
            }
        }

        if (!Flage) {
            if (SysProduct.ProNumberPCF != undefined && SysProduct.ProNumberPCF != null && SysProduct.ProNumberPCF != "") {
                var strPro = SysProduct.ProNumberPCF.toString().split("|");
                if (strPro.length > 1) {
                    HtmlLeftStr = "<div id=\"LRdiv0\" IsShow=\"" + (strPro[0].indexOf('block') > -1 ? 1 : 0) + "\" style=\"z-index:999999; " + strPro[0] + " position: fixed ! important; right:0px; top: " + Mtop + "px; _position: absolute; _bottom: auto; _top: expression(eval(document.documentElement.scrollTop)); _margin-top:87px;\">";
                    if (strPro[2] != undefined && strPro[2] != null && strPro[2] != "")
                        HtmlLeftStr += strPro[2];

                    HtmlLeftStr += "</div>";
                }
            }

            if (SysProduct.ProNumberPCC != undefined && SysProduct.ProNumberPCC != null && SysProduct.ProNumberPCC != "") {
                var strPro = SysProduct.ProNumberPCC.toString().split("|");
                if (strPro.length > 1) {
                    HtmlCenterStr = "<div id=\"LRdiv1\" IsShow=\"" + (strPro[0].indexOf('block') > -1 ? 1 : 0) + "\" style=\"" + strPro[0] + " z-index: 999999; position: fixed !important; left: 50%; margin-left: -211px !important; top: "+BTop+"%; margin-top: -110px !important;\">";
                    if (strPro[2] != undefined && strPro[2] != null && strPro[2] != "")
                        HtmlCenterStr += strPro[2];

                    HtmlCenterStr += "</div>";
                }
            }
        }

        //2016-12-6 ChatWin
        HtmlCWinStr = '<div id="LRdiv2" class="chat_win" style="display: none"><div class="chat_title"><a class="win_btn" href="javascript:void(0)" onmousedown="OpenAppraise();return false;"><em style="background-position: -18px -62px;"></em></a><a class="win_btn" href="javascript:void(0)" onmousedown="$(\'.chat_win\').hide();$(\'#chat_box1\').show();"><em style="background-position: -68px -62px;"></em></a></div><div id="win_gb" style="position: absolute; z-index: 999; top: 45px; left: 0px; width: 100%; height: 0px;"></div><div class="chatser"><a class="serclose" href="javascript:void(0)" onclick="CloseAppraise(2)"></a><h2>您是否对此次服务满意？</h2><dl class="clearfix"><dt>评价：</dt><dd><label for="ser_sat"><input type="radio" value="4" id="ser_sat" name="ser_sat" checked="checked" onclick="$(\'#HidLeves\').val(this.value)">非常满意</label><label for="ser_sat1"><input type="radio" value="3" id="ser_sat1" name="ser_sat" onclick="$(\'#HidLeves\').val(this.value)">满意</label><label for="ser_sat2"><input type="radio" value="2" id="ser_sat2" name="ser_sat" onclick="$(\'#HidLeves\').val(this.value)">一般</label><label for="ser_sat3"><input type="radio" value="1" id="ser_sat3" name="ser_sat" onclick="$(\'#HidLeves\').val(this.value)">不满意</label><label for="ser_sat4"><input type="radio" value="-1" id="ser_sat4" name="ser_sat" onclick="$(\'#HidLeves\').val(this.value)">很差</label><input type="hidden" id="HidLeves" value="4" /></dd></dl><dl class="clearfix"><dt>描述：</dt><dd><textarea type="text" maxlength="300" id="description"></textarea><p>温馨提示：关闭窗口后对话内容有可能会丢失</p></dd></dl><span id="ser_qx" onclick="CloseAppraise(1)">取消</span><span id="ser_qd" onclick="CloseAppraise(3)">确定</span></div><div class="chat_bg"></div></div><div id="chat_box1" onclick="setChatTips(0);$(this).hide();$(\'.chat_win\').show();"><em></em>健客药师为您服务<span id="chat_tips" style="color:red;float:right;font-size:20px;margin:-5px 25px 0px 0px; display:none;">●</span></div>';
    }

    TemplateConfig.LeftTemplate = HtmlLeftStr;
    TemplateConfig.CenterTemplate = HtmlCenterStr;
    TemplateConfig.MiniChatWin = HtmlCWinStr;
}

InitHtmlTeplateConfig();