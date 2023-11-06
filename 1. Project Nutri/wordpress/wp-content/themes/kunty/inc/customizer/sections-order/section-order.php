<?php 
	
/**
 * Section Order sortable
 * 
 * @package Kunty
 */

$wp_customize->add_section( 'kunty_section_orders',
	array(
		'priority'    => 90,
		'title'       => esc_html__( 'Section Order', 'kunty' ),
		'panel'       => 'kunty_frontpage_settings',
	)
);

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	$wp_customize->add_setting( 'kunty_sections_sort', 
		array(
			'sanitize_callback' => 'kunty_sanitize_sort',
			'default'           => array( 'hero', 'services', 'brands', 'why', 'feedback', 'portfolios', 'team', 'pricing', 'cta', 'news'),
		)
	);

	$wp_customize->add_control( new Kunty_Control_Sortable( $wp_customize, 'kunty_sections_sort', 
		array(
			'label' => esc_html__( 'Sort Sections', 'kunty'  ),
			'section' => 'kunty_section_orders',
			'type'=> 'sortable',
			'choices'  => array(
				'hero' => esc_html__( 'Hero Area', 'kunty'  ),
				'services' => esc_html__( 'Services', 'kunty'  ),
				'brands' => esc_html__( 'Brand Logos', 'kunty'  ),
				'why' => esc_html__( 'Why Choose', 'kunty'  ),
				'feedback' => esc_html__( 'Feedback', 'kunty'  ),
				'portfolios' => esc_html__( 'Portfolios', 'kunty'  ),
				'team' => esc_html__( 'Team', 'kunty'  ),
				'pricing' => esc_html__( 'Pricing Plans', 'kunty'  ),
				'cta' => esc_html__( 'Call to Action', 'kunty'  ),
				'news' => esc_html__( 'Latest News', 'kunty'  ),
			),
			'description'	=> __( 'Drag and drop to rearange. Click on eye icon to hide a specific section', 'kunty' )
			) 
		) 
	);
}

if(!kunty_set_to_premium()) {
	// Plus message
	$wp_customize->add_setting( 'kunty_order_styling_message',
		array(
			'sanitize_callback' => 'wp_kses_post',
		)
	);
	$wp_customize->add_control( new Kunty_Misc_Control( $wp_customize, 'kunty_order_styling_message',
		array(
			'type'        => 'custom_message',
			'section'     => 'kunty_section_orders',
			'description' => __('<h4 class="customizer-group-heading-message">Drag &amp; Drop Section Orders</h4><p class="customizer-group-heading-message">Install and upgrade the <a target="_blank" href="https://wordpress.org/plugins/themereps-helper/">Themereps Helper</a> plugin for full control over the frontpage SECTIONS ORDER! and for advanced styling</p>', 'kunty' )
		)
	));
}


