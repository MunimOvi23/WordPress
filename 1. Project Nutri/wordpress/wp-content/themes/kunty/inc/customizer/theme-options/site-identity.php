<?php
/**
 * Site Identity.
 */

	/* Sticky Logo */
	$wp_customize->add_setting( 
		'kunty_sticky_logo', 
		array(
			'sanitize_callback' => 'esc_url_raw'
		)
	);
	$wp_customize->add_control( 
		new WP_Customize_Upload_Control( 
			$wp_customize, 
			'kunty_sticky_logo', 
			array(
				'label'      => __( 'Sticky Logo', 'kunty' ),
				'priority'   => 9,
				'section'    => 'title_tagline'                   
			)
		) 
	);

	// Logo, title and description chooser
	$wp_customize->add_setting( 'site_logo_option',
		array (
			'default'           => 'title-only',
			'sanitize_callback' => 'kunty_sanitize_logo',
			'transport'         => 'refresh'
		)
	);
	$wp_customize->add_control( 'site_logo_option',
		array(
			'label'     	=> esc_html__( 'Site Logo Options', 'kunty' ),
			'section'   	=> 'title_tagline',
			'type'      	=> 'radio',
			'description'	=> esc_html__( 'Choose your preferred option.', 'kunty' ),
			'choices'   => array (
				'title-only' 	=> esc_html__( 'Display Site title only.', 'kunty' ),
				'title-desc' 	=> esc_html__( 'Display site title & tagline.', 'kunty' ),
				'logo-only'     => esc_html__( 'Display logo image only.', 'kunty' ),
			)
		)
	);

// Heading
$wp_customize->add_setting( 'kunty_site_title_heaidng',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Kunty_Simple_Notice_Custom_Control( 
		$wp_customize, 'kunty_site_title_heaidng',
		array(
			'label' => esc_html__( 'Style', 'kunty' ),
			'type' => 'heading',
			'section' => 'title_tagline',
			//'active_callback' 		=> 'callback_kunty_site_title'
		)
	) 
);

// Logo Width
$wp_customize->add_setting( 'site_logo_width',
	array(
        'sanitize_callback' => 'kunty_sanitize_integer',
		'default'           => '',
		'transport' 		=> 'postMessage',
	)
);
$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
	$wp_customize, 'site_logo_width', 
		array(
			'label'	    => esc_html__('Logo Image Width (px)','kunty'),
			'section'       => 'title_tagline',
			'type'          => 'range',
			'input_attrs'   => array(
				'min' => 20,
				'max' => 200,
				'step' => 1,
				'suffix' => 'px', //optional suffix
			),
			'active_callback' => function(){
				if('logo-only' === get_theme_mod('site_logo_option') ){
					return true;
				} else {
					return false;
				}
			}
		)
	)
);

// Logo Height
$wp_customize->add_setting( 'site_logo_height',
	array(
        'sanitize_callback' => 'kunty_sanitize_integer',
		'default'           => '',
		'transport' 		=> 'postMessage',
	)
);
$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
	$wp_customize, 'site_logo_height', 
		array(
			'label'	    => esc_html__('Logo Image Height (px)','kunty'),
			'section'       => 'title_tagline',
			'type'          => 'range',
			'input_attrs'   => array(
				'min' => 20,
				'max' => 120,
				'step' => 1,
				'suffix' => 'px', //optional suffix
			),
			'active_callback' => function(){
				if('logo-only' === get_theme_mod('site_logo_option') ){
					return true;
				} else {
					return false;
				}
			}
		)
	)
);

// Title Font family
$wp_customize->add_setting( 'site_title_font_family',
		array(
		 'default' => json_encode(
			 array(
				'font' => 'Quicksand',
				'boldweight' => '700',
				'category' => 'sans-serif'
			 )
		  ),
		'sanitize_callback' => 'kunty_google_font_sanitization',
		'transport' => 'refresh',
	)
);
$wp_customize->add_control( new Kunty_Google_Font_Select_Custom_Control( $wp_customize, 'site_title_font_family',
		array(
			'label'    => esc_html__( 'Site Title Font Family','kunty'),
			'section'  => 'title_tagline',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby' => 'alpha',
			),
			'active_callback' 		=> 'callback_kunty_site_title'
		)
	) 
);

// Site Title Font Size
$wp_customize->add_setting( 'site_title_font_size',
	array(
        'sanitize_callback' => 'kunty_sanitize_integer',
		'default'           => 28,
		'transport' 		=> 'refresh',
	)
);
$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
	$wp_customize, 'site_title_font_size', 
		array(
			'label'	    => esc_html__('Site Title Font Size(px)','kunty'),
			'section'       => 'title_tagline',
			'type'          => 'range',
			'input_attrs'   => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'suffix' => 'px', //optional suffix
			),
			'active_callback' 		=> 'callback_kunty_site_title'
		)
	)
);

// Site Title Color
$wp_customize->add_setting( 'site_title_color',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_hex_rgba_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( $wp_customize, 'site_title_color',
	array(
		'label'       => esc_html__( 'Site Title Color', 'kunty' ),
		'section'     => 'title_tagline',
		'input_attrs' => array(
			'palette' => array(
				'#000000',
				'#ffffff',
				'#444444',
				'#777777',
				'#999999',
				'#aaaaaa',
				'#dddddd',
				'#222222',
			)
		),
		'active_callback' 		=> 'callback_kunty_site_title'
	)
) );

// Site Title Heading
$wp_customize->add_setting( 'kunty_site_tagline_heaidng',
	array(
		'transport' => 'refresh',
		'sanitize_callback' => 'sanitize_text_field'
	)
);
$wp_customize->add_control( 
	new Kunty_Simple_Notice_Custom_Control( 
		$wp_customize, 'kunty_site_tagline_heaidng',
		array(
			'label' => esc_html__( 'Tagline Style', 'kunty' ),
			'type' => 'heading',
			'section' => 'title_tagline',
			'active_callback' 		=> 'callback_kunty_logo_tagline'
		)
	) 
);
// Tagline Font family
$wp_customize->add_setting( 'tagline_font_family',
		array(
		 'default' => json_encode(
			 array(
				'font' => 'Poppins',
				'boldweight' => '400',
				'category' => 'sans-serif'
			 )
		  ),
		'sanitize_callback' => 'kunty_google_font_sanitization',
		'transport' => 'refresh',
	)
);
$wp_customize->add_control( new Kunty_Google_Font_Select_Custom_Control( $wp_customize, 'tagline_font_family',
		array(
			'label'    => esc_html__( 'Tagline Font Family','kunty'),
			'section'  => 'title_tagline',
			'input_attrs' => array(
				'font_count' => 'all',
				'orderby' => 'alpha',
			),
			'active_callback' 		=> 'callback_kunty_logo_tagline'
		)
	) 
);

// Tagline Font Size
$wp_customize->add_setting( 'tagline_font_size',
	array(
        'sanitize_callback' => 'kunty_sanitize_integer',
		'default'           => 14,
		'transport' 		=> 'refresh',
	)
);
$wp_customize->add_control( new Kunty_Slider_Custom_Control( $wp_customize, 'tagline_font_size', 
		array(
			'label'         => esc_html__( 'Tagline Font Size', 'kunty' ),
			'section'       => 'title_tagline',
			'type'          => 'range',
			'input_attrs'   => array(
				'min' => 0,
				'max' => 100,
				'step' => 1,
				'suffix' => 'px', //optional suffix
			),
			'active_callback' 		=> 'callback_kunty_logo_tagline'
		)
	)
);

//Tagline Color
$wp_customize->add_setting( 'tagline_text_color',
	array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'kunty_hex_rgba_sanitization'
	)
);
$wp_customize->add_control( new Kunty_Customize_Alpha_Color_Control( $wp_customize, 'tagline_text_color',
	array(
		'label'       => esc_html__( 'Tagline Color', 'kunty' ),
		'section'     => 'title_tagline',
		'input_attrs' => array(
			'palette' => array(
				'#000000',
				'#ffffff',
				'#444444',
				'#777777',
				'#999999',
				'#aaaaaa',
				'#dddddd',
				'#222222',
			)
		),
		'active_callback' 		=> 'callback_kunty_logo_tagline'
	)
) );


// Site Title Callback
function callback_kunty_site_title() {
	
	if ( 'title-only' == get_theme_mod( 'site_logo_option') || 'title-desc' == get_theme_mod( 'site_logo_option' ) || 'title-img' == get_theme_mod( 'site_logo_option' ) ) {
		return true;
	} else {
		return false;
	}
	
}
// Site Tagline Callback
function callback_kunty_logo_tagline() {
	
	if ( 'title-desc' == get_theme_mod( 'site_logo_option' ) ) {
		return true;
	} else {
		return false;
	}
	
}

