<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package kunty
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function kunty_body_classes( $classes ) {
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	
	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}
	
	if(1===get_theme_mod('header_transparent', 0) ){
		$classes[] = 'has-transparent-header';
	} else{
		$classes[] = 'no-transparent-header';
	}

	// Add a class if contact page.
	if ( is_page_template( 'page-templates/template-contact.php' ) ) {
		$classes[] = 'template-contact';
	}
	
	return $classes;
}
add_filter( 'body_class', 'kunty_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function kunty_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'kunty_pingback_header' );


if ( ! function_exists( 'kunty_excerpt_length' ) ) :
	/**
	* Excerpt length
	* Since 1.0.0
	*/
	function kunty_excerpt_length( $length ){
		if ( is_admin() ) {
			return $length;
		}
		$length = get_theme_mod( 'post_excerpt_count', 20 );
		return absint( $length );
	}
endif;
add_filter( 'excerpt_length', 'kunty_excerpt_length', 999);


if ( ! function_exists( 'kunty_auto_excerpt_more' ) ) :

	function kunty_auto_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}
		$excerpt_dots = get_theme_mod('post_excerpt_dots');
		return '<span class="exprt-dot">' . wp_kses_post( $excerpt_dots ). '</span>';
	}

endif; 
add_filter( 'excerpt_more', 'kunty_auto_excerpt_more' );


if ( ! function_exists( 'kunty_get_posts_pagination' ) ) :
	/**
	 * Pagination
	 * Since 1.0.0
	*/
    function kunty_get_posts_pagination( $query = null ) {

        $classes = [];

        if ( empty( $query ) ) {
            $query = $GLOBALS['wp_query'];
        }

        if ( empty( $query->max_num_pages ) 
                || ! is_numeric( $query->max_num_pages )
                || $query->max_num_pages < 2 ) {
            return;
        }

        $paged = get_query_var( 'paged' );

        if ( ! $paged && is_front_page() && ! is_home() ) {
            $paged = get_query_var( 'page' );
        }

        $paged = $paged ? intval( $paged ) : 1;

        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $html_prev = '<i class="ti-angle-left"></i>';
        $html_next = '<i class="ti-angle-right"></i>';
        $links = paginate_links( array(
            'base'      => $pagenum_link,
            'total'     => $query->max_num_pages,
            'current'   => $paged,
            'mid_size'  => 2,
            'add_args'  => array_map( 'urlencode', $query_args ),
            'prev_text' => $html_prev,
            'next_text' => $html_next,
            'type'      => 'array',
        ) );
		$kunty_animation = get_theme_mod( 'kunty_animation_disable', 0 ) ? 'animate-box':'';
        if ( is_array( $links ) ) {
            $r = '<nav class="navigation paging-navigation '.$kunty_animation.'">';
            $r .= "<ul class='page-numbers'>\n\t<li>";
            $r .= str_replace( 'page-numbers', 'page-link', join( "</li>\n\t<li>", $links ) );
            $r .= "</li>\n</ul>\n";
            $r .= "</nav>";

            printf( $r ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        }
    }
endif;


function kunty_render_posts_pagination() {
	/**
	 * Pagination for archive.
	 * Since 1.0.0
	*/
	$pagination_type = get_theme_mod( 'pagination_type', 'numeric' );
	if ( 'default' === $pagination_type ) :
		the_posts_navigation();
	else :
		kunty_get_posts_pagination();
	endif;

}
add_action( 'kunty_posts_pagination', 'kunty_render_posts_pagination', 10 );


if ( ! function_exists( 'kunty_site_logo' ) ) :
	/**
	 * Site Branding
	 * Since 1.0.0
	*/
	function kunty_site_logo() {

	$logo_option = get_theme_mod( 'site_logo_option', 'title-only');
	$sticky_logo = get_theme_mod( 'kunty_sticky_logo' );

	if ( 'logo-only' == $logo_option )  { ?>
		<div class="site-logo">
			<?php 
			if( has_custom_logo() ) {  
				the_custom_logo(); 
			} 
			if($sticky_logo){ 
			?>
				<a class="sticky-home-link" href="<?php echo esc_url(home_url('/')); ?>">
				<img class="sticky-logo" src="<?php echo esc_url($sticky_logo); ?>" alt="<?php echo esc_attr(get_bloginfo("name")); ?>" />
				</a>
			<?php
			}
			?>
		</div>   
	<?php } elseif( 'title-only' == $logo_option  ) { ?>
		<div class="site-logo">
			<?php if( is_home() && is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
			<?php else : ?>
			<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
			<?php endif; ?>
		</div>	
	<?php } else {  ?>	
		<div class="site-logo">
			<?php if( is_home() && is_front_page() ) : ?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
			<?php else : ?>
			<h2 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h2>
			<?php endif; ?>
			<p class="site-description"><?php echo esc_html( bloginfo( 'description' ) ); ?></p>
		</div>
	<?php }

	}
endif;


if ( ! function_exists( 'kunty_default_menu' ) ) :
	/**
	 * Default fallback menu
	 * Since 1.0.0
	*/
	function kunty_default_menu() {
		?>
			<ul class="menu">
			   <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'kunty' ); ?></a></li>
			   <li><a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ) ; ?>"><?php esc_html_e( 'Add Menu', 'kunty' ); ?></a></li>
			</ul>
		<?php
	}
