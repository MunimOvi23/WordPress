<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kunty
 */

$animation = get_theme_mod( 'kunty_animation_disable') ? 'animate-box':''; 

?>
<div class="col-sm-12 col-md-12 col-lg-12 <?php echo esc_attr($animation);?>">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>> 
		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kunty' ),
					'after'  => '</div>',
				)
			);
			?>
		</div>
	</div>
</div>