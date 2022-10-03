jQuery(function ($) {
    'use strict',

        //#main-slider
        /*$(function(){
         $('#main-slider.carousel').carousel({
         pause: "false",
         interval: 8000
         });
         });*/


        // accordion
        $('.accordion-toggle').on('click', function () {
            $(this).closest('.panel-group').children().each(function () {
                $(this).find('>.panel-heading').removeClass('active');
            });

            $(this).closest('.panel-heading').toggleClass('active');
        });

    //Initiat WOW JS
    new WOW().init();

    // portfolio filter
    $(window).load(function () {
        'use strict';
        var $portfolio_selectors = $('.portfolio-filter >li>a');
        var $portfolio = $('.portfolio-items');
        $portfolio.isotope({
            itemSelector: '.portfolio-item',
            layoutMode: 'fitRows'
        });

        $portfolio_selectors.on('click', function () {
            $portfolio_selectors.removeClass('active');
            $(this).addClass('active');
            var selector = $(this).attr('data-filter');
            $portfolio.isotope({filter: selector});
            return false;
        });
    });

    // Contact form
    var form = $('#main-contact-form');
    form.submit(function (event) {
        event.preventDefault();
        var form_status = $('<div class="form_status"></div>');
        var datos = {};
        form.find(':input').each(function () {
            if ($(this).attr("name") != "submit"){
                var key = $(this).attr("name");
                var val = $(this).val();
                datos[key] = val;
            }

        });

        $.ajax({
            type: 'POST',
            url: form.attr('action'),
            data: datos,
            beforeSend: function () {
                form.prepend(form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn());
            }
        }).done(function (data) {
            console.log("POST", data);
            form_status.html('<p class="text-success">' + data.message + '</p>').delay(5000).fadeOut();
        });
    });


    //goto top
    $('.gototop').click(function (event) {
        event.preventDefault();
        $('html, body').animate({
            scrollTop: $("body").offset().top
        }, 500);
    });

    //Pretty Photo
    $("a[rel^='prettyPhoto']").prettyPhoto({
        social_tools: false
    });
});