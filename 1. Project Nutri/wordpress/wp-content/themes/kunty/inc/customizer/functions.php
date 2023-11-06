<?php
/**
 * Enqueue scripts and styles.
 * Our sample Social Icons are using Font Awesome icons so we need to include the FA CSS when viewing our site
 * The Single Accordion Control is also displaying some FA icons in the Customizer itself, so we need to enqueue FA CSS in the Customizer too
 *
 * @return void
 */
if ( ! function_exists( 'kunty_scripts_styles' ) ) {
	function kunty_scripts_styles() {
		// Register and enqueue our icon font
		// We're using the Themify icon font. https://themify.me/themify-icons
		 wp_register_style( 'themify-style', trailingslashit( get_template_directory_uri() ) . 'assets/css/themify-icons.min.css' , array(), '1.0.0', 'all' );
		 wp_enqueue_style( 'themify-style' );
	}
}
add_action( 'customize_controls_print_styles', 'kunty_scripts_styles' );


if ( ! function_exists( 'kunty_dropdown_posts' ) ) :
	/**
	 * Post Dropdown.
	 *
	 * @since 1.0.0	 *
	 */
	function kunty_dropdown_posts() {

		$posts = get_posts( array( 'numberposts' => -1 ) );
		$choices = array();
		$choices[0] = esc_html__( '--Select--', 'kunty' );
		foreach ( $posts as $post ) {
			$choices[$post->ID] = $post->post_title;
		}
		return $choices;
	}

endif;


/**
 * Check if WooCommerce is active
 * Use in the active_callback when adding the WooCommerce Section to test if WooCommerce is activated
 *
 * @return boolean
 */
function kunty_is_woocommerce_active() {
	if ( class_exists( 'woocommerce' ) ) {
		return true;
	}
	return false;
}

/**
 * Set our Social Icons URLs.
 * Only needed for our sample customizer preview refresh
 *
 * @return array Multidimensional array containing social media data
 */
if ( ! function_exists( 'kunty_generate_social_urls' ) ) {
	function kunty_generate_social_urls() {
		$social_icons = array(
			array( 'url' => 'dribbble.com', 'icon' => 'ti-dribbble', 'title' => esc_html__( 'Follow me on Dribbble', 'kunty' ), 'class' => 'dribbble' ),
			array( 'url' => 'facebook.com', 'icon' => 'ti-facebook', 'title' => esc_html__( 'Like me on Facebook', 'kunty' ), 'class' => 'facebook' ),
			array( 'url' => 'flickr.com', 'icon' => 'ti-flickr', 'title' => esc_html__( 'Connect with me on Flickr', 'kunty' ), 'class' => 'flickr' ),
			array( 'url' => 'github.com', 'icon' => 'ti-github', 'title' => esc_html__( 'Fork me on GitHub', 'kunty' ), 'class' => 'github' ),
			array( 'url' => 'instagram.com', 'icon' => 'ti-instagram', 'title' => esc_html__( 'Follow me on Instagram', 'kunty' ), 'class' => 'instagram' ),
			array( 'url' => 'linkedin.com', 'icon' => 'ti-linkedin', 'title' => esc_html__( 'Connect with me on LinkedIn', 'kunty' ), 'class' => 'linkedin' ),
			array( 'url' => 'pinterest.com', 'icon' => 'ti-pinterest', 'title' => esc_html__( 'Follow me on Pinterest', 'kunty' ), 'class' => 'pinterest' ),
			array( 'url' => 'plus.google.com', 'icon' => 'ti-google', 'title' => esc_html__( 'Connect with me on Google+', 'kunty' ), 'class' => 'googleplus' ),
			array( 'url' => 'reddit.com', 'icon' => 'ti-reddit', 'title' => esc_html__( 'Join me on Reddit', 'kunty' ), 'class' => 'reddit' ),
			array( 'url' => 'soundcloud.com', 'icon' => 'ti-soundcloud', 'title' => esc_html__( 'Follow me on SoundCloud', 'kunty' ), 'class' => 'soundcloud' ),
			array( 'url' => 'stackoverflow.com', 'icon' => 'ti-stack-overflow', 'title' => esc_html__( 'Join me on Stack Overflow', 'kunty' ), 'class' => 'stackoverflow' ),
			array( 'url' => 'tumblr.com', 'icon' => 'ti-tumblr', 'title' => esc_html__( 'Follow me on Tumblr', 'kunty' ), 'class' => 'tumblr' ),
			array( 'url' => 'twitter.com', 'icon' => 'ti-twitter', 'title' => esc_html__( 'Follow me on Twitter', 'kunty' ), 'class' => 'twitter' ),
			array( 'url' => 'vimeo.com', 'icon' => 'ti-vimeo', 'title' => esc_html__( 'Follow me on Vimeo', 'kunty' ), 'class' => 'vimeo' ),
			array( 'url' => 'youtube.com', 'icon' => 'ti-youtube', 'title' => esc_html__( 'Subscribe to me on YouTube', 'kunty' ), 'class' => 'youtube' ),
		);

		return apply_filters( 'kunty_social_icons', $social_icons );
	}
}

/**
 * Return an unordered list of linked social media icons, based on the urls provided in the Customizer Sortable Repeater
 * This is a sample function to display some social icons on your site.
 * This sample function is also used to show how you can call a PHP function to refresh the customizer preview.
 * Add the following code to header.php if you want to see the sample social icons displayed in the customizer preview and your theme.
 * Before any social icons display, you'll also need to add the relevent URL's to the Header Navigation > Social Icons section in the Customizer.
 * <div class="social">
 *	 <?php echo kunty_get_social_media(); ?>
 * </div>
 *
 * @return string Unordered list of linked social media icons
 */
if ( ! function_exists( 'kunty_get_social_media' ) ) {
	function kunty_get_social_media() {
	
		$output = array();
		$social_icons = kunty_generate_social_urls();
		$social_urls = explode( ',', get_theme_mod( 'social_urls' ) );
		$social_newtab = get_theme_mod( 'social_newtab' );
		foreach( $social_urls as $key => $value ) {
			if ( !empty( $value ) ) {
				$domain = str_ireplace( 'www.', '', parse_url( $value, PHP_URL_HOST ) );
				$index = array_search( strtolower( $domain ), array_column( $social_icons, 'url' ) );
				if( false !== $index ) {
					$output[] = sprintf( '<a href="%1$s" title="%2$s"%3$s><i class="%4$s"></i></a>',
						esc_url( $value ),
						$social_icons[$index]['title'],
						( !$social_newtab ? '' : ' target="_blank"' ),
						$social_icons[$index]['icon']
					);
				}
				else {
					$output[] = sprintf( '<a href="%1$s"%2$s><i class="%3$s"></i></a>',
						esc_url( $value ),
						( !$social_newtab ? '' : ' target="_blank"' ),
						'ti-globe-alt'
					);
				}
			}
		}

		if ( !empty( $output ) ) {
			$output = apply_filters( 'kunty_social_icons_list', $output );
			array_unshift( $output, '<div class="social-icons">' );
			$output[] = '</div>';
		}

		return implode( '', $output );
	}
}

/**
* Load all our Customizer options
*/
//include_once trailingslashit( dirname(__FILE__) ) . 'inc/customizer.php';
