<?php
/* Footer Widgets Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'footer_widgets_settings',
	array(
		'title'       => esc_html__( 'Footer Settings', 'kunty' ),
		'panel'       => 'kunty_theme_options',
		'priority'    => 9,
	)
);

// Widget Layout
$wp_customize->add_setting( 'footer_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '',
		// 'transport'         => 'postMessage',
	)
);
$wp_customize->add_control( 'footer_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Wigets Layout', 'kunty' ),
		'section'     => 'footer_widgets_settings',
		'description' => esc_html__( 'Number footer columns to display.', 'kunty' ),
		'choices'     => array(
			'4' => 4,
			'3' => 3,
			'2' => 2,
			'1' => 1,
			'0' => esc_html__( 'Disable footer widgets', 'kunty' ),
		),
	)
);

for ( $i = 1; $i <= 4; $i ++ ) {
	$df = 12;
	if ( $i > 1 ) {
		$_n = 12 / $i;
		$df = array();
		for ( $j = 0; $j < $i; $j ++ ) {
			$df[ $j ] = $_n;
		}
		$df = join( '+', $df );
	}
	$wp_customize->add_setting( 'footer_custom_' . $i . '_columns',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => $df,
		)
	);
	$wp_customize->add_control( 'footer_custom_' . $i . '_columns',
		array(
		    /* translators: Custom footer columns width */
			'label'       => $i == 1 ? __( 'Custom footer 1 column width', 'kunty' ) : sprintf( __( 'Custom footer %s columns width', 'kunty' ), $i ),
			'section'     => 'footer_widgets_settings',
			'description' => esc_html__( 'Enter int numbers and sum of them must smaller or equal 12, separated by "+"', 'kunty' ),
		)
	);
}


if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	// Widget Title Color
	$wp_customize->add_setting( 'footer_widgets_title_color', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_title_color',
			array(
				'label'   => esc_html__( 'Title Color', 'kunty' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
			)
		) 
	);
	
	// Widget Text Color
	$wp_customize->add_setting( 'footer_widgets_text_color', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_text_color',
			array(
				'label'       => esc_html__( 'Text Color', 'kunty' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
			)
		) 
	);

	// Widgets Link Color
	$wp_customize->add_setting( 'footer_widgets_link_color', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_link_color',
			array(
				'label'       => esc_html__( 'Link Color', 'kunty' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);

	// Widget Link Hover Color
	$wp_customize->add_setting( 'footer_widgets_link_hcolor', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_link_hcolor',
			array(
				'label'       => esc_html__( 'Link Hover Color', 'kunty' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
}

	// Background
	$wp_customize->add_setting( 'footer_widgets_bg_color', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_bg_color',
			array(
				'label'   => esc_html__( 'Background Color 1', 'kunty' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
	
	$wp_customize->add_setting( 'footer_widgets_bg_color_2', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization',
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_widgets_bg_color_2',
			array(
				'label'   => esc_html__( 'Background Color 2', 'kunty' ),
				'section'     => 'footer_widgets_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
	
/* Footer Copyright Settings
----------------------------------------------------------------------*/

	$wp_customize->add_section( 'footer_copyright_settings',
		array(
			'title'       => esc_html__( 'Copyright Info', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_theme_options',
			'priority'    => 12,
		)
	);

	// Copyright Text
	$wp_customize->add_setting( 'footer_copyright_text',
		 array(
			'default'			  => '',
			'transport'			  => 'postMessage',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);
	$wp_customize->add_control('footer_copyright_text',
		array(
			'label'    => esc_html__('Copyright Text', 'kunty'),
			'section'  => 'footer_copyright_settings',
			'type'     => 'text'
		)
	);
	$wp_customize->selective_refresh->add_partial( 'footer_copyright_text', array(
		'selector' => ' #copyright-text',
		'settings' => array( 'footer_copyright_text' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'footer_copyright_text');
			},
	) );

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	
	// Copyright Text Color
	$wp_customize->add_setting( 'footer_copyright_text_color', array(
		  'default' => '',
		  'sanitize_callback' => 'kunty_hex_rgba_sanitization'
		)
	);
	$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( 
		$wp_customize, 'footer_copyright_text_color',
			array(
				'label'       => esc_html__( 'Text Color', 'kunty' ),
				'section'     => 'footer_copyright_settings',
				'show_opacity' => false,
				'active_callback' => function(){
					 $footer_layout = get_theme_mod('footer_layout');
					 if('0' !=$footer_layout){
						return true;
					 } else {
						 return false;
					 }
				},
			)
		) 
	);
}
