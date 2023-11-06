<?php

if ( ! defined( 'PRIME_CHARITY_TRUST_FOOTER_URL' ) ) {
  define( 'PRIME_CHARITY_TRUST_FOOTER_URL', esc_url( 'https://themeignite.com/products/free-charity-funds-wordpress-theme', 'charity-funds') );
}
if ( ! defined( 'PRIME_CHARITY_TRUST_URL' ) ) {
    define( 'PRIME_CHARITY_TRUST_URL', esc_url( 'https://www.themeignite.com/products/charitable-trust-wordpress-theme/', 'charity-funds') );
}
if ( ! defined( 'PRIME_CHARITY_TRUST_TEXT' ) ) {
    define( 'PRIME_CHARITY_TRUST_TEXT', __( 'Charity Funds PRO','charity-funds' ));
}

add_action( 'after_setup_theme', 'charity_funds_after_setup_theme' );
function charity_funds_after_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( "responsive-embeds" );
    add_theme_support( 'align-wide' );
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'charity-funds-featured-image', 2000, 1200, true );
    add_image_size( 'charity-funds-thumbnail-avatar', 100, 100, true );

    // Set the default content width.
    $GLOBALS['content_width'] = 525;

    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo' , array(
        'height'        =>45,
        'width'         =>45,
        'flex-height'   =>true, 
        'flex-width'    =>true,
    ));

    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff'
    ) );

    add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

    add_editor_style( array( 'assets/css/editor-style.css') );
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function charity_funds_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'charity-funds' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'charity-funds' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 1', 'charity-funds' ),
        'id'            => 'footer-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 2', 'charity-funds' ),
        'id'            => 'footer-2',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 3', 'charity-funds' ),
        'id'            => 'footer-3',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => esc_html__( 'Footer 4', 'charity-funds' ),
        'id'            => 'footer-4',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'charity_funds_widgets_init' );

// enqueue styles for child theme
function charity_funds_enqueue_styles() {
    // enqueue parent styles
    wp_enqueue_style('prime-charity-trust-style', get_template_directory_uri() .'/style.css');
    
    // enqueue child styles
    wp_enqueue_style('charity-funds-child-style', get_stylesheet_directory_uri() .'/style.css', array('prime-charity-trust-style'));

    wp_enqueue_script( 'comment-reply', '/wp-includes/js/comment-reply.min.js', array(), false, true );
}
add_action('wp_enqueue_scripts', 'charity_funds_enqueue_styles');

if ( ! function_exists( 'prime_charity_trust_footer_section' ) ) :

  /**
   * Footer copyright
   *
   * @since 1.0.0
   */
  function prime_charity_trust_footer_section() { ?>
     <?php
    $footer_setting  = prime_charity_trust_get_option( 'prime_charity_trust_footer_setting' );
     if ( $footer_setting ){ ?>
      <div class="site-info">
        <?php 
          $copyright_footer = prime_charity_trust_get_option('copyright_text'); 
          if ( ! empty( $copyright_footer ) ) {
            $copyright_footer = wp_kses_data( $copyright_footer );
          }
        ?>
        <div class="wrapper">
           <span class="copy-right"><a href="<?php echo esc_url( PRIME_CHARITY_TRUST_FOOTER_URL) ?>"><?php echo esc_html($copyright_footer);?></a></span>
        </div><!-- .wrapper --> 
      </div> <!-- .site-info -->
    <?php } ?>

    <?php
    $scroll_top  = prime_charity_trust_get_option( 'header_donate_scroll_to_top', true );
     if ( $scroll_top ){ ?>
        <a id="button"><i class="fas fa-arrow-up"></i></a>
    <?php } ?>
    
  <?php }

endif;
add_action( 'prime_charity_trust_action_footer', 'prime_charity_trust_footer_section', 20 );
