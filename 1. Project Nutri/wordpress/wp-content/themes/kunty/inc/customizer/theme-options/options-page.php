<?php

/**
 * Page Settings
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
$wp_customize->add_section( 'page_settings',
	array(
		'priority'    => 7,
		'title'       => esc_html__( 'Page Settings', 'kunty' ),
		'panel'       => 'kunty_theme_options',
	)
);

// Page Layout
$wp_customize->add_setting( 'page_layout',
	array(
		'default' => 'no-sidebar',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_radio_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Image_Radio_Button_Custom_Control( $wp_customize, 'page_layout',
	array(
		'label'       => esc_html__( 'Page Layout', 'kunty' ),
		'description' => esc_html__( 'Page Layout, apply for all pages, exclude blog related pages and custom page templates.', 'kunty' ),
		'section'     => 'page_settings',
		'choices' => array(
			'left-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-left.png',
				'name' => __( 'Left Sidebar', 'kunty' )
			),
			'no-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-none.png',
				'name' => __( 'Fullwidth', 'kunty' )
			),
			'right-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-right.png',
				'name' => __( 'Right Sidebar', 'kunty' )
			)
		),
	)
) );

// Display breadcrumb
$wp_customize->add_setting( 'page_breadcrumb_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'page_breadcrumb_display',
	array(
		'label'		  => __( 'Display Breadcrumb', 'kunty' ),
		'section'     => 'page_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide breadcrumb on page', 'kunty' )
	)
) );

// Display comments on page.
$wp_customize->add_setting( 'page_comments_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'page_comments_display',
	array(
		'label'			=> esc_html__( 'Display page comments.', 'kunty' ),
		'description'	=> esc_html__( 'Check/Uncheck this switch to show/hide comments on page', 'kunty' ),
		'section'		=> 'page_settings',
	)
) );
