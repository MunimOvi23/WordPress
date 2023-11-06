/*
	Template  Name: kunty;
	Template URI: www.kunty.themereps.com
	Description: Kunty- Business & Corporate WordPress theme – is a responsive, clean and modern WordPress theme, suitable for Business, Corporate, Consultant, Agency and any startup companies websites;
	Author: Themereps
	Author URI: https://themereps.com/
	Version: 1.0  
*/
/*================================================
[  Table of contents  ]
================================================
	01. Animation
	02. Sticky Header
	03. Masonary Active
	04. Testimonial Carousel
	05. Team Carousel
	06. News Carousel
	07. Brands Carousel
	08. Tilt jQuery
	09. OffCanvas Menu
	10. Venobox Active
	11. Stellar
	12. Preloader
	13. ScrollUp
	14. Accessibility
	15. NodeCursor
======================================
[ End table content ]
======================================*/

(function ($) {
 "use strict";	

 	/* ==== 01. Animation ==== */
	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {
			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				i++;
				$(this.element).addClass('item-animate');
				setTimeout(function(){
					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated-fast');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}
							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
				}, 100);
			}
		} , { offset: '85%' } );
	};
	$(function(){
		contentWayPoint();
	});

	/* ==== 02. Sticky Header ====  */
	$(window).on('scroll',function() {
	  if ($(this).scrollTop() > 100){
		$('.header-area.sticky-header').addClass("fixed-header");
	    }
	  else{
		$('.header-area.sticky-header').removeClass("fixed-header");
	    }
	}); 

	/* ==== 03. Masonary Active ====  		*/		
	$('.grid-wrap').imagesLoaded( function() {	   
		$('.grid-wrap').masonry({ singleMode: true });	
	});	

	/* ==== 04. Testimonial Carousel ==== */
    $('.review-carousel').owlCarousel({
        autoplay:kunty_option.feedback_autoplay,
		autoplayTimeout:kunty_option.feedback_duration,
        items:3,
        loop:kunty_option.feedback_loop,
        autoplayHoverPause: false,
        smartSpeed: 500,
        margin:30,
        nav:kunty_option.feedback_nav,
		navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
        dots:kunty_option.feedback_dots,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            768:{
                items:2,
            },
            1000:{
                items:3,
            }
        }
    }) 
	
	/* ==== 05. Team Carousel ==== */
    $('.team-carousel').owlCarousel({
		autoplay:kunty_option.team_autoplay,
		items:4,
        loop:kunty_option.team_loop,
		autoplayHoverPause: false,
		autoplayTimeout: kunty_option.team_duration,
		smartSpeed: 500,
        margin:30,
		nav:kunty_option.team_nav,
		dots:kunty_option.team_dots,
		responsiveClass:true,
		navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2,
            },
            768:{
                items:2,
            },
            992:{
                items:3,
            },
            1200:{
                items:4,
            }
        }
    }) 

	/* ==== 06. News Carousel ==== */
    $('.news-carousel').owlCarousel({
        autoplay:kunty_option.news_autoplay,
		autoplayTimeout: kunty_option.news_duration,
        items:3,
        loop:kunty_option.news_loop,
        autoplayHoverPause: false,
        smartSpeed: 500,
        margin:30,
        nav:kunty_option.news_nav,
		navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
        dots:kunty_option.news_dots,
		autoHeight: true,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:1,
            },
            768:{
                items:2,
            },
            1000:{
                items:3,
            }
        },
    }) 

	/* ==== 07. Brands Carousel ==== */
    $('.brands-carousel').owlCarousel({
        autoplay:kunty_option.brands_autoplay,
		autoplayTimeout:kunty_option.brands_duration,
        loop:kunty_option.brands_loop,
        autoplayHoverPause: false,
        smartSpeed: 500,
        nav:kunty_option.brands_nav,
		navText:['<i class="ti-angle-left"></i>','<i class="ti-angle-right"></i>'],
        dots:kunty_option.brands_dots,
		margin:30,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
            },
			460:{
                items:2,
            },
            600:{
                items:3,
            },
            768:{
                items:4,
            },
            1000:{
                items:5,
            }
        }
    })

	/* ==== 08. Tilt jQuery ==== */
	$('.js-tilt').tilt();
	
   /* ==== 09. OffCanvas Menu ==== */
	jQuery('.sidenav').find( '.menu-item-has-children > a' ).after( '<a class="menu-expand" href="javascript:void(0)">+</a>' );
	jQuery('.sidenav').find( '.page_item_has_children > a' ).after( '<a class="menu-expand" href="javascript:void(0)">+</a>' );
	
	jQuery('.menu-expand').on("click",function(e){
		e.preventDefault();
		if (jQuery(this).hasClass("menu-clicked")) {
				jQuery(this).text('+');
				jQuery(this).next('ul.sub-menu').slideUp(300, function(){});
		} else {
				jQuery(this).text('-');
				jQuery(this).next('ul.sub-menu').slideDown(300, function(){});
		}
		jQuery(this).toggleClass("menu-clicked");
	});
	jQuery('ul.two-column,ul.three-column').parent().addClass('pos-relative');

	/* ==== 10. Venobox Active ==== */
	$('.venobox').venobox({
		bgcolor: '#000000',
		overlayColor: 'rgba(255,255,255,0.85)',
		spinner: 'grid',
		spinColor: '#1da1f2',
	});

	/* ==== 11. Stellar ==== */
	$.stellar({
		horizontalScrolling:false,
		hideDistantElements: false,
		verticalOffset: 0,
		horizontalOffset: 0		
	});	

	/* ==== 12. Preloader ==== */
	$(window).load(function(){
		$('.preloader').fadeOut(500);
		$('.preloader-wrap').delay('500').fadeOut(1000);

	});


	/* ==== 13. ScrollUp ==== */
	var progressPath = document.querySelector('.progress-wrap path');
	var pathLength = progressPath.getTotalLength();
	progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
	progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
	progressPath.style.strokeDashoffset = pathLength;
	progressPath.getBoundingClientRect();
	progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
	var updateProgress = function () {
		var scroll = $(window).scrollTop();
		var height = $(document).height() - $(window).height();
		var progress = pathLength - (scroll * pathLength / height);
		progressPath.style.strokeDashoffset = progress;
	}
	updateProgress();
	$(window).scroll(updateProgress);	
	var offset = 50;
	var duration = 550;
	jQuery(window).on('scroll', function() {
		if (jQuery(this).scrollTop() > offset) {
			jQuery('.progress-wrap').addClass('active-progress');
		} else {
			jQuery('.progress-wrap').removeClass('active-progress');
		}
	});				
	jQuery('.progress-wrap').on('click', function(event) {
		event.preventDefault();
		jQuery('html, body').animate({scrollTop: 0}, duration);
		return false;
	})
	
	/* ==== 14. Accessibility ==== */
	jQuery(document).ready(function ($) {
		//accessibility
		$('.menu li a, .menu li').on('focus', function() {
			$(this).parents('li').addClass('focus');
		}).blur(function() {
			$(this).parents('li').removeClass('focus');
		});
	});

	/* ==== 15. NodeCursor ==== */
	NodeCursor({
		cursor : true, 
		node : true, 
		cursor_velocity : 1, 
		node_velocity : 0.15, 
		native_cursor : 'none', 
		element_to_hover : 'a', 
		cursor_class_hover : 'disable', 
		node_class_hover : 'expand', 
		hide_mode : true, 
		hide_timing : 2000, 
	});


})(jQuery); 