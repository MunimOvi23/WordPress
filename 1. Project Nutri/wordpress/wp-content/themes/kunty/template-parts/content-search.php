<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kunty
 */

$animation = get_theme_mod( 'kunty_animation_disable') ? 'animate-box':''; 
$post_cols = get_theme_mod( 'blog_columns', 'two-columns' );

if( $post_cols == 'two-columns' ) :
	$col_class = 'col-sm-12 col-md-6 col-lg-6';
elseif( $post_cols == 'three-columns' ) :
	$col_class = 'col-sm-6 col-md-6 col-lg-4';
else :
	$col_class = 'col-sm-12 col-md-12';
endif;

?>
<div id="post-<?php the_ID(); ?>" class="masonry-item <?php echo esc_attr( $col_class ); ?>"> 

	<!-- Start single news -->
	<div class="single-news <?php echo esc_attr($animation);?>">
		<?php 
		if( has_post_thumbnail() && 1 === get_theme_mod('post_thumbnail_display', 1) ): ?>
		<div class="post-thumbnail"> 
			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
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
		if( true === get_theme_mod('post_date_display', true) ) {
			kunty_posted_in();
		}
		?>
		<div class="entry-content-wrap"> 
			<div class="entry-header">
				<?php 
					the_title( '<h5 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' );
				?>
			</div>
			<?php
			if( get_theme_mod('post_excerpt_display', 1) ) { ?>
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
		</div>

		<div class="entry-meta">
			<div class="entry-meta-inner">
				<?php kunty_posted_by(); ?>
				<?php kunty_post_comments(); ?>
			</div>
		</div>
	</div>
	<!-- End single news -->
</div>