<?php
/**
 * kunty functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package kunty
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kunty_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on kunty, use a find and replace
		* to change 'kunty' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'kunty', get_template_directory() . '/languages' );

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
	add_image_size( 'kunty-post-thumbnails', 610, 400, true );
	add_image_size( 'kunty-team', 350, 350, true );
	add_image_size( 'kunty-portfolio', 420 ); 

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary-menu'  => esc_html__( 'Primary Menu', 'kunty' ),
			'sidebar-menu'  => esc_html__( 'Sidebar Menu', 'kunty' ),
			'footer-menu'   => esc_html__( 'Footer Menu', 'kunty' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'kunty_custom_background_args',
			array(
				'default-color' => 'f8f8f6',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for Block Styles.
	add_theme_support( 'wp-block-styles' );
	
	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
	
	// Add support for responsive embedded content.
	add_theme_support( 'responsive-embeds' );

	// Add support for responsive embedded content.
	add_post_type_support( 'page', 'excerpt' );

	// Remove theme support for block editor
	remove_theme_support( 'widgets-block-editor' );
	
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 42,
			'width'       => 104,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	
}
add_action( 'after_setup_theme', 'kunty_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kunty_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kunty_content_width', 1170 );
}
add_action( 'after_setup_theme', 'kunty_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kunty_widgets_init() {
	
	$animation = get_theme_mod( 'kunty_animation_disable') ? 'animate-box':''; 
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'kunty' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'kunty' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s '.$animation.'">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'kunty' ),
			'id'            => 'page-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'kunty' ),
			'before_widget' => '<div id="%1$s" class="widget clearfix %2$s '.$animation.'">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="widget-title">',
			'after_title'   => '</h5>',
		) 
	);
	
	if( class_exists( 'WooCommerce' ) && th_fs()->can_use_premium_code() ) {
		register_sidebar( 
			array(
				'name'          => esc_html__( 'Shop Page Sidebar', 'kunty' ),
				'id'            => 'woocommerce-sidebar',
				'description'   => esc_html__( 'Appears on shop page', 'kunty' ),
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s '.$animation.'">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
		register_sidebar(
			array(
				'name'          => __( 'Single Product Page Sidebar', 'kunty' ),
				'description'   => __( 'Appears on single product page', 'kunty' ),
				'id'            => 'woocommerce-single-sidebar',
				'before_widget' => '<div id="%1$s" class="widget clearfix %2$s '.$animation.'">',
				'after_widget'  => '</div>',
				'before_title'  => '<h5 class="widget-title">',
				'after_title'   => '</h5>',
			)
		);
	}
	
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widget 1', 'kunty' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'kunty' ),
		'before_widget' => '<div id="%1$s" class="footer-widget widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widget 2', 'kunty' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'kunty' ),
		'before_widget' => '<div id="%1$s" class="footer-widget widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widget 3', 'kunty' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'kunty' ),
		'before_widget' => '<div id="%1$s" class="footer-widget widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));

	register_sidebar(array(
		'name'          => esc_html__( 'Footer Widget 4', 'kunty' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'kunty' ),
		'before_widget' => '<div id="%1$s" class="footer-widget widget clearfix %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	));
	
}
add_action( 'widgets_init', 'kunty_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kunty_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );
	$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';


	// All CSS Here -->
 	kunty_google_fonts_url(); // Load google fonts( cdn or local )

	// Bootstrap fremwork main css -->		
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap' . $suffix . '.css' );

	// Animate CSS -->
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate' . $suffix . '.css' );

	// Themify CSS -->
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons' . $suffix . '.css' );

	// OWL CSS
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel' . $suffix . '.css' );

	// Venobox CSS
	wp_enqueue_style( 'venobox', get_template_directory_uri() . '/assets/css/venobox' . $suffix . '.css' );

	// Main CSS
	wp_enqueue_style( 'kunty-style', get_template_directory_uri().'/style.css', array(), rand() );
    $custom_css = kunty_custom_inline_style();
    wp_add_inline_style( 'kunty-style', $custom_css );

	// Responsive CSS
	wp_enqueue_style( 'kunty-responsive', get_template_directory_uri() . '/assets/css/responsive.css' );

	// WordPress Masonry
	wp_enqueue_script( 'jquery-masonry',array('jquery') );
	
	// Imagesloaded
	wp_enqueue_script( 'imagesloaded',array('jquery') );

	// Bootstrap js -->
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap' . $suffix . '.js', array('jquery'), '4.0.0', true );

	//Modernizr JS
	wp_enqueue_script( 'jquery-modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-2.8.3' . $suffix . '.js', null, '2.8.3', false ); 

	//Waypoints JS
	wp_enqueue_script( 'jquery-waypoints', get_template_directory_uri() . '/assets/js/vendor/jquery.waypoints' . $suffix . '.js', array('jquery'), '4.0.0', true );

	// OWL Carousel
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel' . $suffix . '.js', array('jquery'), '2.3.4', true );
	
	// Venobox
	wp_enqueue_script( 'venobox', get_template_directory_uri() . '/assets/js/venobox' . $suffix . '.js', array('jquery'), '1.8.2', true );

	// Stellar Script
	wp_enqueue_script( 'stellar-min', get_template_directory_uri() . '/assets/js/stellar' . $suffix . '.js', array('jquery'), '0.6.2', true );

	// Tilt jQuery
	wp_enqueue_script( 'tilt', get_template_directory_uri() . '/assets/js/tilt.jquery' . $suffix . '.js', array('jquery'), '1.0.0', true );

	// Counterup
	wp_enqueue_script( 'counterup', get_template_directory_uri() . '/assets/js/jquery.counterup' . $suffix . '.js', array('jquery'), '1.0.0', true );
	
	// Node Cursor
	wp_enqueue_script( 'nodecursor', get_template_directory_uri() . '/assets/js/nodecursor' . $suffix . '.js', array('jquery'), '1.0.0', true );

	//Fastclick
	wp_enqueue_script( 'jquery-fastclick', get_template_directory_uri() . '/assets/js/jquery.fastclick' . $suffix . '.js', array(), '1.0.0', true );

	//Skip link focus fix
	wp_enqueue_script( 'skip-link-focus', get_template_directory_uri() . '/assets/js/skip-link-focus-fix' . $suffix . '.js', array(), '20151215', true );

	// Main Script
	wp_enqueue_script( 'main-jquery', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), rand(), true );

	// Team Carousel Settings
	$slider_autoplay = get_theme_mod( 'slider_carousel_autoplay', 1 );
	$slider_duration = get_theme_mod( 'slider_carousel_duration', 7000);
	$slider_loop     = get_theme_mod( 'slider_carousel_loop', 1 );
	$slider_nav      = get_theme_mod( 'slider_carousel_nav', 1 );
	$slider_dots     = get_theme_mod( 'slider_carousel_dots', 1 );

	// Team Carousel Settings
	$team_autoplay = get_theme_mod( 'team_carousel_autoplay', 1 );
	$team_duration = get_theme_mod( 'team_carousel_duration', 6000);
	$team_loop     = get_theme_mod( 'team_carousel_loop', 1 );
	$team_nav      = get_theme_mod( 'team_carousel_nav', 1 );
	$team_dots     = get_theme_mod( 'team_carousel_dots', 1 );

	// Feedback Carousel Settings
	$feedback_autoplay = get_theme_mod( 'feedback_carousel_autoplay', 1 );
	$feedback_duration = get_theme_mod( 'feedback_carousel_duration', 5000);
	$feedback_loop     = get_theme_mod( 'feedback_carousel_loop', 1 );
	$feedback_nav      = get_theme_mod( 'feedback_carousel_nav', 1 );
	$feedback_dots     = get_theme_mod( 'feedback_carousel_dots', 1 );

	// News Carousel Settings
	$news_autoplay = get_theme_mod( 'news_carousel_autoplay', 1 );
	$news_duration = get_theme_mod( 'news_carousel_duration', 5000);
	$news_loop     = get_theme_mod( 'news_carousel_loop', 1 );
	$news_nav      = get_theme_mod( 'news_carousel_nav', 1 );
	$news_dots     = get_theme_mod( 'news_carousel_dots', 1 );

	// Brands Carousel Settings
	$brands_autoplay = get_theme_mod( 'brands_carousel_autoplay', 1 );
	$brands_duration = get_theme_mod( 'brands_carousel_duration', 3000);
	$brands_loop     = get_theme_mod( 'brands_carousel_loop', 1 );
	$brands_nav      = get_theme_mod( 'brands_carousel_nav', 1 );
	$brands_dots     = get_theme_mod( 'brands_carousel_dots', 0 );

    wp_localize_script(
	    'main-jquery', 
	    'kunty_option',
	    array(

			// Slider Carousel
	        'slider_autoplay'  => filter_var($slider_autoplay, FILTER_VALIDATE_BOOLEAN ),
	        'slider_duration'  => absint($slider_duration),
	        'slider_loop'      => filter_var($slider_loop, FILTER_VALIDATE_BOOLEAN ),
	        'slider_nav'       => filter_var($slider_nav, FILTER_VALIDATE_BOOLEAN ),
	        'slider_dots'      => filter_var($slider_dots, FILTER_VALIDATE_BOOLEAN ),	

			// Team Carousel
	        'team_autoplay'  => filter_var($team_autoplay, FILTER_VALIDATE_BOOLEAN ),
	        'team_duration'  => absint($team_duration),
	        'team_loop'      => filter_var($team_loop, FILTER_VALIDATE_BOOLEAN ),
	        'team_nav'       => filter_var($team_nav, FILTER_VALIDATE_BOOLEAN ),
	        'team_dots'      => filter_var($team_dots, FILTER_VALIDATE_BOOLEAN ),		
		
			// Feedback Carousel
	        'feedback_autoplay'  => filter_var($feedback_autoplay, FILTER_VALIDATE_BOOLEAN ),
	        'feedback_duration'  => absint($feedback_duration),
	        'feedback_loop'      => filter_var($feedback_loop, FILTER_VALIDATE_BOOLEAN ),
	        'feedback_nav'       => filter_var($feedback_nav, FILTER_VALIDATE_BOOLEAN ),
	        'feedback_dots'      => filter_var($feedback_dots, FILTER_VALIDATE_BOOLEAN ),

			// News Carousel
	        'news_autoplay'  => filter_var($news_autoplay, FILTER_VALIDATE_BOOLEAN ),
	        'news_duration'  => absint($news_duration),
	        'news_loop'      => filter_var($news_loop, FILTER_VALIDATE_BOOLEAN ),
	        'news_nav'       => filter_var($news_nav, FILTER_VALIDATE_BOOLEAN ),
	        'news_dots'      => filter_var($news_dots, FILTER_VALIDATE_BOOLEAN ),

			// News Carousel
	        'brands_autoplay'  => filter_var($brands_autoplay, FILTER_VALIDATE_BOOLEAN ),
	        'brands_duration'  => absint($brands_duration),
	        'brands_loop'      => filter_var($brands_loop, FILTER_VALIDATE_BOOLEAN ),
	        'brands_nav'       => filter_var($brands_nav, FILTER_VALIDATE_BOOLEAN ),
	        'brands_dots'      => filter_var($brands_dots, FILTER_VALIDATE_BOOLEAN ),
	    )
	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kunty_scripts' );

/**
*Custom Admin Style 
*/
function kunty_admin_acripts(){
	global $pagenow;
	if ($pagenow != 'nav-menus.php') {
		return;
	}
	wp_register_style( 'kunty_custom_wp_admin_css', get_template_directory_uri() . '/assets/css/admin.css', false, '1.0.0' );
	wp_enqueue_style( 'kunty_custom_wp_admin_css' );

}
add_action('admin_enqueue_scripts','kunty_admin_acripts');

//Register Required plugin
require_once (get_template_directory() .'/inc/tgm/recommended-plugins.php');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom action hooks for this theme.
 */
require get_template_directory() . '/inc/theme-actions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * WooCommerce fuctins
 */
if(class_exists( 'WooCommerce' ) && th_fs()->can_use_premium_code() ) {
	require get_template_directory() . '/inc/woocommerce-fuctions.php';
}

/**
 * Load Typpgraphy Options
 */
require get_template_directory() . '/inc/kunty-google-fonts.php';

/**
 * Daynamic styles for this theme.
 */
require get_template_directory() . '/inc/custom-style.php';

 /**
 * Load Sanitizations
 */
require get_template_directory() . '/inc/customizer/sanitize.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/functions.php';
require get_template_directory() . '/inc/customizer/customizer.php';

function kunty_set_to_premium() {
	$premium_status = false;
	if ( class_exists( 'Themereps_Helper' ) ) {
		$WC = new Themereps_Helper();
		$premium_status = $WC->themereps_helper_premium_status();
	}
	return $premium_status;
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

