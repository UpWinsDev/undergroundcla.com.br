$(window).scroll(function() {
    if ($(this).scrollTop() > 500) {
        $('#mainNav').addClass("navbar-shrink")
    } else {
        $('#mainNav').removeClass("navbar-shrink")
    }
});
$(window).on('resize', function() {
    if (window.innerWidth < 992) {
        $('#mainNav').removeClass('fixed-top');
    } else {
        $('#mainNav').addClass('fixed-top');
    }
});