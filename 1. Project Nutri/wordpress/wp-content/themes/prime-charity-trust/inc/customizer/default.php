<?php
/**
 * Default theme options.
 *
 * @package Prime Charity Trust
 */

if ( ! function_exists( 'prime_charity_trust_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function prime_charity_trust_get_default_theme_options() {

	$defaults = array();

	// Top Bar
	$defaults['show_header_contact_info'] 		= false;
    $defaults['show_header_social_links'] 		= false;
    $defaults['header_social_links']			= array();

    // Front Page Content
	$defaults['enable_frontpage_content'] 		= true;

	// Slider Section	
	$defaults['enable_featured_slider_section']		    	= false;
	$defaults['featured_slider_content_type']		    	= 'featured_slider_page';
	$defaults['featured_slider_readmore_text']	= esc_html__('Know More','prime-charity-trust');
	$defaults['data_slick_speed']					    	= 1000;
	$defaults['data_slick_infinite']				    	= 1;
	$defaults['data_slick_arrows']					    	= 1;
	$defaults['data_slick_autoplay']				    	= 0;
	$defaults['data_slick_draggable']				    	= 1;
	$defaults['data_slick_fade']					    	= 1;
	$defaults['number_of_featured_slider_items']	    	= 6;
	
	// Servies Section	
	$defaults['enable_featured_services_section']			= false;
	$defaults['number_of_featured_services_items']			= 6;
	$defaults['featured_services_section_title'] = esc_html__( 'Organization Cause', 'prime-charity-trust' );

	// Theme Options
	$defaults['show_header_image']		    			= 'header-image-enable';
	$defaults['show_page_title']		    			= 'page-title-enable';
	$defaults['layout_options_blog']					= 'no-sidebar';
	$defaults['layout_options_archive']					= 'no-sidebar';
	$defaults['layout_options_page']					= 'no-sidebar';	
	$defaults['layout_options_single']					= 'right-sidebar';	
	$defaults['excerpt_length']							= 25;
	$defaults['readmore_text']							= esc_html__('Know More','prime-charity-trust');
	$defaults['your_latest_posts_title']				= esc_html__('Blog','prime-charity-trust');

	//General Setting
	$defaults['header_donate_scroll_to_top']			= esc_html__('true','prime-charity-trust');
	$defaults['header_donate_preloader_setting']	    = false;
	$defaults['prime_charity_trust_sticky_header']	    = false;
	
	

	// Single Post Setting
	$defaults['prime_charity_trust_post_author_setting']	    = esc_html__('true','prime-charity-trust');
	$defaults['prime_charity_trust_post_date_setting']	        = esc_html__('true','prime-charity-trust');
	$defaults['prime_charity_trust_post_categories_setting']	= esc_html__('true','prime-charity-trust');
	$defaults['prime_charity_trust_post_comment_setting']	    = esc_html__('true','prime-charity-trust');

	//Post Setting
	$defaults['prime_charity_trust_post_feature_image_setting'] = esc_html__('true','prime-charity-trust');
	$defaults['prime_charity_trust_post_title_setting']         = esc_html__('true','prime-charity-trust');
	$defaults['prime_charity_trust_post_meta_setting']          = esc_html__('true','prime-charity-trust');
	$defaults['prime_charity_trust_post_content_setting']       = esc_html__('true','prime-charity-trust');
	$defaults['prime_charity_trust_post_button_setting']        = esc_html__('true','prime-charity-trust');
	
	

	//Footer section 		
	$defaults['copyright_text']	= esc_html__( 'Charity WordPress Theme', 'prime-charity-trust' );
	$defaults['prime_charity_trust_footer_setting']	    = esc_html__('true','prime-charity-trust');

	// Pass through filter.
	$defaults = apply_filters( 'prime_charity_trust_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'prime_charity_trust_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function prime_charity_trust_get_option( $key ) {

		$default_options = prime_charity_trust_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;