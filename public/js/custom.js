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

    FilePond.registerPlugin(
        FilePondPluginFileValidateType,
        FilePondPluginImagePreview,
    );

    const inputElement = document.getElementById('avatar');
    const avatarFileElement = FilePond.create(inputElement, {
        allowRevert: true,
        required: true,
        allowImagePreview: true,
        instantUpload: true,
        acceptedFileTypes: ['image/png', 'image/jpeg', 'image/bmp'],
        onremovefile: () => {
            document.getElementById('avatarSaveChanges').classList.add('d-none');
        },
        server: {
            process: {
                url: '/images/process',
                method: 'POST',
                withCredentials: false,
                headers: {
                    'X-CSRF-TOKEN': token.content
                },
                timeout: 7000,
                onload: (response) => {
                    document.getElementById('avatarSaveChanges').classList.remove('d-none');
                    return response;
                },
            },
            revert: {
                url: '/images/delete',
                headers: {
                    'X-CSRF-TOKEN': token.content
                },
                timeout: 7000,
            }
        }
    });

    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })

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
    }).catch(function (error) {
        toastr.warning('Please login or create account to add items to cart! ☺️');
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
    }).catch(function (error) {
        toastr.warning('Please login or create account to add items to cart! ☺️');
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
            } else {
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
            } else {
                toastr.error(response.data.msg);
            }
            console.log(response.data);
        });
    }
    else {
        toastr.error('Invalid type!');
    }
}

function markOrderAsComplete(id, progress_bar_id, button_id) {
    axios.post('/order/markascomplete', {
        id: id
    }).then(function (response) {
        if (response.data.status === 'ok') {
            toastr.success(response.data.msg);
            const progressBar = document.getElementById(progress_bar_id);
            progressBar.style.width = '100%';
            progressBar.setAttribute('aria-valuenow','100');
            progressBar.classList.remove('bg-info');
            progressBar.classList.remove('progress-bar-striped');
            progressBar.classList.add('bg-success');

            const button = document.getElementById(button_id);
            button.classList.add('d-none');
        } else {
            toastr.error(response.data.msg);
        }
    });
}