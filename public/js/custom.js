'use strict';

$(window).on('load', function () {
    $('#owl-carousel-featured').owlCarousel({
        center: true,
        autoplay: true,
        stopOnHover: true,
        loop: true,
        // navigation: true,
        autoHeight: false,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 0
            },
            600: {
                items: 2,
                stagePadding: 0
            },
            1200: {
                items: 3,
                stagePadding: 0
            }
        }
    });

    $('#owl-carousel-menus').owlCarousel({
        center: true,
        autoplay: true,
        stopOnHover: true,
        loop: false,
        navigation: false,
        autoHeight: true,
        dots: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                stagePadding: 2
            },
            600: {
                items: 2,
                stagePadding: 2
            },
            1200: {
                items: 3,
                stagePadding: 2
            }
        }
    });

    $("#owl-demo").owlCarousel({
        items: 1,
        animateOut: 'fadeOut',
        // dots:false,
        loop: true,
        autoplay: true,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true
    });

    $(function () {
        $('[data-toggle="popover"]').popover()
    });

    $('.popover-dismiss').popover({
        trigger: 'focus'
    });

    $.fn.selectpicker.Constructor.BootstrapVersion = '4';

    var token = document.head.querySelector('meta[name="csrf-token"]');
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
});

// AJAX FUNCTIONS //

function updateCartCountInView(value) {
    var cartCountElement = document.getElementById('cart-count');
    cartCountElement.innerText = value;
    console.log(value);
}

function addItemToCart(id) {
    axios.post('/cart/add/item', {
        id: id
    }).then(function (response) {
        if (response.data.status === 'ok') {
            toastr.success(response.data.item + ' added to cart successfully!');
            updateCartCountInView(response.data.cartCount);
        } else {
            toastr.error('Operation failed: ' + response.data.msg);
        }
        console.log(response.data);
    });
}

function addMenuToCart(id) {
    axios.post('/cart/add/menu', {
        id: id
    }).then(function (response) {
        if (response.data.status === 'ok') {
            toastr.success(response.data.menu + ' added to cart successfully!');
            updateCartCountInView(response.data.cartCount);
        } else {
            toastr.error('Operation failed: ' + response.data.msg);
        }
        console.log(response.data);
    });
}

function removeItemFromCart(id) {
    axios.post('/cart/remove/item', {
        id: id
    }).then(function (response) {
        if (response.data.status === 'ok') {
            location.reload(true);
        }
        console.log(response.data);
    });
}

function removeMenuFromCart(id) {
    axios.post('/cart/remove/menu', {
        id: id
    }).then(function (response) {
        if (response.data.status === 'ok') {
            location.reload(true);
        }
        console.log(response.data);
    });
}

function updateCartQuantity(type, id) {
    if (type === 'item') {
        var itemQuantity = $('#cartItem-' + id + '-quantity').val();
        if (itemQuantity <= 0) {
            toastr.error('Invalid quantity!');
            throw new Error();
        }
        axios.post('/cart/update/item', {
            id: id,
            quantity: itemQuantity
        }).then(function (response) {
            if (response.data.status === 'ok') {
                location.reload(true);
            }else {
                toastr.error(response.data.msg);
            }
            console.log(response.data);
        });
    } else if (type === 'menu') {
        var menuQuantity = $('#cartMenu-' + id + '-quantity').val();
        if (menuQuantity <= 0) {
            toastr.error('Invalid quantity!');
            throw new Error();
        }
        axios.post('/cart/update/menu', {
            id: id,
            quantity: menuQuantity
        }).then(function (response) {
            if (response.data.status === 'ok') {
                location.reload(true);
            }else {
                toastr.error(response.data.msg);
            }
            console.log(response.data);
        });
    }
    else {
        toastr.error('Invalid type!');
    }
}

