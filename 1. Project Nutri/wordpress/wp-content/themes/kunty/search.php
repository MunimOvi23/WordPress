<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package kunty
 */

get_header();

	$blog_layout = get_theme_mod( 'blog_layout', 'right-sidebar' );
	if( $blog_layout == 'left-sidebar' || $blog_layout == 'right-sidebar' ) :
		$content_class = 'col-sm-12 col-md-12 col-lg-9';
		$aside_class = 'col-sm-12 col-md-12 col-lg-3';
	else :
		$content_class = 'col-sm-12 col-md-12 col-lg-12';
	endif;
	
	kunty_page_header();
?>

	<!-- Stat Page ID -->
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
						<?php if ( have_posts() ) : ?>

							<?php $blog_style = get_theme_mod( 'blog_post_layout', 'masonry' ); ?>
							<div class="row <?php if( $blog_style == 'equal-height') : ?>flex-row <?php else : ?>grid-wrap<?php endif; ?>">
								<?php 
								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/**
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'search' );

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

						<?php else : 
							get_template_part( 'template-parts/content', 'none' ); ?>
						<?php endif; ?>
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
	<!-- End Page ID -->
<?php
get_footer();