endif;



if ( ! function_exists( 'kunty_site_nagivation' ) ) :
	/**
	 * Site Navigation
	 * Since 1.0.0
	*/
	function kunty_site_nagivation() {
	?>
		<nav class="kunty-nav">
			<?php
				if(class_exists('Themereps_Helper_Nav_Walker') && kunty_set_to_premium()){
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'container'      => 'ul',
							'menu_class'     => 'menu',
							'fallback_cb'    => 'Themereps_Helper_Nav_Walker::fallback',
							'walker'         => new Themereps_Helper_Nav_Walker()
						)
					);
				} else {
					wp_nav_menu(
						array(
							'theme_location' => 'primary-menu',
							'container'      => 'ul',
							'menu_class'     => 'menu',
							'fallback_cb'    => 'kunty_default_menu',
						)
					);
				}
			?>
		</nav>
	<?php 
	}
endif;



if ( ! function_exists( 'kunty_sidebar_navigation' ) ) :
	/**
	 * Sidebar Nav
	 * Since 1.0.0
	*/
	function kunty_sidebar_navigation() {
		
		$desc = get_theme_mod( 'offcanvas_desc', __('Kunty - A fully responsive WordPress theme, suited for a corporate, consultant and business website.', 'kunty') );
		$phone = get_theme_mod('offcanvas_phone', '(+123)-456-7890');
		$email = get_theme_mod('offcanvas_email', 'help@kunty.com');
		$location = get_theme_mod('offcanvas_location', __('Labony Super Marker, Sapahar, BD', 'kunty'));
		
		?>
			<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">

				<div class="offcanvas-header d-block">
				
					<div class="offcan-logo">
						<?php 
					if( has_custom_logo() ) {  
						the_custom_logo(); 
					} else { ?>
					<h4 class="mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h4>
					<?php } ?>
					</div>
					
						<?php 
					if( !empty($desc) ) : ?>
					<div class="offcan-desc"> 
						<p class="mb-0"><?php echo esc_html($desc); ?></p>
					</div>
						<?php
					endif; ?>
					
					<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<hr />
				<div class="offcanvas-body">
				
					<nav class="sidenav d-block d-lg-none">

					<?php if (function_exists('wp_nav_menu')) {
						wp_nav_menu( array(
								'theme_location' => 'sidebar-menu',
								'container'  => 'ul',
								'fallback_cb' => 'kunty_default_menu' 
							) );
						}
						else {
							kunty_default_menu();
						}
					?>
					</nav>
					<div class="offcan-contacts d-none d-lg-block">
						<h4 class="mb-4"><?php esc_html_e('Get In Touch', 'kunty'); ?></h4>
						<?php 
						if( !empty($email) ) : ?>
							<div class="icon-box d-flex flex-row mb-3">
								<div class="icon-holder icon-sm me-3 mt-2"> 
									<i class="ti-headphone"></i>
								</div>
								<div> 
									<p class="label mb-0"><?php esc_html_e('E-Mail', 'kunty'); ?></p>
									<p class="icon-desc mb-0"><a href="<?php echo esc_url( 'mailto:' . $email ); ?>" class="email"> <?php echo esc_html($email); ?></a></p>
								</div>
							</div>
							<?php 
						endif; ?>
						
							<?php 
						if( !empty($phone) ) : ?>
							<div class="icon-box d-flex flex-row mb-3">
								<div class="icon-holder icon-sm me-3 mt-2"> 
									<i class="ti-location-arrow"></i>
								</div>
								<div> 
									<p class="label mb-0"><?php esc_html_e('Phone', 'kunty'); ?></p>
									<p class="icon-desc mb-0"><a href="<?php echo esc_url('tel:' . preg_replace( '/[^\d+]/', '', $phone ) ); ?>" class="phone"><?php echo esc_html($phone); ?></a></p>
								</div>
							</div>
							<?php 
						endif; ?>
						
							<?php 
						if( !empty($location) ) : ?>
						<div class="icon-box d-flex flex-row mb-3">
							<div class="icon-holder icon-sm me-3 mt-2"> 
								<i class="ti-location-pin"></i>
							</div>
							<div> 
								<p class="label mb-0"><?php esc_html_e('Location', 'kunty'); ?></p>
								<p class="icon-desc location mb-0"><?php echo esc_html($location); ?></p>
							</div>
						</div>
							<?php 
						endif; ?>
					</div>
				</div>
					<?php 
				if(1=== get_theme_mod('offcanvas_social_enable', 1)) : ?>
				<hr />
				<div class="offcanvas-footer"> 
					<?php  echo kunty_get_social_media(); ?>
				</div>
					<?php 
				endif; ?>
			</div>

		<?php
	}
