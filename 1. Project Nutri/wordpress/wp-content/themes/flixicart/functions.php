<?php
/**
 * Theme functions and definitions
 *
 * @package FlixiCart
 */
if ( ! function_exists( 'flixicart_enqueue_styles' ) ) :
	/**
	 * @since FlixiCart 1.0
	 */
	function flixicart_enqueue_styles() {

         wp_enqueue_script( 
			 'flixicart-custom', 
			 get_stylesheet_directory_uri() . '/assets/js/custom.js',
			 array( 'jquery' ),
			 '1.0', 
			 true 
		 );

	}

endif;
add_action( 'wp_enqueue_scripts', 'flixicart_enqueue_styles', 10 );

// Main file
require_once get_stylesheet_directory() . '/core/core.php';

/**
* Search
* @since FlixiCart 1.0
*/
if ( !function_exists( 'flixicart_nav_search' ) ) {
    function flixicart_nav_search() {
        $enable_nav_search       = get_theme_mod( 'enable_nav_search',flixita_get_default_option( 'enable_nav_search' )); 
		if($enable_nav_search == '1') { ?>
			<li class="search-button">
				<button type="button" id="header-search-toggle" class="header-search-toggle" aria-expanded="false" aria-label="<?php esc_attr_e('Search Popup','flixicart'); ?>"><i class="fa fa-search"></i></button>
				<div class="header-search-popup">
					<div class="header-search-flex">
						<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'Site Search', 'flixicart' ); ?>">
							<input type="search" class="form-control header-search-field" placeholder="<?php esc_attr_e( 'Type To Search', 'flixicart' ); ?>" name="s" id="search">
							<button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
						</form>
						<button type="button" id="header-search-close" class="close-style header-search-close" aria-label="<?php esc_attr_e('Search Popup Close','flixicart'); ?>"></button>
					</div>
				</div>
			</li>
		<?php }
    }
}


/**
* Cart
* @since FlixiCart 1.0
*/
if ( !function_exists( 'flixicart_shop_cart' ) ) {
    function flixicart_shop_cart() {
        $enable_cart       = get_theme_mod( 'enable_cart',flixita_get_default_option( 'enable_cart' )); 
		 if ( $enable_cart == '1' && class_exists( 'WooCommerce' ) ) { ?>
			<li class="cart-wrapper">
				<button type="button" class="cart-icon-wrap header-cart">
					<i class="fa fa-shopping-bag"></i>
					<?php 
						$count = WC()->cart->cart_contents_count;
						$cart_url = wc_get_cart_url();
						
						if ( $count > 0 ) {
						?>
							 <span><?php echo esc_html( $count ); ?></span>
						<?php 
						}
						else {
							?>
							<span><?php esc_html_e('0','flixicart'); ?></span>
							<?php 
						}
					?>
				</button>
				<div class="shopping-cart">
					<ul class="shopping-cart-items">
						<?php get_template_part('woocommerce/cart/mini','cart'); ?>
					</ul>
				</div>
			</li>
		<?php }
    }
}

/**
* Add my account
* @since FlixiCart 1.0
*/
if ( !function_exists( 'flixicart_my_account' ) ) {
    function flixicart_my_account() {
        if ( get_theme_mod('enable_account', 1 ) == 1 && class_exists( 'WooCommerce' )) {
            ?>
            <li class="header-account-wrapper">
				<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ); ?>">
					<i class="fa fa-user"></i>
				</a>
			</li>
            <?php
        }
    }
}

/**
* Compare
* @since FlixiCart 1.0
*/
if ( !function_exists( 'flixicart_product_compare' ) ) {
    function flixicart_product_compare() {
        if ( get_theme_mod('enable_nav_compare', 1 ) == 1 && class_exists( 'WooCommerce' )) {
            if ( function_exists( 'yith_woocompare_constructor' ) ) {
				global $yith_woocompare;
				?>
				<li class="head-compare-wrapper">
					<a class="compare added" rel="nofollow" href="<?php echo esc_url( $yith_woocompare->obj->view_table_url() ); ?>">
						<i class="fa fa-refresh"></i>
					</a>
				</li>
				<?php
			}
        }
    }
}


/**
* Wishlist
* @since FlixiCart 1.0
*/
if ( !function_exists( 'flixicart_product_wishlist' ) ) {
    function flixicart_product_wishlist() {
        if ( get_theme_mod('enable_nav_wishlist', 1 ) == 1  && class_exists( 'WooCommerce' )) {
            if ( function_exists( 'YITH_WCWL' ) ) {
			$wishlist_url = YITH_WCWL()->get_wishlist_url(); ?>
				<li class="head-wishlist-wrapper">
					 <a href="<?php echo esc_url( $wishlist_url ); ?>">
						<i class="fa fa-heart"></i>
					</a>
				</li>
			<?php }
        }
    }
}


/**
* Add a header advertisement banner
* @since FlixiCart 1.0
*/
function flixicart_header_advertisement_banner(){
    $hdr_nav_add_banner_image   = get_theme_mod( 'hdr_nav_add_banner_image', flixicart_get_default_option( 'hdr_nav_add_banner_image' ) );
	$hdr_nav_add_banner_link    = get_theme_mod( 'hdr_nav_add_banner_link', flixicart_get_default_option( 'hdr_nav_add_banner_link' ) );
	$hdr_nav_add_banner_target  = get_theme_mod( 'hdr_nav_add_banner_target');
    if ( !empty( $hdr_nav_add_banner_image ) ){
        ?>
            <div class="header-advertise-banner">
				<a href="<?php echo esc_url($hdr_nav_add_banner_link); ?>"  <?php if($hdr_nav_add_banner_target == '1'): echo "target='_blank'"; endif;?>>
					<img src="<?php echo esc_url($hdr_nav_add_banner_image); ?>">
				</a>
			</div>
    <?php }
}