$(document).ready(function () {
    let block = $('.timeline > li');
    let longpress = 200;
    let start;

    block.on('mousedown', function (e) {
        start = new Date().getTime();
    });

    block.on('mouseleave', function (e) {
        start = 0;
    });

    block.on('mouseup', function (e) {
        if (new Date().getTime() < (start + longpress)) {
            // short press
            let p = $(this).find('p');
            let icon = $(this).find('.fas');

            if (p.css('display') === 'block') {
                p.css('display', 'none');
                icon.addClass('fa-angle-up');
                icon.removeClass('fa-angle-down');
            } else {
                p.css('display', 'block');
                icon.addClass('fa-angle-down');
                icon.removeClass('fa-angle-up');
            }
        } else {
            // long press
            // do nothing
        }
    });
});


