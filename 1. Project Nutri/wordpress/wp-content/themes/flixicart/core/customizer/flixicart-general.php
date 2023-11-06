<?php
function flixicart_general_customize($wp_customize)
{
    $selective_refresh = isset($wp_customize->selective_refresh) ? 'postMessage' : 'refresh';
	 
    /*=========================================
    Header Navigation
    =========================================*/
    // Account
    $wp_customize->add_setting('hdr_nav_account', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_text',
    ));

    $wp_customize->add_control('hdr_nav_account', array(
        'type' => 'hidden',
        'label' => __('Account', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,
    ));

    // hide/show
    $wp_customize->add_setting('enable_account', array(
        'default' => flixicart_get_default_option( 'enable_account' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_checkbox',
    ));

    $wp_customize->add_control(new Flixita_Customize_Toggle_Control($wp_customize, 'enable_account', array(
        'label' => __('Enable / Disable ?', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,

    )));

    // Wishlist
    $wp_customize->add_setting('hdr_nav_wishlist_head', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_text',
    ));

    $wp_customize->add_control('hdr_nav_wishlist_head', array(
        'type' => 'hidden',
        'label' => __('Wishlist', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,
    ));

    // hide/show
    $wp_customize->add_setting('enable_nav_wishlist', array(
        'default' => flixicart_get_default_option( 'enable_nav_wishlist' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_checkbox',
    ));

    $wp_customize->add_control(new Flixita_Customize_Toggle_Control($wp_customize, 'enable_nav_wishlist', array(
        'label' => __('Enable / Disable ?', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,

    )));
	
	// Compare
    $wp_customize->add_setting('hdr_nav_compare_head', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_text',
    ));

    $wp_customize->add_control('hdr_nav_compare_head', array(
        'type' => 'hidden',
        'label' => __('Compare', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,
    ));

    // hide/show
    $wp_customize->add_setting('enable_nav_compare', array(
        'default' => flixicart_get_default_option( 'enable_nav_compare' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_checkbox',
    ));

    $wp_customize->add_control(new Flixita_Customize_Toggle_Control($wp_customize, 'enable_nav_compare', array(
        'label' => __('Enable / Disable ?', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,

    )));
	
	// Advertise Banner
    $wp_customize->add_setting('hdr_nav_add_banner_head', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_text',
    ));

    $wp_customize->add_control('hdr_nav_add_banner_head', array(
        'type' => 'hidden',
        'label' => __('Advertise Banner', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,
    ));
	
	//  Banner Image //
    $wp_customize->add_setting('hdr_nav_add_banner_image', array(
        'default' => flixicart_get_default_option( 'hdr_nav_add_banner_image' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_url',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hdr_nav_add_banner_image', array(
        'label' => esc_html__('Banner Image', 'flixicart') ,
        'section' => 'header_nav',
		'priority' => 3,
    )));
	
	// Banner URL //
    $wp_customize->add_setting('hdr_nav_add_banner_link', array(
        'default' => flixicart_get_default_option( 'hdr_nav_add_banner_link' ),
        'sanitize_callback' => 'flixita_sanitize_url',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('hdr_nav_add_banner_link', array(
        'label' => __('Link', 'flixicart') ,
        'section' => 'header_nav',
        'type' => 'text',
        'priority' => 3,
    ));
	
	$wp_customize->add_setting('hdr_nav_add_banner_target', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_checkbox',
    ));

    $wp_customize->add_control(new Flixita_Customize_Toggle_Control($wp_customize, 'hdr_nav_add_banner_target', array(
        'label' => __('Open in New Tab ?', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,

    )));
	
	// Browse Category
    $wp_customize->add_setting('hdr_nav_bcat_head', array(
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_text',
    ));

    $wp_customize->add_control('hdr_nav_bcat_head', array(
        'type' => 'hidden',
        'label' => __('Browse Category', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,
    ));
	
	 // hide/show
    $wp_customize->add_setting('enable_hdr_nav_bcat', array(
        'default' => flixicart_get_default_option( 'enable_hdr_nav_bcat' ),
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'flixita_sanitize_checkbox',
    ));

    $wp_customize->add_control(new Flixita_Customize_Toggle_Control($wp_customize, 'enable_hdr_nav_bcat', array(
        'label' => __('Enable / Disable ?', 'flixicart') ,
        'section' => 'header_nav',
        'priority' => 3,

    )));
	
	// Title //
    $wp_customize->add_setting('hdr_nav_bcat_title', array(
        'default' => flixicart_get_default_option( 'hdr_nav_bcat_title' ),
        'sanitize_callback' => 'flixita_sanitize_html',
        'capability' => 'edit_theme_options',
    ));

    $wp_customize->add_control('hdr_nav_bcat_title', array(
        'label' => __('Title', 'flixicart') ,
        'section' => 'header_nav',
        'type' => 'text',
        'priority' => 3,
    ));
	
}
add_action('customize_register', 'flixicart_general_customize');