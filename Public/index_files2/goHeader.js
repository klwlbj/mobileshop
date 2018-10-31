define(function () {
    function clickGoHeader(myClass) {
        $(myClass).click(function () {
            $("html,body").animate({ scrollTop: 0 }, 500)
        });
    }
    return {
        clickGoHeader: clickGoHeader
    };
});