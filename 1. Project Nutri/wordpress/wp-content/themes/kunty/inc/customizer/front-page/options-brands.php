<?php 
/**
 * Brands Section
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
	$wp_customize->add_section( 'brands_section_settings',
		array(
			'title'       => esc_html__( 'Brands Logo Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority' => 9,
		)
	);

	// Show/Hide Section
	$wp_customize->add_setting( 'brands_section_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'kunty_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'brands_section_enable',
		array(
			'label'         => esc_html__( 'Show/hide Brands Section', 'kunty' ),
			'description'   => esc_html__( 'Turn On/Off the switch to show/hide brands logo section on front page.', 'kunty' ),
			'section'  => 'brands_section_settings',

		)
	) );

	// Headings
	$wp_customize->add_setting( 'headings_brands_section',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_brands_section',
			array(
				'label' => esc_html__( 'Section Headings', 'kunty' ),
				'type' => 'heading',
				'section' => 'brands_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

		// Title
		$wp_customize->add_setting( 'brands_section_title', 
			array(
				'default'           => __('Trusted by 150+ companies', 'kunty'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'brands_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'kunty' ),
				'description'=> '',
				'section'    => 'brands_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1===get_theme_mod('brands_section_enable')){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'brands_section_title', array(
			'selector' => '#brands-section .section-title  h6',
			'settings' => array( 'brands_section_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'brands_section_title');
					},
		) );
	// Headings
	$wp_customize->add_setting( 'headings_brands_logos',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_brands_logos',
			array(
				'label' => esc_html__( 'Brand Logos', 'kunty' ),
				'type' => 'heading',
				'section' => 'brands_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
 
		// Brand Logos
		$wp_customize->add_setting( 
			new Kunty_Control_Repeater_Setting( 
				$wp_customize, 
				'kunty_brands', 
				array(
					'default' => '',
					'sanitize_callback' => array( 'Kunty_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
				) 
			) 
		);
		$wp_customize->add_control(
			new Kunty_Control_Repeater(
				$wp_customize,
				'kunty_brands',
				array(
					'section'       => 'brands_section_settings',
					'label'         => esc_html__( 'Logos', 'kunty' ),
					'fields'  => array(
						'title' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Title', 'kunty' ),
						),
						'image' => array(
							'type'    => 'image',
							'label'   => __( 'Upload Logo', 'kunty' ),
						),
						'link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Link', 'kunty' ),
							'description' => esc_html__( 'Example: https://yoursite.com', 'kunty' ),
						),
						'checkbox' => array(
							'type'        => 'checkbox',
							'label'       => esc_html__( 'Open link in new tab', 'kunty' ),
						),
					),
					'row_label' => array(
						'type'  => 'field',
						'value' => esc_html__( 'logo', 'kunty' ),
						'field' => 'title'
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('brands_section_enable')){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);


	
	// Headings
	$wp_customize->add_setting( 'brands_carousel_headings',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'brands_carousel_headings',
			array(
				'label' => esc_html__( 'Carousel Controls', 'kunty' ),
				'type' => 'heading',
				'section' => 'brands_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

		// Enable Carousel
		$wp_customize->add_setting( 'brands_carousel_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_enable',
			array(
				'label'       => esc_html__( 'Enable Carousel?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel', 'kunty' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );
		
		// Carousel Autoplay
		$wp_customize->add_setting( 'brands_carousel_autoplay',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_autoplay',
			array(
				'label'       => esc_html__( 'Carousel Autoplay?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel autoplay', 'kunty' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable') && 1 === get_theme_mod('brands_carousel_enable') ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Slide Duration
		$wp_customize->add_setting( 'brands_carousel_duration', 
			array(
				'sanitize_callback' => 'kunty_sanitize_number_range',
				'validate_callback' => 'kunty_validate_duration',
				'default'          	=> 3000,
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'brands_carousel_duration', 
			array(
				'label'             => esc_html__( 'Carousel Duration', 'kunty' ),
				'description'       => esc_html__( 'Set the time in milisecond', 'kunty' ),
				'section'           => 'brands_section_settings',
				'type'				=> 'number',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable') && 1 === get_theme_mod('brands_carousel_enable') ){
						return true;
					 } else {
						 return false;
					 }
				},
				'input_attrs'		=> array(
					'min'	=> 1000,
					'max'	=> 20000,
					'step'	=> 500,
					),
			) 
		);

		// Carousel Loop
		$wp_customize->add_setting( 'brands_carousel_loop',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_loop',
			array(
				'label'       => esc_html__( 'Carousel Loop?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel loop', 'kunty' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable') && 1 === get_theme_mod('brands_carousel_enable') ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Nav Disable
		$wp_customize->add_setting( 'brands_carousel_nav',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_nav',
			array(
				'label'       => esc_html__( 'Show/hide Carousel Arrow?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel nav', 'kunty' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable') && 1 === get_theme_mod('brands_carousel_enable') ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Dots
		$wp_customize->add_setting( 'brands_carousel_dots',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'brands_carousel_dots',
			array(
				'label'       => esc_html__( 'Show/hide Carousel Dots?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel dots', 'kunty' ),
				'section'  => 'brands_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('brands_section_enable') && 1 === get_theme_mod('brands_carousel_enable') ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

// Headings
	$wp_customize->add_setting( 'heading_brands_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_brands_style',
			array(
				'label' => esc_html__( 'Section Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'brands_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Background color
	$wp_customize->add_setting( 'brands_section_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		  'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'brands_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'kunty' ),
				'section'     => 'brands_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('brands_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'brands_section_pt',
	   array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_sanitize_integer',
		  'transport' => 'postMessage'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'brands_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
			'section'           => 'brands_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('brands_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'brands_section_pb',
	   array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_sanitize_integer',
		  'transport' => 'postMessage'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'brands_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
			'section'           => 'brands_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('brands_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );