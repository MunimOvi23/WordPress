<?php 
	
// Shop Layout settings
$wp_customize->add_setting( 'shop_layout',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => 'no-sidebar',
	)
);
$wp_customize->add_control( 'shop_layout',
	array(
		'type'        => 'select',
		'label'       => esc_html__( 'Shop Page Layout', 'kunty' ),
		'description' => '',
		'section'     => 'woocommerce_product_catalog',
		'choices'     => array(
			'right-sidebar' => esc_html__( 'Right sidebar', 'kunty' ),
			'left-sidebar'  => esc_html__( 'Left sidebar', 'kunty' ),
			'no-sidebar'    => esc_html__( 'No sidebar', 'kunty' ),
		)
	)
);













