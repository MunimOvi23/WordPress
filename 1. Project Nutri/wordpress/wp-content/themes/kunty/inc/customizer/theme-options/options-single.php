<?php

/* Single Settings
----------------------------------------------------------------------*/
	$wp_customize->add_section( 'single_post_settings',
		array(
			'priority'    => 6,
			'title'       => esc_html__( 'Single Post Settings', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_theme_options',
		)
	);

	// Single Post Page Layout
	$wp_customize->add_setting( 'blog_single_layout',
		array(
			'default' => 'left-sidebar',
			'transport' => 'refresh',
			'sanitize_callback' => 'kunty_radio_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_single_layout',
		array(
			'label'       => esc_html__( 'Post detail page layout', 'kunty' ),
			'section' => 'single_post_settings',
			'choices' => array(
				'left-sidebar' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-left.png',
					'name' => __( 'Left Sidebar', 'kunty' )
				),
				'no-sidebar' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-none.png',
					'name' => __( 'Fullwidth', 'kunty' )
				),
				'right-sidebar' => array(
					'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-right.png',
					'name' => __( 'Right Sidebar', 'kunty' )
				)
			),
		)
	) );

	// Show/Hide Thumbnail
	$wp_customize->add_setting( 'single_post_thumb_display',
		array(
			'default' => 1,
			'sanitize_callback' => 'kunty_switch_sanitization',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'single_post_thumb_display',
		array(
			'label'       => esc_html__( 'Display post thumbnail', 'kunty' ),
			'section'     => 'single_post_settings',
			'description' => esc_html__( 'Turn On/Off the switch to show/hide post thumbnail', 'kunty' )
		)
	) );

	// Display dropcaps
	$wp_customize->add_setting( 'single_post_dropcaps_display',
		array(
			'default' => 1,
			'sanitize_callback' => 'kunty_switch_sanitization',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'single_post_dropcaps_display',
		array(
			'label'			=> esc_html__( 'Display dropcaps?.', 'kunty' ),
			'description'	=> esc_html__( 'Turn On/Off the switch to show/hide dropcaps letter', 'kunty' ),
			'section'       => 'single_post_settings',
		)
	) );

	// Display Categories
	$wp_customize->add_setting( 'single_post_cat_display',
		array(
			'default' => 1,
			'sanitize_callback' => 'kunty_switch_sanitization',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'single_post_cat_display',
		array(
			'label'			=> esc_html__( 'Display post categories?.', 'kunty' ),
			'description'	=> esc_html__( 'Turn On/Off the switch to show/hide post categories', 'kunty' ),
			'section'       => 'single_post_settings',
		)
	) );

	// Display Post Meta.
	$wp_customize->add_setting( 'single_post_meta_display',
		array(
			'default' => 1,
			'sanitize_callback' => 'kunty_switch_sanitization',
			'transport' => 'postMessage'
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'single_post_meta_display',
		array(
			'label'			=> __( 'Display post meta.', 'kunty' ),
			'description'	=> __( 'Turn On/Off the switch to show/hide post meta', 'kunty' ),
			'section'     => 'single_post_settings',
		)
	) );

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Display Related Post
	$wp_customize->add_setting( 'related_post_display',
		array(
			'default' => 0,
			'sanitize_callback' => 'kunty_switch_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'related_post_display',
		array(
			'label'       => esc_html__( 'Display related posts', 'kunty' ),
			'description'	=> esc_html__( 'Turn On/Off the switch to show/hide related posts', 'kunty' ),
			'section'       => 'single_post_settings',
		)
	) );

	/** Related Posts label */
	$wp_customize->add_setting( 'related_posts_label',
		array(
			'default'           => esc_html__( 'You May Also Like...', 'kunty' ),
			'sanitize_callback' => 'sanitize_text_field',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control( 'related_posts_label',
		array(
			'label'         => esc_html__( 'Related Posts Title', 'kunty' ),
			'section'       => 'single_post_settings',
			'type'          => 'text',
			'active_callback' =>function () {
				if ( get_theme_mod( 'related_post_display' ) ) {
					return true;
				} else {
					return false;
				}
			}
		)
	);
	$wp_customize->selective_refresh->add_partial( 'related_posts_label', array(
		'selector' => '.related-heading h4',
		'settings' => array( 'related_posts_label' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'related_posts_label');
			},
	) );

	// Related Post Choice
	$wp_customize->add_setting( 'related_post_choice',
		 array(
			'default'   => 'category',
			'sanitize_callback' => 'kunty_sanitize_choices',
		)
	);
	$wp_customize->add_control( 'related_post_choice', 
		array(
			'label'    => esc_html__( 'Display Related Posts By:', 'kunty' ),
			'section'  => 'single_post_settings',
			'type'     => 'radio',
			'choices'  => array(
				'category' => esc_html__( 'Categories ', 'kunty' ),
				'choice2' => esc_html__( 'Tags', 'kunty' ),
			),
			'active_callback' =>function () {
				if ( get_theme_mod( 'related_post_display') ) {
					return true;
				} else {
					return false;
				}
			}
		)
	);
}