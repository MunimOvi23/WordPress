<?php 
/**
 * Template part for displaying Pricing Section on front page template
 *
 * @package kunty
 */
	$animation = get_theme_mod( 'kunty_animation_disable', 1) ? 'animate-box':'';
	$section_enable = get_theme_mod('pricing_section_enable', 0);
	$subheading = get_theme_mod('pricing_section_subtitle', __('Priccing Plan', 'kunty'));
	$heading = get_theme_mod('pricing_section_title', __('Choose the best Package ', 'kunty') );
	$description = get_theme_mod('pricing_section_description', __('Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 'kunty'));

if(class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	if(1===$section_enable) :
	?>
	<!-- Start Pricing Table Area -->
	<div class="section pricing-section" id="pricing-section">

		<div class="container">

			<?php if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
			<div class="row justify-content-center">
				<div class="col-lg-6">
					<!-- Start Section Title -->
					<div class="section-title pb-70 text-center <?php echo esc_attr($animation); ?>">
						<?php if(!empty($subheading)) : ?>
						<h6 class="sub-title"><?php echo esc_html($subheading); ?></h6>
						<?php endif; ?>
						
						<?php if(!empty($heading)) : ?>
						<h2><?php echo wp_kses_post($heading); ?></h2>
						<?php endif; ?>

						<?php if(!empty($description)) : ?>
						<p><?php echo esc_html($description); ?></p>
						<?php endif; ?>
					</div>
					<!-- Start Section Title -->
				</div>
			</div>
			<?php endif; ?>

		<?php 
		$plan_query = new WP_Query( array( 'post_type' => 'trh_pricing', 'post_status' => 'publish', 'order' =>'ASC', 'posts_per_page' => 3 )); 

		if($plan_query->have_posts()) : ?>
			<div class="row">
			<?php
			while ( $plan_query->have_posts() ) : $plan_query->the_post(); 

				$plan_currency = get_post_meta( get_the_ID(), 'plan_currency', true );
				$plan_price = get_post_meta( get_the_ID(), 'plan_price', true );
				$plan_duration = get_post_meta( get_the_ID(), 'plan_duration', true );
				$plan_active = get_post_meta( get_the_ID(), 'plan_active', true );
				$btn_text = get_post_meta( get_the_ID(), 'plan_btn_text', true );
				$btn_url = get_post_meta( get_the_ID(), 'plan_btn_url', true );
				$btn_target = get_post_meta( get_the_ID(), 'plan_btn_target', true );
				if($btn_target==true){
					$btn_target="target=_blank";
				} else { 
					$btn_target="target=_self";
				}
				?>
				<div class="col-md-6 col-lg-4 <?php echo esc_attr($animation); ?>">
					<div class="single-plan mb-5 mb-lg-5 <?php if(true==$plan_active) : ?>active<?php endif; ?>">
					
						<?php if(true==$plan_active) : ?>
						<div class="popular">
							<span>Popular</span>
						</div>
						<?php endif; ?>
						
						<div class="plan-head">
							<h6><?php the_title(); ?></h6>
							<p class="plan-price mb-0">
								<span class="price"><?php echo esc_html($plan_currency); ?><?php echo esc_html($plan_price); ?></span><span class="month">/<?php echo esc_html($plan_duration); ?></span>
							</p>
						</div> 
						
						<div class="plan-features mb-5">
							<?php the_content(); ?>
						</div>

						<div class="plan-footer">
							<a href="<?php echo esc_url($btn_url); ?>" class="btn btn-kunty effect-1" <?php echo esc_attr($btn_target); ?>><?php echo esc_html($btn_text); ?></a>
						</div>

					</div>
				</div>
				<?php
			endwhile; ?>
			</div>
			<?php
		endif; ?>

		</div>
	</div>
	<!-- End Pricing Table Area -->
	<?php
	endif; 
} ?>
