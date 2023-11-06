<?php
	/**
	 * Template part for displaying CTA Section on front page template
	 *
	 * @package kunty
	*/

	$animation = get_theme_mod( 'kunty_animation_disable', 1) ? 'animate-box':''; 
	$section_enable = get_theme_mod('cta_section_enable', 0); 

	$heading = get_theme_mod('cta_title', __('We are trusted by over 5000+ clients. Join them by using our services and grow your business.', 'kunty')); 
	$sub_heading = get_theme_mod('cta_subtitle', __('Join Our Community', 'kunty')); 
	$description = get_theme_mod('cta_description');
	$text_align = get_theme_mod('cta_content_align', 'text-center');

	$btn_type = get_theme_mod('cta_btn_type', 'btn-text');
	$btn_text = get_theme_mod('cta_btn_text', __('Join Us', 'kunty'));
	$btn_url = get_theme_mod('cta_btn_url');
	$btn_target = get_theme_mod('cta_btn_target')?'target="_blank"':'';


 if(1===$section_enable) : ?>

	<div class="section cta-section" id="cta-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-10">
				
					<div class="cta-inner <?php echo esc_attr($text_align); ?> <?php echo esc_attr($animation); ?>">
					
						<?php if(!empty($sub_heading)) : ?>
						<h5><?php echo esc_html($sub_heading); ?></h5>
						<?php endif; ?>

						<?php if(!empty($heading)) : ?>
						<h2><?php echo wp_kses_post($heading); ?></h2>
						<?php endif; ?>

						<?php if(!empty($description)) : ?>
						<p><?php echo esc_html($description); ?></p>
						<?php endif; ?>
						
						<?php if( !empty($btn_text)) : ?>
						<a href="<?php echo esc_url($btn_url); ?>" <?php echo esc_attr($btn_target); ?> class="btn btn-kunty"><?php echo esc_html($btn_text); ?></a>
						<?php endif; ?>
						
					</div>
					
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>