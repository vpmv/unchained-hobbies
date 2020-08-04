$(function() {
    var trigger  = $('.hamburger'),
        overlay  = $('.overlay-main'),
        isClosed = false;

    trigger.add(overlay).click(function() {
        hamburger_cross();
    });

    function hamburger_cross() {
        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
        $('#wrapper-main').toggleClass('toggled');
    }
});