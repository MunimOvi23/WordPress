<?php
/**
 * Site Options
 */

$wp_customize->add_panel( 'kunty_theme_options',
		array(
			'priority'       => 30,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__( 'Theme Options', 'kunty' ),
		)
	);


if ( ! function_exists( 'wp_get_custom_css' ) ) {  // Back-compat for WordPress < 4.7.

	/* Custom CSS Settings
	----------------------------------------------------------------------*/
	$wp_customize->add_section(
		'kunty_custom_code',
		array(
			'title' => __( 'Custom CSS', 'kunty' ),
			'panel' => 'kunty_theme_options',
		)
	);
	$wp_customize->add_setting(
		'kunty_custom_css',
		array(
			'default'           => '',
			'sanitize_callback' => 'kunty_sanitize_css',
			'type'              => 'option',
		)
	);


	$wp_customize->add_control(
		'kunty_custom_css',
		array(
			'label'   => __( 'Custom CSS', 'kunty' ),
			'section' => 'kunty_custom_code',
			'type'    => 'textarea'
		)
	);
} else {
	$wp_customize->get_section( 'custom_css' )->priority = 200;
}