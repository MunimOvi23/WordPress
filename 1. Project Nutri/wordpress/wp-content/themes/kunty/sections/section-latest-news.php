<?php 
/**
 * Template part for displaying latest news section on front page template
 *
 * @package kunty
 */
	$animation = get_theme_mod( 'kunty_animation_disable') ? 'animate-box':'';
	$section_enable = get_theme_mod('news_section_enable', 0);
	$subheading = get_theme_mod('news_section_subtitle', __('From Blog', 'kunty'));
	$heading = get_theme_mod('news_section_title', __('Read Some of Our Latest Insights', 'kunty') );
	$description = get_theme_mod('news_section_description');

	if(1 === $section_enable) : 
?>

	<!-- Start Latest News Area -->
	<div class="section news-section" id="news-section">

		<div class="container">
			<?php if(!empty($heading) || !empty($subheading) || !empty($description)) : ?>
			<div class="row justify-content-center">
				<div class="col-lg-6">
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
				$recent_post_type  = esc_attr(get_theme_mod('latest_post_content_type', 'latest-post'));
				$recent_post_cat   = esc_attr(get_theme_mod('latest_post_category_choice'));
				$recent_post_count = get_theme_mod('latest_posts_total_count', 3);
				$sticky = get_option( 'sticky_posts' );
				
				if( $recent_post_type=='latest-post' ){
					$args = array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => $recent_post_count, 'ignore_sticky_posts' => 1,'post__not_in' => $sticky); 
				} else {
					$args =  array( 'post_type' => 'post', 'order'=> 'DESC', 'posts_per_page' => $recent_post_count, 'category_name' => $recent_post_cat, 'ignore_sticky_posts' => 1,'post__not_in' => $sticky);
				}
				
				$recent_post_query = new WP_Query($args); 

				if ( $recent_post_query->have_posts() ) : 
			?>
			<div class="row">
				<?php
				$carousel_enable = get_theme_mod('news_carousel_enable', 0);
				if( 1 === $carousel_enable) echo '<div class="news-carousel owl-controls owl-carousel">';

				while ( $recent_post_query->have_posts() ) : $recent_post_query->the_post();?>
					<div class="col-lg-4">
						
						<?php 
							$thumb_display = get_theme_mod('latest_post_thumb_display', 1 );
							$content_display = get_theme_mod('latest_post_content_display', 0);
							$cat_display = get_theme_mod('latest_post_cat_display', 1 );
							$date_display = get_theme_mod('latest_post_date_display', 0);
							$author_display = get_theme_mod('latest_post_author_display', 0 );
							$comment_number_display = get_theme_mod('latest_post_comment_number_display', 0 );
						?>
						<!-- Start single news -->
						<div class="post-item <?php if( has_post_thumbnail() && 1 === $thumb_display ): ?>has-post-thumbnail <?php endif; echo esc_attr($animation);?>">
							<?php 
							if( has_post_thumbnail() && 1 === $thumb_display ): ?>
							<div class="post-thumbnail mb-0"> 
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<?php
										the_post_thumbnail(
											'kunty-post-thumbnails',
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
							</div>
							<?php endif; ?>

							<?php 
							if( 1 === $cat_display ): ?>
								<div class="entry-cats"> 
									<?php kunty_posted_in();?>
								</div>
							<?php endif; ?>
							
							<div class="entry-header">
								<?php 
									the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
								?>
							</div>

							<?php
							if( 1 === $content_display  ) { ?>
								<div class="entry-content">
								
									<?php
									if ( ! has_excerpt() ) { ?>
										<p><?php echo esc_html( wp_trim_words( get_the_content(), 13 ) ); ?></p> 
									<?php }  else { 
										the_excerpt();
									}
									?>
								</div>
								<?php
							} ?>

							<?php
							if( 1 === get_theme_mod('post_readmore_display', 1) ) { 
								?>
								<div class="entry-more"> 
									<?php do_action('kunty_read_more'); ?>
								</div>
								<?php
							} ?>
		
								<?php
							if(1 === $author_display || 1 === $date_display || 1=== $comment_number_display) : ?>
								<div class="entry-meta">
									<?php if(1=== $author_display) { kunty_posted_by();}  ?>
									<?php if(1=== $date_display) { kunty_posted_on();}  ?>
									<?php if(1=== $comment_number_display) { kunty_post_comments();}  ?>
								</div>
								<?php
							endif; ?>
		
	
						</div>
						<!-- End single news -->
					</div>
					<?php
				endwhile;
				wp_reset_query(); 
				if( 1 === $carousel_enable) echo '</div>';
				?>
			</div>
		<?php 
		endif;
		wp_reset_postdata(); ?>
		</div>

	</div>
	<!-- End Latest News Area -->
<?php endif; ?>