<?php
/**
 * Template Name: Contact Page
 *
 * @package kunty
*/
	get_header();
	$animation       = get_theme_mod( 'animation_disable', 0 ) ? 'animate-box':'';
	$info_title   = get_theme_mod( 'contact_info_title', __('Contact Info', 'kunty'));
	$phone_title = get_theme_mod( 'phone_title', __('Phone', 'kunty'));
	$phone_1     = get_theme_mod( 'phone_1', __('+7(123) 9876 543', 'kunty'));
	$phone_2     = get_theme_mod( 'phone_2', __('+7(123) 9876 543', 'kunty'));
	$mail_title  = get_theme_mod( 'mail_title', __('Email', 'kunty'));
	$email_1  = get_theme_mod( 'email_1', 'help@kunty.com');
	$email_2  = get_theme_mod( 'email_2', 'info@kunty.com');
	$address_title = get_theme_mod( 'address_title', __('Location', 'kunty'));
	$address       = get_theme_mod( 'contact_address', __('Warnwe Park Streetperrine, FL 33157 New York City', 'kunty'));
	$form_title = get_theme_mod( 'contact_form_title', __('Get in Touch', 'kunty'));
	$google_map = get_theme_mod( 'contact_google_map_iframe' );
?>

	<!-- Start Contact Area -->
	<div class="contact-area ptb-110">
		<div class="container">

			<div class="row">

				<div class="col-lg-4">
					<div class="contact-detail mb-5">
					
						<h3 class="contact-title <?php echo esc_attr($animation);?> mb-5"><?php echo esc_html($info_title); ?></h3>

						<div class="icon-box d-flex flex-row mb-4 <?php echo esc_attr($animation);?>">
							<div class="icon-holder me-4 mt-2"> 
								<i class="ti-headphone"></i>
							</div>
							<div> 
								<h6 class="mb-2"><strong><?php echo esc_html($phone_title); ?> </strong></h6>
								<p class="mb-0"><a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone_1 ) ); ?>"><?php echo esc_html($phone_1); ?></a></p>
								<p class="mb-0"><a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone_2 ) ); ?>"><?php echo esc_html($phone_2); ?></a></p>
							</div>
						</div>

						<div class="icon-box d-flex flex-row mb-4 <?php echo esc_attr($animation);?>">
							<div class="icon-holder me-4 mt-2"> 
								<i class="ti-envelope"></i>
							</div>
							<div>
								<h6 class="mb-2"><strong><?php echo esc_html($mail_title); ?> </strong></h6>
								<p class="mb-0"><a href="mailto:<?php echo esc_html($email_1); ?>"><?php echo esc_html($email_1); ?></a></p>
								<p class="mb-0"><a href="mailto:<?php echo esc_html($email_2); ?>"><?php echo esc_html($email_2); ?></a></p>
							</div>
						</div>

						<div class="icon-box d-flex flex-row mb-4 <?php echo esc_attr($animation);?>">
							<div class="icon-holder me-4 mt-2"> 
								<i class="ti-location-pin"></i>
							</div>
							<div>
								<h6 class="mb-2"><strong><?php echo esc_html($address_title); ?> </strong></h6>
								<p class="mb-0"><?php 
									echo wp_kses_post(str_replace('|', '<br />', $address));
								?></p>
							</div>
						</div>
						
					</div>
				</div>

				<div class="col-lg-7 offset-lg-1">

					<?php if ($form_title) : ?>
					<h3 class="contact-title  mb-5 <?php echo esc_attr($animation);?>"><?php echo esc_html($form_title); ?></h3>
					<?php endif; ?>

					<?php 
					$form_shortcode = get_theme_mod( 'contact_form_shortcode' );  
					if($form_shortcode) : ?>
					<div class="contact-form mb-5 <?php echo esc_attr($animation);?>">
						<?php echo do_shortcode( $form_shortcode ); ?>
					</div>
					<?php endif; ?>

				</div>

			</div>
			
			<?php if( $google_map ): ?> 
			<div class="row">
				<div class="col-lg-12"> 
					<div class="gmap-area overflow-hidden">
						<?php echo htmlspecialchars_decode( $google_map ); ?>
					</div>
				</div>
			</div>
			<?php endif; ?>
			
		</div>
	</div>
	<!-- Start Contact Area -->



	<?php get_footer(); ?>