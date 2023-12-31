<?php
/**
 * Active callback functions.
 *
 * @package Prime Charity Trust
 */

function prime_charity_trust_featured_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function prime_charity_trust_featured_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( prime_charity_trust_featured_slider_active( $control ) && ( 'featured_slider_page' == $content_type ) );
}

function prime_charity_trust_featured_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[featured_slider_content_type]' )->value();
    return ( prime_charity_trust_featured_slider_active( $control ) && ( 'featured_slider_post' == $content_type ) );
}

function prime_charity_trust_featured_services_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[enable_featured_services_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

/**
 * Active Callback for top bar section
 */
function prime_charity_trust_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_donate_btn_text]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_donate_btn_url]' && $show_contact_info ) return true;

    return false;
}

function prime_charity_trust_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}