<?php
/**
 * Contact Page Settings
 * ----------------------------------------------------------------------
*/
 
	$wp_customize->add_panel( 'kunty_contact_settings',
		array(
			'priority'       => 40,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => esc_html__( 'Contact Page Settings', 'kunty' ),
			'description'    => '',
		)
	);
	
	$wp_customize->add_section( 'contact_details_settings',
		array(
			'title'       => esc_html__( 'Contact Details', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_contact_settings',
		)
	);

	// Title
	$wp_customize->add_setting(
		'contact_info_title',
		array(
			'default'           => __( 'Contact Info', 'kunty' ),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'contact_info_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Section Title', 'kunty' ),
			'type'              => 'text',
		)
	);
	
    // Phone title  
	$wp_customize->add_setting(
		'phone_title',
		array(
			'default'           => __( 'Call Us', 'kunty' ),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'phone_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Phone Label', 'kunty' ),
			'type'              => 'text',
		)
	);
	// Phone 1
	$wp_customize->add_setting(
		'phone_1',
		array(
			'default'           => __('+7(123) 9876 543', 'kunty'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'phone_1',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Phone 1 Number', 'kunty' ),
			'type'              => 'text',
		)
	);

	// Phone 2
	$wp_customize->add_setting(
		'phone_2',
		array(
			'default'           => __('+7(123) 9876 543', 'kunty'),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'phone_2',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Phone 2 number', 'kunty' ),
			'type'              => 'text',
		)
	);

	// Mail Title
	$wp_customize->add_setting(
		'mail_title',
		array(
			'default'           => __('Email Us', 'kunty'),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'mail_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Mail Address Label', 'kunty' ),
			'type'              => 'text',
		)
	);
	// Mail 1 Address
	$wp_customize->add_setting( 'email_1',
		array(
			'default'           => 'help@kunty.com',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'email_1',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Email 1 Address', 'kunty' ),
			'type'              => 'text',
		)
	);

	// Mail 2 Address
	$wp_customize->add_setting( 'email_2',
		array(
			'default'           => 'info@kunty.com',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control( 'email_2',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Email 2 Address', 'kunty' ),
			'type'              => 'text',
		)
	);

	// Address Title
	$wp_customize->add_setting(
		'address_title',
		array(
			'default'           => __('Location', 'kunty'),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'address_title',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Location Label', 'kunty' ),
			'type'              => 'text',
		)
	);

	// Address
	$wp_customize->add_setting(
		'contact_address',
		array(
			'default'           => __( 'Warnwe Park Streetperrine, FL 33157 New York City', 'kunty' ),
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'contact_address',
		array(
			'section'           => 'contact_details_settings',
			'label'             => __( 'Location', 'kunty' ),
			'type'              => 'text',
		)
	);
	
	// Form Settings
	$wp_customize->add_section( 'contact_form_settings',
		array(
			'title'       => esc_html__( 'Contact Form', 'kunty' ),
			'panel'       => 'kunty_contact_settings',
		)
	);

	$wp_customize->add_setting(
		'contact_form_title',
		array(
			'default'           => __('Get in Touch', 'kunty'),
			'sanitize_callback' => 'sanitize_text_field',
			//'transport'			=> 'postMessage'
		)
	);
	$wp_customize->add_control(
		'contact_form_title',
		array(
			'section'           => 'contact_form_settings',
			'label'             => __( 'Section Title', 'kunty' ),
			'type'              => 'text',
		)
	);

	// Form shortcode
	$wp_customize->add_setting(
		'contact_form_shortcode',
		array(
			'default'           => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'contact_form_shortcode',
		array(
			'section'           => 'contact_form_settings',
			'label'             => __( 'Contact Form 7 Shortcode', 'kunty' ),
            'description'       => __( 'Please generate the shortcode from contact form 7 widget', 'kunty' ),
			'type'              => 'text',
		)
	);

	// Map Settings
	$wp_customize->add_section( 'contact_map_settings',
		array(
			'title'       => esc_html__( 'Contact Map', 'kunty' ),
			'description' => '',
			'panel'       => 'kunty_contact_settings',
		)
	);
    $wp_customize->add_setting(
        'contact_google_map_iframe',
        array(
            'default'           => '',
            'sanitize_callback' => 'kunty_sanitize_map_iframe',
        )
    );
    $wp_customize->add_control(
        'contact_google_map_iframe',
        array(
            'section'         => 'contact_map_settings',
            'label'           => __( 'Embeded Google Map', 'kunty' ),
            'type'            => 'text',
        )
    );
