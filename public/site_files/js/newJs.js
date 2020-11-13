$(function () {
    'use strict';


    var clicked = false;
    var $header = $('.main-header')
        , $mobileMenu = $('.mobile-menu');
    $header.find('#toggle-menu-btn').click(function () {
        var $this = $(this);
        $this.toggleClass('active');
        if (!clicked) {
            clicked = true;
            $mobileMenu.toggleClass('active');
            setTimeout(function () {
                clicked = false;
            });
        }
    });
    
    $('.closeIcon').on('click', function() {
        $mobileMenu.toggleClass('active');
        $('#toggle-menu-btn').removeClass('active');
    })
    
    var swiper = new Swiper('.HomeNewsSlider .swiper-container', {
        slidesPerView: 4, 
        loop: true, 
        spaceBetween: 10, 
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
        breakpoints: {
            // when window width is <= 320px
            320: {
                slidesPerView: 3
                , spaceBetween: 10
            }, // when window width is <= 480px
            480: {
                slidesPerView: 2
                , spaceBetween: 20
            }, // when window width is <= 640px
            640: {
                slidesPerView: 2
                , spaceBetween: 30
            }
        }, 
        autoplay: true, 

    }); 
  
 var galleryThumbs = new Swiper('.gallery-thumbs', {
      spaceBetween: 10,
      slidesPerView: 4,
      loop: false,
      loopedSlides: 5, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
        breakpoints: {
            // when window width is <= 320px
            320: {
                slidesPerView: 4
                , spaceBetween: 10
            }, // when window width is <= 480px
            480: {
                slidesPerView: 4
                , spaceBetween: 20
            }, // when window width is <= 640px
            640: {
                slidesPerView: 4
                , spaceBetween: 30
            }
        }
    });
    var galleryTop = new Swiper('.gallery-top', {
        slidesPerView: 1,
      spaceBetween: 10,
      loop:false,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      thumbs: {
        swiper: galleryThumbs,
      },
    }); 
    
    var swiper = new Swiper('.relatedProductSlider', {
      slidesPerView: 4,
      spaceBetween: 20,
        loop: false,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
        breakpoints: {
            // when window width is <= 320px
            320: {
                slidesPerView: 1
                , spaceBetween: 10
            }, // when window width is <= 480px
            480: {
                slidesPerView: 1
                , spaceBetween: 20
            }, // when window width is <= 640px
            640: {
                slidesPerView: 2
                , spaceBetween: 30
            },
            991: {
                slidesPerView: 3
                , spaceBetween: 30
            }
        }
    });
    
})


