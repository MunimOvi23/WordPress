<?php
/*  Typography Stettings
---------------------------------------------------------------------- */

	$wp_customize->add_section( 'typography_settings',
		array(
			'title'       => esc_html__( 'Typography Settings', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_theme_options',
			'priority'    => 3,
		)
	);

	// Navigation Typography
	$wp_customize->add_setting( 'kunty_nav_font_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'kunty_nav_font_heading',
			array(
				'label' => esc_html__( 'Navigation Font Styles', 'kunty' ),
				'type' => 'heading',
				'section' => 'typography_settings',
			)
		) 
	);

	// Nav Font
	$wp_customize->add_setting( 'nav_font_family',
		array(
			  'default' => json_encode(
				 array(
					'font' => 'Poppins',
					'boldweight' => '500',
					'category' => 'sans-serif'
				 )
			  ),
			'sanitize_callback' => 'kunty_google_font_sanitization'
		)
	);
	$wp_customize->add_control(
		new Kunty_Google_Font_Select_Custom_Control( 
			$wp_customize, 'nav_font_family',
			array(
				'label' => esc_html__( 'Font Family' , 'kunty'),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'alpha',
				),
			)
		) 
	);

	// Nav Font Size
	$wp_customize->add_setting( 'nav_font_size',
		array(
			'sanitize_callback' => 'kunty_sanitize_integer',
			'default'           => 15,
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
		$wp_customize, 'nav_font_size', 
			array(
				'label'	    => esc_html__('Font Size(px)','kunty'),
				'type'          => 'range',
				'section'       => 'typography_settings',
				'input_attrs'    => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'suffix' => 'px', //optional suffix
				),
			)
		)
	);

	// Subnav Font
	$wp_customize->add_setting( 'subnav_font_family',
		array(
			  'default' => json_encode(
				 array(
					'font' => 'Poppins',
					'boldweight' => '500',
					'category' => 'sans-serif'
				 )
			  ),
			'sanitize_callback' => 'kunty_google_font_sanitization'
		)
	);
	$wp_customize->add_control(
		new Kunty_Google_Font_Select_Custom_Control( 
			$wp_customize, 'subnav_font_family',
			array(
				'label' => esc_html__( 'Submenu Font Family' , 'kunty'),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'alpha',
				),
			)
		) 
	);

	// Nav Font Size
	$wp_customize->add_setting( 'subnav_font_size',
		array(
			'sanitize_callback' => 'kunty_sanitize_integer',
			'default'           => '',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
		$wp_customize, 'subnav_font_size', 
			array(
				'label'	    => esc_html__('Submenu Font Size(px)','kunty'),
				'type'          => 'range',
				'section'       => 'typography_settings',
				'input_attrs'    => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'suffix' => 'px', //optional suffix
				),
			)
		)
	);

	// Body Typography
	$wp_customize->add_setting( 'kunty_body_font_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'kunty_body_font_heading',
			array(
				'label' => esc_html__( 'Body Typography', 'kunty' ),
				'type' => 'heading',
				'section' => 'typography_settings',
			)
		) 
	);

	//Body Font
	$wp_customize->add_setting( 'body_font_family',
			array(
			 'default' => json_encode(
				 array(
					'font' => 'Poppins',
					'boldweight' => '300',
					'category' => 'sans-serif'
				 )
			  ),
			'sanitize_callback' => 'kunty_google_font_sanitization',
			'transport' => 'refresh',
		)
	);
	$wp_customize->add_control( new Kunty_Google_Font_Select_Custom_Control( $wp_customize, 'body_font_family',
			array(
				'label'    => esc_html__( 'Body Font Family','kunty'),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'alpha',
				),
			)
		) 
	);

	// Body Font Size
	$wp_customize->add_setting( 'body_font_size',
		array(
			'sanitize_callback' => 'kunty_sanitize_integer',
			'default'           => 16,
		)
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
		$wp_customize, 'body_font_size', 
			array(
				'label'	    => esc_html__('Font Size(px)','kunty'),
				'type'          => 'range',
				'section'       => 'typography_settings',
				'input_attrs'    => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
					'suffix' => 'px', //optional suffix
				),
			)
		)
	);

	// Body text line height
	$wp_customize->add_setting( 'body_line_height',
		array(
			'default' => 1.7,
			'transport' => 'refresh',
			'sanitize_callback' => 'kunty_floatval_sanitization'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Slider_Custom_Control( 
			$wp_customize, 'body_line_height',
			array(
				'label' => esc_html__( 'Line Height', 'kunty' ),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 10,
					'step' => 0.1,
				),
			)
		) 
	);




	// Headings Typography
	$wp_customize->add_setting( 'heading_font_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_font_heading',
			array(
				'label' => esc_html__( 'Headings Typography (H1-H6)', 'kunty' ),
				'type' => 'heading',
				'section' => 'typography_settings',
			)
		) 
	);

	// Heading Font
	$wp_customize->add_setting( 'heading_font_family',
		array(
			  'default' => json_encode(
				 array(
					'font' => 'Quicksand',
					'boldweight' => '700',
					'category' => 'sans-serif'
				 )
			  ),
			'sanitize_callback' => 'kunty_google_font_sanitization'
		)
	);
	$wp_customize->add_control(
		new Kunty_Google_Font_Select_Custom_Control( 
			$wp_customize, 'heading_font_family',
			array(
				'label' => esc_html__( 'Font Family' , 'kunty'),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'font_count' => 'all',
					'orderby' => 'alpha',
				),
			)
		) 
	);

	// Body text line height
	$wp_customize->add_setting( 'headings_line_height',
		array(
			'default' => 1.5,
			'transport' => 'refresh',
			'sanitize_callback' => 'kunty_floatval_sanitization'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Slider_Custom_Control( 
			$wp_customize, 'headings_line_height',
			array(
				'label' => esc_html__( 'Line Height', 'kunty' ),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 10,
					'step' => 0.1,
				),
			)
		) 
	);


	// H1 Font Size
	$wp_customize->add_setting( 'h1_font_size',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Slider_Custom_Control( 
			$wp_customize, 'h1_font_size',
			array(
				'label' => esc_html__( 'H1 Font Size(px)', 'kunty' ),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			)
		) 
	);

	// H2 Font Size
	$wp_customize->add_setting( 'h2_font_size',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Slider_Custom_Control( 
			$wp_customize, 'h2_font_size',
			array(
				'label' => esc_html__( 'H2 Font Size(px)', 'kunty' ),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			)
		) 
	);

	// H3 Font Size
	$wp_customize->add_setting( 'h3_font_size',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control(
		new Kunty_Slider_Custom_Control(
			$wp_customize, 'h3_font_size',
			array(
				'label' => esc_html__( 'H3 Font Size(px)', 'kunty' ),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			)
		) 
	);

	// H4 Font Size
	$wp_customize->add_setting( 'h4_font_size',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Slider_Custom_Control( 
			$wp_customize, 'h4_font_size',
			array(
				'label' => esc_html__( 'H4 Font Size(px)', 'kunty' ),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			)
		) 
	);

	// H5 Font Size
	$wp_customize->add_setting( 'h5_font_size',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control(
		new Kunty_Slider_Custom_Control( 
			$wp_customize, 'h5_font_size',
			array(
				'label' => esc_html__( 'H5 Font Size(px)', 'kunty' ),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			)
		) 
	);

	// H6 Font Size
	$wp_customize->add_setting( 'h6_font_size',
		array(
			'default' => '',
			'transport' => 'refresh',
			'sanitize_callback' => 'absint'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Slider_Custom_Control( 
			$wp_customize, 'h6_font_size',
			array(
				'label' => esc_html__( 'H6 Font Size(px)', 'kunty' ),
				'section' => 'typography_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			)
		) 
	);