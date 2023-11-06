<?php
/**
 * Prime Charity Trust functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Prime Charity Trust
 */

if ( ! defined( 'PRIME_CHARITY_TRUST_URL' ) ) {
    define( 'PRIME_CHARITY_TRUST_URL', esc_url( 'https://themeignite.com/products/charitable-trust-wordpress-theme', 'prime-charity-trust') );
}
if ( ! defined( 'PRIME_CHARITY_TRUST_FREE_DOC_URL' ) ) {
    define( 'PRIME_CHARITY_TRUST_FREE_DOC_URL', esc_url( '#', 'prime-charity-trust') );
}
if ( ! defined( 'PRIME_CHARITY_TRUST_PRO_DOC_URL' ) ) {
    define( 'PRIME_CHARITY_TRUST_PRO_DOC_URL', esc_url( '#', 'prime-charity-trust') );
}
if ( ! defined( 'PRIME_CHARITY_TRUST_DEMO_URL' ) ) {
    define( 'PRIME_CHARITY_TRUST_DEMO_URL', esc_url( 'https://demo.themeignite.com/prime-charity-trust/', 'prime-charity-trust') );
}
if ( ! defined( 'PRIME_CHARITY_TRUST_REVIEW_URL' ) ) {
    define( 'PRIME_CHARITY_TRUST_REVIEW_URL', esc_url( 'https://wordpress.org/support/theme/prime-charity-trust/reviews/#new-post', 'prime-charity-trust') );
}
if ( ! defined( 'PRIME_CHARITY_TRUST_SUPPORT_URL' ) ) {
    define( 'PRIME_CHARITY_TRUST_SUPPORT_URL', esc_url( 'https://wordpress.org/support/theme/prime-charity-trust/', 'prime-charity-trust') );
}


$prime_charity_trust_theme_data = wp_get_theme();
if( ! defined( 'PRIME_CHARITY_TRUST_THEME_VERSION' ) ) define ( 'PRIME_CHARITY_TRUST_THEME_VERSION', $prime_charity_trust_theme_data->get( 'Version' ) );
if( ! defined( 'PRIME_CHARITY_TRUST_THEME_NAME' ) ) define( 'PRIME_CHARITY_TRUST_THEME_NAME', $prime_charity_trust_theme_data->get( 'Name' ) );
if( ! defined( 'PRIME_CHARITY_TRUST_THEME_TEXTDOMAIN' ) ) define( 'PRIME_CHARITY_TRUST_THEME_TEXTDOMAIN', $prime_charity_trust_theme_data->get( 'TextDomain' ) );

if ( ! function_exists( 'prime_charity_trust_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function prime_charity_trust_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Prime Charity Trust, use a find and replace
	 * to change 'prime-charity-trust' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'prime-charity-trust', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );
	
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'prime-charity-trust' ),
	) );

	// Enable support for custom logo.
	add_theme_support( 'custom-logo' , array(
		'height'		=>45,	
		'width'			=>45,	
		'flex-height'	=>true,	
		'flex-width'	=>true,
	));

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'prime_charity_trust_custom_background_args', array(
		'default-color' => 'fff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, icons, and column width.
	*/
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	add_editor_style( array( '/assets/css/editor-style' . $min . '.css', prime_charity_trust_fonts_url() ) );

	// Gutenberg support
	add_theme_support( 'editor-color-palette', array(
       	array(
			'name' => esc_html__( 'Tan', 'prime-charity-trust' ),
			'slug' => 'tan',
			'color' => '#E6DBAD',
       	),
       	array(
           	'name' => esc_html__( 'Yellow', 'prime-charity-trust' ),
           	'slug' => 'yellow',
           	'color' => '#FDE64B',
       	),
       	array(
           	'name' => esc_html__( 'Orange', 'prime-charity-trust' ),
           	'slug' => 'orange',
           	'color' => '#ED7014',
       	),
       	array(
           	'name' => esc_html__( 'Red', 'prime-charity-trust' ),
           	'slug' => 'red',
           	'color' => '#D0312D',
       	),
       	array(
           	'name' => esc_html__( 'Pink', 'prime-charity-trust' ),
           	'slug' => 'pink',
           	'color' => '#b565a7',
       	),
       	array(
           	'name' => esc_html__( 'Purple', 'prime-charity-trust' ),
           	'slug' => 'purple',
           	'color' => '#A32CC4',
       	),
       	array(
           	'name' => esc_html__( 'Blue', 'prime-charity-trust' ),
           	'slug' => 'blue',
           	'color' => '#3A43BA',
       	),
       	array(
           	'name' => esc_html__( 'Green', 'prime-charity-trust' ),
           	'slug' => 'green',
           	'color' => '#3BB143',
       	),
       	array(
           	'name' => esc_html__( 'Brown', 'prime-charity-trust' ),
           	'slug' => 'brown',
           	'color' => '#231709',
       	),
       	array(
           	'name' => esc_html__( 'Grey', 'prime-charity-trust' ),
           	'slug' => 'grey',
           	'color' => '#6C626D',
       	),
       	array(
           	'name' => esc_html__( 'Black', 'prime-charity-trust' ),
           	'slug' => 'black',
           	'color' => '#000000',
       	),
   	));

	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-font-sizes', array(
	   	array(
	       	'name' => esc_html__( 'small', 'prime-charity-trust' ),
	       	'shortName' => esc_html__( 'S', 'prime-charity-trust' ),
	       	'size' => 12,
	       	'slug' => 'small'
	   	),
	   	array(
	       	'name' => esc_html__( 'regular', 'prime-charity-trust' ),
	       	'shortName' => esc_html__( 'M', 'prime-charity-trust' ),
	       	'size' => 16,
	       	'slug' => 'regular'
	   	),
	   	array(
	       	'name' => esc_html__( 'larger', 'prime-charity-trust' ),
	       	'shortName' => esc_html__( 'L', 'prime-charity-trust' ),
	       	'size' => 36,
	       	'slug' => 'larger'
	   	),
	   	array(
	       	'name' => esc_html__( 'huge', 'prime-charity-trust' ),
	       	'shortName' => esc_html__( 'XL', 'prime-charity-trust' ),
	       	'size' => 48,
	       	'slug' => 'huge'
	   	)
	));
	add_theme_support('editor-styles');
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'responsive-embeds' );
}
endif;
add_action( 'after_setup_theme', 'prime_charity_trust_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function prime_charity_trust_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'prime_charity_trust_content_width', 640 );
}
add_action( 'after_setup_theme', 'prime_charity_trust_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function prime_charity_trust_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'prime-charity-trust' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'prime-charity-trust' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'prime-charity-trust' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'prime-charity-trust' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'prime-charity-trust' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer 4', 'prime-charity-trust' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'prime_charity_trust_widgets_init' );

