<?php 
/**
* Portfolios Section Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/

	$wp_customize->add_section( 'portfolio_section_settings',
		array(
			'title'       => esc_html__( 'Portfolio Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority' => 4,
			'divider' => 'before',
		)
	);

		// Show/Hide Section
		$wp_customize->add_setting( 'portfolio_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'portfolio_section_enable',
			array(
				'label'         => esc_html__( 'Show/hide Portfolio Section', 'kunty' ),
				'description'   => esc_html__( 'Turn On/Off the switch to show/hide portfolio section on front page.', 'kunty' ),
				'section'  => 'portfolio_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'headings_portfolio_section',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_portfolio_section',
				array(
					'label' => esc_html__( 'Section Heading', 'kunty' ),
					'type' => 'heading',
					'section' => 'portfolio_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('portfolio_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Sub Title
		$wp_customize->add_setting( 'portfolio_section_subtitle', 
			array(
				'default'           => esc_html__('Our Projects', 'kunty'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'portfolio_section_subtitle', 
			array(
				'label'      => esc_html__('Sub Title', 'kunty'),
				'description'=> '',
				'section'    => 'portfolio_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'portfolio_section_subtitle', array(
			'selector' => '#portfolio-section .section-title  .sub-title',
			'settings' => array( 'portfolio_section_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'portfolio_section_subtitle');
					},
		) );
		
		//Title
		$wp_customize->add_setting( 'portfolio_section_title', 
			array(
				'default'           => esc_html__('Let\'s Check Our Latest Work.', 'kunty'),
				'sanitize_callback' => 'kunty_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'portfolio_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'kunty' ),
			   // 'description'   => esc_html__( '', 'kunty' ),
				'section' => 'portfolio_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			) 
		);
		$wp_customize->selective_refresh->add_partial( 'portfolio_section_title', array(
			'selector' => '#portfolio-section .section-title  h2',
			'settings' => array( 'portfolio_section_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'portfolio_section_title');
					},
		) );
		// Description
		$wp_customize->add_setting( 'portfolio_section_description', 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'portfolio_section_description', 
			array(
				'label'      => esc_html__('Description', 'kunty'),
				'section'    => 'portfolio_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'portfolio_section_description', array(
			'selector' => '#portfolio-section .section-title  p',
			'settings' => array( 'portfolio_section_description' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'portfolio_section_description');
				},
		) );
		// Headings
		$wp_customize->add_setting( 'headings_portfolio',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'headings_portfolio',
				array(
					'label' => esc_html__( 'Portfolios', 'kunty' ),
					'type' => 'heading',
					'section' => 'portfolio_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('portfolio_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Content Type
		$wp_customize->add_setting('portfolio_content_type', 
			array(
			'default' 			=> 'portfolio_page',
			'sanitize_callback' => 'kunty_sanitize_select'
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code()){

		$wp_customize->add_control('portfolio_content_type', 
			array(
				'label'       => __('Post Type', 'kunty'),
				'section'     => 'portfolio_section_settings',   	
				'type'        => 'select',
				'choices' => array(
					'portfolio_post'	   => __('Post','kunty'),
					'portfolio_page'	   => __('Page','kunty'),
					'portfolio_custom'  => __('Custom Content','kunty'),
				),
				'active_callback' => function(){
					 if( 1 === get_theme_mod('portfolio_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} else { 
		$wp_customize->add_control('portfolio_content_type', 
			array(
				'label'       => __('Post Type', 'kunty'),
				'section'     => 'portfolio_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'portfolio_post'	   => __('Post','kunty'),
						'portfolio_page'	   => __('Page','kunty'),
				),
				'active_callback' => function(){
					 if( 1 === get_theme_mod('portfolio_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}
		
		// Total Number
		$wp_customize->add_setting( 'portfolio_total_items_show',
			array(
				'sanitize_callback' => 'kunty_sanitize_integer',
				'default'           => 6,
				'transport' => 'refresh',
			)
		);
		
	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code()){
		$wp_customize->add_control( new Kunty_Slider_Custom_Control(
			$wp_customize, 'portfolio_total_items_show', 
				array(
					'label'       => esc_html__( 'Total Items to Show','kunty' ),
					'description' => esc_html__( 'After changing default value please save and reload','kunty' ),
					'type'          => 'range',
					'section'       => 'portfolio_section_settings',
					'input_attrs'    => array(
						'min' => 0,
						'max' => 100,
						'step' => 1,
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('portfolio_section_enable') && get_theme_mod('portfolio_content_type') != 'portfolio_custom'){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);
	} else { 
		$wp_customize->add_control( new Kunty_Slider_Custom_Control(
			$wp_customize, 'portfolio_total_items_show', 
				array(
					'label'       => esc_html__( 'Total Items to Show','kunty' ),
					'description' => esc_html__( 'After changing default value please save and reload','kunty' ),
					'type'          => 'range',
					'section'       => 'portfolio_section_settings',
					'input_attrs'    => array(
						'min' => 0,
						'max' => 9,
						'step' => 1,
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('portfolio_section_enable') && get_theme_mod('portfolio_content_type') != 'portfolio_custom'){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);
	}
	
	$items = get_theme_mod( 'portfolio_total_items_show', 6);
	for( $i=1; $i<=$items; $i++ ) {
		
		
		//Page
		$wp_customize->add_setting('featured_portfolio_page_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'kunty_dropdown_pages'
			)
		);
		$wp_customize->add_control('featured_portfolio_page_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => sprintf( __('Select a page for portfolio #%1$s image, title and description', 'kunty'), $i),
				'section'     => 'portfolio_section_settings',   
				'settings'    => 'featured_portfolio_page_'.$i.'',		
				'type'        => 'dropdown-pages',
				'active_callback' => function(){
					$status = get_theme_mod('portfolio_section_enable');
					$content_type = get_theme_mod('portfolio_content_type');
					if(1 === $status  && $content_type =='portfolio_page'){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		// Posts
		$wp_customize->add_setting('featured_portfolio_post_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'kunty_dropdown_pages'
			)
		);
		$wp_customize->add_control('featured_portfolio_post_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => sprintf( __('Select a Post for portfolio #%1$s image, title and description', 'kunty'), $i),
				'section'     => 'portfolio_section_settings',   
				'settings'    => 'featured_portfolio_post_'.$i.'',		
				'type'        => 'select',
				'choices'	  => kunty_dropdown_posts(),
				'active_callback' => function(){
					$status = get_theme_mod('portfolio_section_enable');
					$content_type = get_theme_mod('portfolio_content_type');
					if(1 === $status  && $content_type =='portfolio_post'){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	}
	
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code()){
	
	// Featured Portfolios
	$wp_customize->add_setting( 
		new Kunty_Control_Repeater_Setting( 
			$wp_customize, 
			'featured_portfolios', 
			array(
				'default' => '',
				'sanitize_callback' => array( 'Kunty_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
			) 
		) 
	);
	$wp_customize->add_control(
		new Kunty_Control_Repeater(
			$wp_customize,
			'featured_portfolios',
			array(
				'section'       => 'portfolio_section_settings',
				'label'         => esc_html__( 'Portfolios', 'kunty' ),
				'fields'  => array(
					'image' => array(
						'type'        => 'image',
						'label'       => esc_html__( 'Image', 'kunty' ),
						'description' =>  '',
					),
					'title' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Title', 'kunty' ),
					),
					'description' => array(
						'type'        => 'textarea',
						'label'       => esc_html__( 'Descrition', 'kunty' ),
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
					'value' => esc_html__( 'portfolio', 'kunty' ),
					'field' => 'title'
				),
				'active_callback' => function(){
					$status = get_theme_mod('portfolio_section_enable');
					$content_type = get_theme_mod('portfolio_content_type');
					if($content_type == 'portfolio_custom' && 1 === $status ){
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
	$wp_customize->add_setting( 'heading_portfolio_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_portfolio_style',
			array(
				'label' => esc_html__( 'Portfolio Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'portfolio_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);


		$wp_customize->add_setting( 'portfolio_style',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'style-1',
			)
		);
		$wp_customize->add_control( 'portfolio_style',
			array(
				'type'    => 'select',
				'label'   => esc_html__( 'Style', 'kunty' ),
				'section' => 'portfolio_section_settings',
				'choices' => array(
					'style-1' => esc_html__('Style One', 'kunty' ),
					'style-2'  => esc_html__('Style Two', 'kunty' ),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('portfolio_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		// Text Alignment
		$wp_customize->add_setting( 'portfolio_content_align',
		   array(
			  'default' => 'text-start',
			  'transport' => 'refresh',
			  'sanitize_callback' => 'kunty_radio_sanitization'
		   )
		);
		$wp_customize->add_control( new Kunty_Text_Radio_Button_Custom_Control( $wp_customize, 'portfolio_content_align',
		   array(
				'label'       => __('Text Alignment', 'kunty'),
				'section'     => 'portfolio_section_settings',  
				'choices' => array(
					'text-start'	   => __('Left','kunty'),
					'text-center'  => __('Center','kunty'),
					'text-end'   => __('Right','kunty'),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('portfolio_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code()){
		// Open Lightbox?
		$wp_customize->add_setting( 'portfolio_lightbox_enable',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'portfolio_lightbox_enable',
			array(
				'label'         => esc_html__( 'Enable Lightbox?', 'kunty' ),
				'description'   => esc_html__( 'Turn On/Off the switch to show/hide large image on lightbox', 'kunty' ),
				'section'  => 'portfolio_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) );

		// Link to detail page
		$wp_customize->add_setting( 'portfolio_permalink',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'portfolio_permalink',
			array(
				'label'         => esc_html__( 'Link to detail page?', 'kunty' ),
				'description'   => esc_html__( 'Turn On/Off the switch to link/unlink the portfolio to its detail page', 'kunty' ),
				'section'  => 'portfolio_section_settings',
				'active_callback' => function(){
					$content_type = get_theme_mod('portfolio_content_type');
					if(1 === get_theme_mod('portfolio_section_enable') && get_theme_mod('portfolio_content_type') != "portfolio_custom" ){
						return true;
					} else {
						return false;
					}
				},
			)
		) );
	}

		//Button Text
		$wp_customize->add_setting( 'portfolio_more_btn_text',
			array(
				'dafult'=> esc_html__('More Projects', 'kunty'),
				'sanitize_callback'=> 'sanitize_text_field', 
			) 
		);
		$wp_customize->add_control( 'portfolio_more_btn_text', 
			array(
				'label' => esc_html__( 'Button Text','kunty' ),
			    'type'    => 'text',
				'section' => 'portfolio_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('portfolio_section_enable');
					if(1 === $status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'portfolio_more_btn_text', array(
			'selector' => '.loadmore-area .btn-kunty',
			'settings' => array( 'portfolio_more_btn_text' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'portfolio_more_btn_text');
					},
		) );
		
		//Button URL
		$wp_customize->add_setting( 'portfolio_more_btn_url',
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'esc_url_raw', 
			) 
		);
		$wp_customize->add_control( 'portfolio_more_btn_url', 
			array(
				'label'       => esc_html__('Button Link', 'kunty'),
				'description' => esc_html__( 'Start with http:// or https://', 'kunty' ),
			    'type'    => 'url',
				'section' => 'portfolio_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('portfolio_section_enable');
					if(1===$status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Button target
		$wp_customize->add_setting( 'portfolio_more_btn_target',
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'kunty_sanitize_checkbox', 
			) 
		);
		$wp_customize->add_control( 'portfolio_more_btn_target', 
			array(
				'label' => esc_html__( 'Button open on new tab?','kunty' ),
			    'type'    => 'checkbox',
				'section' => 'portfolio_section_settings',
				'active_callback' => function(){
					$status = get_theme_mod('portfolio_section_enable');
					if(1===$status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
		
	// Headings
	$wp_customize->add_setting( 'portfolio_section_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'portfolio_section_style',
			array(
				'label' => esc_html__( 'Section Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'portfolio_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	// Background color
	$wp_customize->add_setting( 'portfolio_section_bg', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'portfolio_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'kunty' ),
				'section'     => 'portfolio_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('portfolio_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'portfolio_section_pt',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'portfolio_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
			'section'           => 'portfolio_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('portfolio_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'portfolio_section_pb',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'portfolio_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
			'section'           => 'portfolio_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('portfolio_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );
	
	// Premium Features
	$wp_customize->add_setting( 'portfolio_pro_features', 
		array(
			'default' => '',
			'sanitize_callback' => 'wp_kses_post',
		) 
	);
    $premium_features = '<div class="premium-info"><h2>' . esc_html__( 'Portfolio Premium Features', 'kunty' ) . ': </h2>
		<ul>
			<li><span class="dashicons dashicons-yes"></span> Add unlimited portfolios</li>
			<li><span class="dashicons dashicons-yes"></span> Image open on lightbox</li>
			<li><span class="dashicons dashicons-yes"></span> Remove post detail link and use custom link for each portfolio</li>
			<li><span class="dashicons dashicons-yes"></span> Premium Support</li>
		<ul>
		<hr>
		<a class="button button-primary" href="' . esc_url( 'https://themereps.com/kunty/' ) . '" target="_blank">' . esc_html__( 'Buy premium addons for only $29', 'kunty' ) . '</a>
	</div>';

	$wp_customize->add_control( new Kunty_Custom_Text( $wp_customize ,'portfolio_pro_features',
		array(
			'section' => 'portfolio_section_settings',
			'label' => $premium_features,
			'active_callback' => function(){
				 if(1===get_theme_mod('portfolio_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		) 
	) );
	
	
	