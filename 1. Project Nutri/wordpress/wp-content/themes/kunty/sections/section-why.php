<?php 
/**
 * Template part for displaying About Section on front page template
 *
 * @package kunty
 */
	$animation = get_theme_mod( 'kunty_animation_disable', 1) ? 'animate-box':'';

	$section_enable = get_theme_mod('about_section_enable', 0);

	$subheading = get_theme_mod('about_section_subtitle', __('Why Choose Us?', 'kunty'));
	$heading = get_theme_mod('about_section_title', __('We have a experience of marketing.', 'kunty') );
	$description = get_theme_mod('about_section_description', __('We are a team of marketing, experienced developers who are passionate about their work. Years of cooperation with both corporations and startups, helped us to build.', 'kunty'));


	$image = get_theme_mod('about_section_image', get_template_directory_uri().'/assets/img/intro/intro.png');


	$counter_1_num = get_theme_mod('about_counter_1_num', __('5', 'kunty'));
	$counter_1_suff = get_theme_mod('about_counter_1_suff', __('K+', 'kunty'));
	$counter_1_title = get_theme_mod('about_counter_1_title', __('Projects done', 'kunty'));

	$counter_2_num = get_theme_mod('about_counter_2_num', __('99', 'kunty'));
	$counter_2_suff = get_theme_mod('about_counter_2_suff', __('%', 'kunty'));
	$counter_2_title = get_theme_mod('about_counter_2_title', __('Satisfied customer', 'kunty'));


if(1===$section_enable) : 
?>

	<!-- Start About Area -->
	<div class="section intro-section" id="intro-section"> 
		<div class="container">
			<div class="row d-flex align-items-center">
			
				<div class="col-lg-5">
					<div class="intro-img mb-5 <?php echo esc_attr($animation); ?>"> 
						<img src="<?php echo esc_url($image); ?>" alt="Intro Image">
					</div>
				</div>

				<div class="col-lg-6 offset-lg-1">
				
					<div class="intro-heading text-center text-lg-start">
						<?php if(!empty($subheading)) : ?>
						<h6 class="<?php echo esc_attr($animation); ?>"><?php echo esc_html($subheading); ?></h6>
						<?php endif; ?>
						
						<?php if(!empty($heading)) : ?>
						<h2 class="text-light <?php echo esc_attr($animation); ?>"><?php echo wp_kses_post($heading); ?></h2>
						<?php endif; ?>
						
						<?php if(!empty($description)) : ?>
						<p class="<?php echo esc_attr($animation); ?>"><?php echo esc_html($description); ?></p>
						<?php endif; ?>
					</div>
					
					<div class="row">
						<div class="col-md-6 col-lg-6 text-center text-lg-start"> 
							<div class="intro-fact fact-1 mb-3 <?php echo esc_attr($animation); ?>"> 
								<?php if(!empty($counter_1_num)) : ?>
									<div class="numb">
										<span class="counter"><?php echo esc_html($counter_1_num); ?></span><?php echo esc_html($counter_1_suff); ?>
									</div>
								<?php endif; ?>
								
								<?php if(!empty($counter_1_title)) : ?>
									<p><?php echo esc_html($counter_1_title); ?></p>
								<?php endif; ?>
							</div>
						</div>
						
						<div class="col-md-6 col-lg-6 text-center text-lg-start"> 
							<div class="intro-fact mb-3 <?php echo esc_attr($animation); ?>"> 

								<?php if(!empty($counter_2_num)) : ?>
									<div class="numb">
										<span class="counter"><?php echo esc_html($counter_2_num); ?></span><?php echo esc_html($counter_2_suff); ?>
									</div>
								<?php endif; ?>
								
								<?php if(!empty($counter_2_title)) : ?>
									<p><?php echo esc_html($counter_2_title); ?></p>
								<?php endif; ?>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End About Area -->
<?php endif; ?>