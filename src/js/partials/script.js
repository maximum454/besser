$(function () {
    /*link*/
    $("a[href='#']").click(function () {
        return false;
    })
    /**/

    /*slider*/
    $('.js-slider').slick({
        dots: true,
        arrows: false,
        infinite: true,
        lazyLoad: 'ondemand',
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });
    /**/

    /*скрипт кнопка верх*/
    $(window).scroll(function() {
        if($(this).scrollTop() != 0) {
            $('.js-top').fadeIn();
        } else {
            $('.js-top').fadeOut();
        }
    });


    $('.js-top').click(function() {
        $('body,html').animate({scrollTop:0},800);
    });

    /*Скрипт для модальных окон*/
    $('.popap_box').click(function() {
        $('#modalbox_' + $(this).data('body')).arcticmodal();
    });
});