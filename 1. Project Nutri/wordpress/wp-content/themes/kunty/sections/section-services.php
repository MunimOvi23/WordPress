<?php 
/**
 * Template part for displaying review Section on front page template
 *
 * @package Kunty
 */
	$animation = get_theme_mod( 'kunty_animation_disable', 1) ? 'animate-box':'';

	$section_enable = get_theme_mod('services_section_enable', 0);

	$heading = get_theme_mod('services_section_title', __('Our Included Services', 'kunty') );
	$subheading = get_theme_mod('services_section_subtitle', __('What we offer ', 'kunty'));
	$description = get_theme_mod('services_section_description', __('We helping client to create with our talented expert.', 'kunty'));

	$item_count = get_theme_mod('services_total_items_show', 4);
	$content_type = get_theme_mod('services_content_type', 'services_page');
	$services = get_theme_mod('featured_services');
	$services_style = get_theme_mod('services_style', 'style-1');
	$service_align = get_theme_mod('service_content_align');
	$detail_link = get_theme_mod('service_permalink', 1);
	$layout = get_theme_mod('services_layout', 'layout-1');
	
	if(1===$section_enable) :
?>
<!-- Start Experiences Area -->
<div class="section service-section" id="service-section">
	<div class="container">
		<?php
	if($layout == 'layout-1') : ?>
		<div class="row">
				<?php 
			if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
			<div class="col-lg-5 col-xl-4 text-center text-lg-start">
				<!-- Start Section Heading -->
				<div class="section-title <?php echo esc_attr($animation); ?> pb-70">

					<?php if(!empty($subheading)) : ?>
					<h6 class="sub-title"><?php echo esc_html($subheading); ?></h6>
					<?php endif; ?>
					
					<?php if(!empty($heading)) : ?>
					<h2><?php echo wp_kses_post($heading); ?></h2>
					<?php endif; ?>

					<?php if(!empty($description)) : ?>
					<p class="mt-4"><?php echo esc_html($description); ?></p>
					<?php endif; ?>

					<?php 
						$btn_text = get_theme_mod( 'all_service_btn_text' ); 
						$btn_url = get_theme_mod( 'all_service_btn_url'); 
						$btn_target = get_theme_mod( 'all_service_btn_target' ); 
						$btn_target = $btn_target?'target="_blank"' : '';
						if(!empty($btn_url)) : ?>	
							<a href="<?php echo esc_url($btn_url); ?>" <?php echo esc_attr($btn_target); ?> class="btn btn-kunty mt-2 mt-lg-5"><?php echo esc_html($btn_text); ?></a>
							<?php
						endif; 
					?>
					
				</div>
				<!-- End Section Heading -->
			</div>
			<?php 
			endif; ?>

			<div class="col-lg-7 col-xl-7 offset-xl-1">
						<?php
					if($content_type == 'services_page' || $content_type == 'services_post') {
						if( $content_type == 'services_page' ) :
							for( $i=1; $i<=$item_count; $i++ ) :
								$service_posts[] = get_theme_mod( 'featured_service_page_'.$i );
							endfor;  
							$args = array (
								'post_type'     => 'page',
								'posts_per_page' => absint( $item_count ),
								'post__in'      => $service_posts,
								'orderby'       =>'post__in',
							);
						elseif( $content_type == 'services_post' ) :
							for( $i=1; $i<=$item_count; $i++ ) :
								$service_posts[] = get_theme_mod( 'featured_service_post_'.$i );
							endfor;
							$args = array (
								'post_type'     => 'post',
								'posts_per_page' => absint( $item_count ),
								'post__in'      => $service_posts,
								'orderby'       =>'post__in',
								'ignore_sticky_posts' => true,
							);
						else :
							$args = array ();
						endif;

						$post_loop = new WP_Query($args);                        
						if ( $post_loop->have_posts() ) :?>
						<div class="row">
							<?php
							$i= 0;
							while ($post_loop->have_posts()) : $post_loop->the_post(); $i++;
								$icon = get_theme_mod( 'service_icon_'.$i, 'ti-vector ' ); 
							?>
							<div class="col-md-6 col-lg-6 col-xl-5 offset-xl-1">
									<?php
								if($services_style == 'style-1' ) : ?>
									<div class="icon-box mb-5 color-<?php echo esc_attr($i); ?> <?php echo esc_attr($service_align); ?> <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">

										<?php if(!empty($icon)) : ?>
											<div class="icon-holder"> 
												<i class="<?php echo esc_html($icon); ?>"></i>
											</div>
										<?php endif; ?>
										
										<?php if(1===$detail_link): ?>
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<?php else : ?>
										<h4><?php the_title(); ?></h4>
										<?php endif; ?>
										
										<?php
										if ( ! has_excerpt() ) { ?>
										<p class="mb-0"><?php echo esc_html( wp_trim_words( get_the_content(), 15 ) ); ?></p> 
										<?php }  else { 
											the_excerpt();
										}
										?>
										<?php if(1===$detail_link): ?>
										<a class="btn-more d-block mt-4" href="<?php the_permalink(); ?>"><i class="ti-arrow-top-right"></i></a>
										<?php endif; ?>
										
									</div>
										<?php
								else : ?>

								<div class="icon-box d-flex flex-row mb-4 <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">
									<?php 
									if(!empty($icon)) : ?>
									<div class="icon-holder me-4 mt-2"> 
										<i class="<?php echo esc_html($icon); ?>"></i>
									</div>
									<?php 
									endif; ?>
									<div> 
										<?php if(1===$detail_link): ?>
										<h4 class="mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<?php else : ?>
										<h4 class="mb-1"><?php the_title(); ?></h4>
										<?php endif; ?>
										<?php
										if ( ! has_excerpt() ) { ?>
										<p class="mb-0"><?php echo esc_html( wp_trim_words( get_the_content(), 15 ) ); ?></p> 
										<?php }  else { 
											the_excerpt();
										}
										?>
										<?php if(1===$detail_link): ?>
										<a class="btn-more d-block mt-4" href="<?php the_permalink(); ?>"><i class="ti-arrow-top-right"></i></a>
										<?php endif; ?>
									</div>
								</div>

								<?php endif; ?>

							</div>
							<?php
							endwhile; ?>
						</div>
						<?php
						endif; 
						wp_reset_postdata(); ?>
					<?php
					} else { ?>
						<div class="row"> 
							<?php
							$i= 0;
							foreach( $services as $service ){
								$i++;
								$icon          = ( isset( $service['icon'] ) && $service['icon'] ) ? $service['icon'] : '';
								$service_title = ( isset( $service['title'] ) && $service['title'] ) ? $service['title'] : '';
								$service_desc  = ( isset( $service['description'] ) && $service['description'] ) ? $service['description'] : '';
								$btn_url      = ( isset( $service['link'] ) && $service['link'] ) ? $service['link'] : '';
								$btn_trgt   = ( isset( $service['checkbox'] ) && $service['checkbox']) ? '_blank' : '_self';
								?>


							<div class="col-md-6 col-lg-6 col-xl-5 offset-xl-1">
									<?php 
								if($services_style == 'style-1') : ?>
									<div class="icon-box mb-5 color-<?php echo esc_attr($i); ?> <?php echo esc_attr($service_align); ?> <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">
									
											<?php 
										if(!empty($icon)) : ?>
											<div class="icon-holder"> 
												<i class="<?php echo esc_html($icon); ?>"></i>
											</div>
											<?php
										endif; ?>

											<?php 
										if(!empty($service_title) ) :
											if(!empty($btn_url)) { ?>
												<h4><a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>"><?php echo esc_html($service_title); ?></a></h4>
												<?php 
											} else { ?>
												<h4><?php echo esc_html($service_title); ?></h4>
												<?php 
											} 
										endif; ?>

										<?php if(!empty($service_desc) ) : ?>
											<p class="mb-0"><?php echo esc_html($service_desc); ?></p>
										<?php endif; ?>

										<?php if(!empty($btn_url)) : ?>
										<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>" class="btn-more d-block mt-4"><i class="ti-arrow-top-right"></i></a>
										<?php endif; ?>

									</div>
									<?php 
								else : ?>
									<div class="icon-box d-flex flex-row mb-4 <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">
											<?php 
										if(!empty($icon)) : ?>
											<div class="icon-holder me-4 mt-2"> 
												<i class="<?php echo esc_html($icon); ?>"></i>
											</div>
											<?php 
										endif; ?>
										
										<div><?php 
											if(!empty($service_title) ) :
												if(!empty($btn_url)) { ?>
													<h4><a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>"><?php echo esc_html($service_title); ?></a></h4>
													<?php 
												} else { ?>
													<h4><?php echo esc_html($service_title); ?></h4>
													<?php 
												} 
											endif; ?>
											
												<?php 
											if(!empty($service_desc) ) : ?>
												<p class="mb-0"><?php echo esc_html($service_desc); ?></p>
												<?php 
											endif; ?>

												<?php 
											if(!empty($btn_url)) : ?>
												<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>" class="btn-more d-block mt-4"><i class="ti-arrow-top-right"></i></a>
												<?php 
											endif; ?>
										</div>
									</div>
									<?php 
								endif; ?>
							</div>
							<?php } ?>
						</div>
						<?php
					} ?>
			</div>
		</div>
		<?php
	else : ?>
		

		<div class="row justify-content-center">
				<?php 
			if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
			<div class="col-lg-8 col-xl-8 text-center">
				<!-- Start Section Heading -->
				<div class="section-title <?php echo esc_attr($animation); ?> pb-70">

					<?php if(!empty($subheading)) : ?>
					<h6 class="sub-title"><?php echo esc_html($subheading); ?></h6>
					<?php endif; ?>
					
					<?php if(!empty($heading)) : ?>
					<h2><?php echo wp_kses_post($heading); ?></h2>
					<?php endif; ?>

					<?php if(!empty($description)) : ?>
					<p class="mt-4"><?php echo esc_html($description); ?></p>
					<?php endif; ?>
					
				</div>
				<!-- End Section Heading -->
			</div>
			<?php 
			endif; ?>
		</div>

			<?php
		if($content_type == 'services_page' || $content_type == 'services_post') {
			if( $content_type == 'services_page' ) :
				for( $i=1; $i<=$item_count; $i++ ) :
					$service_posts[] = get_theme_mod( 'featured_service_page_'.$i );
				endfor;  
				$args = array (
					'post_type'     => 'page',
					'posts_per_page' => absint( $item_count ),
					'post__in'      => $service_posts,
					'orderby'       =>'post__in',
				);
			elseif( $content_type == 'services_post' ) :
				for( $i=1; $i<=$item_count; $i++ ) :
					$service_posts[] = get_theme_mod( 'featured_service_post_'.$i );
				endfor;
				$args = array (
					'post_type'     => 'post',
					'posts_per_page' => absint( $item_count ),
					'post__in'      => $service_posts,
					'orderby'       =>'post__in',
					'ignore_sticky_posts' => true,
				);
			else :
				$args = array ();
			endif;

			$post_loop = new WP_Query($args);                        
			if ( $post_loop->have_posts() ) :?>
			<div class="row">
				<?php
				$i= 0;
				while ($post_loop->have_posts()) : $post_loop->the_post(); $i++;
					$icon = get_theme_mod( 'service_icon_'.$i, 'ti-vector ' ); 
				?>
				<div class="col-sm-12 col-md-6 col-lg-4">
						<?php
					if($services_style == 'style-1' ) : ?>
						<div class="icon-box mb-5 color-<?php echo esc_attr($i); ?> <?php echo esc_attr($service_align); ?> <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">

							<?php if(!empty($icon)) : ?>
								<div class="icon-holder"> 
									<i class="<?php echo esc_html($icon); ?>"></i>
								</div>
							<?php endif; ?>
							
							<?php if(1===$detail_link): ?>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php else : ?>
							<h4><?php the_title(); ?></h4>
							<?php endif; ?>
							
							<?php
							if ( ! has_excerpt() ) { ?>
							<p class="mb-0"><?php echo esc_html( wp_trim_words( get_the_content(), 15 ) ); ?></p> 
							<?php }  else { 
								the_excerpt();
							}
							?>
							<?php if(1===$detail_link): ?>
							<a class="btn-more d-block mt-4" href="<?php the_permalink(); ?>"><i class="ti-arrow-top-right"></i></a>
							<?php endif; ?>
							
						</div>
							<?php
					else : ?>

					<div class="icon-box d-flex flex-row mb-4 <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">
						<?php 
						if(!empty($icon)) : ?>
						<div class="icon-holder me-4 mt-2"> 
							<i class="<?php echo esc_html($icon); ?>"></i>
						</div>
						<?php 
						endif; ?>
						<div> 
							<?php if(1===$detail_link): ?>
							<h4 class="mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<?php else : ?>
							<h4 class="mb-1"><?php the_title(); ?></h4>
							<?php endif; ?>
							<?php
							if ( ! has_excerpt() ) { ?>
							<p class="mb-0"><?php echo esc_html( wp_trim_words( get_the_content(), 15 ) ); ?></p> 
							<?php }  else { 
								the_excerpt();
							}
							?>
							<?php if(1===$detail_link): ?>
							<a class="btn-more d-block mt-4" href="<?php the_permalink(); ?>"><i class="ti-arrow-top-right"></i></a>
							<?php endif; ?>
						</div>
					</div>

					<?php endif; ?>

				</div>
				<?php
				endwhile; ?>
			</div>
			<?php
			endif; 
			wp_reset_postdata(); ?>
		<?php
		} else { ?>
			<div class="row"> 
				<?php
				$i= 0;
				foreach( $services as $service ){
					$i++;
					$icon          = ( isset( $service['icon'] ) && $service['icon'] ) ? $service['icon'] : '';
					$service_title = ( isset( $service['title'] ) && $service['title'] ) ? $service['title'] : '';
					$service_desc  = ( isset( $service['description'] ) && $service['description'] ) ? $service['description'] : '';
					$btn_url      = ( isset( $service['link'] ) && $service['link'] ) ? $service['link'] : '';
					$btn_trgt   = ( isset( $service['checkbox'] ) && $service['checkbox']) ? '_blank' : '_self';
					?>


				<div class="col-sm-12 col-md-6 col-lg-4">
						<?php 
					if($services_style == 'style-1') : ?>
						<div class="icon-box mb-5 color-<?php echo esc_attr($i); ?> <?php echo esc_attr($service_align); ?> <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">
						
								<?php 
							if(!empty($icon)) : ?>
								<div class="icon-holder"> 
									<i class="<?php echo esc_html($icon); ?>"></i>
								</div>
								<?php
							endif; ?>

								<?php 
							if(!empty($service_title) ) :
								if(!empty($btn_url)) { ?>
									<h4><a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>"><?php echo esc_html($service_title); ?></a></h4>
									<?php 
								} else { ?>
									<h4><?php echo esc_html($service_title); ?></h4>
									<?php 
								} 
							endif; ?>

							<?php if(!empty($service_desc) ) : ?>
								<p class="mb-0"><?php echo esc_html($service_desc); ?></p>
							<?php endif; ?>

							<?php if(!empty($btn_url)) : ?>
							<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>" class="btn-more d-block mt-4"><i class="ti-arrow-top-right"></i></a>
							<?php endif; ?>

						</div>
						<?php 
					else : ?>
						<div class="icon-box d-flex flex-row mb-4 <?php echo esc_attr($animation); ?> <?php  echo esc_attr($services_style); ?>">
								<?php 
							if(!empty($icon)) : ?>
								<div class="icon-holder me-4 mt-2"> 
									<i class="<?php echo esc_html($icon); ?>"></i>
								</div>
								<?php 
							endif; ?>
							
							<div><?php 
								if(!empty($service_title) ) :
									if(!empty($btn_url)) { ?>
										<h4><a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>"><?php echo esc_html($service_title); ?></a></h4>
										<?php 
									} else { ?>
										<h4><?php echo esc_html($service_title); ?></h4>
										<?php 
									} 
								endif; ?>
								
									<?php 
								if(!empty($service_desc) ) : ?>
									<p class="mb-0"><?php echo esc_html($service_desc); ?></p>
									<?php 
								endif; ?>

									<?php 
								if(!empty($btn_url)) : ?>
									<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>" class="btn-more d-block mt-4"><i class="ti-arrow-top-right"></i></a>
									<?php 
								endif; ?>
							</div>
						</div>
						<?php 
					endif; ?>
				</div>
				<?php } ?>
			</div>
			<?php
		} ?>

	<?php endif; ?>	
	</div>
</div>
<?php endif; ?>











