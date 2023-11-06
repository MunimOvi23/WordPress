<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kunty
 */

get_header();

$page_layout = get_theme_mod( 'page_layout', 'no-sidebar');
if( $page_layout == 'left-sidebar' || $page_layout == 'right-sidebar' ) :
	$content_class = 'col-sm-12 col-md-12 col-lg-7';
	$aside_class = 'col-sm-12 col-md-12 col-lg-3';
else :
	$content_class = 'col-sm-12 col-md-12 col-lg-10';
endif;

	kunty_page_header();
?>

	<!-- Start Latest News Area -->
	<div id="page" class="site">
		<div class="container">
			<div class="row justify-content-center">
				<!--Start Sidebar -->
				<?php if($page_layout == 'left-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>
				<!--End Sidebar -->

				<div class="col-xs-12 <?php echo esc_attr( $content_class ); ?>"> 
					<div id="primary" class="content-area">
						<main id="main" class="site-main">
							<div class="row">
							<?php
								while ( have_posts() ) :
									the_post();

									get_template_part( 'template-parts/content', 'page' );
									
									if ( 1 === get_theme_mod( 'page_comments_display', 1 ) ) {
										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;
									}
									
								endwhile; // End of the loop.
							?>
							</div>
						</main>
					</div>
				</div>

				<?php if($page_layout == 'right-sidebar') : ?>
				<div class="col-xs-12 <?php echo esc_attr( $aside_class ); ?>">
					<?php get_sidebar(); ?>
				</div>	
				<?php endif; ?>

			</div>

		</div>
	</div>
	<!-- End Latest News Area -->
<?php
get_footer();