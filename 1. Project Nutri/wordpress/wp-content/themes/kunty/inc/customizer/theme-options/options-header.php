<?php
/* Header
----------------------------------------------------------------------*/
$wp_customize->add_section( 'kunty_header_settings',
	array(
		'title'       => esc_html__( 'Header Settings', 'kunty' ),
		'description' => '',
		'panel'       => 'kunty_theme_options',
		'priority'    => 4,
	)
);

// Header Top
$wp_customize->add_setting( 'kunty_header_top_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Kunty_Simple_Notice_Custom_Control( 
		$wp_customize, 'kunty_header_top_heading',
		array(
			'label' => esc_html__( 'Header Topbar', 'kunty' ),
			'type' => 'heading',
			'section' => 'kunty_header_settings',
		)
	) 
);
// Show/Hide Header Top Area
$wp_customize->add_setting( 'header_top_display',
	array(
		'default' => 0,
		'transport'			=> 'refresh',
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'header_top_display',
	array(
		'label'         => esc_html__( 'Show/hide Header Topbar', 'kunty' ),
		'section'     => 'kunty_header_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide header topbar area.', 'kunty' )
	)
) );

// Container width.
$wp_customize->add_setting( 'topbar_container_width',
	array(
		'default' => 'container',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_text_sanitization'
	)
);
$wp_customize->add_control( 
	new Kunty_Text_Radio_Button_Custom_Control( 
		$wp_customize, 'topbar_container_width',
		array(
			'label'   => esc_html__( 'Container Width', 'kunty' ),
			'section' => 'kunty_header_settings',
			'choices' => array(
				'container'   => esc_html__('Contained','kunty'),
				'container-fluid' => esc_html__('Full Width','kunty'),
			),
			'active_callback' => function(){
				 if( 1===get_theme_mod('header_top_display') ){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) 
);

// Display Phone Number
$wp_customize->add_setting( 'header_display_phone',
	array(
		'default' => 1,
		'transport'			=> 'postMessage',
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'header_display_phone',
	array(
		'label'       => esc_html__( 'Show/hide Phone Number?', 'kunty' ),
		'section'     => 'kunty_header_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide phone number', 'kunty' ),
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') ){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );

// Phone Number
$wp_customize->add_setting( 'header_phone',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( '(+123)-456-7890', 'kunty' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'header_phone',
	array(
		'label'       => esc_html__( 'Your Phone', 'kunty' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'kunty_header_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->selective_refresh->add_partial( 'header_phone', array(
	'selector'        => '.header-top .phone',
	'render_callback' =>  function(){
			return get_theme_mod( 'header_phone');
		},
) );

// Display email address
$wp_customize->add_setting( 'header_display_email',
	array(
		'default' => 1,
		'transport' => 'postMessage',
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'header_display_email',
	array(
		'label'       => esc_html__( 'Show/hide Email Address?', 'kunty' ),
		'section'     => 'kunty_header_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide email address', 'kunty' ),
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') ){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );


// Emial Address
$wp_customize->add_setting( 'header_email',
	array(
		'sanitize_callback' => 'sanitize_email',
		'default'           => esc_html__( 'help@kunty.com', 'kunty' ),
		'transport'			=> 'postMessage'
	)
);
$wp_customize->add_control( 'header_email',
	array(
		'label'       => esc_html__( 'Your Email', 'kunty' ),
		'description' => '',
		'type'        => 'text',
		'section'     => 'kunty_header_settings',
		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display') ){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->selective_refresh->add_partial( 'header_email', array(
	'selector'        => '.header-top .email',
	'render_callback' =>  function(){
			return get_theme_mod( 'header_email');
		},
) );


// Display email address
$wp_customize->add_setting( 'header_social_enable',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'header_social_enable',
	array(
		'label'       => esc_html__( 'Show/hide Social Icons?', 'kunty' ),
		'description' => esc_html__( 'Add your social profile links going on- Theme Options>Global Settings', 'kunty' ),
		'section'     => 'kunty_header_settings',

		'active_callback' => function(){
			 if( 1===get_theme_mod('header_top_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
) );

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Topbar BG Color
	$wp_customize->add_setting( 'header_top_bg_color', array(
		  'default' => 'rgba(59, 54, 99, 1)',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'header_top_bg_color',
			array(
				'label'   => esc_html__( 'Background', 'kunty' ),
				'section'     => 'kunty_header_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if( 1===get_theme_mod('header_top_display') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
}

// Header Top
$wp_customize->add_setting( 'kunty_navigation_heading',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Kunty_Simple_Notice_Custom_Control( 
		$wp_customize, 'kunty_navigation_heading',
		array(
			'label' => esc_html__( 'Header Navigation', 'kunty' ),
			'type' => 'heading',
			'section' => 'kunty_header_settings',
		)
	) 
);

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){

	// Header Style
	$wp_customize->add_setting( 'header_transparent',
		array(
			'default' => 0,
			'transport'			=> 'refresh',
			'sanitize_callback' => 'kunty_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'header_transparent',
		array(
			'label'         => esc_html__( 'Transparent Header?', 'kunty' ),
			'section'     => 'kunty_header_settings',
			'description' => esc_html__( 'Turn On/Off the switch to enable/disable transparent header.', 'kunty' )
		)
	) );

	//  Header BG
	$wp_customize->add_setting( 'header_bg_color', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'header_bg_color',
			array(
				'label'   => esc_html__( 'Header Background', 'kunty' ),
				'section'     => 'kunty_header_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if( 0 === get_theme_mod('header_transparent', 0) ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Sticky Header
	$wp_customize->add_setting( 'site_sticky_header',
		array(
			'default' => 0,
			//'transport'			=> 'postMessage',
			'sanitize_callback' => 'kunty_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'site_sticky_header',
		array(
			'label'       => esc_html__( 'Header Sticky?', 'kunty' ),
			'section'     => 'kunty_header_settings',
			'description' => esc_html__( 'Turn On/Off the switch to enable/disable header sticky.', 'kunty' ),
		)
	) );

	// Sticky Header BG
	$wp_customize->add_setting( 'sticky_header_bg_color', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'sticky_header_bg_color',
			array(
				'label'   => esc_html__( 'Sticky Header Background', 'kunty' ),
				'section'     => 'kunty_header_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if( 1===get_theme_mod('site_sticky_header') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	
}

// Container width.
$wp_customize->add_setting( 'header_container_width',
	array(
		'default' => 'container',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_text_sanitization'
	)
);
$wp_customize->add_control( 
	new Kunty_Text_Radio_Button_Custom_Control( 
		$wp_customize, 'header_container_width',
		array(
			'label'   => esc_html__( 'Container Width', 'kunty' ),
			'section' => 'kunty_header_settings',
			'choices' => array(
				'container'   => esc_html__('Contained','kunty'),
				'container-fluid' => esc_html__('Full Width','kunty'),
			),
		)
	) 
);

//Menu Position
$wp_customize->add_setting( 'header_nav_position',
	array(
		'default' => 'center',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_text_sanitization'
	)
);
$wp_customize->add_control( 
	new Kunty_Text_Radio_Button_Custom_Control( 
		$wp_customize, 'header_nav_position',
		array(
			'label'   => esc_html__( 'Menu Position', 'kunty' ),
			'section' => 'kunty_header_settings',
			'choices' => array(
				'left'   => esc_html__('Left','kunty'),
				'center' => esc_html__('Center','kunty'),
				'right' => esc_html__('Right','kunty'),
			),
		)
	) 
);


if( class_exists('WooCommerce') && th_fs()->can_use_premium_code() ){
	
	// Display Cart Icons
	$wp_customize->add_setting( 'header_cart_icon_display',
		array(
			'default' => 1,
			'sanitize_callback' => 'kunty_switch_sanitization',
			//'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'header_cart_icon_display',
		array(
			'label'       => esc_html__( 'Display cart icon?', 'kunty' ),
			'description' => esc_html__( 'Turn On/Off the switch to show/hide cart icon', 'kunty' ),
			'section'     => 'kunty_header_settings',
		)
	) );
}

// Display Button
$wp_customize->add_setting( 'header_btn_display',
	array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
 $wp_customize->add_control( 
	new Kunty_Toggle_Switch_Custom_control( 
		$wp_customize, 'header_btn_display',
		array(
			'label' => esc_html__( 'Display Button?', 'kunty' ),
			'description' => esc_html__( 'Turn On/Off the switch to show/hide header button', 'kunty' ),
			'section' => 'kunty_header_settings'
		)
	) 
);     
$wp_customize->add_setting( 'header_btn_text', 
	array(
		'default' => __('Get Started','kunty'),
		'transport' => 'postMessage',
		'sanitize_callback' => 'wp_kses_post',
	)
);
$wp_customize->add_control( 'header_btn_text', 
	array(
		'label' => esc_html__( 'Button Text', 'kunty' ),
		'section' => 'kunty_header_settings',
		'type' => 'text',
		'active_callback' => function(){
			 if(get_theme_mod('header_btn_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
); 
$wp_customize->selective_refresh->add_partial( 'header_btn_text', array(
	'selector'        => '.header-btn a.btn',
	'render_callback' =>  function(){
			return get_theme_mod( 'header_btn_text');
		},
) );

$wp_customize->add_setting( 'header_btn_link', 
	array(
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'header_btn_link', 
	array(
		'label' => esc_html__( 'Button link', 'kunty' ),
		'section' => 'kunty_header_settings',
		'type' => 'url',
		'active_callback' => function(){
			 if(get_theme_mod('header_btn_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);
$wp_customize->add_setting( 'header_btn_link_open',
array(
	'default' => 0,
	'sanitize_callback' => 'kunty_switch_sanitization'
)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control(
		$wp_customize, 'header_btn_link_open',
		array(
			'label' => esc_html__( 'Open button link in a new tab', 'kunty' ),
			'section' => 'kunty_header_settings',
			'active_callback' => function(){
				 if(get_theme_mod('header_btn_display')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	)
);
