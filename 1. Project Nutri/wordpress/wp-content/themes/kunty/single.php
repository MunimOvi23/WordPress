<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kunty
 */

get_header();

	$post_detail_layout = get_theme_mod( 'blog_single_layout', 'left-sidebar' );
	if( $post_detail_layout == 'left-sidebar' || $post_detail_layout == 'right-sidebar' ) :
		$content_class = 'col-sm-12 col-md-6 col-lg-7';
		$aside_class = 'col-sm-12 col-md-6 col-lg-3';
	else :
		$content_class = 'col-sm-12 col-md-12 col-lg-10';
	endif;
	
	kunty_page_header();
?>

	
	<div id="page" class="site">
		<div class="container">
			<div class="row justify-content-center">
				<!--Start Sidebar -->
				<?php if($post_detail_layout == 'left-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php kunty_post_share_links(); ?>
					<?php kunty_get_the_tags(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->

				<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
					<div id="primary" class="content-area">
						<main id="main" class="site-main">

							<?php 
							/* Start the Loop */
							while ( have_posts() ) : the_post();
								/*
								 * Include the Post-Type-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
								*/
								get_template_part( 'template-parts/content', 'single' );

								?>
								<div class="col-sm-12 col-md-12 col-lg-12"> 
								<?php
								the_post_navigation( array(
									'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'kunty' ) . '</span> ' .
										'<span class="post-title">%title</span>',
									'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'kunty' ) . '</span> ' .
										'<span class="post-title">%title</span>',
								) );
								?>
								</div>
								<?php 
								
								// Display Related posts
								if ( 1 === get_theme_mod( 'related_post_display', 0) ) {
									get_template_part( 'template-parts/related-posts' );
								}

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif; 

							endwhile;
							?>

						</main>
					</div>
				</div>

				<?php if($post_detail_layout == 'right-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php kunty_post_share_links(); ?>
					<?php kunty_get_the_tags(); ?>
				</div>	
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php
	get_footer();