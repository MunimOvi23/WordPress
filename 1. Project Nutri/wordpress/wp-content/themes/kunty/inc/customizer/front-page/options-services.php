<?php 
/**
 * Services Section
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */

	$wp_customize->add_section( 'services_section_settings',
		array(
			'title'       => esc_html__( 'Service Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority' => 2,
		)
	);
		// Show/Hide Section
		$wp_customize->add_setting( 'services_section_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'services_section_enable',
			array(
			    'label'         => esc_html__( 'Show/hide service section', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide services section on front page template', 'kunty' ),
				'section'  => 'services_section_settings',

			)
		) );

		// Headings
		$wp_customize->add_setting( 'service_section_heading_text',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'service_section_heading_text',
				array(
					'label' => esc_html__( 'Section Headings', 'kunty' ),
					'type' => 'heading',
					'section' => 'services_section_settings',
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Section subheading
		$wp_customize->add_setting( 'services_section_subtitle', 
			array(
				'default'           => 'What we offer',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'services_section_subtitle', 
			array(
				'label'      => esc_html__('Subtitle', 'kunty'),
				'description'=> '',
				'section'    => 'services_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('services_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'services_section_subtitle', array(
			'selector' => '#service-section .section-title .sub-title',
			'settings' => array( 'services_section_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'services_section_subtitle');
				},
		) );
		
		//Section Heading
		$wp_customize->add_setting( 'services_section_title', 
			array(
				'default'           => 'Our Included Services',
				'sanitize_callback' => 'kunty_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'services_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'kunty' ),
			    //'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'kunty' ),
				'section' => 'services_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					 if(1 === get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);
		$wp_customize->selective_refresh->add_partial( 'services_section_title', array(
			'selector' => '#service-section .section-title h2',
			'settings' => array( 'services_section_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'services_section_title');
				},
		) );
		// Section Description
		$wp_customize->add_setting( 'services_section_description', 
			array(
				'default'           => 'We helping client to create with our talented expert.',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'services_section_description', 
			array(
				'label'      => esc_html__('Description', 'kunty'),
				'description'=> '',
				'section'    => 'services_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('services_section_enable')){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'services_section_description', array(
			'selector' => '#service-section .section-title p',
			'settings' => array( 'services_section_description' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'services_section_description');
				},
		) );
		
		// Headings
		$wp_customize->add_setting( 'services_heading_text',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'services_heading_text',
				array(
					'label' => esc_html__( 'Services', 'kunty' ),
					'type' => 'heading',
					'section' => 'services_section_settings',
					'active_callback' => function(){
						if(get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Content Type
		$wp_customize->add_setting('services_content_type', 
			array(
			'default' 			=> 'services_page',
			'sanitize_callback' => 'kunty_sanitize_select'
			)
		);

	if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code()){

		$wp_customize->add_control('services_content_type', 
			array(
				'label'       => __('Post Type', 'kunty'),
				'section'     => 'services_section_settings',   	
				'type'        => 'select',
				'choices' => array(
					'services_post'	   => __('Post','kunty'),
					'services_page'	   => __('Page','kunty'),
					'services_custom'  => __('Custom Content','kunty'),
				),
				'active_callback' => function(){
					 if( 1 === get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} else { 
		$wp_customize->add_control('services_content_type', 
			array(
				'label'       => __('Post Type', 'kunty'),
				'section'     => 'services_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'services_post'	   => __('Post','kunty'),
						'services_page'	   => __('Page','kunty'),
				),
				'active_callback' => function(){
					 if( 1 === get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}

		// Total Number
		$wp_customize->add_setting( 'services_total_items_show',
			array(
				'sanitize_callback' => 'kunty_sanitize_integer',
				'default'           => 4,
				'transport' => 'refresh',
			)
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
			$wp_customize, 'services_total_items_show', 
				array(
					'label'       => esc_html__( 'Total Items to Show','kunty' ),
					'description' => esc_html__( 'After changing default value please save and reload','kunty' ),
					'type'          => 'range',
					'section'       => 'services_section_settings',
					'input_attrs'    => array(
						'min' => 0,
						'max' => 20,
						'step' => 1,
					),
					'active_callback' => function(){
						 if(1===get_theme_mod('services_section_enable') && get_theme_mod('services_content_type') != 'services_custom'){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			)
		);


	$service_items = get_theme_mod( 'services_total_items_show', 4);
	for( $i=1; $i<=$service_items; $i++ ) {

		//Icon
		$wp_customize->add_setting(
			'service_icon_'.$i,
			array(
				'default'			=> 'ti-vector',
				'sanitize_callback' => 'sanitize_text_field' // Done
			)
		);

		$wp_customize->add_control( 'service_icon_'.$i,
			array(
				/* translators: %1$s is replaced with number */
				'label'       => sprintf( __('Service #%1$s', 'kunty'), $i),
				/* translators: %1$s is replaced with number */
				'description'       => sprintf( __('Select a icon from <a target="_blank" href="https://themify.me/themify-icons">Themify icons</a> and enter its class name. Example- ti-vector', 'kunty'), $i),
				'section'		=> 'services_section_settings',
				'type'			=> 'text',
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$content_type = get_theme_mod('services_content_type');
					if(1 === $service_status  && $content_type !='services_custom'){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Page
		$wp_customize->add_setting('featured_service_page_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'kunty_dropdown_pages'
			)
		);
		$wp_customize->add_control('featured_service_page_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => sprintf( __('Select a page for Service #%1$s title and description', 'kunty'), $i),
				'section'     => 'services_section_settings',   
				'settings'    => 'featured_service_page_'.$i.'',		
				'type'        => 'dropdown-pages',
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$content_type = get_theme_mod('services_content_type');
					if(1 === $service_status  && $content_type =='services_page'){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		// Posts
		$wp_customize->add_setting('featured_service_post_'.$i.'', 
			array(
				'capability'        => 'edit_theme_options',	
				'sanitize_callback' => 'kunty_dropdown_pages'
			)
		);
		$wp_customize->add_control('featured_service_post_'.$i.'', 
			array(
				/* translators: %1$s is replaced with number */
				'description' => sprintf( __('Select a Post for Service #%1$s title and text', 'kunty'), $i),
				'section'     => 'services_section_settings',   
				'settings'    => 'featured_service_post_'.$i.'',		
				'type'        => 'select',
				'choices'	  => kunty_dropdown_posts(),
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$content_type = get_theme_mod('services_content_type');
					if(1 === $service_status  && $content_type =='services_post'){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	}

	// Featured Services
	$wp_customize->add_setting( 
		new Kunty_Control_Repeater_Setting( 
			$wp_customize, 
			'featured_services', 
			array(
				'default' => '',
				'sanitize_callback' => array( 'Kunty_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
			) 
		) 
	);
	$wp_customize->add_control(
		new Kunty_Control_Repeater(
			$wp_customize,
			'featured_services',
			array(
				'section'       => 'services_section_settings',
				'label'         => esc_html__( 'Services', 'kunty' ),
				'fields'  => array(
					'icon' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Icon', 'kunty' ),
						'description' =>  esc_html__('Select a  themify icons from https://themify.me/themify-icons and enter its class name. Example- ti-vector', 'kunty'),
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
					'value' => esc_html__( 'service', 'kunty' ),
					'field' => 'title'
				),
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$content_type = get_theme_mod('services_content_type');
					if($content_type == 'services_custom' && 1 === $service_status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		)
	);

		//Button Text
		$wp_customize->add_setting( 'all_service_btn_text',
			array(
				'dafult'=> esc_html__('all services', 'kunty'),
				'sanitize_callback'=> 'sanitize_text_field', 
				'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'all_service_btn_text', 
			array(
				'label' => esc_html__( 'All Services Button Text','kunty' ),
			    'type'    => 'text',
				'section' => 'services_section_settings',
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$services_layout = get_theme_mod('services_layout');
					if($services_layout == 'layout-1' && 1 === $service_status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Button URL
		$wp_customize->add_setting( 'all_service_btn_url',
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'esc_url_raw',
				//'transport' => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'all_service_btn_url',
			array(
				'label' => esc_html__( 'Button URL','kunty' ),
				'description' => esc_html__( 'Start with http:// or https://', 'kunty' ),
			    'type'    => 'url',
				'section' => 'services_section_settings',
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$services_layout = get_theme_mod('services_layout');
					if($services_layout == 'layout-1' && 1 === $service_status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		//Button target
		$wp_customize->add_setting( 'all_service_btn_target',
			array(
				'dafult'=> '',
				'sanitize_callback'=> 'kunty_sanitize_checkbox', 
			) 
		);
		$wp_customize->add_control( 'all_service_btn_target', 
			array(
				'label' => esc_html__( 'Button open on new tab?','kunty' ),
			    'type'    => 'checkbox',
				'section' => 'services_section_settings',
				'active_callback' => function(){
					$service_status = get_theme_mod('services_section_enable');
					$services_layout = get_theme_mod('services_layout');
					if($services_layout == 'layout-1' && 1 === $service_status ){
						return true;
					} else {
						 return false;
					}
				},
			)
		);

		// Service Style
		$wp_customize->add_setting( 'services_style_heading',
			array(
				'transport' => 'refresh',
				'sanitize_callback' => 'sanitize_text_field'
			)
		);
		$wp_customize->add_control( 
			new Kunty_Simple_Notice_Custom_Control( 
				$wp_customize, 'services_style_heading',
				array(
					'label' => esc_html__( 'Service Style', 'kunty' ),
					'type' => 'heading',
					'section' => 'services_section_settings',
					'active_callback' => function(){
						 if(1===get_theme_mod('services_section_enable')){
							return true;
						 } else {
							 return false;
						 }
					},
				)
			) 
		);

		$wp_customize->add_setting( 'services_layout',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'layout-1',
			)
		);
		$wp_customize->add_control( 'services_layout',
			array(
				'type'    => 'select',
				'label'   => esc_html__( 'Layout', 'kunty' ),
				'section' => 'services_section_settings',
				'choices' => array(
					'layout-1'  => esc_html__('Layout One', 'kunty' ),
					'layout-2'  => esc_html__('Layout Two', 'kunty' ),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);

		$wp_customize->add_setting( 'services_style',
			array(
				'sanitize_callback' => 'sanitize_text_field',
				'default'           => 'style-1',
			)
		);
		$wp_customize->add_control( 'services_style',
			array(
				'type'    => 'select',
				'label'   => esc_html__( 'Style', 'kunty' ),
				'section' => 'services_section_settings',
				'choices' => array(
					'style-1' => esc_html__('Style 1- Icon Top', 'kunty' ),
					'style-3'  => esc_html__('Style 2- Icon Left', 'kunty' ),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
		
if(!kunty_set_to_premium()) {
		// Permalink
		$wp_customize->add_setting( 'fake_service_permalink',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'fake_service_permalink',
			array(
			    'label'         => esc_html__( 'Link to detail page?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to link/unlink the service to its detail page', 'kunty' ),
				'section'  => 'services_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable') && get_theme_mod('services_content_type') !='services_custom'){
						return true;
					 } else {
						 return false;
					 }
				},

			)
		) );
}
		
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
		// Permalink
		$wp_customize->add_setting( 'service_permalink',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'service_permalink',
			array(
			    'label'         => esc_html__( 'Link to detail page?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to link/unlink the service to its detail page', 'kunty' ),
				'section'  => 'services_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable') && get_theme_mod('services_content_type') !='services_custom'){
						return true;
					 } else {
						 return false;
					 }
				},

			)
		) );
}
		// Text Alignment
		$wp_customize->add_setting( 'service_content_align',
		   array(
			  'default' => 'text-start',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_radio_sanitization'
		   )
		);
		$wp_customize->add_control( new Kunty_Text_Radio_Button_Custom_Control( $wp_customize, 'service_content_align',
		   array(
				'label'       => __('Text Alignment', 'kunty'),
				'section'     => 'services_section_settings',  
				'choices' => array(
					'text-start'	   => __('Left','kunty'),
					'text-center'  => __('Center','kunty'),
					'text-end'   => __('Right','kunty'),
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable') && get_theme_mod('services_style') !='style-3'){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Icon Background Color
		$wp_customize->add_setting( 'service_icon_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			  'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_icon_bg',
				array(
					'label'   => esc_html__( 'Icon background color', 'kunty' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);
		
		// Icon box Size
		$wp_customize->add_setting( 'service_icon_box_size',
		   array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_sanitize_integer',
			  'transport' => 'postMessage',
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'service_icon_box_size',
		   array(
				'label'             => esc_html__( 'Icon Container size', 'kunty' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 50,
					'max' => 150,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Icon Border Radius
		$wp_customize->add_setting( 'service_icon_br',
		   array(
			  'default' => '',
			  'transport' => 'postMessage',
			  'sanitize_callback' => 'kunty_sanitize_integer'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'service_icon_br',
		   array(
				'label'             => esc_html__( 'Icon box border radius', 'kunty' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 200,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Icon font Size
		$wp_customize->add_setting( 'service_icon_font_size',
		   array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_sanitize_integer',
			  'transport' => 'postMessage'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'service_icon_font_size',
		   array(
				'label'             => esc_html__( 'Icon font size (px)', 'kunty' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 12,
					'max' => 80,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Icon Color
		$wp_customize->add_setting( 'service_icon_color', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			  'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_icon_color',
				array(
					'label'   => esc_html__( 'Icon color', 'kunty' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Title font Size
		$wp_customize->add_setting( 'service_title_font_size',
		   array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_sanitize_integer',
			  'transport' => 'postMessage',
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'service_title_font_size',
		   array(
				'label'             => esc_html__( 'Title font size (px)', 'kunty' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 16,
					'max' => 100,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );
		// Title Color
		$wp_customize->add_setting( 'service_title_color', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			  'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_title_color',
				array(
					'label'   => esc_html__( 'Title color', 'kunty' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);
		// Description Color
		$wp_customize->add_setting( 'service_description_color', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			  'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_description_color',
				array(
					'label'   => esc_html__( 'Description color', 'kunty' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);
		// Description Color
		$wp_customize->add_setting( 'service_btn_more_color', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			  'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_btn_more_color',
				array(
					'label'   => esc_html__( 'Arrow color', 'kunty' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') &&  1 === get_theme_mod('service_permalink') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);
		// Service Background Color
		$wp_customize->add_setting( 'service_box_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			  'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_box_bg',
				array(
					'label'   => esc_html__( 'Background color', 'kunty' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Service box padding
		$wp_customize->add_setting( 'service_box_padding',
		   array(
			  'default' => 0,
			  'sanitize_callback' => 'kunty_sanitize_integer',
			  'transport' => 'postMessage',
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'service_box_padding',
		   array(
				'label'             => esc_html__( 'Padding (px)', 'kunty' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );
		
	// Section Style
	$wp_customize->add_setting( 'services_section_style_heading',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'services_section_style_heading',
			array(
				'label' => esc_html__( 'Section Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'services_section_settings',
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
		// Section Background
		$wp_customize->add_setting( 'service_section_bg', array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
			  'transport' => 'postMessage',
			)
		);
		$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
			$wp_customize, 'service_section_bg',
				array(
					'label'   => esc_html__( 'Section Background', 'kunty' ),
					'section'     => 'services_section_settings',
					'show_opacity' => false,
					'active_callback' => function(){
						if(1 === get_theme_mod('services_section_enable') ){
							return true;
						} else {
							return false;
						}
					},
				)
			) 
		);

		// Top Padding
		$wp_customize->add_setting( 'service_section_pt',
		   array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_sanitize_integer',
			  'transport' => 'postMessage'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'service_section_pt',
		   array(
				'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );

		// Top Padding
		$wp_customize->add_setting( 'service_section_pb',
		   array(
			  'default' => '',
			  'sanitize_callback' => 'kunty_sanitize_integer',
			  'transport' => 'postMessage'
		   )
		);
		$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'service_section_pb',
		   array(
				'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
				'section'           => 'services_section_settings',
				'input_attrs' => array(
					'min' => 0,
					'max' => 400,
					'step' => 1,
				),
				'active_callback' => function(){
					 if(1===get_theme_mod('services_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
		   )
		) );