<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kunty
 */

$animation = get_theme_mod( 'kunty_animation_disable') ? 'animate-box':''; 
$post_cols = get_theme_mod( 'blog_columns', 'three-columns' );
$thumb_display = get_theme_mod('post_thumbnail_display', 1);
$cat_display = get_theme_mod('post_cat_display', 1);
$date_display = get_theme_mod('post_date_display', 1);
$author_display = get_theme_mod('post_author_display', 1);
$comment_number_display = get_theme_mod('post_comment_number_display', 0);

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
		if( 1 === get_theme_mod('post_readmore_display', 0) ) { 
			?>
			<div class="entry-more"> 
				<?php do_action('kunty_read_more'); ?>
			</div>
			<?php
		} ?>

		<?php if(1 === $author_display || 1 === $date_display || 1=== $comment_number_display) : ?>
			<div class="entry-meta">

				<?php if(1=== $author_display) { kunty_posted_by();}  ?>
				<?php if(1=== $date_display) { kunty_posted_on();}  ?>
				<?php if(1=== $comment_number_display) { kunty_post_comments();}  ?>

			</div>
		<?php endif; ?>
	</div>
	<!-- End single news -->
</div>
