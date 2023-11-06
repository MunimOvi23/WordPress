<?php 

/**
 * Add customizer selective refresh
 */
function kunty_customizer_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

	// Site Title
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' =>  function(){
				return bloginfo( 'name' );
		    },
	) );

	// Tagline
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' =>  function(){
				return bloginfo( 'description' );
		    },
	) );

	// Blog Page Title
	$wp_customize->selective_refresh->add_partial( 'blog_page_title', array(
		'selector' => '.page-header .page-title',
		'settings' => array( 'blog_page_title' ),
		'render_callback' =>  function(){
				return get_theme_mod( 'blog_page_title');
		    },
	) );

	
	/*============================================
	Front Page Settings
	=============================================*/
	
	// Related Post Title




    /**
     * Selective Refresh style
     */
    $css_settings = array(

		//Color Settings
		'site_primary_color',
		'site_secondary_color',
		'body_text_color',
		'site_heading_color',

		//'navigation_bg',
		//'menu_link_color',
		'menu_hover_link_color',
		'submenu_bg_color',
		'submenu_text_color',
		'submenu_hover_text_color',

		'site_btn_bg_color',
		'site_btn_bg_hcolor',
		'site_btn_text_color',
		'site_btn_hover_text_color',

		'site_anchor_color',
		'site_anchor_hcolor',

		// Typography
		'nav_font_size',
		'subnav_font_size',
		'body_font_size',
		'body_line_height',

		'headings_line_height',
		'h1_font_size',
		'h2_font_size',
		'h3_font_size',
		'h4_font_size',
		'h5_font_size',
		'h6_font_size',

		// Hero Section
		'hero_style_heading',
		'hero_content_width',
		
		// About Section
		'about_section_bg',
		
		
		// CTA Section
		'cta_section_overlay',
		'cta_section_pb',
		'cta_section_pt',

		// Footer
		'footer_widgets_title_color',
		'footer_widgets_text_color',
		'footer_widgets_link_color',
		'footer_widgets_link_hcolor',
		'footer_widgets_bg_color',
		'footer_widgets_bg_color_2',

		'footer_copyright_text_color',

    );
	
	$css_settings = apply_filters( 'kunty_selective_refresh_css_settings', $css_settings );

    foreach( $css_settings as $index => $key ) {
        if ( $wp_customize->get_setting( $key ) ) {
            $wp_customize->get_setting( $key )->transport = 'postMessage';
        } else {
            unset( $css_settings[ $index ] );
        }
    }
	
    $wp_customize->selective_refresh->add_partial( 'kunty-style-live-css', array(
        'selector' => '#kunty-style-inline-css',
        'settings' => $css_settings,
        'container_inclusive' => false,
        'render_callback' => 'kunty_custom_inline_style',
    ) );
	
}
add_action( 'customize_register', 'kunty_customizer_partials', 199 );