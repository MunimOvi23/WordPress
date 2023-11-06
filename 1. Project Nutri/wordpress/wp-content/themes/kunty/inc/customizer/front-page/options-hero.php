<?php 
/**
 * Hero Section
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
	$wp_customize->add_section( 'hero_section_settings',
		array(
			'title'       => esc_html__( 'Hero Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority' => 1,
			'divider' => 'before',
		)
	);

		// Hide/show
		$wp_customize->add_setting( 'hero_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'hero_section_enable',
			array(
			    'label'         => esc_html__( 'Show/Hide Hero Section', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide hero section on front page template', 'kunty' ),
				'section' => 'hero_section_settings',
			)
		) );

		// Content Type
		$wp_customize->add_setting('hero_content_type', 
			array(
			'default' 			=> 'hero_content_page',	
			'sanitize_callback' => 'kunty_sanitize_select'
			)
		);
		if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
			$wp_customize->add_control('hero_content_type', 
				array(
					'label'       => __('Content Type', 'kunty'),
					'section'     => 'hero_section_settings',   
					'type'        => 'select',
					'choices' => array(
						'hero_content_page'	   => __('Page','kunty'),
						'hero_content_post'	   => __('Post','kunty'),
						'hero_content_custom'	   => __('Custom Content','kunty'),
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('hero_section_enable')){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			);
		} else {
			$wp_customize->add_control('hero_content_type', 
				array(
					'label'       => __('Content Type', 'kunty'),
					'section'     => 'hero_section_settings',   
					'type'        => 'select',
					'choices' => array(
						'hero_content_page'	   => __('Page','kunty'),
						'hero_content_post'	   => __('Post','kunty'),
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('hero_section_enable')){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			);
		}


		// Headings Body Font Styles
		$wp_customize->add_setting( 'slides_heading_text',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control(
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'slides_heading_text',
				array(
					'label'       => __('Content', 'kunty'),
					'type' => 'heading',
					'section' => 'hero_section_settings',
					'active_callback' => function(){
						$status   = get_theme_mod('hero_section_enable');
						if(1 === $status ){
							return true;
						} else {
							 return false;
						}
					},
				)
			) 
		);

		//Subtitle Text
		$wp_customize->add_setting( 'hero_subtitle',
			array(
				'dafult'=> esc_html__('Creative Agency', 'kunty'),
				'sanitize_callback'=> 'sanitize_text_field', 
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'hero_subtitle', 
			array(
				'label' => esc_html__( 'Sub Title','kunty' ),
			    'type'    => 'text',
				'section' => 'hero_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('hero_section_enable');
					if(1 === $status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'hero_subtitle', array(
			'selector' => '.hero-content .sub-title',
			'settings' => array( 'hero_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'hero_subtitle');
				},
		) );

		// Page
		$wp_customize->add_setting('hero_pages', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'kunty_dropdown_pages'
			)
		);
		$wp_customize->add_control('hero_pages' ,
			array(
				'description' => __('Select a Page for title, description and image', 'kunty'),
				'section'     => 'hero_section_settings',   	
				'type'        => 'dropdown-pages',
				'active_callback' => function(){
					$status          = get_theme_mod('hero_section_enable');
					$content_type    = get_theme_mod('hero_content_type');
					if($content_type == 'hero_content_page' && 1 === $status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		// Posts
		$wp_customize->add_setting('hero_posts', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'kunty_dropdown_pages'
			)
		);
		$wp_customize->add_control('hero_posts', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => esc_html__( 'Select a Post for title, description and image','kunty' ),
				'section'     => 'hero_section_settings',   
				'type'        => 'select',
				'choices'	  => kunty_dropdown_posts(),
				'active_callback' => function(){
					$status = get_theme_mod('hero_section_enable');
					$content_type = get_theme_mod('hero_content_type');
					if($content_type == 'hero_content_post' && 1===$status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		//Cutsom Content- Title
		$wp_customize->add_setting( 'hero_title',
			array(
				'dafult'=> esc_html__('Advanced Analytics to Grow Your Business.', 'kunty'),
				'sanitize_callback'=> 'kunty_sanitize_html', 
			) 
		);
		$wp_customize->add_control( 'hero_title', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => esc_html__( 'Title','kunty' ),
			    'type'        => 'text',
				'section'     => 'hero_section_settings',
				'active_callback' => function(){
					$status       = get_theme_mod('hero_section_enable');
					$content_type = get_theme_mod('hero_content_type');
					if($content_type == 'hero_content_custom' && 1 === $status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Description
		$wp_customize->add_setting( 'hero_description',
			array(
				'dafult'           => esc_html__('We handle home, auto, life, and business insurance for you so you have the time to focus on more important things.', 'kunty'),
				'sanitize_callback'=> 'kunty_sanitize_html', 
			) 
		);
		$wp_customize->add_control( 'hero_description', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => esc_html__( 'Description','kunty' ),
			    'type'    => 'textarea',
				'section' => 'hero_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('hero_section_enable');
					$content_type = get_theme_mod('hero_content_type');
					if($content_type == 'hero_content_custom' && 1 === $status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

	}

		//Button Text
		$wp_customize->add_setting( 'hero_btn_text',
			array(
				'dafult'=> esc_html__('Get in Touch', 'kunty'),
				'sanitize_callback'=> 'sanitize_text_field', 
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'hero_btn_text', 
			array(
				'label' => esc_html__( 'Button Text','kunty' ),
			    'type'    => 'text',
				'section' => 'hero_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('hero_section_enable');
					if(1 === $status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'hero_btn_text', array(
			'selector' => '.hero-content .btn-kunty',
			'settings' => array( 'hero_btn_text' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'hero_btn_text');
				},
		) );

		//Button URL
		$wp_customize->add_setting( 'hero_btn_url',
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'esc_url_raw',
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'hero_btn_url', 
			array(
				'label'       => esc_html__('Button Link', 'kunty'),
				'description' => esc_html__( 'Start with http:// or https://', 'kunty' ),
			    'type'    => 'url',
				'section' => 'hero_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('hero_section_enable');
					if(1===$status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Button target
		$wp_customize->add_setting( 'hero_btn_target',
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'kunty_sanitize_checkbox', 
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'hero_btn_target', 
			array(
				'label' => esc_html__( 'Button open on new tab?','kunty' ),
			    'type'    => 'checkbox',
				'section' => 'hero_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('hero_section_enable');
					if(1===$status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Video URL
		$wp_customize->add_setting( 'hero_video_url',
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'esc_url_raw', 
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'hero_video_url', 
			array(
				'label' => esc_html__( 'Youtube video URL','kunty' ),
			    'type'    => 'url',
				'section' => 'hero_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('hero_section_enable');
					if(1===$status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		/** Background Image */
		$wp_customize->add_setting( 'hero_image',
			array(
				'default'           => get_template_directory_uri() . '/assets/img/hero.gif',
				'sanitize_callback' => 'kunty_sanitize_image',
			)
		);
		$wp_customize->add_control( 
			new WP_Customize_Image_Control( $wp_customize, 'hero_image',
				array(
				    'description' => esc_html__( 'Image','kunty' ),
					'section'   => 'hero_section_settings',
					'type'      => 'image',
					'active_callback' => function(){
						$status = get_theme_mod('hero_section_enable');
						$content_type = get_theme_mod('hero_content_type');
						if($content_type == 'hero_content_custom' && 1 === $status ){
							return true;
						} else {
							 return false;
						}
					},
				)
			)
		);
	}

	// Headings
	$wp_customize->add_setting( 'hero_style_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'hero_style_heading',
			array(
				'label' => esc_html__( 'Styles', 'kunty' ),
				'type' => 'heading',
				'section' => 'hero_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('hero_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);

	//Title font size
	$wp_customize->add_setting( 'hero_title_size',
		array(
			'default'           => '',
			'sanitize_callback' => 'kunty_sanitize_integer',
		    'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
		$wp_customize, 'hero_title_size', 
			array(
				'label'	    => esc_html__('Title font size (px)','kunty'),
				'type'      => 'range',
				'section'  => 'hero_section_settings',
				'input_attrs'    => array(
					'min' => 20,
					'max' => 100,
					'step' => 1,
					'suffix' => 'px',
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('hero_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		)
	);
	
	//Title line height
	$wp_customize->add_setting( 'hero_title_line_height',
		array(
			'default'           => '',
			'sanitize_callback' => 'kunty_sanitize_float',
		    'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
		$wp_customize, 'hero_title_line_height', 
			array(
				'label'	    => esc_html__('Title line height (px)','kunty'),
				'type'      => 'range',
				'section'  => 'hero_section_settings',
				'input_attrs'    => array(
					'min' => 1,
					'max' => 3,
					'step' => 0.1,
					'suffix' => 'px',
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('hero_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		)
	);

	// Title color
	$wp_customize->add_setting( 'hero_title_color', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'hero_title_color',
			array(
				'label'   => esc_html__( 'Title Text Color', 'kunty' ),
				'section'     => 'hero_section_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if(1 === get_theme_mod('hero_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	//Description font size
	$wp_customize->add_setting( 'hero_desc_size',
		array(
			'default'           => '',
			'sanitize_callback' => 'kunty_sanitize_integer',
		    'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
		$wp_customize, 'hero_desc_size', 
			array(
				'label'	    => esc_html__('Description font size (px)','kunty'),
				'type'      => 'range',
				'section'  => 'hero_section_settings',
				'input_attrs'    => array(
					'min' => 14,
					'max' => 100,
					'step' => 1,
					'suffix' => 'px',
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('hero_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		)
	);
	// Description color
	$wp_customize->add_setting( 'hero_desc_color', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'hero_desc_color',
			array(
				'label'   => esc_html__( 'Description Color', 'kunty' ),
				'section'     => 'hero_section_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if(1 === get_theme_mod('hero_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	
	//Container Width
	$wp_customize->add_setting( 'hero_content_width',
		array(
			'sanitize_callback' => 'kunty_sanitize_integer',
		    'transport' => 'postMessage',
			'default'           => 510,
		)
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
		$wp_customize, 'hero_content_width', 
			array(
				'label'	    => esc_html__('Content Width(px)','kunty'),
				'type'      => 'range',
				'section'  => 'hero_section_settings',
				'input_attrs'    => array(
					'min' => 0,
					'max' => 1600,
					'step' => 1,
					'suffix' => 'px',
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('hero_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		)
	);

	// BG
	$wp_customize->add_setting( 'hero_section_bg', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		  //'transport' => 'postMessage',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'hero_section_bg',
			array(
				'label'   => esc_html__( 'Background', 'kunty' ),
				'section'     => 'hero_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('hero_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
