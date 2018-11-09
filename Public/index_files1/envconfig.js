//网站配置
window.hostConfig = {
    host: window.location.href.match(/(\w+)/g)[1],
    hostCheck: /^(tst\w+)|(dev\w+)/.test(window.location.href.match(/(\w+)/g)[1])
}
window.domainConfig = {
    environment: window.hostConfig.hostCheck ? window.hostConfig.host.substring(0, 3) : ""
}
window.urlConfig = {
    user: location.protocol + "//" + window.domainConfig.environment + "user.360kad.com",
    pc: location.protocol + "//" + window.domainConfig.environment + "www.360kad.com",
    m: location.protocol + "//" + window.domainConfig.environment + "m.360kad.com",
    cart: location.protocol + "//" + window.domainConfig.environment + "cart.360kad.com",
    app: (!!navigator.userAgent.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/) ? "https://" : "http://") + window.domainConfig.environment + "app.360kad.com",/*暂时ios用https,安卓部分webview连图片都阻塞掉了,ios内m站专题请求app接口必须https*/
    search: location.protocol + "//" + window.domainConfig.environment + "search.360kad.com",
    pay: location.protocol + "//" + window.domainConfig.environment + "pay.360kad.com",
    res: location.protocol + "//" + window.domainConfig.environment + "res.360kad.com",
    help: location.protocol + "//" + window.domainConfig.environment + "help.360kad.com",
    vmall: location.protocol + "//" + window.domainConfig.environment + "vmall.360kad.com",
    ask: location.protocol + "//" + window.domainConfig.environment + "ask.360kad.com",
    tmall: location.protocol + "//" + window.domainConfig.environment + "jy.360kad.com",
    mask: location.protocol + "//" + window.domainConfig.environment + "wapask.360kad.com",
    ask: location.protocol + "//" + window.domainConfig.environment + "ask.360kad.com",
    multiDomain: {
        pc: function () {
            return !window.hostConfig.hostCheck ? (location.protocol + this.randomDomainName("//www{0}.360kad.com", 1, false)) : window.urlConfig.pc;
        },
        res: function () {
            return !window.hostConfig.hostCheck ? (location.protocol + this.randomDomainName("//res{0}.360kad.com", 5, true)) : window.urlConfig.res;
        },
        randomDomainName: function (format, max, containsNoNumbers) {
            var num;
            if (containsNoNumbers) {
                num = Math.round(Math.random() * max);//0表示不带数字的地址
            } else {
                num = Math.ceil(Math.random() * max);//禁止出现0
            }
            return format.replace(/\{0\}/g, num == 0 ? "" : num);
        }
    }

}