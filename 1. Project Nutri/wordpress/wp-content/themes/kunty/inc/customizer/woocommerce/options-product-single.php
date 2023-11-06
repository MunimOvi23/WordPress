<?php 
	$wp_customize->add_section('kunty_product_single_settings', array(
		'title'    => __('Product Single', 'kunty'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	// Shop Layout settings
	$wp_customize->add_setting( 'product_single_layout',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => 'right-sidebar',
		)
	);
	$wp_customize->add_control( 'product_single_layout',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Page Layout', 'kunty' ),
			'description' => '',
			'section'     => 'kunty_product_single_settings',
			'choices'     => array(
				'right-sidebar' => esc_html__( 'Right sidebar', 'kunty' ),
				'left-sidebar'  => esc_html__( 'Left sidebar', 'kunty' ),
				'no-sidebar'    => esc_html__( 'No sidebar', 'kunty' ),
			),
		)
	);

	// Hide/show related products
	$wp_customize->add_setting( 'product_single_related_enable', 
		array(
		  'default'  =>  1,
		  'sanitize_callback' => 'kunty_sanitize_checkbox',
		)
	);
	$wp_customize->add_control( 'product_single_related_enable', 
		array(
		  'label'         => esc_html__( 'Show/hide Related products', 'kunty' ),
		  'description'   => esc_html__( 'Check/Uncheck this box to show/hide related products on single product page.', 'kunty' ),
		  'section'       => 'kunty_product_single_settings',
		  'type'          => 'checkbox',
		)
	);

	// Products per row
	$wp_customize->add_setting( 'related_products_per_row',
		array(
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => 3,
		)
	);
	$wp_customize->add_control( 'related_products_per_row',
		array(
			'type'        => 'select',
			'label'       => esc_html__( 'Related products per row', 'kunty' ),
			'description' => esc_html__( 'How many related products should be shown per row?', 'kunty' ),
			'section'     => 'kunty_product_single_settings',
			'choices'     => array(
				'2' => '2',
				'3' => '3',
				'4' => '4',
			),
			'active_callback' => function(){
				 if(1==get_theme_mod('product_single_related_enable')){
					return true;
				 } else {
					 return false;
				 }
			},
		)
	);