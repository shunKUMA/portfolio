$('.menu-trigger').on('click', function () {
    $('.menu-trigger , .wrapper').toggleClass('run');
    $('wrapper.run').fadeToggle(500);
});
$(window).on('load', function () {
    $('body').removeClass('fade_out');

});

$(function () {
    var webStorage = function () {
        if (sessionStorage.getItem('access')) {
            $('#loader').css('display', 'none');
        } else {
            sessionStorage.setItem('access', 0);
        }
    }
    webStorage();
    $(window).on('load');
    $('.loader-slide').addClass('open');
    setTimeout(function () {
        $('#loader').css('display', 'none');
    }, 8000);
});
$(window).on('load resize', function () {
    var winW = $(window).width();
    var devW = 780;
    if (winW >= devW) {
        $(document).ready(function () {
            var section = $('#top');
            $(window).scroll(function () {
                var scroll_h = $(document).scrollTop(),
                    section_h = section.offset().top;
                if (scroll_h > section_h) {
                    $('#h_nav').hide();
                } else {
                    $('#h_nav').show();
                }
            })
        });
    }
});