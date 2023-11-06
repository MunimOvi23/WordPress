<?php
/**
* News Section Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
	$wp_customize->add_section( 'news_section_settings',
		array(
			'title'       => esc_html__( 'Latest News Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority' => 10,
		)
	);

		// Show/Hide Section
		$wp_customize->add_setting( 'news_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'news_section_enable',
			array(
				'label'   => esc_html__( 'Show/hide Latest News Section', 'kunty' ),
				'description'   => esc_html__( 'Turn On/Off the switch to show/hide latest news section on front page.', 'kunty' ),
				'section'       => 'news_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'headings_latest_news_section',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_latest_news_section',
				array(
					'label' => esc_html__( 'Section Heading', 'kunty' ),
					'type' => 'heading',
					'section' => 'news_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('news_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Sub Title
		$wp_customize->add_setting( 'news_section_subtitle', 
			array(
				'default'           => esc_html__('From Blog', 'kunty'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'news_section_subtitle', 
			array(
				'label'      => esc_html__('Sub Title', 'kunty'),
				'section'    => 'news_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('news_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'news_section_subtitle', array(
			'selector' => '.news-section .section-title .sub-title',
			'settings' => array( 'news_section_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'news_section_subtitle');
				},
		) );
		//Title
		$wp_customize->add_setting( 'news_section_title', 
			array(
				'default'           => esc_html__('Read Some of Our Latest Insights', 'kunty'),
				'sanitize_callback' => 'kunty_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'news_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'kunty' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'kunty' ),
				'section' => 'news_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('news_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			) 
		);
		$wp_customize->selective_refresh->add_partial( 'news_section_title', array(
			'selector' => '.news-section .section-title h2',
			'settings' => array( 'news_section_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'news_section_title');
				},
		) );
		// Description
		$wp_customize->add_setting( 'news_section_description', 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'news_section_description', 
			array(
				'label'      => esc_html__('Description', 'kunty'),
				'section'    => 'news_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('news_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'news_section_description', array(
			'selector' => '.news-section .section-title p',
			'settings' => array( 'news_section_description' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'news_section_description');
				},
		) );

		// Headings
		$wp_customize->add_setting( 'headings_latest_news',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_latest_news',
				array(
					'label' => esc_html__( 'Latest Posts', 'kunty' ),
					'type' => 'heading',
					'section' => 'news_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('news_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Latest Posts
		$wp_customize->add_setting( 'latest_post_content_type', 
	        array(
	            'default'           => 'latest-post',
	            'sanitize_callback' => 'kunty_sanitize_select'
	        ) 
	    );
	    $wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'latest_post_content_type',
				array(
					'label'		  => esc_html__( 'Post Type', 'kunty' ),
					'section'	  => 'news_section_settings',
					'type'        => 'select',
					'choices'	  => array(
						'latest-post'      => esc_html__('Latest Posts','kunty'),
						'select-category'  => esc_html__('Select Category','kunty'),
					),
					'active_callback' => function(){
						 $news_enable = get_theme_mod('news_section_enable');
						 if($news_enable){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);

		// Select Category
		$wp_customize->add_setting('latest_post_category_choice',
			array(
				'default'           => '',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control(
			new Kunty_Dropdown_Taxonomies_Control( $wp_customize, 
			'latest_post_category_choice',
			    array(
			        'label'       => esc_html__('Select Category', 'kunty'),
			        'description' => '',
			        'section'     => 'news_section_settings',
			        'type'        => 'dropdown-taxonomies',
			        'taxonomy'    => 'category',
			        'settings'	  => 'latest_post_category_choice',
					'active_callback' => function(){
						 $news_enable = get_theme_mod('news_section_enable');
						 $content_type = get_theme_mod('latest_post_content_type');
						 if($news_enable && $content_type == 'select-category' ){
							return true;
						 } else {
							 return false;
						 }
					},
		    	)
			)
		);
		
		// Total Post to show
        $wp_customize->add_setting( 'latest_posts_total_count', 
		 	array(
				'default' => 3,
				'capability' => 'edit_theme_options',
				'sanitize_callback' => 'kunty_sanitize_number_range',
			) 
		);
	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		$wp_customize->add_control( 'latest_posts_total_count', 
			array(
				'label'       => esc_html__( 'Total posts to Show','kunty' ),
				'description' => esc_html__( 'After changing default value please save and reload','kunty' ),
				'type'        => 'number',
				'section'     => 'news_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 99,
					'step'	=> 1,
				),
				'active_callback' => function(){
					 $news_enable = get_theme_mod('news_section_enable');
					 if($news_enable ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} else {
		$wp_customize->add_control( 'latest_posts_total_count', 
			array(
				'label'       => esc_html__( 'Total posts to Show','kunty' ),
				'description' => esc_html__( 'After changing default value please save and reload','kunty' ),
				'type'        => 'number',
				'section'     => 'news_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 3,
					'step'	=> 1,
				),
				'active_callback' => function(){
					 $news_enable = get_theme_mod('news_section_enable');
					 if($news_enable ){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}
		// Display Post Thumbnail.
		$wp_customize->add_setting( 'latest_post_thumb_display',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'latest_post_thumb_display',
			array(
				'label'		  => __( 'Display Post Thumbnails?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide post thumbnail', 'kunty' ),
				'section'     => 'news_section_settings',
				'active_callback' => function(){
					 if(get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Display Post Content
		$wp_customize->add_setting( 'latest_post_content_display',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'latest_post_content_display',
			array(
				'label'			=> __( 'Display Post Excerpts?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide post excerpts', 'kunty' ),
				'section'     => 'news_section_settings',
				'active_callback' => function(){
					 $news_enable = get_theme_mod('news_section_enable');
					 if($news_enable){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Display Category
		$wp_customize->add_setting( 'latest_post_cat_display',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'latest_post_cat_display',
			array(
				'label'			=> esc_html__( 'Display Category?', 'kunty' ),
				'section'     => 'news_section_settings',
				'description' => esc_html__( 'Turn On/Off the switch to show/hide post category', 'kunty' ),
				'active_callback' => function(){
					 if(1===get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Display Date
		$wp_customize->add_setting( 'latest_post_date_display',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'latest_post_date_display',
			array(
				'label'			=> esc_html__( 'Display Date', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide post date', 'kunty' ),
				'section'     => 'news_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Display Post Author
		$wp_customize->add_setting( 'latest_post_author_display',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'latest_post_author_display',
			array(
				'label'			=> esc_html__( 'Display Post Author', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide post author', 'kunty' ),
				'section'     => 'news_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Display Post Comment
		$wp_customize->add_setting( 'latest_post_comment_number_display',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization',
				'transport' => 'postMessage'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'latest_post_comment_number_display',
			array(
				'label'			=> esc_html__( 'Display Comment Number', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide post comment number', 'kunty' ),
				'section'     => 'news_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

	// Headings
	$wp_customize->add_setting( 'news_control_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'news_control_heading',
			array(
				'label' => esc_html__( 'Carousel Settings', 'kunty' ),
				'type' => 'heading',
				'section' => 'news_section_settings',
				'active_callback' => function(){
					 if(get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
if(!kunty_set_to_premium()) {
	// Enable Carousel
	$wp_customize->add_setting( 'fake_news_carousel_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'kunty_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'fake_news_carousel_enable',
		array(
			'label'       => esc_html__( 'Enable Carousel?', 'kunty' ),
			'description' => esc_html__( 'Turn On/Off the switch to enable/disable news carousel', 'kunty' ),
			'section'  => 'news_section_settings',
			'active_callback' => function(){
				 if(1 === get_theme_mod('news_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	) );
}

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){

		// Enable Carousel
		$wp_customize->add_setting( 'news_carousel_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'news_carousel_enable',
			array(
				'label'       => esc_html__( 'Enable Carousel?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable news carousel', 'kunty' ),
				'section'  => 'news_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Autoplay
		$wp_customize->add_setting( 'news_carousel_autoplay',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'news_carousel_autoplay',
			array(
				'label'       => esc_html__( 'Carousel Autoplay?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel autoplay', 'kunty' ),
				'section'  => 'news_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Slide Duration
		$wp_customize->add_setting( 'news_carousel_duration', 
			array(
				'sanitize_callback' => 'kunty_sanitize_number_range',
				'validate_callback' => 'kunty_validate_duration',
				'default'          	=> 5000,
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'news_carousel_duration', 
			array(
				'label'             => esc_html__( 'Carousel Duration', 'kunty' ),
				'description'       => esc_html__( 'Set the time in milisecond', 'kunty' ),
				'section'           => 'news_section_settings',
				'type'				=> 'number',
				'active_callback' => function(){
					 if(1 === get_theme_mod('news_section_enable')){
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
		$wp_customize->add_setting( 'news_carousel_loop',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'news_carousel_loop',
			array(
				'label'       => esc_html__( 'Carousel Loop?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel loop', 'kunty' ),
				'section'  => 'news_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Nav Disable
		$wp_customize->add_setting( 'news_carousel_nav',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'news_carousel_nav',
			array(
				'label'       => esc_html__( 'Show/hide Carousel Arrow?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel nav', 'kunty' ),
				'section'  => 'news_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Dots
		$wp_customize->add_setting( 'news_carousel_dots',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'news_carousel_dots',
			array(
				'label'       => esc_html__( 'Show/hide Carousel Dots?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel dots', 'kunty' ),
				'section'  => 'news_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );
	}
		// Headings
		$wp_customize->add_setting( 'heading_news_style',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'heading_news_style',
				array(
					'label' => esc_html__( 'Section Style', 'kunty' ),
					'type' => 'heading',
					'section' => 'news_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('news_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Background color
		$wp_customize->add_setting( 'news_section_bg', array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'news_section_bg',
				array(
					'label'   => esc_html__( 'Background Color', 'kunty' ),
					'section'     => 'news_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('news_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Top Padding
		$wp_customize->add_setting( 'news_section_pt',
		   array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'news_section_pt',
		    array(
				'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
				'section'           => 'news_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Bottom Padding
		$wp_customize->add_setting( 'news_section_pb',
		   array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'news_section_pb',
		    array(
				'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
				'section'           => 'news_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('news_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );
