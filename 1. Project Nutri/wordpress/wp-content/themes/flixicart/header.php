<?php
/**
 * File for display Header.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>
	</head>
<?php $class='btn-style-one flixicart-theme'; ?>	
<body <?php body_class(esc_attr($class));?> >
<?php 
    if ( function_exists( 'wp_body_open' ) ) {
        wp_body_open();
    } else {
        do_action( 'wp_body_open' );
    } 
?>
<a class="screen-reader-text skip-link" href="#content"><?php esc_html_e( 'Skip to content', 'flixicart' ); ?></a>
<header id="main-header" class="main-header">
	<?php // FlixiCart Top Header
	do_action('daddy_plus_flixita_top_header'); ?>
	<div class="middle-header d-lg-block d-none">
		<div class="container">
			<div class="row">
				<div class="col-3 my-auto">
					<div class="logo">
					  <?php get_template_part('template-parts/site','branding'); ?>
					</div>
				</div>
				<div class="col-6 my-auto">
					<?php flixicart_header_advertisement_banner(); ?>
				</div>
				<div class="col-3 my-auto">
					<div class="main-menu-right">
						<ul class="menu-right-list">
							<?php flixicart_shop_cart(); ?>
							<?php flixicart_product_wishlist(); ?>								
							<?php flixicart_product_compare(); ?>
							<?php flixicart_my_account(); ?>
							<?php flixicart_nav_search(); ?>							
						</ul>                            
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="navigation-wrapper">
		<div class="main-navigation-area d-none d-lg-block">
			<div class="main-navigation <?php echo esc_attr(flixita_site_header_sticky()); ?> ">
				<div class="container">
					<div class="row">
						<div class="col-3 my-auto browse-cat-wrap">
							  <?php 
								  $enable_hdr_nav_bcat		= get_theme_mod( 'enable_hdr_nav_bcat',flixicart_get_default_option( 'enable_hdr_nav_bcat' ));
								  $hdr_nav_bcat_title		= get_theme_mod( 'hdr_nav_bcat_title',flixicart_get_default_option( 'hdr_nav_bcat_title' ));
								?>
							<?php  if ( class_exists( 'WooCommerce' ) && $enable_hdr_nav_bcat=='1') { ?>	
							<?php if(!empty($hdr_nav_bcat_title)): ?>
								<button type="button" class="browse-cat-main-btn btn"><i class="fa fa-list-ul"></i> <span><?php echo wp_kses_post($hdr_nav_bcat_title); ?></span></button>
							<?php endif; ?>	
							<div class="browse-cat-menu-wrap">
								<div class="browse-cat-menu-wrap-list" style="display: none;">
									<ul class="main-menu">
										<?php
											$flixicart_product_categories = array(
												  'taxonomy' => 'product_cat',
												  'hide_empty' => false,
												  'parent'   => 0
											  );
											$flixicart_product_cat = get_terms( $flixicart_product_categories );
											foreach ($flixicart_product_cat as $parent_product_cat) {
												$child_args = array(
													'taxonomy' => 'product_cat',
													'hide_empty' => false,
													'parent'   => $parent_product_cat->term_id
												);
												$thumbnail_id = get_term_meta( $parent_product_cat->term_id, 'thumbnail_id', true );
												$image = wp_get_attachment_url( $thumbnail_id );
												$child_product_cats = get_terms( $child_args );
												if ( ! empty($child_product_cats) ) {
													echo '<li class="menu-item menu-item-has-children"><a href="'.esc_url(get_term_link($parent_product_cat->term_id)).'" class="nav-link">'; echo esc_html($parent_product_cat->name).'</a>';
												} else {
													echo '<li class="menu-item"><a href="'.esc_url(get_term_link($parent_product_cat->term_id)).'" class="nav-link">'; echo esc_html($parent_product_cat->name).'</a>';
												}
												if ( ! empty($child_product_cats) ) {
													echo '<ul class="dropdown-menu">';
													foreach ($child_product_cats as $child_product_cat) {
													echo '<li class="menu-item"><a href="'.esc_url(get_term_link($child_product_cat->term_id)).'" class="dropdown-item">'.esc_html($child_product_cat->name).'</a></li>';
													} echo '</ul>';
												} echo '</li>';
											} ?>
									</ul>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="col-9 my-auto">
							<nav class="navbar-area">
								<div class="main-navbar">
								   <?php get_template_part('template-parts/site','main-nav'); ?>                           
								</div>
								<div class="main-menu-right">
									<ul class="menu-right-list">
										<?php 
										$enable_hdr_btn  =	get_theme_mod('enable_hdr_btn',flixita_get_default_option( 'enable_hdr_btn' ));
										$hdr_btn_label  =	get_theme_mod('hdr_btn_label',flixita_get_default_option( 'hdr_btn_label' ));
										$hdr_btn_link   =	get_theme_mod('hdr_btn_link',flixita_get_default_option( 'hdr_btn_link' ));
										$hdr_btn_target = get_theme_mod('hdr_btn_target','');	
										if($enable_hdr_btn == '1' && !empty($hdr_btn_label)) { ?>
											<li class="button-area">
												<a href="<?php echo esc_url( $hdr_btn_link ); ?>" <?php if($hdr_btn_target == '1'): echo "target='_blank'"; endif;?> class="btn btn-secondary"><?php echo esc_html( $hdr_btn_label ); ?></a>
											</li>
										<?php } ?>
										
									</ul>                            
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-mobile-nav <?php echo esc_attr(flixita_site_header_sticky()); ?>"> 
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="main-mobile-menu">
							<div class="mobile-logo">
								<div class="logo">
								   <?php get_template_part('template-parts/site','branding'); ?>
								</div>
							</div>
							<div class="main-menu-right">
								<ul class="menu-right-list">
									<?php flixicart_nav_search(); ?>
									<?php flixicart_product_wishlist(); ?>								
									<?php flixicart_product_compare(); ?>
									<?php flixicart_my_account(); ?>
								</ul>
							</div>
							<div class="menu-collapse-wrap">
								<div class="hamburger-menu">
									<button type="button" class="menu-collapsed" aria-label="<?php esc_attr_e('Menu Collaped','flixicart'); ?>">
										<div class="top-bun"></div>
										<div class="meat"></div>
										<div class="bottom-bun"></div>
									</button>
								</div>
							</div>
							<div class="main-mobile-wrapper">
								<div id="mobile-menu-build" class="main-mobile-build">
									<button type="button" class="header-close-menu close-style" aria-label="<?php esc_attr_e('Header Close Menu','flixicart'); ?>"></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>        
		</div>
	</div>
</header>
<div id="content" class="flixita-theme-data">
	