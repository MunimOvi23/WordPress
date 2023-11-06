/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ , api ) {

	// Site title 
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	//Site Description.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	wp.customize( 'site_title_color', function( value ) {
		value.bind( function( to ) {
			$( '.site-branding .site-title a' ).css( 'color', to );
		} );
	} );
	wp.customize( 'site_logo_width', function( value ) {
		value.bind( function( newval ) {
			$( '.site-logo img' ).css( 'width', newval+'px' );
		} );
	} );
	wp.customize( 'site_logo_height', function( value ) {
		value.bind( function( newval ) {
			$( '.site-logo img' ).css( 'height', newval+'px' );
		} );
	} );

	/**================================================
	 * Theme Options
	 ===================================================*/
	//Blog Title
	wp.customize( 'blog_page_title', function( value ) {
		value.bind( function( to ) {
			$( '.page-header .page-title' ).text( to );
		} );
	} );

	//  Header Options
	wp.customize( 'site_sticky_header', function( value ) {
		value.bind( function( to ) {
			if ( true === to ) {
				$( '.header-area' ).removeClass( 'sticky-header' );
			} else {
				$( '.header-area' ).addClass( 'sticky-header' );
			}
		});
	});

   /* Show/Hide Phone */
    wp.customize( 'header_display_phone', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.top-contacts .phone').show();
            } else{
                $('.top-contacts .phone').hide();
            }
        } );
    } );

   /* Show/Hide Email */
    wp.customize( 'header_display_email', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.top-contacts .email').show();
            } else{
                $('.top-contacts .email').hide();
            }
        } );
    } );
	
	// Topbar BG
	wp.customize( 'header_top_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '.header-top' ).css( 'background-color', newval);
		} );
	} );
	
	// BG Color
	wp.customize( 'header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '.no-transparent-header .main-header' ).css( 'background-color', newval);
		} );
	} );
	wp.customize( 'sticky_header_bg_color', function( value ) {
		value.bind( function( newval ) {
			$( '.fixed-header .main-header' ).css( 'background-color', newval);
		} );
	} );
	
   /*========================
   Color Settings ===========*/
   
   //Menu Color
	wp.customize( 'menu_link_color', function( value ) {
		value.bind( function( newval ) {
			$( 'nav.kunty-nav ul.menu > li > a' ).css( 'color', newval );
		} );
	} );
	
   /*========================
   Blog Settings ===========*/
    wp.customize( 'blog_breadcrumb_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.blog-bcr.breadcrumbs').show();
            } else{
                $('.blog-bcr.breadcrumbs').hide();
            }
        } );
    } );
	
    wp.customize( 'post_thumbnail_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-item .post-thumbnail').show();
            } else{
                $('.post-item .post-thumbnail').hide();
            }
        } );
    } );
	
    wp.customize( 'post_excerpt_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-item .entry-content').show();
            } else{
                $('.post-item .entry-content').hide();
            }
        } );
    } );
	
    wp.customize( 'post_cat_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-item .entry-cats').show();
            } else{
                $('.post-item .entry-cats').hide();
            }
        } );
    } );

    wp.customize( 'post_date_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-item .entry-meta .post-date').show();
            } else{
                $('.post-item .entry-meta .post-date').hide();
            }
        } );
    } );
    wp.customize( 'post_author_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-item .entry-meta .post-author').show();
            } else{
                $('.post-item .entry-meta .post-author').hide();
            }
        } );
    } );
    wp.customize( 'post_comment_number_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-item .entry-meta .post-comment-no').show();
            } else{
                $('.post-item .entry-meta .post-comment-no').hide();
            }
        } );
    } );

   /* Single Post Page Settings */
    wp.customize( 'single_post_thumb_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-detail .post-thumbnail').show();
            } else{
                $('.post-detail .post-thumbnail').hide();
            }
        } );
    } );
    wp.customize( 'single_post_meta_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-detail .entry-meta').show();
            } else{
                $('.post-detail .entry-meta').hide();
            }
        } );
    } );
    wp.customize( 'single_post_cat_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.post-detail .entry-cats').show();
            } else{
                $('.post-detail .entry-cats').hide();
            }
        } );
    } );
	
   /* Page Settings */
    wp.customize( 'page_breadcrumb_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.page-bcr.breadcrumbs').show();
            } else{
                $('.page-bcr.breadcrumbs').hide();
            }
        } );
    } );

	/**==================================================
	 * Front Page Settings
	 ====================================================*/

	/*===Hero Section===*/
	// Subtitle
	wp.customize( 'hero_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.hero-content .sub-title' ).text( to );
		} );
	} );
	//Button Text
	wp.customize( 'hero_btn_text', function( value ) {
		value.bind( function( to ) {
			$( '.hero-content .btn-kunty' ).text( to );
		} );
	} );
	// Title Color
	wp.customize( 'hero_title_color', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-area .hero-content h2' ).css( 'color', newval );
		} );
	} );
	// Title font size
	wp.customize( 'hero_title_size', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-area .hero-content h2' ).css( 'font-size', newval+'px' );
		} );
	} );
	// Title line height
	wp.customize( 'hero_title_line_height', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-area .hero-content h2' ).css( 'line-height', newval );
		} );
	} );
	// Description font size
	wp.customize( 'hero_desc_size', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-area .hero-content, .hero-area .hero-content p' ).css( 'font-size', newval+'px' );
		} );
	} );
	// Description Color
	wp.customize( 'hero_desc_color', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-area .hero-content, .hero-area .hero-content p' ).css( 'color', newval );
		} );
	} );
	// Width
	wp.customize( 'hero_content_width', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-area .hero-content' ).css( 'max-width', newval+'px' );
		} );
	} );

	/*===Intro Section===*/
	wp.customize( 'about_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.intro-heading > h6' ).text( to );
		} );
	} );
	wp.customize( 'about_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.intro-heading > h2' ).text( to );
		} );
	} );
	wp.customize( 'about_section_description', function( value ) {
		value.bind( function( to ) {
			$( '.intro-heading > p' ).text( to );
		} );
	} );
	// Section padding top
	wp.customize( 'about_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#intro-section' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	// Section padding bottom
	wp.customize( 'about_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#intro-section' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );
	
	/*===Service Section===*/
	//Section Title
	wp.customize( 'services_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#service-section .section-title h2' ).text( to );
		} );
	} );
	//Section Subtitle
	wp.customize( 'services_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '#service-section .section-title .sub-title' ).text( to );
		} );
	} );
	//Section description
	wp.customize( 'services_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#service-section .section-title p' ).text( to );
		} );
	} );
	
	//all service button text
	wp.customize( 'all_service_btn_text', function( value ) {
		value.bind( function( to ) {
			$( '#service-section .section-title .btn' ).text( to );
		} );
	} );
	
	// Text Align
	wp.customize( 'service_content_align', function( value ) {
		value.bind( function( newval ) {
			if( newval == 'text-center'){
				$('#service-section .icon-box').removeClass('text-start text-end').addClass( 'text-center' );
			} else if( newval == 'text-end'){
				$('#service-section .icon-box').removeClass('text-center text-start').addClass( 'text-end' );
			} else{
				$('#service-section .icon-box').removeClass('text-center text-end').addClass( 'text-start' );
			}
		} );
	} );
	// BG Color
	wp.customize( 'service_icon_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-holder i' ).css( 'background-color', newval );
		} );
	} );
	// Icon Container Size
	wp.customize( 'service_icon_box_size', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-holder i' ).css( 'width', newval+'px' );
			$( '#service-section .icon-holder i' ).css( 'height', newval+'px' );
			$( '#service-section .icon-holder i' ).css( 'line-height', newval+'px' );
		} );
	} );
	// Icon border radius
	wp.customize( 'service_icon_br', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-holder i' ).css( 'border-radius', newval+'px' );
		} );
	} );
	// Icon font size
	wp.customize( 'service_icon_font_size', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-holder i' ).css( 'font-size', newval+'px' );
		} );
	} );
	// Icon color
	wp.customize( 'service_icon_color', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-holder i' ).css( 'color', newval);
		} );
	} );
	// Title font size
	wp.customize( 'service_title_font_size', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-box h4' ).css( 'font-size', newval+'px');
		} );
	} );
	// Title color
	wp.customize( 'service_title_color', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-box h4' ).css( 'color', newval);
		} );
	} );
	// Description color
	wp.customize( 'service_description_color', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-box p' ).css( 'color', newval);
		} );
	} );
	// Description color
	wp.customize( 'service_btn_more_color', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-box .btn-more' ).css( 'color', newval);
		} );
	} );
	// BG Color
	wp.customize( 'service_box_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-box' ).css( 'background-color', newval);
		} );
	} );
	// Service padding
	wp.customize( 'service_box_padding', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section .icon-box' ).css( 'padding', newval + 'px');
		} );
	} );
	
	// Section BG
	wp.customize( 'service_section_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section' ).css( 'background-color', newval );
		} );
	} );
	// Section padding top
	wp.customize( 'service_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	// Section padding bottom
	wp.customize( 'service_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#service-section' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );

	/*===Portfolios Section===*/
	wp.customize( 'portfolio_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-section .section-title  h2' ).text( to );
		} );
	} );
	wp.customize( 'portfolio_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-section .section-title  .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'portfolio_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#portfolio-section .section-title  p' ).text( to );
		} );
	} );
	wp.customize( 'portfolio_more_btn_text', function( value ) {
		value.bind( function( to ) {
			$( '.loadmore-area .btn-kunty' ).text( to );
		} );
	} );
	// Section BG
	wp.customize( 'portfolio_section_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio-section' ).css( 'background-color', newval );
		} );
	} );
	// Section padding top
	wp.customize( 'portfolio_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio-section' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	// Section padding bottom
	wp.customize( 'portfolio_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#portfolio-section' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );
	
	/*===Feedback Section===*/
	wp.customize( 'feedback_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#feedback-section .section-title  h2' ).text( to );
		} );
	} );
	wp.customize( 'feedback_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '#feedback-section .section-title  .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'feedback_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#feedback-section .section-title  p' ).text( to );
		} );
	} );
	
    wp.customize( 'feedback_rating_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('#feedback-section .testimonial .rating').show();
            } else{
                $('#feedback-section .testimonial .rating').hide();
            }
        } );
    } );
	// BG Color
	wp.customize( 'feedback_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#feedback-section .testimonial' ).css( 'background-color', newval );
		} );
	} );
	// Border Color
	wp.customize( 'feedback_border_clr', function( value ) {
		value.bind( function( newval ) {
			$( '#feedback-section .testimonial' ).css( 'border-color', newval );
		} );
	} );
	// Text Color
	wp.customize( 'feedback_text_clr', function( value ) {
		value.bind( function( newval ) {
			$( '#feedback-section .testimonial' ).css( 'color', newval );
		} );
	} );
	// Section BG
	wp.customize( 'feedback_section_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#feedback-section' ).css( 'background-color', newval );
		} );
	} );
	// Section padding top
	wp.customize( 'feedback_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#feedback-section' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	// Section padding bottom
	wp.customize( 'feedback_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#feedback-section' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );
	
	
	/*===Team Section===*/
	wp.customize( 'team_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.team-area .section-title  h2' ).text( to );
		} );
	} );
	wp.customize( 'team_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.team-area .section-title  .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'team_section_description', function( value ) {
		value.bind( function( to ) {
			$( '.team-area .section-title  p' ).text( to );
		} );
	} );
	// BG Color
	wp.customize( 'team_member_bg', function( value ) {
		value.bind( function( newval ) {
			$( '.singel-team' ).css( 'background-color', newval );
		} );
	} );
	// Border Color
	wp.customize( 'member_border_clr', function( value ) {
		value.bind( function( newval ) {
			$( '.singel-team' ).css( 'border-color', newval );
		} );
	} );
	// Padding Top Bottom
	wp.customize( 'member_padding_y', function( value ) {
		value.bind( function( newval ) {
			$( '.singel-team' ).css( 'padding-top', newval +'px').css( 'padding-bottom', newval + 'px' );
		} );
	} );
	// Padding left right
	wp.customize( 'member_padding_x', function( value ) {
		value.bind( function( newval ) {
			$( '.singel-team' ).css( 'padding-left', newval +'px').css( 'padding-right', newval + 'px' );
		} );
	} );
	//Image Width
	wp.customize( 'member_face_width', function( value ) {
		value.bind( function( newval ) {
			$( '.team-thumbnail' ).css( 'width', newval + 'px' );
		} );
	} );
	//Image Height
	wp.customize( 'member_face_height', function( value ) {
		value.bind( function( newval ) {
			$( '.team-thumbnail' ).css( 'height', newval + 'px' );
		} );
	} );
	// Image Border Radius
	wp.customize( 'member_face_border_radius', function( value ) {
		value.bind( function( newval ) {
			$( '.team-thumbnail.circle' ).css( 'border-radius', newval + '%' );
		} );
	} );
	// Section BG
	wp.customize( 'team_section_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#team-section' ).css( 'background-color', newval );
		} );
	} );
	// Section padding top
	wp.customize( 'team_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#team-section' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	// Section padding bottom
	wp.customize( 'team_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#team-section' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );


	/*===== Pricing Section =====*/
	wp.customize( 'pricing_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#pricing-section .section-title  h2' ).text( to );
		} );
	} );
	wp.customize( 'pricing_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '#pricing-section .section-title .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'pricing_section_description', function( value ) {
		value.bind( function( to ) {
			$( '#pricing-section .section-title  p' ).text( to );
		} );
	} );
	//Active Plan BG
	wp.customize( 'active_plan_bg', function( value ) {
		value.bind( function( newval ) {
			$( '.single-plan.active' ).css( 'background-color', newval );
		} );
	} );
	//Active Plan Text Color
	wp.customize( 'active_plan_text_clc', function( value ) {
		value.bind( function( newval ) {
			$( '.single-plan.active .plan-head h5, .single-plan.active .plan-price .price, .single-plan.active .plan-price, .single-plan.active .plan-features ul li, .single-plan.active .plan-head h6' ).css( 'color', newval );
		} );
	} );
	//Btn Text Color
	wp.customize( 'active_plan_btn_text_clc', function( value ) {
		value.bind( function( newval ) {
			$( '.single-plan.active .btn-kunty' ).css( 'color', newval );
		} );
	} );
	//Btn Border Color
	wp.customize( 'active_plan_btn_border_clc', function( value ) {
		value.bind( function( newval ) {
			$( '.single-plan.active .btn-kunty' ).css( 'border-color', newval );
		} );
	} );
	
	// Section BG
	wp.customize( 'pricing_section_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#pricing-section' ).css( 'background-color', newval );
		} );
	} );
	// Section padding top
	wp.customize( 'pricing_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#pricing-section' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	// Section padding bottom
	wp.customize( 'pricing_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#pricing-section' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );

	/*=== Brands Section ===*/
	wp.customize( 'brands_section_title', function( value ) {
		value.bind( function( to ) {
			$( '#brands-section .section-title h6' ).text( to );
		} );
	} );
	wp.customize( 'brands_section_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#brands-section' ).css( 'background-color', newval );
		} );
	} );
	wp.customize( 'brands_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#brands-section' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	wp.customize( 'brands_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#brands-section' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );
	
	/*=== CTA Section ===*/
	wp.customize( 'cta_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#cta-section .cta-inner' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	wp.customize( 'cta_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#cta-section .cta-inner' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );
	wp.customize( 'cta_btn_text', function( value ) {
		value.bind( function( to ) {
			$( '.cta-inner .btn-kunty' ).text( to );
		} );
	} );
	wp.customize( 'cta_title_color', function( value ) {
		value.bind( function( newval ) {
			$( '.cta-inner h2' ).css( 'color', newval );
		} );
	} );
	wp.customize( 'cta_subtitle_color', function( value ) {
		value.bind( function( newval ) {
			$( '.cta-inner h6' ).css( 'color', newval );
		} );
	} );
	wp.customize( 'cta_desc_color', function( value ) {
		value.bind( function( newval ) {
			$( '.cta-inner p' ).css( 'color', newval );
		} );
	} );

	/*=== News Section ===*/
	wp.customize( 'news_section_title', function( value ) {
		value.bind( function( to ) {
			$( '.news-section .section-title h2' ).text( to );
		} );
	} );
	wp.customize( 'news_section_subtitle', function( value ) {
		value.bind( function( to ) {
			$( '.news-section .section-title .sub-title' ).text( to );
		} );
	} );
	wp.customize( 'news_section_description', function( value ) {
		value.bind( function( to ) {
			$( '.news-section .section-title p' ).text( to );
		} );
	} );
	wp.customize( 'news_section_bg', function( value ) {
		value.bind( function( newval ) {
			$( '#news-section' ).css( 'background-color', newval );
		} );
	} );
	wp.customize( 'news_section_pt', function( value ) {
		value.bind( function( newval ) {
			$( '#news-section' ).css( 'padding-top', newval + 'px' );
		} );
	} );
	wp.customize( 'news_section_pb', function( value ) {
		value.bind( function( newval ) {
			$( '#news-section' ).css( 'padding-bottom', newval + 'px' );
		} );
	} );
    wp.customize( 'latest_post_thumb_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.news-section .post-item  .post-thumbnail').show();
            } else{
                $('.news-section .post-item .post-thumbnail').hide();
            }
        } );
    } );
    wp.customize( 'latest_post_content_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.news-section .post-item .entry-content').show();
            } else{
                $('.news-section .post-item .entry-content').hide();
            }
        } );
    } );
    wp.customize( 'latest_post_cat_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.news-section .post-item .entry-cats').show();
            } else{
                $('.news-section .post-item .entry-cats').hide();
            }
        } );
    } );
    wp.customize( 'latest_post_date_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.news-section .post-item .post-date').show();
            } else{
                $('.news-section .post-item .post-date').hide();
            }
        } );
    } );
    wp.customize( 'latest_post_author_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.news-section .post-item .post-author').show();
            } else{
                $('.news-section .post-item .post-author').hide();
            }
        } );
    } );
    wp.customize( 'latest_post_comment_number_display', function( value ) {
        value.bind( function( to ) {
            if( true == to ){
                $('.news-section .post-item .post-comment-no').show();
            } else{
                $('.news-section .post-item .post-comment-no').hide();
            }
        } );
    } );



	/**================================================
	 * Footer Settings
	 ===================================================*/
	// Copyright Area
	wp.customize( 'footer_copyright_text', function( value ) {
		value.bind( function( to ) {
			$( '#copyright-text' ).text( to );
		} );
	} );




    function update_css( ){
         var css_code = $( '#kunty-style-inline-css' ).html();
        // Fix Chrome Lost CSS When resize ??
        $( '#kunty-style-inline-css' ).replaceWith( '<style class="replaced-style" id="kunty-style-inline-css">'+css_code+'</style>' );

    }

    // When preview ready
    wp.customize.bind( 'preview-ready', function() {
        update_css();
    });

    $( window ).resize( function(){
        update_css();
    });

} )( jQuery , wp.customize );

