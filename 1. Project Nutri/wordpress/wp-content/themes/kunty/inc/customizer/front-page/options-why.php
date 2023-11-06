<?php 
/**
* Call to Action Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/

	$wp_customize->add_section( 'about_section_settings',
		array(
			'title'       => esc_html__( 'Why Choose Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority' => 2,
			'divider' => 'before',
		)
	);

		// Show/Hide Section
		$wp_customize->add_setting( 'about_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'about_section_enable',
			array(
				'label'         => esc_html__( 'Show/hide Why Choose Section', 'kunty' ),
				'description'   => esc_html__( 'Turn On/Off the switch to show/hide why choose section on front page.', 'kunty' ),
				'section'  => 'about_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'headings_about_section',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_about_section',
				array(
					'label' => esc_html__( 'Content', 'kunty' ),
					'type' => 'heading',
					'section' => 'about_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('about_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Sub Title
		$wp_customize->add_setting( 'about_section_subtitle',
			array(
				'sanitize_callback' => 'kunty_sanitize_html',
				'default'           => __( 'Why Choose Us?', 'kunty' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_section_subtitle',
			array(
				'label'       => esc_html__( 'Subtitle', 'kunty' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);
		$wp_customize->selective_refresh->add_partial( 'about_section_subtitle', array(
			'selector' => '.intro-heading > h6',
			'settings' => array( 'about_section_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'about_section_subtitle');
				},
		) );
		// Title
		$wp_customize->add_setting( 'about_section_title',
			array(
				'sanitize_callback' => 'kunty_sanitize_html',
				'default'           => __( 'We have a experience of marketing.', 'kunty' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_section_title',
			array(
				'label'       => esc_html__( 'Title', 'kunty' ),
				'description' => '',
				'type'    => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},

			)
		);
		$wp_customize->selective_refresh->add_partial( 'about_section_title', array(
			'selector' => '.intro-heading > h2',
			'settings' => array( 'about_section_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'about_section_title');
				},
		) );
		
		// Description
		$wp_customize->add_setting( 'about_section_description',
			array(
				'sanitize_callback' => 'sanitize_textarea_field',
				'default'           => __( 'We are a team of marketing, experienced developers who are passionate about their work. Years of cooperation with both corporations and startups, helped us to build.', 'kunty' ),
				'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_section_description',
			array(
				'label'       => esc_html__( 'Description', 'kunty' ),
				'description' => '',
				'type'        => 'textarea',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'about_section_description', array(
			'selector' => '.intro-heading > p',
			'settings' => array( 'about_section_description' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'about_section_description');
				},
		) );

		// Counter 1 Number
		$wp_customize->add_setting( 'about_counter_1_num',
			array(
				'sanitize_callback' => 'absint',
				'default'           => __( '5', 'kunty' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_1_num',
			array(
				'label'       => esc_html__( 'Counter 1 Number', 'kunty' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		$wp_customize->add_setting( 'about_counter_1_suff',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => __( 'K+', 'kunty' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_1_suff',
			array(
				'label'       => esc_html__( 'Counter 1 Suffix', 'kunty' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		$wp_customize->add_setting( 'about_counter_1_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => __( 'Projects done', 'kunty' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_1_title',
			array(
				'label'       => esc_html__( 'Counter 1 Title', 'kunty' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);

		$wp_customize->add_setting( 'about_counter_2_num',
			array(
				'sanitize_callback' => 'absint',
				'default'           => __( '99', 'kunty' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_2_num',
			array(
				'label'       => esc_html__( 'Counter 2 Number', 'kunty' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		
		$wp_customize->add_setting( 'about_counter_2_suff',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => __( '%', 'kunty' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_2_suff',
			array(
				'label'       => esc_html__( 'Counter 2 Suffix', 'kunty' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);
		
		$wp_customize->add_setting( 'about_counter_2_title',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => __( 'Satisfied customer', 'kunty' ),
				//'transport'			=> 'postMessage'
			)
		);
		$wp_customize->add_control( 'about_counter_2_title',
			array(
				'label'       => esc_html__( 'Counter 2 Title', 'kunty' ),
				'type'        => 'text',
				'section'     => 'about_section_settings',
				'active_callback' => function(){
					if( get_theme_mod( 'about_section_enable' ) ) {
					return true;
					} else {
					return false;
					}
				},
			)
		);

		// Image 
		$wp_customize->add_setting( 'about_section_image',
			array(
				'default'           => get_template_directory_uri() . '/assets/img/intro/intro.png',
				'sanitize_callback' => 'kunty_sanitize_image',
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 'about_section_image',
				array(
					'label'         => esc_html__( 'Upload Image', 'kunty' ),
					'section'       => 'about_section_settings',
					'type'          => 'image',
					'active_callback' => function(){
						if( get_theme_mod( 'about_section_enable' ) ) {
						return true;
						} else {
						return false;
						}
					},
				)
			)
		);

		// Headings
		$wp_customize->add_setting( 'headings_about_style',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_about_style',
				array(
					'label' => esc_html__( 'Section Style', 'kunty' ),
					'type' => 'heading',
					'section' => 'about_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('about_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Background
		$wp_customize->add_setting( 'about_section_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			  //'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'about_section_bg',
				array(
					'label'   => esc_html__( 'Background', 'kunty' ),
					'section'     => 'about_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('about_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Top Padding
		$wp_customize->add_setting( 'about_section_pt',
		   array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'about_section_pt',
		   array(
				'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
				'section'           => 'about_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('about_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Bottom Padding
		$wp_customize->add_setting( 'about_section_pb',
		   array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'about_section_pb',
		   array(
				'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
				'section'           => 'about_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('about_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );
