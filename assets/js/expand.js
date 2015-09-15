(function () {
    var bHeight, bWidth, block, bname, closeBtn, closeContent, content, expand, openContent, updateValues, wHeight, wWidth, xVal, yVal;
    block = $('.blocks__block');
    bname = $('.blocks__name');
    content = $('.blocks-content__content');
    closeBtn = $('.blocks__content-close');
    wHeight = $('.banner-container').outerHeight();
    wWidth = $('.banner-container').outerWidth();
    bHeight = block.outerHeight();
    bWidth = block.outerWidth();
    xVal = Math.round(wWidth / bWidth) + 0.03;
    yVal = wHeight / bHeight + 0.03;
    expand = function () {
        var aBlock, num;
        closeContent();
        $('#clicked-block').removeAttr('id');
        $(this).attr('id', 'clicked-block');
        num = $(this).index();
        aBlock = block.eq(num);
        $('#clicked-block').removeAttr('id');
        aBlock.attr('id', 'clicked-block');
        if (!aBlock.hasClass('active')) {
            aBlock.css({
                'transform': 'scale(' + xVal + ',' + yVal + ')',
                '-webkit-transform': 'scale(' + xVal + ',' + yVal + ')'
            });
            aBlock.addClass('active');
            openContent(num);
        }
    };
    openContent = function (num) {
        var aContent;
        content.css({
            'transition': 'all 0.3s 0.4s ease-out',
            '-webkit-transition': 'all 0.3s 0.4s ease-out'
        });
        aContent = content.eq(num);
        aContent.addClass('active');
    };
    closeContent = function () {
        content.css({
            'transition': 'all 0.1s 0 ease-out',
            '-webkit-transition': 'all 0.1s 0 ease-out'
        });
        block.css({
            'transform': 'scale(1)',
            '-webkit-transform': 'scale(1)'
        });
        block.removeClass('active');
        content.removeClass('active');
    };
    updateValues = function () {
        var yVal;
        var xVal;
        var bWidth;
        var bHeight;
        var wWidth;
        var wHeight;
        var aBlock;
        if (block.hasClass('active')) {
            aBlock = $('.blocks__block.active');
            wHeight = $('.banner-container').outerHeight();
            wWidth = $('.banner-container').width();
            bHeight = block.height();
            bWidth = block.width();
            xVal = Math.round(wWidth / bWidth) + 0.03;
            yVal = wHeight / bHeight + 0.03;
            aBlock.css({
                'transform': 'scale(' + xVal + ',' + yVal + ')',
                '-webkit-transform': 'scale(' + xVal + ',' + yVal + ')'
            });
        }
    };
    $(window).on('resize', updateValues);
    bname.on('click', expand);
    closeBtn.on('click', closeContent);
}.call(this));