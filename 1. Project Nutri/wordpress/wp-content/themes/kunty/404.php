<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package kunty
 */

get_header();
?>
	<!-- Start Page Header -->
	<?php kunty_page_header(); ?>
	<!-- Start Page Header -->
	<!-- Stat Page ID -->
	<div id="page" class="site">
		<!-- Start Site Content -->
		<div class="site-content">	
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-xs-12 col-sm-12 col-lg-10"> 
						<div id="primary" class="content-area">
							<main id="main" class="site-main">
								<div class="content-404">

									<h4><?php esc_html_e( 'Page Not Found', 'kunty' ); ?></h4>
									
									<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'kunty' ); ?></p>

									<?php get_search_form(); ?>

								</div><!-- .page-content -->
							</main>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Site Content -->
	</div>
	<!-- End Page ID -->
<?php
get_footer();
