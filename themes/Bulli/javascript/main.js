Bulli = {
    init: function() {
        Bulli.bannerCentre();
        $(window).resize(function() {
            Bulli.bannerCentre();
        });
    },
    bannerCentre: function() {
        var strapDim, imgDim, bannerImg, offsetLeft;
        if ($('.strap .content-banner img').length > 0) {
            strapDim = {
                w: $('.strap').find('.strapfiller').width(),
                h: $('.strap').find('.strapfiller').height()
            };
            bannerImg = $('.strap img').eq(0);
            imgDim = {
                w: $(bannerImg).width(),
                h: $(bannerImg).height()
            };
            offsetLeft = 0;
            if (strapDim.w < imgDim.w) {
                offsetLeft = (imgDim.w - strapDim.w) / 2;
                $(bannerImg).css({
                    'margin-left': '-' + offsetLeft + 'px',
                    'transition': 'all 1s ease-out'
                });
            }
        }
    }
};
$(document).ready(function() {
    Bulli.init();
});
