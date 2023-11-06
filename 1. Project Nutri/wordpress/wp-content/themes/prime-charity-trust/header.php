<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Prime Charity Trust
 */
/**
* Hook - prime_charity_trust_action_doctype.
*
* @hooked prime_charity_trust_doctype -  10
*/
do_action( 'prime_charity_trust_action_doctype' );
?>
<head>
    <?php
    /**
    * Hook - prime_charity_trust_action_head.
    *
    * @hooked prime_charity_trust_head -  10
    */
    do_action( 'prime_charity_trust_action_head' );
    ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php do_action( 'wp_body_open' ); ?>

    <?php
    $preloader_setting  = prime_charity_trust_get_option( 'header_donate_preloader_setting' , false );
     if ( $preloader_setting ){ ?>
        <div class="preloader">
            <div class="load">
              <div class="loader"></div>
            </div>
        </div>
     <?php } ?>

    <?php

    /**
    * Hook - prime_charity_trust_action_before.
    *
    * @hooked prime_charity_trust_page_start - 10
    */
    do_action( 'prime_charity_trust_action_before' );

    /**
    *
    * @hooked prime_charity_trust_header_start - 10
    */
    do_action( 'prime_charity_trust_action_before_header' );

    /**
    *
    *@hooked prime_charity_trust_site_branding - 10
    *@hooked prime_charity_trust_header_end - 15 
    */
    do_action('prime_charity_trust_action_header');

    /**
    *
    * @hooked prime_charity_trust_content_start - 10
    */
    do_action( 'prime_charity_trust_action_before_content' );

    /**
     * Banner start
     * 
     * @hooked prime_charity_trust_banner_header - 10
    */
    do_action( 'prime_charity_trust_banner_header' );  