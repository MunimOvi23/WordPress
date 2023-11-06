<?php


    $wp_customize->add_section( 'kunty_theme_info_section' , array(
		'title'       => esc_html__( '★ Theme Info' , 'kunty' ),
		'priority' => 2
	) );
    
	if( ! class_exists( 'Themereps_Helper' ) ) {
		$wp_customize->add_setting( 'premium_notice', array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
		) );
		$premium_notice = '<div class="premium-info">
			<p><b>To see theme options and front page sections, Please install and activate \'Themereps Helper\' plugin.</b></p>
		</div>';
		$wp_customize->add_control( new Kunty_Custom_Text( $wp_customize ,'premium_notice',array(
			'section' => 'kunty_theme_info_section',
			'label' => $premium_notice
		) ) );
	}
	
	$wp_customize->add_setting( 'theme_info', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
    $theme_info = '';
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Theme Details', 'kunty' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://themereps.com/kunty/' ) . '" target="_blank">' . esc_html__( 'Click Here', 'kunty' ) . '</a></span><hr>';
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'View Demo', 'kunty' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://kunty.themereps.com' ) . '" target="_blank">' . esc_html__( 'Click Here', 'kunty' ) . '</a></span><hr>';
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Documentation', 'kunty' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://themereps.com/docs-category/bizes/' ) . '" target="_blank">' . esc_html__( 'Click Here', 'kunty' ) . '</a></span><hr>';
	$theme_info .= '<span class="sticky_info_row wp-clearfix"><label class="row-element">' . esc_html__( 'Support Forum', 'kunty' ) . ': </label><a class="button alignright" href="' . esc_url( 'https://wordpress.org/support/theme/kunty' ) . '" target="_blank">' . esc_html__( 'Click Here', 'kunty' ) . '</a></span><hr>';

	$wp_customize->add_control( new Kunty_Custom_Text( $wp_customize ,'theme_info',array(
		'section' => 'kunty_theme_info_section',
		'label' => $theme_info
	) ) );


	$wp_customize->add_setting( 'premium_features', array(
		'default' => '',
		'sanitize_callback' => 'wp_kses_post',
	) );
    $premium_features = '<div class="premium-info"><h2>' . esc_html__( 'Premium Version', 'kunty' ) . ': </h2>

		<p>Do you want to customize your website with more color option, font options, premium support and more, then you can check the pro version of the theme.</p>
		<ul>
		<li><span class="dashicons dashicons-yes"></span> Unlimited Color Options</li>
		<li><span class="dashicons dashicons-yes"></span> 1000+ Google Fonts</li>
		<li><span class="dashicons dashicons-yes"></span> 4 more extra sections on front page</li>
		<li><span class="dashicons dashicons-yes"></span> Related Posts in post detail page</li>
		<li><span class="dashicons dashicons-yes"></span> Content Type- Post, Page, Custom</li>
		<li><span class="dashicons dashicons-yes"></span> WooCommerce Support</li>
		<li><span class="dashicons dashicons-yes"></span> Mega Menu</li>
		<li><span class="dashicons dashicons-yes"></span> 24/7 Premium Support</li>
		<ul>
		<hr>
		<a class="button button-primary" href="' . esc_url( 'https://themereps.com/kunty/' ) . '" target="_blank">' . esc_html__( 'Upgrade to Pro', 'kunty' ) . '</a>
	</div>';
	$wp_customize->add_control( new Kunty_Custom_Text( $wp_customize ,'premium_features',array(
		'section' => 'kunty_theme_info_section',
		'label' => $premium_features
	) ) );

