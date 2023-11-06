jQuery(document).ready(function($) {

    var menu_toggle         = $('.menu-toggle');
    var nav_menu            = $('.main-navigation ul.nav-menu');

    // Primary Menu
    menu_toggle.click(function(){
        $(this).toggleClass('active');
        nav_menu.slideToggle();
        $('button.dropdown-toggle').removeClass('active');
        $('.main-navigation ul ul').slideUp();
        $('body').toggleClass('body-overlay');
    });

    $('.main-navigation .nav-menu .menu-item-has-children > a').after( $('<button class="dropdown-toggle"><i class="fas fa-caret-down"></i></button>') );

    $('button.dropdown-toggle').click(function() {
        $(this).toggleClass('active');
        $(this).parent().find('.sub-menu').first().slideToggle();
    });

    if( $('.main-navigation a i').hasClass('wpmi-icon') ) {
        $('.main-navigation').addClass('icons-active');
    }

    // Keyboard Navigation
    if( $(window).width() < 1024 ) {
        nav_menu.find("li").last().bind( 'keydown', function(e) {
            if( !e.shiftKey && e.which === 9 ) {
                e.preventDefault();
                $('#masthead').find('.menu-toggle').focus();
            }
        });
    }
    else {
        nav_menu.find("li").unbind('keydown');
    }

    $(window).resize(function() {
        if( $(window).width() < 1024 ) {
            nav_menu.find("li").last().bind( 'keydown', function(e) {
                if( !e.shiftKey && e.which === 9 ) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        }
        else {
            nav_menu.find("li").unbind('keydown');
        }
    });

    menu_toggle.on('keydown', function (e) {
        var tabKey    = e.keyCode === 9;
        var shiftKey  = e.shiftKey;

        if( menu_toggle.hasClass('active') ) {
            if ( shiftKey && tabKey ) {
                e.preventDefault();
                nav_menu.find("li:last-child > a").focus();
                nav_menu.find("li").last().bind( 'keydown', function(e) {
                    if( !e.shiftKey && e.which === 9 ) {
                        e.preventDefault();
                        $('#masthead').find('.menu-toggle').focus();
                    }
                });
            };
        }
    });

    // Slick Slider
    jQuery('#featured-slider .section-content').slick({
        responsive: [{ 
            breakpoint: 1024,
            settings: {
                slidesToShow: 1,
            }
     
        }, {
     
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
            }
     
        }, {
     
            breakpoint: 300,
            slidesToShow: 1 // destroys slick
     
        }]
    });

    // owl
    var owl = jQuery('#service-section .owl-carousel');
        owl.owlCarousel({
        margin:20,
        nav: true,
        autoplay : true,
        lazyLoad: true,
        autoplayTimeout: 3000, 
        loop: false,
        dots:false,
        navText : ['<i class="fas fa-arrow-left"></i>','<i class="fas fa-arrow-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        },
        autoplayHoverPause : true,
        mouseDrag: true
    });
});

window.addEventListener('load', (event) => {
    jQuery(".preloader").delay(1000).fadeOut("slow");
});

var btn = jQuery('#button');

jQuery(window).scroll(function() {
  if (jQuery(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});
btn.on('click', function(e) {
  e.preventDefault();
  jQuery('html, body').animate({scrollTop:0}, '300');
});

   jQuery(window).scroll(function() {
    var data_sticky = jQuery(' #masthead').attr('data-sticky');

    if (data_sticky == 1) {
      if (jQuery(this).scrollTop() > 1){  
        jQuery('#masthead').addClass("sticky-head");
      } else {
        jQuery('#masthead').removeClass("sticky-head");
      }
    }
  });