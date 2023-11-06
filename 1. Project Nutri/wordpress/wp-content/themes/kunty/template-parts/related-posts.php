<?php 
/**
 * Template part for displaying related posts
 *
 * @package kunty
 */
 if( class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){
	$related_posts = kunty_related_posts(); 
	$animation = get_theme_mod( 'animation_disable' ) ? 'animate-box':'';
	$thumb_display = get_theme_mod('post_thumbnail_display', 1);
	$date_display = get_theme_mod('post_date_display', 0);
	$cat_display = get_theme_mod('post_cat_display', 1);
	$author_display = get_theme_mod('post_author_display', 0);
	$comment_number_display = get_theme_mod('post_comment_number_display', 0);

	if ( $related_posts->have_posts() ): ?>
	<div class="related-posts mb-5 clearfix">
		<?php 
		$related_title = get_theme_mod( 'related_posts_label', __( 'You May Also Like...', 'kunty' ) ); 
		if($related_title) : ?>
		<div class="related-heading <?php echo esc_attr($animation);?>">
			<h4><?php echo esc_html( $related_title ); ?></h4>
		</div>
		<?php endif; ?>

		<div class="row">
			<?php 

			while ( $related_posts->have_posts() ) : $related_posts->the_post();

				$blog_single_layout = get_theme_mod( 'blog_single_layout', 'right-sidebar' );
				if( $blog_single_layout == 'left-sidebar' || $blog_single_layout == 'right-sidebar' ) :
					$content_class = 'col-md-6 col-lg-6';
				else :
					$content_class = 'col-md-6 col-lg-4';
				endif;
				?>

			<div class="col-sm-12 <?php echo esc_attr( $content_class ); ?> <?php echo esc_attr($animation);?>">
				<div class="post-item <?php if( has_post_thumbnail() && 1 === $thumb_display ): ?>has-post-thumbnail<?php endif; echo esc_attr($animation);?>">
						<?php 
					if( has_post_thumbnail() && 1 === $thumb_display ): ?>
					<div class="post-thumbnail mb-0"> 
						<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
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
						<?php 
					endif; ?>

						<?php 
					if( 1 === $cat_display ): ?>
						<div class="entry-cats"> 
							<?php kunty_posted_in();?>
						</div>
						<?php
					endif; ?>

					<div class="entry-header">
						<?php 
							the_title( '<h4 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
						?>
					</div>

						<?php
					if( 1 === get_theme_mod('post_excerpt_display', 0) ) { ?>
					<div class="entry-content">
						<?php
							the_excerpt();
							wp_link_pages( array(
								'before' => '<div class="page-links">' . __( 'Pages:', 'kunty' ),
								'after'  => '</div>',
							) );
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
			</div>
			<?php
			endwhile;
			wp_reset_postdata();
			?>
		</div>
	</div>
		<?php 
	endif; 
 } ?>