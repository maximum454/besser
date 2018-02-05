
$(function () {
    /*link*/
    $("a[href='#']").click(function () {
        return false;
    })
    /**/

    /*slider*/
    $('.js-slider').slick({
        dots: true,
        arrows: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 7000,
        lazyLoad: 'ondemand',
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true
    });

    $('.card__slider').slick({
        dots: false,
        arrows: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 7000,
        lazyLoad: 'ondemand',
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: false
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

    $("#spinner").spinner('changing', function(e, newVal, oldVal) {
        $('#spinner-value').html(newVal * $('#spinner-value').attr("data-price"));
    });


    $('.js-top').click(function() {
        $('body,html').animate({scrollTop:0},800);
    });

    /*Скрипт для модальных окон*/
    $('.popap_box').click(function() {
        $('#modalbox_' + $(this).data('body')).arcticmodal();
    });

    /*Accordion*/
    // $(".b-form-param__param").slideToggle();
      $(".b-form-param__param").prev(".b-form-param__header").click(function(){
          $(this).toggleClass("active").next(".b-form-param__param").slideToggle(600);
          return false;
      });



      /*range slider*/
      var $range = $(".js-range-slider"),
        $inputFrom = $(".js-input-from"),
        $inputTo = $(".js-input-to"),
        instance,
        min = 0,
        max = 25000,
        from = 0,
        to = 0;

        $range.ionRangeSlider({
            type: "double",
            min: min,
            max: max,
            from: 0,
            to: 25000,
            onStart: updateInputs,
            onChange: updateInputs
        });
        instance = $range.data("ionRangeSlider");

        function updateInputs (data) {
            from = data.from;
            to = data.to;
            
            $inputFrom.prop("value", from);
            $inputTo.prop("value", to); 
        }

        $inputFrom.on("input", function () {
            var val = $(this).prop("value");
            
            // validate
            if (val < min) {
                val = min;
            } else if (val > to) {
                val = to;
            }
            
            instance.update({
                from: val
            });
        });

        $inputTo.on("input", function () {
            var val = $(this).prop("value");
            
            // validate
            if (val < from) {
                val = from;
            } else if (val > max) {
                val = max;
            }
            
            instance.update({
                to: val
            });
        });

        $(".shop-img-slider").owlCarousel({
            items: 2,
            nav: true,
            dots: false,
            autoWidth: false,
            margin: 0,
            loop: true,
            autoplay: true,
            autoplayTimeout: 7000,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    dots: true,
                    nav: false
                },
                768: {
                    items: 2
                }
            }
        })

        $(".mb-menu").click(function(){
            $('body').toggleClass("active");
        });

    $('.js-map-toggle').click(function () {
       $('#info-container').toggle();
    });

});
