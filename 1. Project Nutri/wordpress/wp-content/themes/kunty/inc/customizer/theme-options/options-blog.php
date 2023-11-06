<?php
/**
 * Blog Post Settings
 * @since 1.0.0
 * ----------------------------------------------------------------------
 */
$wp_customize->add_section( 'blog_settings',
	array(
		'priority'    => 5,
		'title'       => esc_html__( 'Blog/Archive Settings', 'kunty' ),
		'description' => '',
		'panel'       => 'kunty_theme_options',
		)
);

// Blog Page Title
$wp_customize->add_setting( 'blog_page_title',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => esc_html__( 'Blog', 'kunty' ),
		'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'blog_page_title',
	array(
		'label'       => esc_html__( 'Blog Page Title', 'kunty' ),
		'section'     => 'blog_settings',
	)
);

// Display breadcrumb
$wp_customize->add_setting( 'blog_breadcrumb_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'blog_breadcrumb_display',
	array(
		'label'		  => __( 'Display Breadcrumb', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide breadcrumb on blog page', 'kunty' )
	)
) );

// Blog Layout settings
$wp_customize->add_setting( 'blog_layout',
	array(
		'default' => 'no-sidebar',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_radio_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Image_Radio_Button_Custom_Control( $wp_customize, 'blog_layout',
	array(
		'label'       => esc_html__( 'Layout', 'kunty' ),
		'section' => 'blog_settings',
		'choices' => array(
			'no-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-none.png',
				'name' => __( 'Fullwidth', 'kunty' )
			),
			'left-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-left.png',
				'name' => __( 'Left Sidebar', 'kunty' )
			),
			'right-sidebar' => array(
				'image' => trailingslashit( get_template_directory_uri() ) . 'inc/customizer/assets/img/sidebar-right.png',
				'name' => __( 'Right Sidebar', 'kunty' )
			)
		),
	)
) );

// Post Column settings
$wp_customize->add_setting( 'blog_columns',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'three-columns',
	)
);
$wp_customize->add_control( 'blog_columns',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Grid Column', 'kunty' ),
		'description' => esc_html__( 'Select number of columns that you want to show on blog page. ', 'kunty' ),
		'section'     => 'blog_settings',
		'choices'     => array(
			'three-columns' => esc_html__( 'Three Columns', 'kunty' ),
			'two-columns'  => esc_html__( 'Two Columns', 'kunty' ),
			'single-column'    => esc_html__( 'Single Column', 'kunty' ),
		),
	)
);

// Blog Style settings
$wp_customize->add_setting( 'blog_post_grid',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'masonry',
	)
);
$wp_customize->add_control( 'blog_post_grid',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Grid Style', 'kunty' ),
		'section'     => 'blog_settings',
		'choices'     => array(
			'masonry' => esc_html__( 'Masonry', 'kunty' ),
			'equal-height'  => esc_html__( 'Equal Height', 'kunty' ),
		),
	)
);

// Display Post Thumbnail.
$wp_customize->add_setting( 'post_thumbnail_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'post_thumbnail_display',
	array(
		'label'		  => __( 'Display Post Thumbnails.', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post thumbnails on main blog page', 'kunty' )
	)
) );

// Display Post Content.
$wp_customize->add_setting( 'post_excerpt_display',
	array(
		'default' => 0,
		'sanitize_callback' => 'kunty_switch_sanitization',
		//'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'post_excerpt_display',
	array(
		'label'			=> __( 'Display Post Excerpts', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post excerpts', 'kunty' )
	)
) );

// Excerpt count control and setting
$wp_customize->add_setting( 'post_excerpt_count',
   array(
      'default' => 20,
      'sanitize_callback' => 'kunty_sanitize_integer'
   )
);
$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'post_excerpt_count',
   array(
		'label'             => esc_html__( 'Excerpt Length', 'kunty' ),
		'description'       => esc_html__( 'Note: Min 1 & Max 50.', 'kunty' ),
		'section'           => 'blog_settings',
		'input_attrs' => array(
			'min' => 10,
			'max' => 60,
			'step' => 1,
		),
		'active_callback' => function(){
			 if(1===get_theme_mod('post_excerpt_display')){
				return true;
			 } else {
				 return false;
			 }
		},
   )
) );

// Post dots
$wp_customize->add_setting( 'post_excerpt_dots',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '[...]',
	)
);
$wp_customize->add_control( 'post_excerpt_dots',
	array(
		'label'       => esc_html__( 'Excerpt Suffix', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Defines the three dots \'[...]\' that are appended automatically to excerpts.', 'kunty' ),
		'active_callback' => function(){
			 if(get_theme_mod('post_excerpt_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);

// Display Read More
$wp_customize->add_setting( 'post_readmore_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization',
		//'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'post_readmore_display',
	array(
		'label'			=> esc_html__( 'Display Read More Button?', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide read more button', 'kunty' )
	)
) );

// Readmore Text
$wp_customize->add_setting( 'post_readmore_text',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		//'default'           => esc_html__( 'Read More', 'kunty' ),
		//'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'post_readmore_text',
	array(
		'label'       => esc_html__( 'Read More Button Text', 'kunty' ),
		'section'     => 'blog_settings',
		'active_callback' => function(){
			 if(1===get_theme_mod('post_readmore_display')){
				return true;
			 } else {
				 return false;
			 }
		},
	)
);

// Display category.
$wp_customize->add_setting( 'post_cat_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'post_cat_display',
	array(
		'label'			=> esc_html__( 'Display Category', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post category', 'kunty' )
	)
) );

// Display Date Meta.
$wp_customize->add_setting( 'post_date_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'post_date_display',
	array(
		'label'			=> esc_html__( 'Display Date', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post date', 'kunty' )
	)
) );


// Display Post Author
$wp_customize->add_setting( 'post_author_display',
	array(
		'default' => 1,
		'sanitize_callback' => 'kunty_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'post_author_display',
	array(
		'label'			=> esc_html__( 'Display Post Author', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post author', 'kunty' )
	)
) );

// Display Post Comment
$wp_customize->add_setting( 'post_comment_number_display',
	array(
		'default' => 0,
		'sanitize_callback' => 'kunty_switch_sanitization',
		'transport' => 'postMessage'
	)
);
$wp_customize->add_control( new Kunty_Toggle_Switch_Custom_control( $wp_customize, 'post_comment_number_display',
	array(
		'label'			=> esc_html__( 'Display Comment Number', 'kunty' ),
		'section'     => 'blog_settings',
		'description' => esc_html__( 'Turn On/Off the switch to show/hide post comment number', 'kunty' )
	)
) );

// Pagination - Pagination Type
$wp_customize->add_setting( 'pagination_type',
	array(
		'default'           => 'numeric',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'kunty' ),
		'section'         => 'blog_settings',
		'type'            => 'select',
		'choices'         => array(
			'numeric' => __( 'Default(Numeric)', 'kunty' ),
			'default' => __( 'Older/Newer', 'kunty' ),

		),
	)
);
