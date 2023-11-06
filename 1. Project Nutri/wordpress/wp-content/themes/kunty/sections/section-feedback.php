<?php
/**
 * Template part for displaying feedback Section on front page template
 *
 * @package kunty
 */
	$animation = get_theme_mod( 'kunty_animation_disable', 1) ? 'animate-box':'';
	$section_enable = get_theme_mod('feedback_section_enable', 0);
	$subheading = get_theme_mod('feedback_section_subtitle', __('Feedback', 'kunty'));
	$heading = get_theme_mod('feedback_section_title', __('Kind Words from Our Valuable Clients.', 'kunty') );
	$description = get_theme_mod('feedback_section_description');
	$total_items = get_theme_mod('feedback_total_count', 3);
	$content_type = get_theme_mod('feedback_content_type', 'feedback_page');
	$reviewers = get_theme_mod('featured_reviewers');
	$carousel_enable = get_theme_mod('feedback_carousel_enable', 0);
	$rating_display = get_theme_mod('feedback_rating_display', 1);

	if(1===$section_enable) : 
?>

			<!-- Start Client Area -->
			<div class="section feedback-area" id="feedback-section"  >
				<div class="container"> 
				
					<?php if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
					<div class="row">
						<div class="col-lg-5 text-center text-xl-start">
							<!-- Start Section Title -->
							<div class="section-title pb-70 <?php echo esc_attr($animation); ?>">
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
				</div>
				<div class="container-fluid">

				<?php
		if( $content_type == 'feedback_page' || $content_type == 'feedback_post' ) {
			
			if( $content_type == 'feedback_page' ) :
				for( $i=1; $i<=$total_items; $i++ ) :
					$reviews_posts[] = get_theme_mod( 'feedback_page_'.$i );
				endfor;
				$args = array (
					'post_type'     => 'page',
					'posts_per_page'=> absint( $total_items ),
					'post__in'      => $reviews_posts,
					'orderby'       =>'post__in',
				);
			elseif( $content_type == 'feedback_post' ) :
				for( $i=1; $i<=$total_items; $i++ ) :
					$reviews_posts[] = get_theme_mod( 'feedback_post_'.$i );
				endfor;
				$args = array (
					'post_type'     => 'post',
					'posts_per_page'=> absint( $total_items ),
					'post__in'      => $reviews_posts,
					'orderby'       =>'post__in',
					'ignore_sticky_posts' => true,
				); 
			endif;

			$post_loop = new WP_Query($args);  
			
			if ( $post_loop->have_posts() ) :
				?>
					<div class="row pl-lg-3">
						<?php
						if( 1=== $carousel_enable) echo '<div class="review-carousel style-2 owl-controls owl-carousel">';
							$i= 0;
						while ($post_loop->have_posts()) : $post_loop->the_post(); $i++;
							$designation  = get_theme_mod( 'reviewer_position_'.$i, __('Web Designer', 'kunty')); ?>

							<div class="col-md-6 col-lg-4 <?php echo esc_attr($animation); ?>">
								<div class="testimonial position-relative mb-4 mb-lg-5 <?php if ( has_post_thumbnail() ) :?>has-face<?php endif;?>">
									<?php if ( has_post_thumbnail() ) : ?>
									<figure class="client-face mt-0"> 
										<?php the_post_thumbnail( 'thumbnail'); ?>
									</figure>
									<?php endif; ?>
									<?php if(1===$rating_display) : ?>
									<div class="rating"> 
										<i class="ti-star"></i>
										<i class="ti-star"></i>
										<i class="ti-star"></i>
										<i class="ti-star"></i>
										<i class="ti-star"></i>
									</div>
									<?php endif; ?>
									<div class="client-quote">
										<?php the_content(); ?>
									</div>

									<div class="client-info">
										<h6 class="name mb-0"><?php the_title(); ?></h6>
										<?php if(!empty($designation)) : ?>
										<p class="designation mb-0"><?php echo esc_html($designation); ?></p>
										<?php endif; ?>
									</div>

								</div>
							</div>
							<?php
						endwhile;
						if( 1 === $carousel_enable) echo '</div>'; ?>
					</div>

					<?php
				endif; 
				wp_reset_postdata(); 
			
			} else { 
					if(class_exists('Themereps_Helper') ){ ?>
						<div class="row pl-lg-3">
							<?php
								if( 1 === $carousel_enable) echo '<div class="review-carousel owl-controls style-2 owl-carousel">';

								foreach( $reviewers as $reviewer ){

									$image      = ( isset( $reviewer['image'] ) && $reviewer['image'] ) ? $reviewer['image'] : '';
									$name       = ( isset( $reviewer['name'] ) && $reviewer['name'] ) ? $reviewer['name'] : '';
									$quotation  = ( isset( $reviewer['quote'] ) && $reviewer['quote'] ) ? $reviewer['quote'] : '';
									$position   = ( isset( $reviewer['position'] ) && $reviewer['position'] ) ? $reviewer['position'] : '';
								?>

								<div class="col-md-6 col-lg-4 <?php echo esc_attr($animation); ?>">
									<div class="testimonial mb-4 mb-lg-5 <?php if ( !empty($image) ) :?>has-face<?php endif;?>">
									
										<?php if ( !empty($image) ) : ?>
										<figure class="client-face mt-0"> 
											<?php echo  wp_get_attachment_image( $image ); ?>
										</figure>
										<?php endif; ?>
										<?php if(1===$rating_display) : ?>
										<div class="rating"> 
											<i class="ti-star"></i>
											<i class="ti-star"></i>
											<i class="ti-star"></i>
											<i class="ti-star"></i>
											<i class="ti-star"></i>
										</div>
										<?php endif; ?>
										<?php if(!empty($quotation)): ?>
										<div class="client-quote">
											<p><?php echo esc_html($quotation); ?></p>
										</div>
										<?php endif; ?>

										<div class="client-info">
											<h6 class="name mb-0"><?php echo esc_html($name); ?></h6>
											<?php if(!empty($position)) : ?>
											<p class="designation mb-0"><?php echo esc_html($position); ?></p>
											<?php endif; ?>
										</div>

									</div>
								</div>
							<?php }
							if( 1 === $carousel_enable) echo '</div>'; ?>
						</div>
					<?php
					}
				} ?>

				</div>
			</div>
	<?php endif; ?>