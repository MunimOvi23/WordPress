<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kunty
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>

		<div class="offcan-overlay"><div class="offwrapcon"></div></div>
		<!-- Start Wrapper -->
		<div class="wrapper">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'kunty' ); ?></a>
			<?php 
				$classes = array();
				if(1===get_theme_mod('site_sticky_header', 0) ){
					$classes[] = 'sticky-header';
				} 
			?>
			<!-- Start Header Area -->
			<header class="header-area <?php echo esc_attr( join( ' ', $classes ) ); ?>" id="header-area">

				<?php if( 1 === get_theme_mod('header_top_display', 0) ) : ?>
				<div class="header-top position-relative">
					<div class="<?php echo esc_attr( get_theme_mod('topbar_container_width', 'container') ); ?>">
						<div class="row">
							<div class="col-xs-12 col-sm-12 d-sm-flex justify-content-sm-between">
								<?php
									$display_phone = get_theme_mod('header_display_phone', 1);
									$display_email = get_theme_mod('header_display_email', 1);
									$phone = get_theme_mod('header_phone', '+123)-456-7890');
									$email = get_theme_mod('header_email', 'help@kunty.com');
									
								if( $display_phone|| $display_email ) : ?>
							    <div class="top-contacts d-flex align-items-center">
									<?php if(1 === $display_phone && !empty($phone) ) : ?>
							    	<a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="phone"><?php echo esc_html($phone); ?></a>
									<?php endif; ?>
									
									<?php if( 1 === $display_email && !empty($email) ) : ?>
							    	<a href="<?php echo esc_url( 'mailto:' . $email ); ?>" class="email"><?php echo esc_html($email); ?></a>
									<?php endif; ?>

							    </div>
								<?php endif; ?>
								<?php if(1=== get_theme_mod('header_social_enable', 1)) : ?>
								<div class="top-social ml-auto d-flex align-items-center">
									<?php echo kunty_get_social_media(); ?>
								</div>
                                <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endif; ?>
				<!-- End header top -->
				<div class="position-relative">
					<div class="main-header fullwidth-menu">
						<div class="<?php echo esc_attr( get_theme_mod('header_container_width', 'container') ); ?>">
							<div class="row">
								<div class="col-md-12">
									<div class="header-inner d-flex">

										<div class="site-branding me-0 me-md-4 d-flex align-items-center">
											<?php kunty_site_logo(); ?>
										</div>
										<!-- Start Bizes Nav -->
										<div class="d-flex justify-content-<?php if('left' == get_theme_mod('header_nav_position', 'center')): ?>between <?php else : ?>end<?php endif; ?> flex-grow-1">
											<div class="menu-wrap d-flex <?php if('center' == get_theme_mod('header_nav_position', 'center')): ?>mx-auto<?php endif; ?>">
												<?php kunty_site_nagivation(); ?>
											</div>
											<div class="d-flex align-items-center mr-auto">

												<?php if( class_exists( 'WooCommerce' ) && get_theme_mod('header_cart_icon_display', 1) && th_fs()->can_use_premium_code() ) : ?>
												<div class="header-cart ms-4">
												<?php kunty_woo_header_cart(); ?>
												</div>
												<?php endif; ?>
												
												<button class="nav-icon <?php if(0=== get_theme_mod('offcanvas_display', 1)) : ?>d-block d-lg-none<?php endif; ?> ms-4" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
												<span></span>
												</button>
												
												<?php 
												$show_btn = get_theme_mod('header_btn_display', 1);
												$btn_text = get_theme_mod('header_btn_text', __('Get Started', 'kunty'));
												$btn_link = get_theme_mod('header_btn_link');
												$btn_link_new = get_theme_mod('header_btn_link_open', 0);
												$btn_target="target=_self";
												if($btn_link_new){
													$btn_target="target=_blank";
												}
												if ($show_btn == 1) : ?>
													<div class="header-btn ms-4 d-none d-sm-block">
														<a href="<?php echo esc_url($btn_link); ?>" class="btn btn-kunty" <?php echo esc_attr($btn_target); ?>>
															<?php echo esc_html($btn_text); ?>
														</a>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</header>
			<!-- End Header Area -->
			
			<!-- End Header Area -->
			<?php kunty_sidebar_navigation(); ?>