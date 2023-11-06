<?php 
/**
 * Template part for displaying Team Section on front page template
 *
 * @package Bizes
 */
	$animation = get_theme_mod( 'kunty_animation_disable', 1) ? 'animate-box':'';

	$section_enable = get_theme_mod('team_section_enable', 0);

	$subheading = get_theme_mod('team_section_subtitle', __('Our Team', 'kunty'));
	$heading = get_theme_mod('team_section_title', __('All the Experienced Team Together.', 'kunty') );
	$description = get_theme_mod('team_section_description');

	$total_items = get_theme_mod('team_total_count', 3);
	$content_type = get_theme_mod('team_content_type', 'team_page');
	$teams = get_theme_mod('kunty_team');

	$carousel_enable = get_theme_mod('team_carousel_enable', 0);
	$align = get_theme_mod('team_content_align', 'text-center');

if(1===$section_enable ) : 
		?>
	<!-- Start Team Area -->
	<div class="section team-area" id="team-section">
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
	if( $content_type == 'team_page' || $content_type == 'team_post' ) {
		
		if( $content_type == 'team_page' ) :
			for( $i=1; $i<=$total_items; $i++ ) :
				$team_posts[] = get_theme_mod( 'team_page_'.$i );
			endfor;
			$args = array (
				'post_type'     => 'page',
				'posts_per_page'=> absint( $total_items ),
				'post__in'      => $team_posts,
				'orderby'       =>'post__in',
			);
		elseif( $content_type == 'team_post' ) :
			for( $i=1; $i<=$total_items; $i++ ) :
				$team_posts[] = get_theme_mod( 'team_post_'.$i );
			endfor;
			$args = array (
				'post_type'     => 'post',
				'posts_per_page'=> absint( $total_items ),
				'post__in'      => $team_posts,
				'orderby'       =>'post__in',
				'ignore_sticky_posts' => true,
			); 
		endif;

		$post_loop = new WP_Query($args);  
		
		if ( $post_loop->have_posts() ) :
			?>
			<div class="row">

			<?php
				if( 1=== $carousel_enable) echo '<div class="team-carousel owl-controls owl-carousel">';
				$i= 0;
				while ($post_loop->have_posts()) : $post_loop->the_post(); $i++;

				$facebook_url  = get_theme_mod( 'facebook_url_'.$i); 
				$twitter_url  = get_theme_mod( 'twitter_url_'.$i); 
				$linkedin_url  = get_theme_mod( 'linkedin_url_'.$i); 
				$instagram_url  = get_theme_mod( 'instagram_url_'.$i); 

				?>

					<div class="col-md-6 col-xl-3 <?php echo esc_attr($animation); ?>">

						<!-- Start single team -->
						<div class="singel-team text-center mb-3 mb-lg-5 js-tilt">
								<?php
							if ( has_post_thumbnail() ) { ?>
							<figure class="team-thumbnail circle mx-auto"> 
								<?php the_post_thumbnail( 'kunty-team'); ?>
							</figure>
								<?php
							}  else { 
							?>
							<figure class="team-thumbnail circle mx-auto"> 
								<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/team/1.jpg" alt="<?php the_title(); ?>">
							</figure>
							<?php
							} ?>
							
							<!-- Start team info -->
							<div class="team-info">
								<h5 class="mb-0"><?php the_title(); ?></h5>
								<p><?php echo esc_html(  wp_trim_words( get_the_content(), 10 ) ); ?></p>
							</div>
							<!-- End team info -->
							
							<?php if(!empty($facebook_url) || !empty($twitter_url) || !empty($linkedin_url) || !empty($instagram_url)) : ?>
							<div class="social-icons"> 

									<?php if(!empty($facebook_url) ) : ?>
									<a href="<?php echo esc_url($facebook_url); ?>" target="_blank"><i class="ti-facebook"></i></a>
									<?php endif; ?>

									<?php if(!empty($twitter_url) ) : ?>
									<a href="<?php echo esc_url($twitter_url); ?>" target="_blank"><i class="ti-twitter"></i></a>
									<?php endif; ?>

									<?php if(!empty($linkedin_url) ) : ?>
									<a href="<?php echo esc_url($linkedin_url); ?>" target="_blank"><i class="ti-linkedin"></i></a>
									<?php endif; ?>

									<?php if(!empty($instagram_url) ) : ?>
									<a href="<?php echo esc_url($instagram_url); ?>" target="_blank"><i class="ti-instagram"></i></a>
									<?php endif; ?>

							</div>
							<?php endif; ?>

						</div>
						<!-- End single team -->

					</div>

				<?php
				endwhile;
					if( 1 === $carousel_enable) echo '</div>';
				?>
			</div>

			<?php
		endif; 
		wp_reset_postdata(); 
	
	} else {
				?>
			<div class="row">
				<?php
					if( 1 === $carousel_enable) echo '<div class="team-carousel owl-controls owl-carousel">';

					foreach( $teams as $team ){
						$image          = ( isset( $team['image'] ) && $team['image'] ) ? $team['image'] : '';
						$name           = ( isset( $team['name'] ) && $team['name'] ) ? $team['name'] : '';
						$position       = ( isset( $team['position'] ) && $team['position'] ) ? $team['position'] : '';
						$facebook_link  = ( isset( $team['facebook_link'] ) && $team['facebook_link'] ) ? $team['facebook_link'] : '';
						$twitter_link   = ( isset( $team['twitter_link'] ) && $team['twitter_link'] ) ? $team['twitter_link'] : '';
						$instagram_link = ( isset( $team['instagram_link'] ) && $team['instagram_link'] ) ? $team['instagram_link'] : '';
						$linkedin_link  = ( isset( $team['linkedin_link'] ) && $team['linkedin_link'] ) ? $team['linkedin_link'] : '';
					?>

					<div class="col-md-6 col-xl-3 <?php echo esc_attr($animation); ?>">
						<div class="singel-team text-center mb-3 mb-lg-5">

								<?php
								$image = wp_get_attachment_image_src($image, 'kunty-team'); 
								if (!empty($image[0])) { 
									$img_src= $image[0];
								} else { 
									$img_src = get_template_directory_uri() .'/assets/img/team/1.jpg';
								}
								if(!empty($img_src)) : ?>
									<figure class="team-thumbnail circle mx-auto"> 
										<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_html($name); ?>">
									</figure>
								<?php endif; ?>

								<!-- Start team info -->
								<div class="team-info">

									<?php if(!empty($name)) : ?>
									<h5 class="mb-0"><?php echo esc_html($name); ?></h5>
									<?php endif; ?>

									<?php if(!empty($position)) : ?>
									<p><?php echo esc_html($position); ?></p>
									<?php endif; ?>

								</div>
								<!-- End team info -->

								<?php
								if(!empty($facebook_link) || !empty($twitter_link) || !empty($instagram_link) || !empty($linkedin_link) ) : ?>	
								<div class="social-icons"> 

									<?php if(!empty($facebook_link)) : ?>
									<a href="<?php echo esc_url($facebook_link); ?>" target="_blank"><i class="ti-facebook"></i></a>
									<?php endif; ?>
									
									<?php if(!empty($twitter_link)) : ?>
									<a href="<?php echo esc_url($twitter_link); ?>" target="_blank"><i class="ti-twitter"></i></a>
									<?php endif; ?>
								
									<?php if(!empty($linkedin_link)) : ?>
									<a href="<?php echo esc_url($linkedin_link); ?>" target="_blank"><i class="ti-linkedin"></i></a>
									<?php endif; ?>
									
									<?php if(!empty($instagram_link)) : ?>
									<a href="<?php echo esc_url($instagram_link); ?>" target="_blank"><i class="ti-instagram"></i></a>
									<?php endif; ?>

								</div>
								<?php endif; ?>


						</div>
					</div>
				<?php }
				if( 1 === $carousel_enable) echo '</div>'; ?>
			</div>
				<?php
		} ?>
		</div>
	</div>
	<?php
endif; ?>