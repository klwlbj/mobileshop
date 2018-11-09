function WebConfig(siteid, number,domainId) {var Name = '', Phone = '',ftype='';if (number == '')  number=1;switch (number) {case '1':  Name = '健客网';  Phone = '400-6666-800';  ftype ='1';break;case '10':  Name = '雅培移动';  Phone = '';  ftype ='2';break;case '11':  Name = '产品分销系统';  Phone = '';  ftype ='2';break;case '12':  Name = '健客问答';  Phone = '';  ftype ='1';break;case '13':  Name = '健客问答移动';  Phone = '';  ftype ='2';break;case '14':  Name = '微商城';  Phone = '';  ftype ='2';break;case '15':  Name = '用药指导';  Phone = '';  ftype ='1';break;case '16':  Name = '用药指导移动';  Phone = '';  ftype ='2';break;case '17':  Name = '白云山金戈PC';  Phone = '';  ftype ='1';break;case '18':  Name = '白云山金戈 移动';  Phone = '';  ftype ='2';break;case '19':  Name = '龟龄集手机';  Phone = '';  ftype ='2';break;case '2':  Name = '龟龄集胶囊';  Phone = '400-6989-999';  ftype ='1';break;case '20':  Name = '舒筋健腰丸';  Phone = '';  ftype ='2';break;case '21':  Name = '索磷布韦片(索华迪)';  Phone = '400-0768-907';  ftype ='1';break;case '22':  Name = '索磷布韦片(索华迪)手机';  Phone = '400-0768-907';  ftype ='2';break;case '23':  Name = '舒尔佳';  Phone = '';  ftype ='1';break;case '24':  Name = '舒尔佳（m端）';  Phone = '';  ftype ='2';break;case '25':  Name = '全球购';  Phone = '';  ftype ='1';break;case '26':  Name = '全球购（m端）';  Phone = '';  ftype ='1';break;case '27':  Name = '丙通沙';  Phone = '';  ftype ='1';break;case '28':  Name = '丙通沙（m端）';  Phone = '';  ftype ='2';break;case '3':  Name = '臌症丸';  Phone = '400-6169-305';  ftype ='1';break;case '4':  Name = '臌症丸手机';  Phone = '400-6169-305';  ftype ='2';break;case '5':  Name = '莉芙敏';  Phone = '400-6989-999';  ftype ='1';break;case '6':  Name = '莉芙敏手机';  Phone = '400-6989-999';  ftype ='2';break;case '7':  Name = '健客网 移动';  Phone = '400-6666-800';  ftype ='2';break;case '8':  Name = '高血压用药保障计划移动';  Phone = '4006480111';  ftype ='2';break;case '9':  Name = '雅培PC';  Phone = '';  ftype ='1';break;}return {WebURL: '//a1011.jianke.com',Cookiesdomain:domainId,CookiesPath: '/',WsCoonectStr: 'wss://a1012.jianke.com/',WebSiteId: siteid,WebSiteName: Name,LinkPhone: Phone,WebSiteNumber: number,FromType: ftype,MUrls:'//mswt2.jianke.com'};}
var jsSrc = null, LKconfig = null;
var GetArgs = (function () {
    var sc = document.getElementsByTagName("script");
    for (var i = 0; i < sc.length; i++) {
        jsSrc = sc[i].src;
        var jsFileName = jsSrc.substring(jsSrc.lastIndexOf('/') + 1, jsSrc.lastIndexOf('.js'));
        var jsName = jsFileName.match(/[stat]*/)[0];
        var jsChatName = jsFileName.match(/[ChatConfig]*/)[0];
        var flage = false;
        if ((/\b(siteid)\b/).test(jsSrc) && jsName != undefined && jsName != null && jsName != "" && jsName.toLowerCase() == "stat") {
            flage = true;
        }
        else if (jsChatName != undefined && jsChatName != null && jsChatName != "" && jsChatName.toLowerCase() == "chatconfig") {
            jsName = jsChatName;
            flage = true;
        }
        if (flage) {
            if (jsSrc.indexOf('?') > -1 && jsSrc.split('?')[1] != undefined && jsSrc.split('?')[1] != null) {
                var paramsArr = jsSrc.split('?')[1].split('&');
                var args = {}, argsStr = [], param, t, name, value;
                for (var ii = 0, len = paramsArr.length; ii < len; ii++) {
                    param = paramsArr[ii].split('=');
                    name = param[0], value = param[1];
                    if (typeof args[name] == "undefined") { //参数尚不存在
                        args[name] = value;
                    } else if (typeof args[name] == "string") { //参数已经存在则保存为数组
                        args[name] = [args[name]]
                        args[name].push(value);
                    } else {  //已经是数组的
                        args[name].push(value);
                    }
                }
                return function () { return args; } //以json格式返回获取的所有参数
                break;
            }
        }
    }
})();

if (jsSrc != null && jsSrc.indexOf('?') > -1) {
    var siteid = "", number = "", domainId = "";
    if (GetArgs()["siteid"] != undefined && GetArgs()["siteid"] != null && GetArgs()["siteid"] != "")
        siteid = GetArgs()["siteid"];

    if (GetArgs()["domainid"] != undefined && GetArgs()["domainid"] != null && GetArgs()["domainid"] != "")
        domainId = GetArgs()["domainid"];
    else {
        var domainName = window.location.host;
        if (domainName.split('.').length > 2)
            domainName = domainName.substring(domainName.indexOf('.') + 1);
        domainId = domainName;
    }

    if (GetArgs()["number"] != undefined && GetArgs()["number"] != null && GetArgs()["number"] != "")
        number = GetArgs()["number"];

    LKconfig = new WebConfig(siteid, number, domainId);
}