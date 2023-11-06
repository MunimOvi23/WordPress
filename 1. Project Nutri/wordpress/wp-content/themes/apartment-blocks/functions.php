<?php
/**
 * Apartment Blocks functions and definitions
 *
 * @package Apartment Blocks
 */

if ( ! function_exists( 'apartment_blocks_setup' ) ) :
function apartment_blocks_setup() {
	
	if ( ! isset( $content_width ) )
		$content_width = 640; /* pixels */

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	
	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
			
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );
	
}
endif; // apartment_blocks_setup
add_action( 'after_setup_theme', 'apartment_blocks_setup' );

function apartment_blocks_scripts() {
	wp_enqueue_style( 'apartment-blocks-basic-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'apartment_blocks_scripts' );

// Block Patterns.
require get_template_directory() . '/block-patterns.php';

require get_parent_theme_file_path( '/inc/dashboard/dashboard.php' );