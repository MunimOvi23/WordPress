<?php
/**
 * Services Section options.
 *
 * @package Prime Charity Trust
 */

$default = prime_charity_trust_get_default_theme_options();

// Services Section
$wp_customize->add_section( 'section_featured_services',
	array(
	'title'      => __( 'Services Section', 'prime-charity-trust' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	'panel'      => 'home_page_panel',
	)
);

// Enable Section
$wp_customize->add_setting('theme_options[enable_featured_services_section]', 
	array(
	'default' 			=> $default['enable_featured_services_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'prime_charity_trust_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[enable_featured_services_section]', 
	array(		
	'label' 	=> __('Enable Section', 'prime-charity-trust'),
	'section' 	=> 'section_featured_services',
	'settings'  => 'theme_options[enable_featured_services_section]',
	'type' 		=> 'checkbox',	
	)
);
// Section Title
$wp_customize->add_setting('theme_options[featured_services_section_title]', 
	array(
	'default'           => $default['featured_services_section_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[featured_services_section_title]', 
	array(
	'label'       => __('Section Title', 'prime-charity-trust'),
	'section'     => 'section_featured_services',   
	'settings'    => 'theme_options[featured_services_section_title]',	
	'active_callback' => 'prime_charity_trust_featured_services_active',		
	'type'        => 'text'
	)
);

// Items
$wp_customize->add_setting('theme_options[number_of_featured_services_items]', 
	array(
	'default' 			=> $default['number_of_featured_services_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'prime_charity_trust_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_featured_services_items]', 
	array(
	'label'       => __('Items (Max: 6)', 'prime-charity-trust'),
	'section'     => 'section_featured_services',   
	'settings'    => 'theme_options[number_of_featured_services_items]',		
	'type'        => 'number',
	'active_callback' => 'prime_charity_trust_featured_services_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 6,
			'step'	=> 1,
		),
	)
);

$number_of_featured_services_items = prime_charity_trust_get_option( 'number_of_featured_services_items' );

for( $i=1; $i<=$number_of_featured_services_items; $i++ ) {

	// Post
	$wp_customize->add_setting('theme_options[featured_services_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'prime_charity_trust_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[featured_services_post_'.$i.']', 
		array(
		'label'       => __('Post #', 'prime-charity-trust').$i,
		'section'     => 'section_featured_services',   
		'settings'    => 'theme_options[featured_services_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => prime_charity_trust_dropdown_posts(),
		)
	);
}