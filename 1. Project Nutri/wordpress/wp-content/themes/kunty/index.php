<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kunty
 */

get_header();

$blog_layout = get_theme_mod( 'blog_layout', 'no-sidebar' );
if( $blog_layout == 'left-sidebar' || $blog_layout == 'right-sidebar' ) :
	$content_class = 'col-sm-12 col-md-12 col-lg-9';
	$aside_class = 'col-sm-12 col-md-12 col-lg-3';
else :
	$content_class = 'col-sm-12 col-md-12 col-lg-12';
endif;


	kunty_page_header(); ?>

	<div id="page" class="site">
		<div class="container">
			<div class="row">
				<!--Start Sidebar -->
				<?php if($blog_layout == 'left-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->

				<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
					<div id="primary" class="content-area">
						<main id="main" class="site-main">

							<?php $blog_style = get_theme_mod( 'blog_post_grid', 'masonry' ); ?>
							<div class="row <?php if( $blog_style == 'equal-height') : ?>flex-row <?php else : ?>grid-wrap<?php endif; ?>">
								<?php 
									/* Start the Loop */
									while ( have_posts() ) :
										the_post();

										/*
										 * Include the Post-Type-specific template for the content.
										 * If you want to override this in a child theme, then include a file
										 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
										 */
										get_template_part( 'template-parts/content', get_post_type() );

									endwhile;
								?>
							</div>

							<div class="row"> 
								<div class="col-xs-12 col-sm-12 col-md-12">
									<?php 
										do_action( 'kunty_posts_pagination' );
									 ?>
								</div>	
							</div>

						</main>
					</div>
				</div>

				<?php if($blog_layout == 'right-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>

			</div>
		</div>
	</div>
<?php
get_footer();