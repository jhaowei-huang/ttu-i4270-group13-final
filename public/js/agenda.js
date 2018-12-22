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
            let icon = $(this).find('.material-icons');

            if (p.css("display") === 'block') {
                p.css('display', 'none');
                icon.html("keyboard_arrow_up");
            } else {
                p.css('display', 'block');
                icon.html("keyboard_arrow_down");
            }
        } else {
            // long press
            // do nothing
        }
    });
});


