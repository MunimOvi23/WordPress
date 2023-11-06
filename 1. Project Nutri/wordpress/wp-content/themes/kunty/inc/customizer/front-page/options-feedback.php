<?php 
	$wp_customize->add_section( 'feedback_section_settings',
		array(
			'title'       => esc_html__( 'Feedback Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority'    => 6,
			'divider'     => 'before',
		)
	);

		// Show/Hide Section
		$wp_customize->add_setting( 'feedback_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'feedback_section_enable',
			array(
			    'label'         => esc_html__( 'Show/hide Feedback Section', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide Feedback section on front page template', 'kunty' ),
				'section'  => 'feedback_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'feedback_section_headings',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'feedback_section_headings',
				array(
					'label' => esc_html__( 'Section Heading', 'kunty' ),
					'type' => 'heading',
					'section' => 'feedback_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('feedback_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Section subheading
		$wp_customize->add_setting( 'feedback_section_subtitle', 
			array(
				'default'           => esc_html__( 'Feedback', 'kunty' ),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			) 
		);
		$wp_customize->add_control( 'feedback_section_subtitle', 
			array(
				'label'      => esc_html__('Subtitle', 'kunty'),
				'section'    => 'feedback_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'feedback_section_subtitle', array(
			'selector' => '.feedback-area .section-title .sub-title',
			'settings' => array( 'feedback_section_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'feedback_section_subtitle');
				},
		) );
		
		//Section Heading
		$wp_customize->add_setting( 'feedback_section_title', 
			array(
				'default'           => esc_html__( 'Kind Words from Our Valuable Clients.', 'kunty' ),
				'sanitize_callback' => 'kunty_sanitize_html',
				'transport'         => 'postMessage',
			) 
		);
		$wp_customize->add_control( 'feedback_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'kunty' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'kunty' ),
				'section' => 'feedback_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);
		$wp_customize->selective_refresh->add_partial( 'feedback_section_title', array(
			'selector' => '.feedback-area .section-title  h2',
			'settings' => array( 'feedback_section_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'feedback_section_title');
				},
		) );
		
		// Section Description
		$wp_customize->add_setting( 'feedback_section_description', 
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage',
			) 
		);
		$wp_customize->add_control( 'feedback_section_description', 
			array(
				'label'      => esc_html__('Description', 'kunty'),
				'section'    => 'feedback_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'feedback_section_description', array(
			'selector' => '.feedback-area .section-title  p',
			'settings' => array( 'feedback_section_description' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'feedback_section_description');
				},
		) );
		
		// Headings--Feedbacks
		$wp_customize->add_setting( 'feedback_heading',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'feedback_heading',
				array(
					'label' => esc_html__( 'Feedbacks', 'kunty' ),
					'type' => 'heading',
					'section' => 'feedback_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('feedback_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Content Type
		$wp_customize->add_setting('feedback_content_type', 
			array(
			'default' 			=> 'feedback_page',
			'sanitize_callback' => 'kunty_sanitize_select',
			'transport'         => 'refresh',
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		$wp_customize->add_control('feedback_content_type', 
			array(
				'label'       => __('Post Type', 'kunty'),
				'section'     => 'feedback_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'feedback_page'	   => __('Page','kunty'),
						'feedback_post'	   => __('Post','kunty'),
						'review_custom'    => __('Custom Content','kunty'),

				),
				'active_callback' => function(){
					 if(get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Total Number
        $wp_customize->add_setting( 'feedback_total_count', 
		 	array(
				'default'           => 3,
				'sanitize_callback' => 'kunty_sanitize_number_range',
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'feedback_total_count', 
			array(
				'label'       => esc_html__( 'Total Items to Show','kunty' ),
				'description' => esc_html__( 'After changing default value please save and reload','kunty' ),
				'type'        => 'number',
				'section'     => 'feedback_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 100,
					'step'	=> 1,
				),
				'active_callback' => function(){
					$content_type = get_theme_mod('feedback_content_type');
					$sec_enable = get_theme_mod('feedback_section_enable');
					if($content_type=='feedback_post' || $content_type=='feedback_page' && 1=== $sec_enable){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
		
		
	} else {
		$wp_customize->add_control('feedback_content_type', 
			array(
				'label'       => __('Post Type', 'kunty'),
				'section'     => 'feedback_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'feedback_page'	   => __('Page','kunty'),
						'feedback_post'	   => __('Post','kunty'),
				),
				'active_callback' => function(){
					 if(get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Total Number
        $wp_customize->add_setting( 'feedback_total_count', 
		 	array(
				'default'           => 3,
				'sanitize_callback' => 'kunty_sanitize_number_range',
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'feedback_total_count', 
			array(
				'label'       => esc_html__( 'Total Items to Show','kunty' ),
				'description' => esc_html__( 'After changing default value please save and reload','kunty' ),
				'type'        => 'number',
				'section'     => 'feedback_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 6,
					'step'	=> 1,
				),
				'active_callback' => function(){
					$content_type = get_theme_mod('feedback_content_type');
					$sec_enable = get_theme_mod('feedback_section_enable');
					if($content_type=='feedback_post' || $content_type=='feedback_page' && 1=== $sec_enable){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	}



	$total_items = get_theme_mod( 'feedback_total_count', 3);
	for( $i=1; $i<=$total_items; $i++ ) {

			// Page
			$wp_customize->add_setting('feedback_page_'.$i.'', 
				array(	
					'sanitize_callback' => 'kunty_dropdown_pages',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('feedback_page_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Review #%1$s', 'kunty'), $i),
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Select a page for reviewer\'s #%1$s name, quote and picture', 'kunty'), $i),
					'section'     => 'feedback_section_settings',   		
					'type'        => 'dropdown-pages',
					'active_callback' => function(){
						$content_type = get_theme_mod('feedback_content_type');
						$sec_enable = get_theme_mod('feedback_section_enable');
						if($content_type=='feedback_page' && 1 === $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			);

			// Posts
			$wp_customize->add_setting('feedback_post_'.$i.'', 
				array(
					'sanitize_callback' => 'kunty_dropdown_pages',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('feedback_post_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Client #%1$s', 'kunty'), $i),
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Select a post for reviewer\'s #%1$s name, quote and picture', 'kunty'), $i),
					'section'     => 'feedback_section_settings',   		
					'type'        => 'select',
					'choices'	  => kunty_dropdown_posts(),
					'active_callback' => function(){
						$content_type = get_theme_mod('feedback_content_type');
						$sec_enable = get_theme_mod('feedback_section_enable');
						if($content_type=='feedback_post' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			);

			// Position
			$wp_customize->add_setting('reviewer_position_'.$i.'', 
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('reviewer_position_'.$i.'', 
				array(
					'label'       => '',
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Client #%1$s designation', 'kunty'), $i),
					'type'        => 'text',
					'section'     => 'feedback_section_settings',   		
					'active_callback' => function(){
						$content_type = get_theme_mod('feedback_content_type');
						$sec_enable = get_theme_mod('feedback_section_enable');
						if($content_type=='feedback_post' || $content_type=='feedback_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);
		}

		$wp_customize->add_setting(
			new Kunty_Control_Repeater_Setting( 
				$wp_customize, 
				'featured_reviewers', 
				array(
					'default' => '',
					'sanitize_callback' => array( 'Kunty_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
				) 
			) 
		);
		$wp_customize->add_control(
			new Kunty_Control_Repeater(
				$wp_customize,
				'featured_reviewers',
				array(
					'section'       => 'feedback_section_settings',
					'label'         => esc_html__( 'Reviewers', 'kunty' ),
					'fields'  => array(
						'name' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Name', 'kunty' ),
						),
						'position' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Position', 'kunty' ),
						),
						'quote' => array(
							'type'        => 'textarea',
							'label'       => esc_html__( 'Quote', 'kunty' ),
						),
						'image' => array(
							'type'    => 'image',
							'label'   => __( 'Upload Reviewer Image', 'kunty' ),
							'description'   => __( 'Best image size is 300x300', 'kunty' ),
						),
					),
					'row_label' => array(
						'type'  => 'field',
						'value' => esc_html__( 'Reviewer', 'kunty' ),
						'field' => 'name'
					),
					'active_callback' => function(){
						$content_type = get_theme_mod('feedback_content_type');
						$sec_enable = get_theme_mod('feedback_section_enable');
						if($content_type =='review_custom' && 1 === $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			)
		);


	// Headings
	$wp_customize->add_setting( 'feedback_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'feedback_style',
			array(
				'label' => esc_html__( 'Feedback Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'feedback_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Show/Hide Rating
	$wp_customize->add_setting( 'feedback_rating_display',
		array(
			'default' => 1,
			'sanitize_callback' => 'kunty_switch_sanitization',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'feedback_rating_display',
		array(
			'label'       => esc_html__( 'Show/hide Rating Stars', 'kunty' ),
			'section'     => 'feedback_section_settings',
			'description' => esc_html__( 'Turn On/Off the switch to show/hide rating stars', 'kunty' ),
			'active_callback' => function(){
				if(1 === get_theme_mod('feedback_section_enable') ){
					return true;
				} else {
					return false;
				}
			},
		)
	) );

	// Background color
	$wp_customize->add_setting( 'feedback_bg', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'feedback_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'kunty' ),
				'section'     => 'feedback_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Border color
	$wp_customize->add_setting( 'feedback_border_clr', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'feedback_border_clr',
			array(
				'label'   => esc_html__( 'Border Color', 'kunty' ),
				'section'     => 'feedback_section_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Hover Background color
	$wp_customize->add_setting( 'feedback_hover_bg', array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'feedback_hover_bg',
			array(
				'label'   => esc_html__( 'Hover Background Color', 'kunty' ),
				'section'     => 'feedback_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);


	// Border color
	$wp_customize->add_setting( 'feedback_text_clr', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'feedback_text_clr',
			array(
				'label'   => esc_html__( 'Text Color', 'kunty' ),
				'section'     => 'feedback_section_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	
	// Headings
	$wp_customize->add_setting( 'feedback_carousel_headings',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'feedback_carousel_headings',
			array(
				'label' => esc_html__( 'Carousel Settings', 'kunty' ),
				'type' => 'heading',
				'section' => 'feedback_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
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
	$wp_customize->add_setting( 'fake_carousel_feedback',
		array(
			'default' => 0,
			'sanitize_callback' => 'kunty_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'fake_carousel_feedback',
		array(
			'label'       => esc_html__( 'Enable Carousel?', 'kunty' ),
			'description' => esc_html__( 'Turn On/Off the switch to enable/disable review carousel', 'kunty' ),
			'section'  => 'feedback_section_settings',
			'active_callback' => function(){
				 if(1 === get_theme_mod('feedback_section_enable')){
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
		$wp_customize->add_setting( 'feedback_carousel_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_enable',
			array(
				'label'       => esc_html__( 'Enable Carousel?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable review carousel', 'kunty' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Autoplay
		$wp_customize->add_setting( 'feedback_carousel_autoplay',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_autoplay',
			array(
				'label'       => esc_html__( 'Carousel Autoplay?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel autoplay', 'kunty' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Slide Duration
		$wp_customize->add_setting( 'feedback_carousel_duration', 
			array(
				'sanitize_callback' => 'kunty_sanitize_number_range',
				'validate_callback' => 'kunty_validate_duration',
				'default'          	=> 5000,
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'feedback_carousel_duration', 
			array(
				'label'             => esc_html__( 'Carousel Duration', 'kunty' ),
				'description'       => esc_html__( 'Set the time in milisecond', 'kunty' ),
				'section'           => 'feedback_section_settings',
				'type'				=> 'number',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
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
		$wp_customize->add_setting( 'feedback_carousel_loop',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_loop',
			array(
				'label'       => esc_html__( 'Carousel Loop?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel loop', 'kunty' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Nav Disable
		$wp_customize->add_setting( 'feedback_carousel_nav',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_nav',
			array(
				'label'       => esc_html__( 'Show/hide Arrow?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel nav', 'kunty' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Dots
		$wp_customize->add_setting( 'feedback_carousel_dots',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'feedback_carousel_dots',
			array(
				'label'       => esc_html__( 'Show/hide Dots?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel dots', 'kunty' ),
				'section'  => 'feedback_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('feedback_section_enable')&& 1===get_theme_mod('feedback_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );
	}
	
	// Headings
	$wp_customize->add_setting( 'feedback_section_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'feedback_section_style',
			array(
				'label' => esc_html__( 'Section Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'feedback_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Background color
	$wp_customize->add_setting( 'feedback_section_bg', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'feedback_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'kunty' ),
				'section'     => 'feedback_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('feedback_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	
	// Top Padding
	$wp_customize->add_setting( 'feedback_section_pt',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'feedback_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
			'section'           => 'feedback_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('feedback_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'feedback_section_pb',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'feedback_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
			'section'           => 'feedback_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('feedback_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );
		