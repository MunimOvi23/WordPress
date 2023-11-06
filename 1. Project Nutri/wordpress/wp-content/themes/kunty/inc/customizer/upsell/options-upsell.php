<?php 
/**
* Call to Action Settings
* @since 1.0.0
* ----------------------------------------------------------------------
*/

      $wp_customize->add_section( new Kunty_Upsell_Section( $wp_customize, 'kunty_premium_addon',
         array(
            'title' => __( 'Buy Premium Version', 'kunty' ),
            'url' => 'https://themereps.com/kunty/',
            'backgroundcolor' => '#f12369',
            'textcolor' => '#fff',
            'priority' => 210,
         )
      ) );


