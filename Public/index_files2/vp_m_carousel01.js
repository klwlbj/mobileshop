define(function (vp_m_carousel01) {
    function vp_m_carousel01_f() {
        var mySwiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination', //分页器
            direction: 'horizontal',  //滑动方向
            loop: true,  //循环
            autoplay: 3500, //自动播放
            autoplayDisableOnInteraction: false //用户操作swiper之后，允许自动播放。
        })
    }
    return {
        vp_m_carousel01_f: vp_m_carousel01_f
    };
});