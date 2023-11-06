<?php 
/**
* Pricing Section Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
	$wp_customize->add_section( 'pricing_section_settings',
		array(
			'title'       => esc_html__( 'Pricing Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority' => 8,
			'divider' => 'before',
		)
	);

	// Show/Hide Section
	$wp_customize->add_setting( 'pricing_section_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'kunty_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'pricing_section_enable',
		array(
			'label'         => esc_html__( 'Show/hide Pricing Section', 'kunty' ),
			'description'   => esc_html__( 'Turn On/Off the switch to show/hide pricing section on front page.', 'kunty' ),
			'section'  => 'pricing_section_settings',

		)
	) );

	// Message
	$wp_customize->add_setting( 'pricing__message',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( new Kunty_Misc_Control( $wp_customize, 'pricing__message',
		array(
			'type'        => 'custom_message',
			'section'     => 'pricing_section_settings',
			'description' => __('<h4 class="customizer-group-heading-message">Add Plans</h4><p class="customizer-group-heading-message">After activating license, go to WordPrsss admin dashboard>Themereps Helper>Pricing Plans. Add your plans under it.</p>', 'kunty' )
		)
	));

	// Headings
	$wp_customize->add_setting( 'headings_pricing_section',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_pricing_section',
			array(
				'label' => esc_html__( 'Section Heading', 'kunty' ),
				'type' => 'heading',
				'section' => 'pricing_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
		// Sub Title
		$wp_customize->add_setting( 'pricing_section_subtitle', 
			array(
				'default'           => esc_html__('Pricng Plan', 'kunty'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'pricing_section_subtitle', 
			array(
				'label'      => esc_html__('Sub Title', 'kunty'),
				'description'=> '',
				'section'    => 'pricing_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'pricing_section_subtitle', array(
			'selector' => '#pricing-section .section-title  .sub-title',
			'settings' => array( 'pricing_section_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'pricing_section_subtitle');
					},
		) );
		
		//Title
		$wp_customize->add_setting( 'pricing_section_title', 
			array(
				'default'           => esc_html__('Choose the best Package ', 'kunty'),
				'sanitize_callback' => 'kunty_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'pricing_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'kunty' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'kunty' ),
				'section' => 'pricing_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			) 
		);
		$wp_customize->selective_refresh->add_partial( 'pricing_section_title', array(
			'selector' => '#pricing-section .section-title  h2',
			'settings' => array( 'pricing_section_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'pricing_section_title');
					},
		) );
		
		
		// Description
		$wp_customize->add_setting( 'pricing_section_description', 
			array(
				'default'           => esc_html__('Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'kunty'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'pricing_section_description', 
			array(
				'label'      => esc_html__('Description', 'kunty'),
				'section'    => 'pricing_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'pricing_section_description', array(
			'selector' => '#pricing-section .section-title  p',
			'settings' => array( 'pricing_section_description' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'pricing_section_description');
				},
		) );

	// Headings--Plan Style
	$wp_customize->add_setting( 'heading_plan_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_plan_style',
			array(
				'label' => esc_html__( 'Active Plan Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'pricing_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	// Active Plan Background Color
	$wp_customize->add_setting( 'active_plan_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		  'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'active_plan_bg',
			array(
				'label'   => esc_html__( 'Active Plan', 'kunty' ),
				'description'   => esc_html__( 'Background Color', 'kunty' ),
				'section'     => 'pricing_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	
	// Active Plan Text Color
	$wp_customize->add_setting( 'active_plan_text_clc', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		  'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'active_plan_text_clc',
			array(
				'description'   => esc_html__( 'Text Color', 'kunty' ),
				'section'     => 'pricing_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	
	// Active Plan Btn Text Color
	$wp_customize->add_setting( 'active_plan_btn_text_clc', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		  'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'active_plan_btn_text_clc',
			array(
				'description'   => esc_html__( 'Button Text Color', 'kunty' ),
				'section'     => 'pricing_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	// Active Plan Button Border Color
	$wp_customize->add_setting( 'active_plan_btn_border_clc', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		  'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'active_plan_btn_border_clc',
			array(
				'description'   => esc_html__( 'Button Border Color', 'kunty' ),
				'section'     => 'pricing_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	
	// Headings
	$wp_customize->add_setting( 'heading_pricing_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_pricing_style',
			array(
				'label' => esc_html__( 'Section Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'pricing_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Background color
	$wp_customize->add_setting( 'pricing_section_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		  'transport'=> 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'pricing_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'kunty' ),
				'section'     => 'pricing_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('pricing_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'pricing_section_pt',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'pricing_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
			'section'           => 'pricing_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('pricing_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'pricing_section_pb',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'pricing_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
			'section'           => 'pricing_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('pricing_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );



