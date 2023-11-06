<?php 
/**
* Call to Action Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
$wp_customize->add_section( 'cta_section_settings',
	array(
		'title'       => esc_html__( 'Call to Action', 'kunty' ),
		'description' => '',
		'panel'       => 'kunty_frontpage_settings',
		'priority' => 10,
		'divider' => 'before',
	)
);

	// Show/Hide Section
	$wp_customize->add_setting( 'cta_section_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'kunty_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'cta_section_enable',
		array(
			'label'         => esc_html__( 'Show/hide CTA Section', 'kunty' ),
			'description'   => esc_html__( 'Turn On/Off the switch to show/hide Call to Action section on front page.', 'kunty' ),
			'section'  => 'cta_section_settings',

		)
	) );

		// Headings
		$wp_customize->add_setting( 'headings_cta_section',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_cta_section',
				array(
					'label' => esc_html__( 'Content', 'kunty' ),
					'type' => 'heading',
					'section' => 'cta_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// CTA Title
		$wp_customize->add_setting( 'cta_title',
			array(
				'sanitize_callback' => 'kunty_sanitize_html',
				'default'           => __( 'We are trusted by over 5000+ clients. Join them by using our services and grow your business.', 'kunty' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'cta_title',
			array(
				'label'       => esc_html__( 'Title', 'kunty' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'cta_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);
		$wp_customize->selective_refresh->add_partial( 'cta_title', array(
			'selector' => '#cta-section .cta-inner h2',
			'settings' => array( 'cta_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'cta_title');
					},
		) );

		// CTA Subtitle
		$wp_customize->add_setting( 'cta_subtitle',
			array(
				'sanitize_callback' => 'kunty_sanitize_html',
				'default'           => __( 'Join Our Community', 'kunty' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'cta_subtitle',
			array(
				'label'       => esc_html__( 'Subtitle', 'kunty' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'cta_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);
		$wp_customize->selective_refresh->add_partial( 'cta_subtitle', array(
			'selector' => '#cta-section .cta-inner h6',
			'settings' => array( 'cta_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'cta_subtitle');
				},
		) );

		// CTA Description
		$wp_customize->add_setting( 'cta_description',
			array(
				'sanitize_callback' => 'sanitize_textarea_field',
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'cta_description',
			array(
				'label'       => esc_html__( 'Description', 'kunty' ),
				'description' => '',
				'type'        => 'textarea',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'cta_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'cta_description', array(
			'selector' => '#cta-section .cta-inner p',
			'settings' => array( 'cta_description' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'cta_description');
				},
		) );

		// Button Text
		$wp_customize->add_setting('cta_btn_text',
			 array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => esc_html__( 'Join Us', 'kunty' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control('cta_btn_text',
			 array(
				'label'     => esc_html__('Button Text', 'kunty'),
				'type'    => 'text',
				'section'   => 'cta_section_settings',
			    'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable') ){
						return true;
					} else {
						return false;
					}
			    },
			)
		);

		// Button URL
		$wp_customize->add_setting('cta_btn_url', 
			array(
				'sanitize_callback' => 'esc_url_raw',
				'default'           => '',
				'transport'         => 'postMessage',
			)
		);
		$wp_customize->add_control('cta_btn_url',
			array(
				'label'       => esc_html__('Button URL', 'kunty'),
				'description' => esc_html__( 'Start with http:// or https://', 'kunty' ),
				'type'        => 'url',
				'section'     => 'cta_section_settings',
				'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable')){
						return true;
					} else {
						return false;
					}
				},
			)
		);

		// Button Target
		$wp_customize->add_setting( 'cta_btn_target',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'cta_btn_target',
			array(
				'label'       => esc_html__( 'Button link open on new tab?', 'kunty' ),
				'section'  => 'cta_section_settings',
				'active_callback' => function(){
					if(1===get_theme_mod('cta_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) );

		// Headings
		$wp_customize->add_setting( 'heading_cta_style',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'heading_cta_style',
				array(
					'label' => esc_html__( 'Style', 'kunty' ),
					'type' => 'heading',
					'section' => 'cta_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Title color
		$wp_customize->add_setting( 'cta_title_color', array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'cta_title_color',
				array(
					'label'   => esc_html__( 'Title Text Color', 'kunty' ),
					'section'     => 'cta_section_settings',
					'show_opacity' => true,
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);
		// Subtitle color
		$wp_customize->add_setting( 'cta_subtitle_color', array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'cta_subtitle_color',
				array(
					'label'   => esc_html__( 'Subtitle Text Color', 'kunty' ),
					'section'     => 'cta_section_settings',
					'show_opacity' => true,
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);
		// Description color
		$wp_customize->add_setting( 'cta_desc_color', array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'cta_desc_color',
				array(
					'label'   => esc_html__( 'Description Color', 'kunty' ),
					'section'     => 'cta_section_settings',
					'show_opacity' => true,
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);


		// Gradient BG 1
		$wp_customize->add_setting( 'cta_section_gradient_1', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'cta_section_gradient_1',
				array(
					'label'   => esc_html__( 'Gradient Background 1', 'kunty' ),
					'section'     => 'cta_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Gradient BG 2
		$wp_customize->add_setting( 'cta_section_gradient_2', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'cta_section_gradient_2',
				array(
					'label'   => esc_html__( 'Gradient Background 2', 'kunty' ),
					'section'     => 'cta_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('cta_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Top Padding
		$wp_customize->add_setting( 'cta_section_pt',
		   array(
			  'default' => '',
			  //'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'cta_section_pt',
		   array(
				'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
				'section'           => 'cta_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('cta_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Bottom Padding
		$wp_customize->add_setting( 'cta_section_pb',
		   array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'cta_section_pb',
		   array(
				'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
				'section'           => 'cta_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('cta_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );