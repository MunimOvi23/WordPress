<?php
/* Miscellaneous Settings
----------------------------------------------------------------------*/
$wp_customize->add_section( 'kunty_misc_settings',
	array(
		'title'       => esc_html__( 'Misc Settings', 'kunty' ),
		'description' => '',
		'panel'       => 'kunty_theme_options',
		'priority'    => 8,
	)
);

//Container Width
$wp_customize->add_setting( 'container_width',
	array(
        'sanitize_callback' => 'kunty_sanitize_integer',
		'default'           => 1170,
		'transport' 		=> 'refresh',
	)
);
$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
	$wp_customize, 'container_width', 
		array(
			'label'	    => esc_html__('Container Width(px)','kunty'),
			'type'      => 'range',
			'section'  => 'kunty_misc_settings',
			'input_attrs'    => array(
				'min' => 980,
				'max' => 1600,
				'step' => 1,
				'suffix' => 'px',
			),
		)
	)
);
if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	
	// Button Border Radius 
	$wp_customize->add_setting( 'site_btn_bradius',
		array(
			'sanitize_callback' => 'kunty_sanitize_integer',
			'default'           => 3,
			'transport' 		=> 'refresh',
		)
	);
	$wp_customize->add_control( new Kunty_Slider_Custom_Control( 
		$wp_customize, 'site_btn_bradius', 
			array(
				'label'	    => esc_html__('Button Border Radius','kunty'),
				'type'      => 'range',
				'section'  => 'kunty_misc_settings',
				'input_attrs'    => array(
					'min' => 0,
					'max' => 100,
					'step' => 1,
				),
			)
		)
	);
}