<?php
/**
 * Front Page
 *
 * @package kunty
 */

$home_sections_sort = get_theme_mod( 'kunty_sections_sort', array('hero', 'services', 'brands', 'why', 'feedback', 'portfolios', 'team', 'pricing', 'cta', 'news'));

if ( 'posts' == get_option( 'show_on_front' ) ) { //Show Static Blog Page
	
    include( get_home_template() );
	
} elseif( ! empty( $home_sections_sort ) && is_array( $home_sections_sort )) {

	get_header();

	if( kunty_set_to_premium() ){
	  
		foreach ( $home_sections_sort as $sections_key => $sections_sort_val ) :

			if ( 'hero' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'hero' );  
			endif;

			if ( 'services' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'services' );  
			endif;

			if ( 'brands' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'brands' );  
			endif;

			if ( 'why' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'why' );
			endif;

			if ( 'feedback' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'feedback' );
			endif;

			if ( 'portfolios' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'portfolios' );
			endif;

			if ( 'team' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'team' );
			endif;

			if ( 'pricing' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'pricing' );
			endif;

			if ( 'cta' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'cta' );
			endif;

			if ( 'news' === $sections_sort_val ) : 
				get_template_part( 'sections/section', 'latest-news' );
			endif;

		endforeach;

	} else {
		get_template_part( 'sections/section', 'hero' );  
		get_template_part( 'sections/section', 'services' );
		get_template_part( 'sections/section', 'why' );
		get_template_part( 'sections/section', 'team' );
		get_template_part( 'sections/section', 'feedback' );
		get_template_part( 'sections/section', 'cta' );
		get_template_part( 'sections/section', 'latest-news' );  
	}

    get_footer();

} else {

    include( get_page_template() );
	
}
