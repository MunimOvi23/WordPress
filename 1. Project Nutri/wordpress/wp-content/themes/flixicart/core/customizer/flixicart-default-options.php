<?php
/**
 * Get default option by passing option id
 */
if ( !function_exists( 'flixicart_get_default_option' ) ):
	function flixicart_get_default_option( $option ) {


		if ( empty( $option ) ) {
			return false;
		}

		$flixicart_default_options = array(
			'enable_account' => '1',
			'enable_nav_wishlist' => '1',
			'enable_nav_compare' => '1',
			'hdr_nav_add_banner_image' => esc_url(get_stylesheet_directory_uri() . '/assets/images/advertise-banner.png'),
			'hdr_nav_add_banner_link' => '#',
			'enable_hdr_nav_bcat' => '1',
			'hdr_nav_bcat_title' => esc_html('Shop By Categories'),
		);

		$flixicart_default_options = apply_filters( 'flixicart_modify_default_options', $flixicart_default_options );

		if ( isset( $flixicart_default_options[$option] ) ) {
			return $flixicart_default_options[$option];
		}

		return false;
	}
endif;