/**
 * Register custom fonts.
 */
function prime_charity_trust_fonts_url() {
	$font_family   = array(
		'Quicksand:wght@300;400;500;600;700',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000'
	);
	
	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/**
 * Enqueue scripts and styles.
 */
function prime_charity_trust_scripts() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	$fonts_url = prime_charity_trust_fonts_url();
	$primary_color = prime_charity_trust_get_option( 'primary_color' );
	if ( ! empty( $fonts_url ) ) {
		wp_enqueue_style( 'prime-charity-trust-google-fonts', $fonts_url, array(), null );
	}
	
	wp_enqueue_style( 'fontawesome-all', get_template_directory_uri() . '/assets/css/all' . $min . '.css', '', '4.7.0' );

	wp_enqueue_style( 'owl.carousel-style', get_template_directory_uri().'/assets/css/owl.carousel.css' );

	wp_enqueue_style( 'slick-theme-css', get_template_directory_uri() .'/assets/css/slick-theme' . $min . '.css', '', 'v2.2.0');

	wp_enqueue_style( 'slick-css', get_template_directory_uri() .'/assets/css/slick' . $min . '.css', '', 'v1.8.0');

	wp_enqueue_style( 'prime-charity-trust-blocks', get_template_directory_uri() . '/assets/css/blocks' . $min . '.css' );
	
	wp_enqueue_style( 'prime-charity-trust-style', get_stylesheet_uri() );
	
	wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/assets/js/slick' . $min . '.js', array('jquery'), '2017417', true );
	
	wp_enqueue_script( 'prime-charity-trust-navigation', get_template_directory_uri() . '/assets/js/navigation' . $min . '.js', array(), '20151215', true );

	wp_enqueue_script( 'custom-js', get_template_directory_uri(). '/assets/js/custom.js', array('jquery') ,'',true);

	wp_enqueue_script( 'owl.carousel-js', get_template_directory_uri(). '/assets/js/owl.carousel.js', array('jquery') ,'',true);

	wp_enqueue_script( 'prime-charity-trust-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $min . '.js', array(), '20151215', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'prime_charity_trust_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Prime Charity Trust 1.0.0
 */
function prime_charity_trust_block_editor_styles() {
	$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Block styles.
	wp_enqueue_style( 'prime-charity-trust-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks' . $min . '.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'prime-charity-trust-fonts', prime_charity_trust_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'prime_charity_trust_block_editor_styles' );

// Change number or products per row to 3
add_filter('loop_shop_columns', 'prime_charity_trust_loop_columns');
	if (!function_exists('prime_charity_trust_loop_columns')) {
		function prime_charity_trust_loop_columns() {
		return 3; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'prime_charity_trust_products_per_page' );
function prime_charity_trust_products_per_page( $cols ) {
  	return  9;
}

//Get Start View Function
function prime_charity_trust_redirect(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
    	//Redirect Get Start Page url
   		wp_safe_redirect( admin_url("themes.php?page=prime-charity-trust") );
   	}
}
add_action('after_setup_theme', 'prime_charity_trust_redirect');

function prime_charity_trust_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/**
 * Load init.
 */
require_once get_template_directory() . '/inc/init.php';

/**
 *  Webfonts 
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';
/**
 * Pro Link.
 */
require_once get_template_directory() . '/inc/premium-link/class-button-link.php';

/**
 * Getting Started
*/
require get_template_directory() . '/inc/getting-started/getting-started.php';
