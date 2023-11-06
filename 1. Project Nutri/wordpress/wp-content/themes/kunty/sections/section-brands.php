<?php 
/**
 * Template part for displaying Brands Logo Section on front page template
 *
 * @package kunty
 */
	$animation = get_theme_mod( 'kunty_animation_disable', 1) === 1 ? 'animate-box':'';
	$section_enable = get_theme_mod('brands_section_enable', 0);
	$heading = get_theme_mod('brands_section_title', __('Trusted by 150+ companies', 'kunty'));
	$brands = get_theme_mod('kunty_brands');
	$carousel_enable = get_theme_mod('brands_carousel_enable', 0);

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	if(1===$section_enable) : 
	?>
	<div class="section brands-section" id="brands-section">
		<div class="container">
			<?php if(!empty($heading) || !empty($description)) : ?>
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">

					<div class="section-title pb-70 <?php echo esc_attr($animation); ?>">
						<?php if(!empty($heading)) : ?>
						<h6 class="sub-title"><?php echo esc_html($heading); ?></h6>
						<?php endif; ?>
					</div>

				</div>
			</div>
			<?php endif; ?>

			<?php
			if(!empty($brands)) :
			?>
			<div class="row align-items-center justify-content-center">
				<?php if( 1=== $carousel_enable) echo '<div class="brands-carousel owl-controls owl-carousel">'; ?>
				<?php
				foreach( $brands as $brand ){
					$image        = ( isset( $brand['image'] ) && $brand['image'] ) ? $brand['image'] : '';
					$btitle        = ( isset( $brand['title'] ) && $brand['title'] ) ? $brand['title'] : '';
					$btn_url      = ( isset( $brand['link'] ) && $brand['link'] ) ? $brand['link'] : '';
					$btn_target   = ( isset( $brand['checkbox'] ) && $brand['checkbox']) ? '_blank' : '_self';
					?>
					<div class="col-md-4 col-lg-3 <?php echo esc_attr($animation); ?>">
						<div class="single-brand d-flex justify-content-center align-items-center">
							<?php
							$image = wp_get_attachment_image_src($image, 'kunty-brand'); 
							if (!empty($image[0])) { 
								$img_src= $image[0];
							} else { 
								$img_src = '';
							}
							if(!empty($btn_url)) : ?>
								<a href="<?php echo esc_url($btn_url); ?>"  target="<?php echo esc_attr( $btn_target ); ?>" title="<?php echo esc_attr( $btitle ); ?>">
									<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr( $btitle ); ?>" />
								</a>
							<?php else : ?>
								<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr( $btitle ); ?>" />
							<?php endif; ?>
						</div>
					</div>
					<?php
				}
				?>
				<?php if( 1=== $carousel_enable) echo '</div>'; ?>
			</div>
			<?php
			endif; ?>
		</div>
	</div>
	<?php
	endif; 
} ?>
