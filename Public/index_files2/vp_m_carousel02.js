define(function (vp_m_carousel02) {
    function vp_m_carousel02_f() {
        var videoSwiperMain = new Swiper('.swiper-container-videoSwiperMain', {
            roundLengths: true, //slide的宽和高取整(四舍五入)以防止某些分辨率的屏幕上文字或边界(border)模糊
            initialSlide: 0, //设定初始化时slide的索引
            speed: 600,
            slidesPerView: "auto", //设置slider容器能够同时显示的slides数量
            centeredSlides: true, //活动块居中
            followFinger: true, //拖动slide时它不会动，当你释放时slide才会切换
            loop: true, //环路
            loopedSlides: 8, //在loop模式下使用slidesPerview:'auto',还需使用该参数设置所要用到的loop个数。
        });

        var videoSwiperBg = new Swiper('.swiper-container-videoSwiperBg', {
            loop: true, //环路
            effect : 'fade',
        });

        videoSwiperMain.params.control = videoSwiperBg;
    }
    return {
        vp_m_carousel02_f: vp_m_carousel02_f
    };
});