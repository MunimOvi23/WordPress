<?php 
/**
 * Template part for displaying Portfolios Section on front page template
 *
 * @package kunty
 */
	$animation = get_theme_mod( 'kunty_animation_disable', 1) ? 'animate-box':'';
	$section_enable = get_theme_mod('portfolio_section_enable', 0);
	$subheading = get_theme_mod('portfolio_section_subtitle', __('Our Projects', 'kunty'));
	$heading = get_theme_mod('portfolio_section_title', __('Let\'s Check Our Latest Work.', 'kunty') );
	$description = get_theme_mod('portfolio_section_description');

	$item_count = get_theme_mod('portfolio_total_items_show', 6);
	$content_type = get_theme_mod('portfolio_content_type', 'portfolio_page');
	$portfolios = get_theme_mod('featured_portfolios');
	$portfolio_style = get_theme_mod('portfolio_style', 'style-1');
	$content_align = get_theme_mod('portfolio_content_align');
	$lightbox_enable = get_theme_mod('portfolio_lightbox_enable', 1);
	$linkto_detai = get_theme_mod('portfolio_permalink', 1);
	
	if(1 === $section_enable ) : 
?>

	<!-- Start Work Area -->
	<div class="section portfolio-section" id="portfolio-section">

		<div class="container">

			<?php if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
			<div class="row justify-content-center">
				<div class="col-lg-5">
					<!-- Start Section Title -->
					<div class="section-title text-center pb-70  <?php echo esc_attr($animation);?>">
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
	if($content_type == 'portfolio_page' || $content_type == 'portfolio_post') {
		if( $content_type == 'portfolio_page' ) :
			for( $i=1; $i<=$item_count; $i++ ) :
				$portfolio_posts[] = get_theme_mod( 'featured_portfolio_page_'.$i );
			endfor;  
			$args = array (
				'post_type'     => 'page',
				'posts_per_page' => absint( $item_count ),
				'post__in'      => $portfolio_posts,
				'orderby'       =>'post__in',
			);
		elseif( $content_type == 'portfolio_post' ) :
			for( $i=1; $i<=$item_count; $i++ ) :
				$portfolio_posts[] = get_theme_mod( 'featured_portfolio_post_'.$i );
			endfor;
			$args = array (
				'post_type'     => 'post',
				'posts_per_page' => absint( $item_count ),
				'post__in'      => $portfolio_posts,
				'orderby'       =>'post__in',
				'ignore_sticky_posts' => true,
			);
		else :
			$args = array ();
		endif;

			$portfolio_loop = new WP_Query($args);                        
			if ( $portfolio_loop->have_posts() ) : ?>
			<div class="row grid-wrap">
				<?php
				while ($portfolio_loop->have_posts()) : $portfolio_loop->the_post();
				?>
				<div class="col-lg-4 col-md-6 masonry-item">
					<div class="portfolio-item position-relative mb-4 <?php  echo esc_attr($portfolio_style); ?> <?php echo esc_attr($animation);?>">

						<div class="portfolio-figure position-relative">
							<?php
							if(0===$linkto_detai) : 
									the_post_thumbnail( 'kunty-portfolio',
										array(
											'alt' => the_title_attribute(
												array(
													'echo' => false,
												)
											),
										)
									);
							else : ?>
								<a href="<?php the_permalink(); ?>">
									<?php
										the_post_thumbnail( 'kunty-portfolio',
											array(
												'alt' => the_title_attribute(
													array(
														'echo' => false,
													)
												),
											)
										);
									?>
								</a>
							<?php
							endif; 

							if( 1=== $lightbox_enable ) :
								$img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
								?>
								<a class="position-absolute top-50 start-50 translate-middle venobox" href="<?php echo esc_url($img_url); ?>"><i class="ti-eye"></i></a>
								<?php
							endif; ?>
							
						</div>

						<div class="portfolio-info <?php echo esc_attr($content_align); ?> mb-4">
							<?php if( 1=== $linkto_detai ) : ?>
								<h5 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<?php else : ?>
								<h5 class="mb-0"><?php the_title(); ?></h5>
							<?php endif; ?>
							
							<?php
							if ( ! has_excerpt() ) { ?>
							<p class="mb-0"><?php echo esc_html( wp_trim_words( get_the_content(), 12 ) ); ?></p> 
							<?php }  else { 
								the_excerpt();
							}
							?>
						</div>

					</div>
				</div>
					<?php
				endwhile; ?>
			</div>
			<?php
			endif; wp_reset_postdata();
		} else { ?>
			
				<div class="row grid-wrap">
				<?php
				foreach( $portfolios as $portfolio ):

					$image         = ( isset( $portfolio['image'] ) && $portfolio['image'] ) ? $portfolio['image'] : '';
					$image = wp_get_attachment_image_src($image, 'kunty-portfolio'); 
					if (!empty($image[0])) { 
						$img_src= $image[0];
					} else { 
						$img_src = '';
					}
					$portfolio_title        = ( isset( $portfolio['title'] ) && $portfolio['title'] ) ? $portfolio['title'] : '';
					$portfolio_desc  = ( isset( $portfolio['description'] ) && $portfolio['description'] ) ? $portfolio['description'] : '';
					$btn_url      = ( isset( $portfolio['link'] ) && $portfolio['link'] ) ? $portfolio['link'] : '';
					$btn_trgt   = ( isset( $portfolio['checkbox'] ) && $portfolio['checkbox']) ? '_blank' : '_self';
					?>
					<div class="col-lg-4 col-md-6 masonry-item">
						<div class="portfolio-item position-relative mb-4 <?php  echo esc_attr($portfolio_style); ?> <?php echo esc_attr($animation);?>">

							<div class="portfolio-figure position-relative">
							
								<?php
								if(!empty($btn_url)) { ?>
									<a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>">
										<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_html($portfolio_title); ?>" />
									</a>
									<?php
								} else { ?>
									<img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_html($portfolio_title); ?>" />
									<?php
								} ?>

								<?php
								if( 1=== $lightbox_enable ) :
								?>
								<a class="position-absolute top-50 start-50 translate-middle venobox" href="<?php echo esc_url($img_src); ?>"><i class="ti-eye"></i></a>
								<?php endif; ?>

							</div>

							<div class="portfolio-info <?php echo esc_attr($content_align); ?> mb-4">

								<?php if(!empty($portfolio_title) ) : ?>
									<?php if(!empty($btn_url)) { ?>
										<h5 class="mb-0"><a href="<?php echo esc_url($btn_url); ?>" target="<?php echo esc_attr( $btn_trgt ); ?>"><?php echo esc_html($portfolio_title); ?></a></h5>
									<?php } else { ?>
										<h5 class="mb-0"><?php echo esc_html($portfolio_title); ?></h5>
									<?php } ?>
								<?php endif; ?>
						
								<?php if(!empty($portfolio_desc) ) : ?>
									<p class="mb-0"><?php echo esc_html($portfolio_desc); ?></p>
								<?php endif; ?>

							</div>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
					<?php
			} ?>
			<?php
				$btn_text = get_theme_mod( 'portfolio_more_btn_text', __('More Projects', 'kunty')); 
				$btn_url = get_theme_mod( 'portfolio_more_btn_url'); 
				$btn_target = get_theme_mod( 'portfolio_more_btn_target'); 
				$btn_target = $btn_target?'target="_blank"' : '';
				if(!empty($btn_text)) : ?>	
					<div class="row">
						<div class="col-lg-12 "> 
								<div class="loadmore-area text-center mt-5 <?php echo esc_attr($animation);?>"> 
									<a href="<?php echo esc_url($btn_url); ?>" <?php echo esc_attr($btn_target); ?> class="btn btn-kunty btn-kunty-bordered"><?php echo esc_html($btn_text); ?></a>
								</div>
						</div>
					</div>
						<?php
				endif; ?>
		</div>
	</div>
	<!-- End Work Area -->
<?php endif;