<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kunty
 */

$animation = get_theme_mod( 'kunty_animation_disable', 0); 
$cat_display = get_theme_mod('single_post_cat_display', 1); 
$dropcaps = get_theme_mod('single_post_dropcaps_display', 1); 
$thumb_display = get_theme_mod('single_post_thumb_display', 1);
$meta_display = get_theme_mod('single_post_meta_display', 1);
$date_display = get_theme_mod('post_date_display', 1);
$author_display = get_theme_mod('post_author_display', 1);
$comment_number_display = get_theme_mod('post_comment_number_display', 1);

$classes = [];
if ( 1=== $animation ) {
	$classes[] = 'animate-box';
}
if ( 1=== $dropcaps ) {
	$classes[] = 'has-dropcaps';
}
?>
<div id="post-<?php the_ID(); ?>" <?php post_class('post-detail'); ?>> 

	<div class="<?php echo esc_attr( join( ' ', $classes ) ); ?>">
	
		<?php 
		if(  has_post_thumbnail() && 1 === $thumb_display ) : ?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail('full'); ?>
			</div><!-- .post-thumbnail -->
		<?php endif; ?>

		<?php 
		if( 1 === $cat_display ): ?>
			<div class="entry-cats"> 
				<?php kunty_posted_in();?>
			</div>
		<?php endif; ?>

		<div class="row mt-5">
			<div class="col-md-10"> 
				<div class="entry-content">
					<?php
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__( 'Read More<span class="screen-reader-text"> "%s"</span>', 'kunty' ),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post( get_the_title() )
							)
						);
						
						wp_link_pages( array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'kunty' ),
							'after'  => '</div>',
						) );
					?>
				</div>
				
					<?php
				if(1 === $meta_display ) : ?>
					<div class="entry-meta">

						<?php if(1=== $author_display) { kunty_posted_by();}  ?>
						<?php if(1=== $date_display) { kunty_posted_on();}  ?>
						<?php if(1=== $comment_number_display) { kunty_post_comments();}  ?>

					</div>
					<?php
				endif; ?>
				
			</div>
		</div>
		
	</div>
</div>