<?php

$default = prime_charity_trust_get_default_theme_options();
/**
* Add Header Top Panel
*/
$wp_customize->add_panel( 'header_top_panel', array(
    'title'          => __( 'Header Top', 'prime-charity-trust' ),
    'priority'       => 20,
    'capability'     => 'edit_theme_options',
) );

/** Header contact info section */
$wp_customize->add_section(
    'header_contact_info_section',
    array(
        'title'    => __( 'Contact Info', 'prime-charity-trust' ),
        'panel'    => 'header_top_panel',
        'priority' => 10,
    )
);

/** Header contact info control */
$wp_customize->add_setting( 
    'theme_options[show_header_contact_info]', 
    array(
        'default'           => $default['show_header_contact_info'],
        'sanitize_callback' => 'prime_charity_trust_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_contact_info]',
    array(
        'label'       => __( 'Show Contact Info', 'prime-charity-trust' ),
        'section'     => 'header_contact_info_section',
        'type'        => 'checkbox',
    )
);

$wp_customize->add_setting( 'theme_options[header_location]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_location]',
    array(
        'label'           => __( 'Location', 'prime-charity-trust' ),
        'description'     => __( 'Enter Location.', 'prime-charity-trust' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'prime_charity_trust_contact_info_ac',
    )
);

/** Phone */
$wp_customize->add_setting( 'theme_options[header_phone]', array(
    'sanitize_callback' => 'prime_charity_trust_sanitize_phone_number',
) );

$wp_customize->add_control(
    'theme_options[header_phone]',
    array(
        'label'           => __( 'Phone', 'prime-charity-trust' ),
        'description'     => __( 'Enter phone number.', 'prime-charity-trust' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'prime_charity_trust_contact_info_ac',
    )
);

/** Email */
$wp_customize->add_setting( 'theme_options[header_email]', array(
    'sanitize_callback' => 'sanitize_email',
) );

$wp_customize->add_control(
    'theme_options[header_email]',
    array(
        'label'           => __( 'Email', 'prime-charity-trust' ),
        'description'     => __( 'Enter Email.', 'prime-charity-trust' ),
        'section'         => 'header_contact_info_section',
        'active_callback' => 'prime_charity_trust_contact_info_ac',
    )
);

$wp_customize->add_setting( 'theme_options[header_donate_btn_text]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_donate_btn_text]',
    array(
        'label'           => __( 'Button Text', 'prime-charity-trust' ),
        'description'     => __( 'Enter Button Text.', 'prime-charity-trust' ),
        'section'         => 'header_contact_info_section',
    )
);

$wp_customize->add_setting( 'theme_options[header_donate_btn_url]', array(
    'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control(
    'theme_options[header_donate_btn_url]',
    array(
        'label'           => __( 'Button URL', 'prime-charity-trust' ),
        'description'     => __( 'Enter Button URL.', 'prime-charity-trust' ),
        'section'         => 'header_contact_info_section',
    )
);

/** Header social links section */
$wp_customize->add_section(
    'header_social_links_section',
    array(
        'title'    => __( 'Social Links', 'prime-charity-trust' ),
        'panel'    => 'header_top_panel',
        'priority' => 20,
    )
);

/** Header social links control */
$wp_customize->add_setting( 
    'theme_options[show_header_social_links]', 
    array(
        'default'           => $default['show_header_social_links'],
        'sanitize_callback' => 'prime_charity_trust_sanitize_checkbox',
    ) 
);

$wp_customize->add_control(
    'theme_options[show_header_social_links]',
    array(
        'label'       => __( 'Show Social Links', 'prime-charity-trust' ),
        'section'     => 'header_social_links_section',
        'type'        => 'checkbox',
    )
);

// Setting social_links.
$wp_customize->add_setting( 
    'theme_options[social_link_1]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_1]',
    array(
        'label'           => __( 'Social Link 1', 'prime-charity-trust' ),
        'description'     => __( 'Enter valid url.', 'prime-charity-trust' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'prime_charity_trust_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_2]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_2]',
    array(
        'label'           => __( 'Social Link 2', 'prime-charity-trust' ),
        'description'     => __( 'Enter valid url.', 'prime-charity-trust' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'prime_charity_trust_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_3]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_3]',
    array(
        'label'           => __( 'Social Link 3', 'prime-charity-trust' ),
        'description'     => __( 'Enter valid url.', 'prime-charity-trust' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'prime_charity_trust_social_links_active',
    )
);

$wp_customize->add_setting( 
    'theme_options[social_link_4]', 
    array(
        'sanitize_callback' => 'esc_url_raw',
    ) 
);

$wp_customize->add_control(
    'theme_options[social_link_4]',
    array(
        'label'           => __( 'Social Link 4', 'prime-charity-trust' ),
        'description'     => __( 'Enter valid url.', 'prime-charity-trust' ),
        'section'         => 'header_social_links_section',
        'type'            => 'url',
        'active_callback' => 'prime_charity_trust_social_links_active',
    )
);