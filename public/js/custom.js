'use strict';

$(window).on('load', function () {
    $('#owl-carousel-featured').owlCarousel({
        center: true,
        autoplay: true,
        stopOnHover : true,
        loop: true,
        margin: 20,
        navigation: false,
        autoHeight : true,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 40
            },
            600: {
                items: 2,
                stagePadding: 40
            },
            1000: {
                items: 4,
                stagePadding: 40
            }
        }
    });

    $('#owl-carousel-menus').owlCarousel({
        center: true,
        autoplay: true,
        stopOnHover : true,
        loop: false,
        margin: 20,
        navigation: true,
        autoHeight : true,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 20
            },
            600: {
                items: 2,
                stagePadding: 20
            },
            1000: {
                items: 4,
                stagePadding: 20
            }
        }
    });

    $("#owl-demo").owlCarousel({
        items:1,
        animateOut: 'fadeOut',
        // dots:false,
        loop:true,
        autoplay: true,
        slideSpeed : 300,
        paginationSpeed : 400,
        singleItem:true
    });

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $('.popover-dismiss').popover({
        trigger: 'focus'
    });
});

