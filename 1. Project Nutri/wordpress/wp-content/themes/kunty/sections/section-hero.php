<?php
/**
 * Template part for displaying Slider Section on home page template
 *
 * @package Bizes
 */

$section_enable = get_theme_mod('hero_section_enable', 0); 
$content_type = get_theme_mod('hero_content_type', 'hero_content_page');
$hero_subtitle = get_theme_mod( 'hero_subtitle');
$btn_text = get_theme_mod( 'hero_btn_text' ); 
$btn_url = get_theme_mod( 'hero_btn_url'); 
$btn_target = get_theme_mod( 'hero_btn_target' ); 
$btn_target = $btn_target?'target="_blank"' : '';
$video_url    = get_theme_mod('hero_video_url');

if(1===$section_enable) : 
?>
<div class="hero-area" id="hero-section">
	<?php
if( $content_type == 'hero_content_page' || $content_type == 'hero_content_post' ) {
		
	if( $content_type == 'hero_content_page' ) :
		$hold_posts[] = get_theme_mod( 'hero_pages' );
		$args = array (
			'post_type'     => 'page',
			'posts_per_page'=> 1,
			'post__in'      => $hold_posts,
			'orderby'       =>'post__in',
		);

	elseif( $content_type == 'hero_content_post' ) :
		$hold_posts[] = get_theme_mod( 'hero_posts' );
		$args = array (
			'post_type'     => 'post',
			'posts_per_page'=> 1,
			'post__in'      => $hold_posts,
			'orderby'       =>'post__in',
			'ignore_sticky_posts' => true,
		); 
	endif;

	$post_loop = new WP_Query($args);                        
	if ( $post_loop->have_posts() ) :

	?>
	<div class="welcome-slides">
		<?php
		while ($post_loop->have_posts()) : $post_loop->the_post();
		
			$hero_image = get_the_post_thumbnail_url(get_the_ID(),'full');

		?>
		<div class="single-slide">
			<div class="container">
				<div class="row d-flex align-items-center">
					<div class="col-lg-7 col-xl-6 col-xxl-5"> 
						<div class="hero-content text-center text-lg-start mb-5">
						
								<?php
							if(!empty($hero_subtitle)) : ?>
							<h6 class="sub-title"><?php echo esc_html($hero_subtitle); ?></h6>
								<?php
							endif; ?>
						
							<h2 class="mb-3 mb-md-4"><?php the_title(); ?></h2>
							<?php
							if ( ! has_excerpt() ) { ?>
							<p><?php echo esc_html( wp_trim_words( get_the_content(), 13 ) ); ?></p> 
							<?php }  else { 
								the_excerpt();
							}

							if(!empty($btn_url)) : ?>	
								<a href="<?php echo esc_url($btn_url); ?>" <?php echo esc_attr($btn_target); ?> class="btn btn-kunty btn-kunty-bordered mt-3 mt-sm-0"><?php echo esc_html($btn_text); ?></a>
								<?php
							endif; 
							
							if(!empty($video_url)): ?>
							<a href="<?php echo esc_url($video_url); ?>" class="mt-3 ms-3 mt-sm-0 play-btn venobox" data-vbtype="video"><i class="ti-control-play"></i></a>
							<?php endif; ?>
							
						</div>
					</div>
					
					<div class="col-lg-5 col-xl-6 col-xxl-7"> 
						<div class="hero-img mb-5"> 
							<img class="mx-auto d-block" src="<?php echo esc_url( $hero_image ); ?>" alt="" />
						</div>
					</div>
				
				</div>
			</div>
		</div>
		<?php
		endwhile; ?>
	</div>
	<?php
	endif; 
	wp_reset_postdata(); 

} else {
	
	if( class_exists('Themereps_Helper') && th_fs()->can_use_premium_code() ){ ?>
		<div class="welcome-slides">
			<?php

				$hero_title = get_theme_mod( 'hero_title',  __('Advanced Analytics to Grow Your Business.','kunty'));
				$hero_desc = get_theme_mod( 'hero_description',  __('We handle home, auto, life, and business insurance for you so you have the time to focus on more important things.','kunty')); 
				$hero_image = get_theme_mod( 'hero_image', get_template_directory_uri() . '/assets/img/hero.gif' );
				
			?>
			<div class="single-slide">
				<div class="container">
					<div class="row d-flex align-items-center">
						<div class="col-lg-7 col-xl-6">
							<div class="hero-content text-center text-lg-start mb-5">
							
									<?php
								if(!empty($hero_subtitle)) : ?>
								<h6 class="sub-title"><?php echo esc_html($hero_subtitle); ?></h6>
									<?php
								endif; ?>
								
									<?php
								if($hero_title) : ?>
								<h2 class="mb-4"><?php echo wp_kses_post($hero_title); ?></h2>
									<?php
								endif; ?>
								
									<?php
								if($hero_desc) : ?>
								<p><?php echo esc_html($hero_desc); ?></p>
									<?php
								endif;

								if(!empty($btn_url)) : ?>	
									<a href="<?php echo esc_url($btn_url); ?>" <?php echo esc_attr($btn_target); ?> class="btn btn-kunty btn-kunty-bordered mt-3 mt-sm-0"><?php echo esc_html($btn_text); ?></a>
									<?php
								endif; 
								
								if(!empty($video_url)): ?>
								<a href="<?php echo esc_url($video_url); ?>" class="mt-3 ms-3 mt-sm-0 play-btn venobox" data-vbtype="video"><i class="ti-control-play"></i></a>
								<?php endif; ?>
								
							</div>
						</div>
						
						<div class="col-lg-5 col-xl-6"> 
							<div class="hero-img mb-5"> 
								<img src="<?php echo esc_url( $hero_image ); ?>" alt="" />
							</div>
						</div>
						
					</div>
				</div>
			</div>

		</div>

	<?php }
 } ?>
</div>
<?php endif; ?>
		
	
	
	
	
	
	
	
	
