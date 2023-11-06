<?php

add_action( 'admin_menu', 'apartment_blocks_gettingstarted' );
function apartment_blocks_gettingstarted() {
	add_theme_page( esc_html__('Theme Documentation', 'apartment-blocks'), esc_html__('Theme Documentation', 'apartment-blocks'), 'edit_theme_options', 'apartment-blocks-guide-page', 'apartment_blocks_guide');
}

function apartment_blocks_admin_theme_style() {
   wp_enqueue_style('apartment-blocks-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'apartment_blocks_admin_theme_style');

if ( ! defined( 'APARTMENT_BLOCKS_SUPPORT' ) ) {
define('APARTMENT_BLOCKS_SUPPORT',__('https://wordpress.org/support/theme/apartment-blocks/','apartment-blocks'));
}
if ( ! defined( 'APARTMENT_BLOCKS_REVIEW' ) ) {
define('APARTMENT_BLOCKS_REVIEW',__('https://wordpress.org/support/theme/apartment-blocks/reviews/','apartment-blocks'));
}
if ( ! defined( 'APARTMENT_BLOCKS_LIVE_DEMO' ) ) {
define('APARTMENT_BLOCKS_LIVE_DEMO',__('https://www.ovationthemes.com/demos/apartment-blocks/','apartment-blocks'));
}
if ( ! defined( 'APARTMENT_BLOCKS_BUY_PRO' ) ) {
define('APARTMENT_BLOCKS_BUY_PRO',__('https://www.ovationthemes.com/wordpress/apartment-rental-wordpress-theme/','apartment-blocks'));
}
if ( ! defined( 'APARTMENT_BLOCKS_PRO_DOC' ) ) {
define('APARTMENT_BLOCKS_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-apartment-blocks-pro-doc/','apartment-blocks'));
}
if ( ! defined( 'APARTMENT_BLOCKS_FREE_DOC' ) ) {
define('APARTMENT_BLOCKS_FREE_DOC',__('https://www.ovationthemes.com/docs/ot-apartment-blocks-free-doc/','apartment-blocks'));
}
if ( ! defined( 'APARTMENT_BLOCKS_THEME_NAME' ) ) {
define('APARTMENT_BLOCKS_THEME_NAME',__('Premium Apartment Theme','apartment-blocks'));
}

/**
 * Theme Info Page
 */
function apartment_blocks_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( '' ); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'apartment-blocks'); ?><?php echo esc_html($theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( APARTMENT_BLOCKS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'apartment-blocks'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( APARTMENT_BLOCKS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'apartment-blocks'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','apartment-blocks'); ?></h3>
					<p><?php $theme = wp_get_theme(); 
						echo wp_kses_post( apply_filters( 'description', esc_html( $theme->get( 'Description' ) ) ) );
					?></p>

					<h4><?php esc_html_e('Edit Your Site','apartment-blocks'); ?></h4>
					<p><?php esc_html_e('Now create your website with easy drag and drop powered by gutenburg.','apartment-blocks'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site','apartment-blocks'); ?></a>

					<h4><?php esc_html_e('Visit Your Site','apartment-blocks'); ?></h4>
					<p><?php esc_html_e('To check your website click here','apartment-blocks'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site','apartment-blocks'); ?></a>

					<h4><?php esc_html_e('Theme Documentation','apartment-blocks'); ?></h4>
					<p><?php esc_html_e('Check the theme documentation to easily set up your website.','apartment-blocks'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( APARTMENT_BLOCKS_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','apartment-blocks'); ?></a>
				</div>
       	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(APARTMENT_BLOCKS_THEME_NAME); ?></h3>
				<img class="apartment_blocks_img_responsive" style="width: 100%;" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( APARTMENT_BLOCKS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'apartment-blocks'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( APARTMENT_BLOCKS_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'apartment-blocks'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( APARTMENT_BLOCKS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'apartment-blocks'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'apartment-blocks');?> </li>                 
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'apartment-blocks');?> </li>
                 <li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'apartment-blocks');?> </li>
                	<li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'apartment-blocks');?> </li>
                	<li class="upsell-apartment_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'apartment-blocks');?> </li>
            </ul>
        	</div>
		</div>
	</div>

<?php }?>
