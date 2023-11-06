<?php
/* Global Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'kunty_global_settings',
	array(
		'priority'    => 1,
		'title'       => esc_html__( 'Global Settings', 'kunty' ),
		'panel'       => 'kunty_theme_options',
	)
);

// Animation Disable
$wp_customize->add_setting( 'kunty_animation_disable',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'kunty_animation_disable',
	array(
		'label' => __( 'Scroll Animation', 'kunty' ),
		'section' => 'kunty_global_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide scrolling animation.', 'kunty' )
	)
) );

// Preloader Disable
$wp_customize->add_setting( 'preloader_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'preloader_display',
	array(
		'label' => __( 'Show/hide Preloader', 'kunty' ),
		'section' => 'kunty_global_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide preloader.', 'kunty' )
	)
) );

// BG Color
$wp_customize->add_setting( 'preloader_bg_color',
	array(
		'default' => '#ffffff',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_hex_rgba_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( $wp_customize, 'preloader_bg_color',
	array(
		'label'       => esc_html__( 'Preloader background', 'kunty' ),
		'section' => 'kunty_global_settings',
		'input_attrs' => array(
			'palette' => array(
				'#000000',
				'#222222',
				'#444444',
				'#777777',
				'#999999',
				'#aaaaaa',
				'#dddddd',
				'#ffffff',
			)
		),
		'active_callback' => function(){
			 if(get_theme_mod('preloader_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );

// Scrollup Button
$wp_customize->add_setting( 'scrollup_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'scrollup_display',
	array(
		'label'       => esc_html__( 'Display ScrollUp Button', 'kunty' ),
		'section'     => 'kunty_global_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide scrollup button.', 'kunty' )
	)
) );

// Custom Cursor display
$wp_customize->add_setting( 'custom_cursor_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'custom_cursor_display',
	array(
		'label'       => esc_html__( 'Display Circular Cursor', 'kunty' ),
		'section'     => 'kunty_global_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide circular cursor.', 'kunty' )
	)
) );

// Social URLs
$wp_customize->add_setting( 'social_urls',
   array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'kunty_url_sanitization'
   )
);
 
$wp_customize->add_control( new Kunty_Sortable_Repeater_Custom_Control( $wp_customize, 'social_urls',
   array(
		'label'       => esc_html__( 'Social Profiles', 'kunty' ),
		'description' => esc_html__( 'Add your social profile links.', 'kunty' ),
		'section'     => 'kunty_global_settings',
		'button_labels' => array(
			'add' => __( 'Add Social URL', 'kunty' ),
		),
   )
) );

// Add our Single Accordion setting and Custom Control to list the available Social Media icons
$socialIconsList = array(
	'Dribbble' => __( '<i class="ti-dribbble"></i>', 'kunty' ),
	'Facebook' => __( '<i class="ti-facebook"></i>', 'kunty' ),
	'Flickr' => __( '<i class="ti-flickr"></i>', 'kunty' ),
	'GitHub' => __( '<i class="ti-github"></i>', 'kunty' ),
	'Instagram' => __( '<i class="ti-instagram"></i>', 'kunty' ),
	'LinkedIn' => __( '<i class="ti-linkedin"></i>', 'kunty' ),
	'Pinterest' => __( '<i class="ti-pinterest"></i>', 'kunty' ),
	'Google+' => __( '<i class="ti-google"></i>', 'kunty' ),
	'Reddit' => __( '<i class="ti-reddit"></i>', 'kunty' ),
	'SoundCloud' => __( '<i class="ti-soundcloud"></i>', 'kunty' ),
	'Stack Overflow' => __( '<i class="ti-stack-overflow"></i>', 'kunty' ),
	'Tumblr' => __( '<i class="ti-tumblr"></i>', 'kunty' ),
	'Twitter' => __( '<i class="ti-twitter"></i>', 'kunty' ),
	'Vimeo' => __( '<i class="ti-vimeo"></i>', 'kunty' ),
	'YouTube' => __( '<i class="ti-youtube"></i>', 'kunty' ),
);
$wp_customize->add_setting( 'social_url_icons',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_text_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Single_Accordion_Custom_Control( $wp_customize, 'social_url_icons',
	array(
		'label' => __( 'View available social icons', 'kunty' ),
		'description' => $socialIconsList,
		'section' => 'kunty_global_settings',
	)
) );

// Social links open newtab
$wp_customize->add_setting( 'social_newtab',
	array(
		'default' => 1,
		//'transport' => 'postMessage',
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'social_newtab',
	array(
		'label' => __( 'Open Social URLs in new tab', 'kunty' ),
		'section' => 'kunty_global_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') ){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );
