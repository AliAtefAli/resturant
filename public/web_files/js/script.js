$(function () {
    var dir = $('body').css('direction');

    $('.main-slider-slider').owlCarousel({
        loop:true,
        margin:0,
        nav:true,
        dots: false,
        items:1,
        rtl: (dir == 'rtl')?true:false,
        autoplay: true,
        smartSpeed: 750,
        navText: (dir == 'rtl')?['<i class="fas fa-arrow-right"></i>', '<i class="fas fa-arrow-left"></i>']:['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>']
    });
    $('.section1-name-slider').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots: false,
        rtl: (dir == 'rtl')?true:false,
        autoplay: true,
        smartSpeed: 750,
        freeDrag: true,
        navText: (dir == 'rtl')?['<i class="fas fa-arrow-right"></i>', '<i class="fas fa-arrow-left"></i>']:['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
        responsive:{
            0:{
                items: 1
            },
            576:{
                items: 2
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
            1200:{
                items:5
            }
        }
    });


    $('.section1-product-slider').owlCarousel({
        loop:true,
        margin:30,
        nav:true,
        dots: false,
        rtl: (dir == 'rtl')?true:false,
        autoplay: true,
        smartSpeed: 750,
        freeDrag: true,
        navText: (dir == 'rtl')?['<i class="fas fa-arrow-right"></i>', '<i class="fas fa-arrow-left"></i>']:['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
        responsive:{
            0:{
                items: 1
            },
            576:{
                items: 2
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
            1200:{
                items:5
            }
        }
    });

    $('.thay-say-us-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        dots: false,
        rtl: (dir == 'rtl')?true:false,
        autoplay: true,
        smartSpeed: 750,
        freeDrag: true,
        navText: (dir == 'rtl')?['<i class="fas fa-arrow-right"></i>', '<i class="fas fa-arrow-left"></i>']:['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
        responsive:{
            0:{
                items: 1
            },
            576:{
                items: 1
            },
            768:{
                items:2
            },
            992:{
                items:2
            },
            1200:{
                items:3
            }
        }
    });
    $('.our-meal-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        dots: false,
        rtl: (dir == 'rtl')?true:false,
        autoplay: true,
        smartSpeed: 750,
        freeDrag: true,
        navText: (dir == 'rtl')?['<i class="fas fa-arrow-right"></i>', '<i class="fas fa-arrow-left"></i>']:['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
        responsive:{
            0:{
                items: 1
            },
            576:{
                items: 2
            },
            768:{
                items:3
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });
    $('.pic-slider').owlCarousel({
        loop:true,
        margin:15,
        nav:true,
        dots: false,
        rtl: (dir == 'rtl')?true:false,
        autoplay: true,
        smartSpeed: 750,
        freeDrag: true,
        navText: (dir == 'rtl')?['<i class="fas fa-arrow-right"></i>', '<i class="fas fa-arrow-left"></i>']:['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
        responsive:{
            0:{
                items: 1
            },
            576:{
                items: 1
            },
            768:{
                items:2
            },
            992:{
                items:2
            },
            1200:{
                items:2
            }
        }
    });

    $('.open-small-menu').click(function () {
        $('.small-screen').fadeIn(500);
        setTimeout(function () {
            $('.small-screen .menu').addClass('add');
        }, 600);
    });
    $('.small-screen .menu .close-ss i, .small-screen .menu li a').click(function (e) {
        $('.small-screen .menu').removeClass('add');
        setTimeout(function () {
            $('.small-screen').fadeOut(500);
        }, 1000);
    });

    $('.icons-action-section .open-icon').click(function () {
        var iconAction = $('.icons-action-section');
        if(dir == 'rtl') {
            if(iconAction.css('left') == '0px'){
                iconAction.animate({
                    'left': '-56px'
                }, 500);
            } else {
                iconAction.animate({
                    'left': 0
                }, 500);
            }
        } else {
            if(iconAction.css('right') == '0px'){
                iconAction.animate({
                    'right': '-56px'
                }, 500);
            } else {
                iconAction.animate({
                    'right': 0
                }, 500);
            }
        }
    });
    $('.show-way span.mulet').click(function () {
        $('.pace-section .pace-items .row [class^="col-"]').removeClass('single');
    });
    $('.show-way span.single').click(function () {
        $('.pace-section .pace-items .row [class^="col-"]').addClass('single');
    });
    $(window).resize(function () {
        if($(window).innerWidth() <= 991){
            $('.margin-responsive').addClass('container');
        } else {
            $('.margin-responsive').removeClass('container');
        }
    });

    $('.single-product .number-of-product-section form .container-form .plus').click(function () {
        var elementInput = $('.single-product .number-of-product-section form .container-form input'),
            inputValue = elementInput.val();
        inputValue++;
        elementInput.val(inputValue);
    });
    $('.single-product .number-of-product-section form .container-form .munas').click(function () {
        var elementInput = $('.single-product .number-of-product-section form .container-form input'),
            inputValue = elementInput.val();
        inputValue--;
        if(inputValue <= 0){
            inputValue = 1;
        }
        elementInput.val(inputValue);
    });
    $('.single-product .number-of-product-section form .container-form input').keyup(function () {
        var checkIfNumberOrString = /^\d+$/.test($(this).val());
        if(checkIfNumberOrString == false){
            $(this).val(1);
        }
    });
    $('.single-product1 .product-slider-img .img-pro-contain .img-pro').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        var homeImages = $('.single-product1 .product-slider-img > .img-pro img');
        homeImages.fadeOut(200);
        var hrefSubImg = $(this).find('img').attr('src');
        homeImages.attr('src', hrefSubImg);
        setTimeout(function () {
            homeImages.fadeIn(200);
        }, 250);
    });
    $('.tabal-cart table tbody tr .remove-product i').click(function () {
        $(this).parents('tr').fadeOut('300');
    });
    $('.user-section .user-info .img-user form .form-user label i').click(function () {
        $(this).parent().find('input').prop('readonly', false);
    });
    function resizePage(){
        if($('.user-section .nav-side-page').length){
            var pageHeight = $('.above-all').innerHeight();
            $('.user-section .nav-side-page').css('height', pageHeight);
        }
    }
    resizePage();
    $(window).resize(resizePage);

    $('#img-user').change(function () {
        var pathFile = $(this).val();
        pathFile = pathFile.split('\\');
        $('.user-section .user-info .img-user form .imgg img').attr('src', 'images/' + pathFile[pathFile.length - 1]);
    });

    $('.open-nav-side-page').click(function () {
        var navSidePage = $('.user-section .nav-side-page');
        if(navSidePage.hasClass('open')){
            navSidePage.removeClass('open');
        } else {
            navSidePage.addClass('open');
        }
    });
    $('.local-global').change(function () {
        if($(this).attr('id') == 'global'){
            $('.pic-select .hide-section').fadeIn(500);
        } else {
            $('.pic-select .hide-section').fadeOut(500);
        }
    });
    setTimeout(function () {
        $('.loading').fadeOut(300);
    }, 800);
    $('.faqs-section .faqs .faq-up .faq-qu').click(function () {
        var heightAn = $(this).next().find('.faq-an').innerHeight();
        if($(this).hasClass('open')){
            $(this).removeClass('open');
            $(this).next().animate({
                'height': 0
            }, 500);
            $(this).find('i').removeClass('add');
        } else {
            $(this).addClass('open');
            $(this).next().animate({
                'height': heightAn + 'px'
            }, 500);
            $(this).find('i').addClass('add');
        }
    });
});