endif;



if ( ! function_exists( 'kunty_page_header' ) ) :
	/**
	 * Page Header
	  * Since 1.0.0
	*/
	function kunty_page_header() {
		$blog_title = get_theme_mod( 'blog_page_title', __('Blog', 'kunty') ); 
		$blog_layout = get_theme_mod( 'blog_layout', 'no-sidebar' );
		$post_detail_layout = get_theme_mod( 'blog_single_layout', 'left-sidebar' );
		$page_layout = get_theme_mod( 'page_layout', 'no-sidebar');
		$blog_breadcrumb = get_theme_mod( 'blog_breadcrumb_display', 1);
		$page_breadcrumb = get_theme_mod( 'page_breadcrumb_display', 1);
		?>
		<div class="page-header">
			<div class="container"> 
			
				<?php 
				if ( ( is_front_page() && is_home() ) || is_home() ){ 
					?>
				<div class="row">
					<div class="<?php if($blog_layout == 'left-sidebar') : ?>col-lg-7 offset-lg-3<?php else : ?>col-lg-9<?php endif; ?>">
						<?php if( 1 === $blog_breadcrumb ) : ?>
						<ul class="blog-bcr breadcrumb mb-4"> 
							<li class="item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','kunty'); ?></a></li>
							<li class="seperator"><i class="ti-angle-double-right "></i></li>
							<li class="item item-curent"><?php esc_html_e('Blog','kunty'); ?></li>
						</ul>
						<?php endif; ?>
						<h2 class="page-title mb-0"><?php echo esc_html( $blog_title ); ?></h2>
					</div>
				</div>
					<?php
				}
				?>
			
				<?php
				if( is_single() ) { ?>
				<div class="row <?php if($post_detail_layout == 'no-sidebar'){ ?>justify-content-center<?php } ?>">
					<div class="<?php if($post_detail_layout == 'left-sidebar') : ?>col-lg-7 offset-lg-4<?php elseif($post_detail_layout == 'right-sidebar') :?>col-lg-7 offset-lg-1<?php else : ?>col-lg-10<?php endif; ?>"> 
						<?php 
						if( 1 === $blog_breadcrumb ) : ?>
						<ul class="blog-bcr breadcrumb mb-4">  
							<li class="item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','kunty'); ?></a></li>
							<li class="seperator"><i class="ti-angle-double-right "></i></li>
							<li class="item item-curent"><?php esc_html_e('Blog','kunty'); ?></li>
						</ul>
						<?php 
						endif; ?>
						<h2><?php single_post_title();?></h2>
					</div>
				</div>
				<?php 
				} ?>
				
				<?php
				if( is_page() ) { ?>
				<div class="row justify-content-center">
					<div class="<?php if($page_layout == 'left-sidebar') : ?>col-lg-7 offset-lg-3<?php else : ?>col-lg-10<?php endif; ?>"> 
						<?php 
						if( 1 === $page_breadcrumb ) : ?>
						<ul class="page-bcr breadcrumb mb-4"> 
							<li class="item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','kunty'); ?></a></li>
							<li class="seperator"><i class="ti-angle-double-right "></i></li>
							<li class="item item-curent"><?php single_post_title(); ?></li>
						</ul>
						<?php 
						endif; ?>
						<div class="entry-header mb-2">
							<h2 class="mb-0"><?php single_post_title();?></h2>
						</div>
					</div>
				</div>
				<?php 
				} ?>
				
				<?php
				if( is_search() ) { ?>
				<div class="row">
					<div class="<?php if($blog_layout == 'left-sidebar') : ?>col-lg-7 offset-lg-3<?php else : ?>col-lg-9<?php endif; ?>">
						<?php 
						if( 1 === $blog_breadcrumb ) : ?>
						<ul class="blog-bcr breadcrumb mb-4"> 
							<li class="item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','kunty'); ?></a></li>
							<li class="seperator"><i class="ti-angle-double-right "></i></li>
							<li class="item item-curent"><?php esc_html_e('Blog','kunty'); ?></li>
						</ul>
						<?php 
						endif; ?>
						<h2 class="page-title mb-0"><?php printf( esc_html__( 'Search Results for: %s', 'kunty' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
					</div>
				</div>
				<?php 
				} ?>
				
				<?php
				if( is_archive() ) { ?>
				<div class="row">
					<div class="<?php if($blog_layout == 'left-sidebar') : ?>col-lg-7 offset-lg-3<?php else : ?>col-lg-9<?php endif; ?>">
						<?php 
						if( 1 === $blog_breadcrumb ) : ?>
						<ul class="blog-bcr breadcrumb mb-4"> 
							<li class="item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','kunty'); ?></a></li>
							<li class="seperator"><i class="ti-angle-double-right "></i></li>
							<li class="item item-curent"><?php esc_html_e('Archive','kunty'); ?></li>
						</ul>
						<?php 
						endif; ?>
						<h2 class="page-title mb-0"><?php the_archive_title(); ?></h2>
					</div>
				</div>
				<?php 
				} ?>
				
				<?php
				if( is_404() ) { ?>
				<div class="row justify-content-center">
					<div class="<?php if($page_layout == 'left-sidebar') : ?>col-lg-7 offset-lg-3<?php else : ?>col-lg-10<?php endif; ?>">
						<ul class="breadcrumb mb-4"> 
							<li class="item"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e('Home','kunty'); ?></a></li>
							<li class="seperator"><i class="ti-angle-double-right "></i></li>
							<li class="item item-curent"><?php esc_html_e('404','kunty'); ?></li>
						</ul>
						<h2 class="page-title mb-0"><?php esc_html_e('Error 404','kunty'); ?></h2>
					</div>
				</div>
				<?php 
				} ?>

			</div>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'kunty_footer_nav' ) ) :
	/**
	 * Footer Navigaion
	  * Since 1.0.0
	*/
	function kunty_footer_nav() {
		if (function_exists('wp_nav_menu')) {
		?>
		<nav class="footer-manu"> 
			<?php
				wp_nav_menu( array( 
					'theme_location' => 'footer-menu',
					'container'  => 'ul',
					'depth'      => 1,
				) );
			?>
		</nav>
		<?php
		}
	}
endif;