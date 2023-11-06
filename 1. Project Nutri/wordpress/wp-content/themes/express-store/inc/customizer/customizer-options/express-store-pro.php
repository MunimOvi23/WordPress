<?php
function express_store_upsale_setting( $wp_customize ) {
	
	$wp_customize->add_section(
        'retailsy_upsale',
        array(
            'title' 		=> __('More Features in Express Store Pro','express-store'),
			'priority'      => 1,
		)
    );
	
	/*=========================================
	 Buttons
	=========================================*/
	
	class Express_Store_Button_Customize_Control extends WP_Customize_Control {
	public $type = 'retailsy_upsale';

	   function render_content() {
		?>
			<div class="upsale_info">
				<ul>
					<li><a href="https://preview.sellerthemes.com/pro/express-store/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-desktop"></i><?php _e( 'Pro Demo','express-store' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.com/express-store-premium/" class="btn-primary" target="_blank"><i class="dashicons dashicons-cart"></i><?php _e( 'Purchase Now','express-store' ); ?> </a></li>
					
					<li><a href="https://sellerthemes.ticksy.com/" class="btn-secondary" target="_blank"><i class="dashicons dashicons-sos"></i><?php _e( 'Ask for Support','express-store' ); ?> </a></li>
					
					<li><a href="https://wordpress.org/support/theme/express-store/reviews/#new-post" class="btn-green" target="_blank"><i class="dashicons dashicons-heart"></i><?php _e( 'Give us Rating','express-store' ); ?> </a></li>
				</ul>
			</div>
		<?php
	   }
	}
	
	$wp_customize->add_setting(
		'retailsy_upsale_btns',
		array(
		   'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'retailsy_sanitize_text',
		)	
	);
	
	$wp_customize->add_control( new Express_Store_Button_Customize_Control( $wp_customize, 'retailsy_upsale_btns', array(
		'section' => 'retailsy_upsale',
    ))
);
}
add_action( 'customize_register', 'express_store_upsale_setting',9999 );