<?php
/* Offcanvas Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'kunty_offcanvas_settings',
	array(
		'title'       => esc_html__( 'Offcanvas Menu Settings', 'kunty' ),
		'description' => '',
		'panel'       => 'kunty_theme_options',
		'priority'    => 4,
	)
);

// Show/Hide Offcanvas Menu
$wp_customize->add_setting( 'offcanvas_display',
	array(
		'default' => 1,
		'transport'			=> 'refresh',
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'offcanvas_display',
	array(
		'label'         => esc_html__( 'Show/hide Offcanvas Menu', 'kunty' ),
		'section'     => 'kunty_offcanvas_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide offcanvas menu.', 'kunty' )
	)
) );

// Description
$wp_customize->add_setting( 'offcanvas_desc',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Kunty - A fully responsive WordPress theme, suited for a corporate, consultant and business website.', 'kunty' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'offcanvas_desc',
	array(
		'label'       => esc_html__( 'Description', 'kunty' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'kunty_offcanvas_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('offcanvas_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->selective_refresh->add_partial( 'offcanvas_desc', array(
	'selector'        => '.offcanvas .offcan-desc p',
	'render_callback' =>  function(){
			return get_theme_mod( 'offcanvas_desc');
		},
) );

// Phone Number
$wp_customize->add_setting( 'offcanvas_phone',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( '(+123)-456-7890', 'kunty' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'offcanvas_phone',
	array(
		'label'       => esc_html__( 'Phone Number', 'kunty' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'kunty_offcanvas_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('offcanvas_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->selective_refresh->add_partial( 'offcanvas_phone', array(
	'selector'        => '.offcanvas .phone',
	'render_callback' =>  function(){
			return get_theme_mod( 'offcanvas_phone');
		},
) );


// Email Address
$wp_customize->add_setting( 'offcanvas_email',
	array(
		'sanitize_callback' => 'sanitize_email',
		'default'           => esc_html__( 'help@kunty.com', 'kunty' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'offcanvas_email',
	array(
		'label'       => esc_html__( 'Email Address', 'kunty' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'kunty_offcanvas_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('offcanvas_display') ){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->selective_refresh->add_partial( 'offcanvas_email', array(
	'selector'        => '.offcanvas .email',
	'render_callback' =>  function(){
			return get_theme_mod( 'offcanvas_email');
		},
) );

// Location
$wp_customize->add_setting( 'offcanvas_location',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Labony Super Marker, Sapahar, BD', 'kunty' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'offcanvas_location',
	array(
		'label'       => esc_html__( 'Location', 'kunty' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'kunty_offcanvas_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('offcanvas_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->selective_refresh->add_partial( 'offcanvas_location', array(
	'selector'        => '.offcanvas .location',
	'render_callback' =>  function(){
			return get_theme_mod( 'offcanvas_location');
		},
) );

// Show/Hide Social Icons
$wp_customize->add_setting( 'offcanvas_social_enable',
	array(
		'default' => 1,
		'transport'			=> 'refresh',
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'offcanvas_social_enable',
	array(
		'label'         => esc_html__( 'Show/hide Social Icons', 'kunty' ),
		'section'     => 'kunty_offcanvas_settings',
		'description' => esc_html__( 'Add your social profile links going on- Theme Options>Global Settings', 'kunty' ),
		'active_callback' => function(){
			 if( 1===get_theme_mod('offcanvas_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );