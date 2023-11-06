<?php 
	
$wp_customize->add_panel( 'kunty_frontpage_settings',
	array(
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Front Page Settings', 'kunty' ),
		'description'    => '',
	)
);












