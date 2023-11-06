<?php
/**
 * Kunty Theme Customizer
 *
 * @package Kunty
 */
 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kunty_customize_register( $wp_customize ) {
	
	// Load custom controls.
	require_once get_template_directory() . '/inc/customizer/controls/custom-controls.php';
    require_once get_template_directory() . '/inc/customizer/controls/repeater/class-repeater-setting.php';
    require_once get_template_directory() . '/inc/customizer/controls/repeater/class-control-repeater.php';
    require_once get_template_directory() . '/inc/customizer/controls/sortable/control-sortable-fields.php';
	$wp_customize->register_control_type('Kunty_Control_Sortable');
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	// Remove Heading image seciton
	$wp_customize->remove_section('header_image');

	// Remove Controls
	$wp_customize->remove_control('display_header_text');
	
	if( class_exists( 'Themereps_Helper' ) ) {
		//Theme Options
		require_once get_template_directory() . '/inc/customizer/theme-options/theme-options.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/site-identity.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-global.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-typography.php';

		require_once get_template_directory() . '/inc/customizer/theme-options/options-colors.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-header.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-offcanvas.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-misc.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-blog.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-page.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-single.php';
		require_once get_template_directory() . '/inc/customizer/theme-options/options-footer.php';

		// Frontpage Settings
		require_once get_template_directory() . '/inc/customizer/front-page/options-home.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-hero.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-services.php';
		
		if( th_fs()->can_use_premium_code() ){
			require_once get_template_directory() . '/inc/customizer/front-page/options-brands.php';
		}
		require_once get_template_directory() . '/inc/customizer/front-page/options-why.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-team.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-feedback.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-cta.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-latest-news.php';
	}

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		require_once get_template_directory() . '/inc/customizer/front-page/options-portfolios.php';
		require_once get_template_directory() . '/inc/customizer/front-page/options-pricing.php';
	}
	if( class_exists( 'Themereps_Helper' ) ) {
	// Contact Page Settings
	require_once get_template_directory() . '/inc/customizer/contact/options-contact.php';
	}
	// WooCommerce Settings
	if(class_exists( 'WooCommerce' ) && kunty_set_to_premium() ) {
		require_once get_template_directory() . '/inc/customizer/woocommerce/options-shop.php';
		require_once get_template_directory() . '/inc/customizer/woocommerce/options-product-single.php';
	}

	// Section Order
	require_once get_template_directory() . '/inc/customizer/sections-order/section-order.php';

	/**
	 * Upgrade
	 */
	require get_template_directory() . '/inc/customizer/upsell/options-upsell.php';
	require get_template_directory() . '/inc/customizer/upsell/themeinfo.php';

}
add_action( 'customize_register', 'kunty_customize_register' );


/**
 * Selective refresh
 */
require get_template_directory() . '/inc/customizer/customizer-selective-refresh.php';




/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kunty_customize_preview_js() {
	wp_enqueue_script( 'kunty-customizer-liveview', get_template_directory_uri() . '/inc/customizer/assets/js/customizer-liveview.js', array( 'jquery', 'customize-preview'  ), false, true );
}
add_action( 'customize_preview_init', 'kunty_customize_preview_js', 65 );