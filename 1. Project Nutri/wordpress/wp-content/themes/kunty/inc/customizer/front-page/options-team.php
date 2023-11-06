<?php 
/**
* Team Section Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/
	$wp_customize->add_section( 'team_section_settings',
		array(
			'title'       => esc_html__( 'Team Section', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_frontpage_settings',
			'priority' => 5,
			'divider' => 'before',
		)
	);


// Show/Hide Section
$wp_customize->add_setting( 'team_section_enable',
	array(
		'default' => 0,
		'sanitize_callback' => 'kunty_switch_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'team_section_enable',
	array(
	    'label'         => esc_html__( 'Show/hide Team Section', 'kunty' ),
	    'description'   => esc_html__( 'Turn On/Off the switch to show/hide team section on front page.', 'kunty' ),
		'section'  => 'team_section_settings',

	)
) );


	// Headings
	$wp_customize->add_setting( 'headings_team_section',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_team_section',
			array(
				'label' => esc_html__( 'Section Headings', 'kunty' ),
				'type' => 'heading',
				'section' => 'team_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
		// Sub Title
		$wp_customize->add_setting( 'team_section_subtitle', 
			array(
				'default'           => esc_html__('Our Team', 'kunty'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'team_section_subtitle', 
			array(
				'label'      => esc_html__('Sub Title', 'kunty'),
				'description'=> '',
				'section'    => 'team_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'team_section_subtitle', array(
			'selector' => '.team-area .section-title  .sub-title',
			'settings' => array( 'team_section_subtitle' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'team_section_subtitle');
					},
		) );
		//Title
		$wp_customize->add_setting( 'team_section_title', 
			array(
				'default'           => esc_html__('All the Experienced Team Together.', 'kunty'),
				'sanitize_callback' => 'kunty_sanitize_html',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'team_section_title', 
			array(
			    'label'   => esc_html__( 'Title', 'kunty' ),
			    'description'   => esc_html__( 'Bold text should be surrounded by \'b\' tag', 'kunty' ),
				'section' => 'team_section_settings',
				'type'    => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			) 
		);
		$wp_customize->selective_refresh->add_partial( 'team_section_title', array(
			'selector' => '.team-area .section-title  h2',
			'settings' => array( 'team_section_title' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'team_section_title');
					},
		) );
		// Description
		$wp_customize->add_setting( 'team_section_description', 
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
				'transport'         => 'postMessage'
			) 
		);
		$wp_customize->add_control( 'team_section_description', 
			array(
				'label'      => esc_html__('Description', 'kunty'),
				'section'    => 'team_section_settings',
				'type'       => 'text',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		);
		$wp_customize->selective_refresh->add_partial( 'team_section_description', array(
			'selector' => '.team-area .section-title  p',
			'settings' => array( 'team_section_description' ),
			'render_callback' =>  function(){
					return get_theme_mod( 'team_section_description');
				},
		) );
	// Headings
	$wp_customize->add_setting( 'headings_team_members',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'headings_team_members',
			array(
				'label' => esc_html__( 'Team Members', 'kunty' ),
				'type' => 'heading',
				'section' => 'team_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Content Type
	$wp_customize->add_setting('team_content_type', 
		array(
		'default' 			=> 'team_page',
		'sanitize_callback' => 'kunty_sanitize_select',
		'transport'         => 'refresh',
		)
	);
	if(class_exists('Themereps_Helper')  ){
		$wp_customize->add_control('team_content_type', 
			array(
				'label'       => __('Post Type', 'kunty'),
				'section'     => 'team_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'team_page'	   => __('Page','kunty'),
						'team_post'	   => __('Post','kunty'),
						'team_custom'    => __('Custom Content','kunty'),

				),
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	} else {
		$wp_customize->add_control('team_content_type', 
			array(
				'label'       => __('Post Type', 'kunty'),
				'section'     => 'team_section_settings',   	
				'type'        => 'select',
				'choices' => array(
						'team_page'	   => __('Page','kunty'),
						'team_post'	   => __('Post','kunty'),
				),
				'active_callback' => function(){
					 if(get_theme_mod('team_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		);
	}

		// Total Number
        $wp_customize->add_setting( 'team_total_count', 
		 	array(
				'default'           => 3,
				'sanitize_callback' => 'kunty_sanitize_number_range',
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'team_total_count', 
			array(
				'label'       => esc_html__( 'Total Items to Show','kunty' ),
				'description' => esc_html__( 'After changing default value please save and reload','kunty' ),
				'type'        => 'number',
				'section'     => 'team_section_settings',
				'input_attrs' => array(
					'min'	=> 1,
					'max'	=> 20,
					'step'	=> 1,
				),
				'active_callback' => function(){
					$content_type = get_theme_mod('team_content_type');
					$sec_enable = get_theme_mod('team_section_enable');
					if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
						return true;
					} else {
						 return false;
					}
				},
			)
		);
	$total_items = get_theme_mod( 'team_total_count', 3);
	for( $i=1; $i<=$total_items; $i++ ) {


			// Headings
			$wp_customize->add_setting( 'headings_member_'.$i.'',
				array(
					'transport' => 'refresh',
					'sanitize_callback' => 'sanitize_text_field'
				)
			);
			$wp_customize->add_control( 
				new Kunty_Simple_Notice_Custom_Control( 
					$wp_customize, 'headings_member_'.$i.'',
					array(
						/* translators: %1$s is replaced with number */
						'label' => sprintf( __('Member %1$s Info', 'kunty'), $i),
						'type'  => 'heading',
						'section' => 'team_section_settings',
						'active_callback' => function(){
							$content_type = get_theme_mod('team_content_type');
							$sec_enable   = get_theme_mod('team_section_enable');
							if($content_type == 'team_post' || $content_type == 'team_page' && 1=== $sec_enable){
								return true;
							} else {
								 return false;
							}
						},
					)
				) 
			);

			// Page
			$wp_customize->add_setting('team_page_'.$i.'', 
				array(	
					'sanitize_callback' => 'kunty_dropdown_pages',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('team_page_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Select a page for member\'s #%1$s name, designation and picture', 'kunty'), $i),
					'section'     => 'team_section_settings',   		
					'type'        => 'dropdown-pages',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_page' && 1 === $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			);

			// Posts
			$wp_customize->add_setting('team_post_'.$i.'', 
				array(
					'sanitize_callback' => 'kunty_dropdown_pages',
					'transport'         => 'refresh',
				)
			);
			$wp_customize->add_control('team_post_'.$i.'', 
				array(
					/* translators: %1$s is replaced with number */
					'label'       => sprintf( __('Member #%1$s', 'kunty'), $i),
					/* translators: %1$s is replaced with number */
					'description' => sprintf( __('Select a post for member\'s #%1$s name, designation and picture', 'kunty'), $i),
					'section'     => 'team_section_settings',   		
					'type'        => 'select',
					'choices'	  => kunty_dropdown_posts(),
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			);

			// Facebook Link
			$wp_customize->add_setting( 'facebook_url_'.$i,
				array(
					'dafult'=> '',
					'sanitize_callback'=> 'esc_url_raw', 
				) 
			);
			$wp_customize->add_control( 'facebook_url_'.$i, 
				array(
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Member #%1$s facebook link', 'kunty'), $i),
					'type'        => 'url',
					'section'     => 'team_section_settings',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);

			// Twitter Link
			$wp_customize->add_setting( 'twitter_url_'.$i,
				array(
					'dafult'=> '',
					'sanitize_callback'=> 'esc_url_raw', 
				) 
			);
			$wp_customize->add_control( 'twitter_url_'.$i, 
				array(
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Member #%1$s twitter link', 'kunty'), $i),
					'type'        => 'url',
					'section'     => 'team_section_settings',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);

			// Facebook Link
			$wp_customize->add_setting( 'linkedin_url_'.$i,
				array(
					'dafult'=> '',
					'sanitize_callback'=> 'esc_url_raw', 
				) 
			);
			$wp_customize->add_control( 'linkedin_url_'.$i, 
				array(
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Member #%1$s linkedin link', 'kunty'), $i),
					'type'        => 'url',
					'section'     => 'team_section_settings',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);

			// Facebook Link
			$wp_customize->add_setting( 'instagram_url_'.$i,
				array(
					'dafult'=> '',
					'sanitize_callback'=> 'esc_url_raw', 
				) 
			);
			$wp_customize->add_control( 'instagram_url_'.$i, 
				array(
					/* translators: %1$s is replaced with number */
					'description'       => sprintf( __('Member #%1$s instagram link', 'kunty'), $i),
					'type'        => 'url',
					'section'     => 'team_section_settings',
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type=='team_post' || $content_type=='team_page' && 1=== $sec_enable){
							return true;
						} else {
							 return false;
						}
					},	
				)
			);

		}


		// Team
		$wp_customize->add_setting( 
			new Kunty_Control_Repeater_Setting( 
				$wp_customize, 
				'kunty_team', 
				array(
					'default' => '',
					'sanitize_callback' => array( 'Kunty_Control_Repeater_Setting', 'sanitize_repeater_setting' ),
				) 
			) 
		);
		$wp_customize->add_control(
			new Kunty_Control_Repeater(
				$wp_customize,
				'kunty_team',
				array(
					'section'       => 'team_section_settings',
					'label'         => esc_html__( 'Members', 'kunty' ),
					'fields'  => array(

						'name' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Name', 'kunty' ),
						),
						'position' => array(
							'type'        => 'text',
							'label'       => esc_html__( 'Position', 'kunty' ),
						),
						'image' => array(
							'type'    => 'image',
							'label'   => __( 'Upload Image', 'kunty' ),
						),
						'facebook_link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Facebook Link', 'kunty' ),
							'description' => esc_html__( 'Example: https://facebook.com/username', 'kunty' ),
						),
						'twitter_link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Twitter Link', 'kunty' ),
							'description' => esc_html__( 'Example: https://twitter.com/username', 'kunty' ),
						),
						'linkedin_link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Linkedin Link', 'kunty' ),
							'description' => esc_html__( 'Example: https://linkedin.com/username', 'kunty' ),
						),
						'instagram_link' => array(
							'type'        => 'url',
							'label'       => esc_html__( 'Instagram Link', 'kunty' ),
							'description' => esc_html__( 'Example: https://instagram.com/username', 'kunty' ),
						),
					),
					'row_label' => array(
						'type'  => 'field',
						'value' => esc_html__( 'member', 'kunty' ),
						'field' => 'name'
					),
					'active_callback' => function(){
						$content_type = get_theme_mod('team_content_type');
						$sec_enable = get_theme_mod('team_section_enable');
						if($content_type =='team_custom' && 1 === $sec_enable){
							return true;
						} else {
							 return false;
						}
					},
				)
			)
		);

	// Headings -- Memeber Style
	$wp_customize->add_setting( 'heading_team_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'heading_team_style',
			array(
				'label' => esc_html__( 'Memeber Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'team_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);
	// Image Width
	$wp_customize->add_setting( 'member_face_width',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'member_face_width',
	   array(
			'label'             => esc_html__( 'Image Width (px)', 'kunty' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 150,
				'max' => 100,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Image Height
	$wp_customize->add_setting( 'member_face_height',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'member_face_height',
	   array(
			'label'             => esc_html__( 'Image Height (px)', 'kunty' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 150,
				'max' => 500,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Image Border Radius
	$wp_customize->add_setting( 'member_face_border_radius',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'member_face_border_radius',
	   array(
			'label'             => esc_html__( 'Image Border Radisu (%)', 'kunty' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );
	
	// Background color
	$wp_customize->add_setting( 'team_member_bg', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'team_member_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'kunty' ),
				'section'     => 'team_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Border color
	$wp_customize->add_setting( 'member_border_clr', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'member_border_clr',
			array(
				'label'   => esc_html__( 'Border Color', 'kunty' ),
				'section'     => 'team_section_settings',
				'show_opacity' => true,
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Hover Background color
	$wp_customize->add_setting( 'team_member_hover_bg', array(
		  'default' => '',
		  //'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'team_member_hover_bg',
			array(
				'label'   => esc_html__( 'Hover Background Color', 'kunty' ),
				'section'     => 'team_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Padding Top Bottom
	$wp_customize->add_setting( 'member_padding_y',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'member_padding_y',
	   array(
			'label'             => esc_html__( 'Padding Top/Bottom (px)', 'kunty' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 10,
				'max' => 100,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Padding Left Right
	$wp_customize->add_setting( 'member_padding_x',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'member_padding_x',
	   array(
			'label'             => esc_html__( 'Padding Left/Right (px)', 'kunty' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 10,
				'max' => 100,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Headings
	$wp_customize->add_setting( 'team_carousel_headings',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control( 
			$wp_customize, 'team_carousel_headings',
			array(
				'label' => esc_html__( 'Carousel Settings', 'kunty' ),
				'type' => 'heading',
				'section' => 'team_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
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
	$wp_customize->add_setting( 'fake_team_carousel_enable',
		array(
			'default' => 0,
			'sanitize_callback' => 'kunty_switch_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'fake_team_carousel_enable',
		array(
			'label'       => esc_html__( 'Enable Carousel?', 'kunty' ),
			'description' => esc_html__( 'Turn On/Off the switch to enable/disable team carousel', 'kunty' ),
			'section'  => 'team_section_settings',
			'active_callback' => function(){
				 if(1 === get_theme_mod('team_section_enable')){
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
		$wp_customize->add_setting( 'team_carousel_enable',
			array(
				'default' => 0,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_enable',
			array(
				'label'       => esc_html__( 'Enable Carousel?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable team carousel', 'kunty' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Autoplay
		$wp_customize->add_setting( 'team_carousel_autoplay',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_autoplay',
			array(
				'label'       => esc_html__( 'Carousel Autoplay?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel autoplay', 'kunty' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Slide Duration
		$wp_customize->add_setting( 'team_carousel_duration', 
			array(
				'sanitize_callback' => 'kunty_sanitize_number_range',
				'validate_callback' => 'kunty_validate_duration',
				'default'          	=> 6000,
				'transport'         => 'refresh',
			) 
		);
		$wp_customize->add_control( 'team_carousel_duration', 
			array(
				'label'             => esc_html__( 'Carousel Duration', 'kunty' ),
				'description'       => esc_html__( 'Set the time in milisecond', 'kunty' ),
				'section'           => 'team_section_settings',
				'type'				=> 'number',
				'input_attrs'		=> array(
					'min'	=> 1000,
					'max'	=> 20000,
					'step'	=> 500,
				),
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			) 
		);

		// Carousel Loop
		$wp_customize->add_setting( 'team_carousel_loop',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_loop',
			array(
				'label'       => esc_html__( 'Carousel Loop?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to enable/disable carousel loop', 'kunty' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Nav Disable
		$wp_customize->add_setting( 'team_carousel_nav',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_nav',
			array(
				'label'       => esc_html__( 'Show/hide Carousel Arrow?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel nav', 'kunty' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );

		// Carousel Dots
		$wp_customize->add_setting( 'team_carousel_dots',
			array(
				'default' => 1,
				'sanitize_callback' => 'kunty_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'team_carousel_dots',
			array(
				'label'       => esc_html__( 'Show/hide Carousel Dots?', 'kunty' ),
				'description' => esc_html__( 'Turn On/Off the switch to show/hide carousel dots', 'kunty' ),
				'section'  => 'team_section_settings',
				'active_callback' => function(){
					 if(1 === get_theme_mod('team_section_enable')&& 1===get_theme_mod('team_carousel_enable')){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) );
}

	// Headings
	$wp_customize->add_setting( 'heading_team_section_style',
		array(
			'transport' => 'refresh',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control( 
		new Kunty_Simple_Notice_Custom_Control(
			$wp_customize, 'heading_team_section_style',
			array(
				'label' => esc_html__( 'Section Style', 'kunty' ),
				'type' => 'heading',
				'section' => 'team_section_settings',
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Background color
	$wp_customize->add_setting( 'team_section_bg', array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'team_section_bg',
			array(
				'label'   => esc_html__( 'Background Color', 'kunty' ),
				'section'     => 'team_section_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					if(1 === get_theme_mod('team_section_enable') ){
						return true;
					} else {
						return false;
					}
				},
			)
		) 
	);

	// Top Padding
	$wp_customize->add_setting( 'team_section_pt',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'team_section_pt',
	   array(
			'label'             => esc_html__( 'Padding Top (px)', 'kunty' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );

	// Bottom Padding
	$wp_customize->add_setting( 'team_section_pb',
	   array(
		  'default' => '',
		  'transport' => 'postMessage',
		  'sanitize_callback' => 'kunty_sanitize_integer'
	   )
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'team_section_pb',
	   array(
			'label'             => esc_html__( 'Padding Bottom (px)', 'kunty' ),
			'section'           => 'team_section_settings',
			'input_attrs' => array(
				'min' => 0,
				'max' => 400,
				'step' => 1,
			),
			'active_callback' => function(){
				 if(1===get_theme_mod('team_section_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
	   )
	) );
