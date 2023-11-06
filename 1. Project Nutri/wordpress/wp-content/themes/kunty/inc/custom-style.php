<?php

/**
 * Add custom css to header
 */
if ( ! function_exists( 'kunty_custom_inline_style' ) ) {
	function kunty_custom_inline_style( ) {

        ob_start();

		/**================================================================
		 * Color Settings
		=================================================================== */
		 //Primary Colors
		$primary_color = get_theme_mod( 'site_primary_color' );
		$secondary_color = get_theme_mod( 'site_secondary_color' );
		$body_text_color = get_theme_mod('body_text_color');
		
		if ( $primary_color != '' ) {
			?>
			:root {
				<?php if($primary_color != '') : ?>
			    --primary-color: <?php echo esc_attr( $primary_color ); ?> !important;
				<?php endif; ?>
				
				<?php if($secondary_color != '') : ?>
				--secondary-color: <?php echo esc_attr( $secondary_color ); ?>;
				<?php endif; ?>
				
				<?php if($body_text_color != '') : ?>
				 --body-color: <?php echo esc_attr( $body_text_color ); ?>;
				<?php endif; ?>
			}
			<?php
		}
		// Heading Color
		$heading_color = get_theme_mod('site_heading_color');
		if ($heading_color) {
			?>
				h1, h2, h3, h4, h5, h6, .entry-header .entry-title a,.entry-header .entry-title a:focus{
					color:<?php echo esc_attr( $heading_color ); ?>;
				}
			<?php
		} // END $site_heading_color


		// Menu color
		$menu_color =  get_theme_mod( 'menu_link_color' );
		if ( $menu_color ) {
			?>
			nav.kunty-nav ul.menu > li > a{
				color: <?php echo esc_attr( $menu_color ); ?>;
			}
			<?php
		} // END $menu_color
		
		//Menu hover color
		$menu_hover_color =  get_theme_mod( 'menu_hover_link_color' );
		if ( $menu_hover_color ) {
			?>
			.kunty-nav ul.menu > li > a:hover, .kunty-nav ul.menu > li a.current_page_item{
				color: <?php echo esc_attr( $menu_hover_color ); ?> !important;
			}
			<?php
		} // END $menu_hover_color

		/**
		 * Submenu Background
		 */
		$dropdown_bg =  get_theme_mod( 'submenu_bg_color' );
		if ( $dropdown_bg ) {
			?>
			.kunty-nav .menu > li ul{
				background-color: <?php echo esc_attr( $dropdown_bg ); ?>;
			}
			<?php
		} // END $dropdown_bg

		// Submenu text color
		$submenu_text_color = get_theme_mod( 'submenu_text_color' );
		if ( $submenu_text_color ) {
			?>
			.kunty-nav .menu > li > ul li a{
				color: <?php echo esc_attr( $submenu_text_color ); ?> !important;
			}
			<?php
		} // END $submenu_text_color
		
		//Submenu hover color
		$submenu_htext_color =  get_theme_mod( 'submenu_hover_text_color' );
		if ( $submenu_htext_color ) {
			?>
			.kunty-nav .menu > li > ul li a:hover{
				color: <?php echo esc_attr( $submenu_htext_color ); ?> !important;
			}
			<?php
		} // END $submenu_htext_color

		// Button BG Color
		$btn_bg_color =  get_theme_mod( 'site_btn_bg_color' );
		if ( $btn_bg_color != '' ) { ?>
			button, input[type="button"], button[type="submit"], input[type="submit"],  input[type="reset"],  a.btn.btn-kunty,.header-btn .btn{
				background-color: <?php echo esc_attr( $btn_bg_color ); ?>;
			}
			<?php
		} // End $btn_bg_color

		// Button Hover BG Color
		$btn_bg_hcolor = get_theme_mod( 'site_btn_bg_hcolor');
		if ( $btn_bg_hcolor != '' ) {
			?>
			button:hover, button:focus, button[type="submit"]:hover, button[type="submit"]:focus, input[type="submit"]:hover,input[type="submit"]:focus, input[type="button"]:hover, input[type="button"]:focus, input[type="reset"]:hover,input[type="reset"]:focus, .entry-content button:hover, a.btn.btn-kunty:hover, a.btn-kunty:focus,.header-btn .btn:hover,.comment-form .form-submit .submit:hover
			{
				background-color: <?php echo esc_attr( $btn_bg_hcolor ); ?>;
			}
			<?php
		} // End $btn_bg_hcolor

		// Button text color
		$btn_text_color = get_theme_mod('site_btn_text_color');
		if ( $btn_text_color ) {
			?>
			button, button[type="submit"], input[type="button"], input[type="reset"], input[type="submit"],a.btn:not(.btn-kunty-bordered){
				color: <?php echo esc_attr( $btn_text_color ); ?>;
			}
			<?php
		} // END $btn_text_color
		
		// Button hover text color
		$btn_text_hcolor = get_theme_mod('site_btn_hover_text_color');
		if ( $btn_text_hcolor ) {
			?>
			 button:hover, button:focus, button[type="submit"]:hover, button[type="submit"]:focus,input[type="submit"]:hover,input[type="submit"]:focus, input[type="button"]:hover, input[type="button"]:focus,input[type="reset"]:hover,input[type="reset"]:focus, .entry-content button:hover, a.btn.btn-kunty:hover,a.btn-kunty:focus,.header-btn .btn:hover{
				color: <?php echo esc_attr( $btn_text_hcolor ); ?>;
			}
			<?php
		} // END $btn_text_hcolor

		// Anchor Color
		$anchor_color = get_theme_mod('site_anchor_color');
		if ( $anchor_color ) {
			?>
			a, .entry-content a, .comment-meta a {
				color: <?php echo esc_attr( $anchor_color ); ?>;
			}
			<?php
		} // END $anchor_color

		// Anchor Hover Color
		$anchor_hcolor = get_theme_mod('site_anchor_hcolor');
		if ( $anchor_hcolor ) {
			?>
			.entry-content a:hover,.comment-meta a:hover {
				color: <?php echo esc_attr( $anchor_hcolor ); ?> !important;
			}
			<?php
		} // END $anchor_hcolor

		/**===============================================
		 * Typography
		==================================================*/
		// Navigation Typography
		$menu_font = json_decode(get_theme_mod('nav_font_family', '{"font":"Raleway","boldweight":"600","category":"serif"}'), true);
		if ($menu_font['boldweight'] == 'regular') {
			unset($menu_font['boldweight']);
			$menu_font['boldweight'] = 'normal';
		}
		$nav_fsize =  get_theme_mod('nav_font_size');
		if ( $menu_font ) {
			?>
			.kunty-nav ul.menu > li > a, .mega-menu .title,.sidenav > ul > li > a{
				font-family: "<?php echo esc_attr( $menu_font['font'] ); ?>";
				font-weight: <?php echo esc_attr($menu_font['boldweight']); ?>;
				<?php if($nav_fsize) : ?>
					font-size: <?php echo esc_attr($nav_fsize); ?>px;
				<?php endif; ?>
			}
			<?php
		} //END $menu_font

		$submenu_font = json_decode(get_theme_mod('subnav_font_family', '{"font":"Poppins","boldweight":"500","category":"serif"}'), true);
		if ($submenu_font['boldweight'] == 'regular') {
			unset($submenu_font['boldweight']);
			$submenu_font['boldweight'] = 'normal';
		}
		$subnav_fsize =  get_theme_mod('subnav_font_size');
		if ( $submenu_font ) {
			?>
			.kunty-nav .menu > li > ul li a,.sidenav ul ul li a{
				font-family: "<?php echo esc_attr( $submenu_font['font'] ); ?>";
				font-weight: <?php echo esc_attr($submenu_font['boldweight']); ?>;
				<?php if($subnav_fsize) : ?>
					font-size: <?php echo esc_attr($subnav_fsize); ?>px;
				<?php endif; ?>
			}
			<?php
		} //END $submenu_font

		// Body Typography
    	$body_font = json_decode(get_theme_mod('body_font_family'), true);
		if ($body_font['boldweight'] == 'regular') {
			unset($body_font['boldweight']);
			$body_font['boldweight'] = 'normal';
		}
		$body_fsize = get_theme_mod('body_font_size');
		$b_lheight = get_theme_mod('body_line_height');

		if ( $body_font ) {
			?>
			body{
				font-family: "<?php echo esc_attr($body_font['font']); ?>";
				font-weight: <?php echo esc_attr($body_font['boldweight']); ?>;
				<?php if($body_fsize) : ?>
					font-size: <?php echo esc_attr($body_fsize); ?>px;
				<?php endif; ?>
				<?php if($b_lheight) : ?>
					line-height: <?php echo esc_attr($b_lheight); ?>;
				<?php endif; ?>
			}
			<?php
		} 

		// Heading Typography
		$heading_font = json_decode(get_theme_mod('heading_font_family', '{"font":"Raleway","boldweight":"600","category":"serif"}'), true);
		$headings_lheight = get_theme_mod('headings_line_height');
		if ($heading_font['boldweight'] == 'regular') {
			unset($heading_font['boldweight']);
			$heading_font['boldweight'] = 'normal';
		}
		if ($heading_font) {
		?>
			h1,h2,h3,h4,h5,h6{
				font-family: "<?php echo esc_attr($heading_font['font']); ?>";
				font-weight: <?php echo esc_attr($heading_font['boldweight']); ?>;
				<?php if($headings_lheight) : ?>
					line-height: <?php echo esc_attr($headings_lheight); ?>;
				<?php endif; ?>
			}
		<?php
		}// END $heading_font_family
		
		$h1_size = get_theme_mod('h1_font_size');
		$h2_size = get_theme_mod('h2_font_size');
		$h3_size = get_theme_mod('h3_font_size');
		$h4_size = get_theme_mod('h4_font_size');
		$h5_size = get_theme_mod('h5_font_size');
		$h6_size = get_theme_mod('h6_font_size');

		if (!empty($h1_size)) {
		?>
			h1{ font-size: <?php echo absint($h1_size); ?>px;}
		<?php
		}
		if (!empty($h2_size)) {
		?>
			h2{ font-size: <?php echo absint($h2_size); ?>px;}
		<?php
		}
		if (!empty($h3_size)) {
		?>
			h3{ font-size: <?php echo absint($h3_size); ?>px;}
		<?php
		}
		if (!empty($h4_size)) {
		?>
			h4{ font-size: <?php echo absint($h4_size); ?>px;}
		<?php
		}
		if (!empty($h5_size)) {
		?>
			h5{ font-size: <?php echo absint($h5_size); ?>px;}
		<?php
		}
		if (!empty($h6_size)) {
		?>
			h6{ font-size: <?php echo absint($h6_size); ?>px;}
		<?php
		}

		/**=================================
		 * Header Settings
		===============================*/
		$header_top_bg =  get_theme_mod( 'header_top_bg_color' );
		if ( $header_top_bg != '' ) {
			?>
			.header-top {
				background-color: <?php echo esc_attr( $header_top_bg ); ?>;
			}
			<?php
		} // End $header_top_bg
		
		$header_bg =  get_theme_mod( 'header_bg_color' );
		if ( !empty( $header_bg ) ) {
			?>
			.no-transparent-header .main-header {
				background-color: <?php echo esc_attr( $header_bg ); ?>;
			}
			<?php
		} // End $header_bg
		
		$sticky_header_bg =  get_theme_mod( 'sticky_header_bg_color' );
		if ( $sticky_header_bg != '' ) {
			?>
			.fixed-header .main-header {
				background-color: <?php echo esc_attr( $sticky_header_bg ); ?>;
			}
			<?php
		} // End $sticky_header_bg
		

		/**==================================================
		 * Frontpage Settings
		 =====================================================*/
		// Hero Section
		$title_color =  get_theme_mod( 'hero_title_color'  );
		$title_size =  get_theme_mod( 'hero_title_size'  );
		$line_height =  get_theme_mod( 'hero_title_line_height'  );
		if ( !empty($title_color) || !empty($title_size) || !empty($line_height) ) {
			?>
			.hero-area .hero-content h2{
				<?php if(!empty($title_color)) : ?>
				color: <?php echo esc_attr($title_color); ?>;
				<?php endif; ?>
				<?php if(!empty($title_size)) : ?>
				font-size: <?php echo esc_attr($title_size); ?>px;
				<?php endif; ?>
				<?php if(!empty($line_height)) : ?>
				line-height: <?php echo esc_attr($line_height); ?>;
				<?php endif; ?>
			}
			<?php
		} 
		$desc_color =  get_theme_mod( 'hero_desc_color'  );
		$desc_size =  get_theme_mod( 'hero_desc_size'  );
		if ( !empty($desc_color) || !empty($$desc_size) ) {
			?>
			.hero-area .hero-content p, .hero-area .hero-content{
				<?php if(!empty($title_color)) : ?>
				color: <?php echo esc_attr($desc_color); ?>;
				<?php endif; ?>
				<?php if(!empty($desc_size)) : ?>
				font-size: <?php echo esc_attr($desc_size); ?>px;
				<?php endif; ?>
			}
			<?php
		}
		$hero_width =  get_theme_mod( 'hero_content_width', 510 );
		if ( !empty($hero_width) ) {
			?>
			.hero-area .hero-content {
				<?php if($hero_width != '') : ?>
				max-width: <?php echo esc_attr($hero_width); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$hero_bg =  get_theme_mod( 'hero_section_bg' );
		if ( !empty($hero_bg) ) {
			?>
			.hero-area {
				background-image: none;
				background-color: <?php echo esc_attr($hero_bg); ?>;
			}
			<?php
		}

		/* ===Service Section ===*/
		$icon_bg =  get_theme_mod( 'service_icon_bg' );
		$icon_box_size =  get_theme_mod( 'service_icon_box_size' );
		$icon_br =  get_theme_mod( 'service_icon_br' );
		$ifont_size =  get_theme_mod( 'service_icon_font_size' );
		$icon_color =  get_theme_mod( 'service_icon_color' );
		
		if ( !empty($icon_bg ) || !empty($icon_box_size) || !empty($icon_br) || !empty($ifont_size) || !empty($icon_color) ) {
			?>
			.service-section .icon-holder i {
				<?php if(!empty($icon_bg )) : ?>
				background-color: <?php echo esc_attr($icon_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($icon_box_size)) : ?>
				width: <?php echo esc_attr($icon_box_size); ?>px;
				height: <?php echo esc_attr($icon_box_size); ?>px;
				line-height: <?php echo esc_attr($icon_box_size); ?>px;
				<?php endif; ?>
				<?php if(!empty($icon_br)) : ?>
				border-radius: <?php echo esc_attr($icon_br); ?>px;
				<?php endif; ?>
				<?php if(!empty($ifont_size)) : ?>
				font-size: <?php echo esc_attr($ifont_size); ?>px;
				<?php endif; ?>
				<?php if(!empty($icon_color)) : ?>
				color: <?php echo esc_attr($icon_color); ?>;
				<?php endif; ?>
			}
			<?php
		}
		
		$font_size =  get_theme_mod( 'service_title_font_size' );
		$color =  get_theme_mod( 'service_title_color' );
		if ( !empty($font_size) || !empty($color) ) {
			?>
			.service-section .icon-box h4 {
				<?php if(!empty($font_size)) : ?>
				font-size: <?php echo esc_attr($font_size); ?>px;
				<?php endif; ?>
				<?php if(!empty($color)) : ?>
				color: <?php echo esc_attr($color); ?>;
				<?php endif; ?>
			}
			<?php
		}

		$desc_color =  get_theme_mod( 'service_description_color' );
		if (!empty($desc_color) ) {
			?>
			.service-section .icon-box p {
				color: <?php echo esc_attr($desc_color); ?>;
			}
			<?php
		}
		$more_color =  get_theme_mod( 'service_btn_more_color' );
		if (!empty($more_color) ) {
			?>
			.service-section .icon-box .btn-more {
				color: <?php echo esc_attr($more_color); ?>;
			}
			<?php
		}

		$box_bg =  get_theme_mod( 'service_box_bg' );
		$box_padding =  get_theme_mod( 'service_box_padding' );
		if ( !empty($box_bg) || !empty($box_padding) ) {
			?>
			.service-section .icon-box {
				<?php if(!empty($box_bg)) : ?>
				background-color: <?php echo esc_attr($box_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($box_padding)) : ?>
				padding: <?php echo esc_attr($box_padding); ?>px;
				<?php endif; ?>
			}
			<?php
		}


		$service_bg =  get_theme_mod( 'service_section_bg' );
		$service_pt =  get_theme_mod( 'service_section_pt' );
		$service_pb =  get_theme_mod( 'service_section_pb' );
		if ( !empty($service_bg ) || !empty($service_pt) || !empty($service_pb) ) {
			?>
			#service-section {
				<?php if(!empty($service_bg )) : ?>
				background-color: <?php echo esc_attr($service_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($service_pt)) : ?>
				padding-top: <?php echo esc_attr($service_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($service_pb)) : ?>
				padding-bottom: <?php echo esc_attr($service_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		}
		
		/* === Intro Section ===*/
		$about_bg =  get_theme_mod( 'about_section_bg'  );
		$about_pt =  get_theme_mod( 'about_section_pt' );
		$about_pb =  get_theme_mod( 'about_section_pb' );
		if ( !empty($about_bg)|| !empty($about_pt) || !empty($about_pb) ) {
			?>
			#intro-section {
				<?php if(!empty($about_bg)) : ?>
				background-color: <?php echo esc_attr($about_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($about_pt)) : ?>
				padding-top: <?php echo esc_attr($about_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($about_pb)) : ?>
				padding-bottom: <?php echo esc_attr($about_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$about_bg =  get_theme_mod( 'about_section_bg'  );
		if ( !empty($about_bg) ) {
			?>
			.intro-section::before {
				border-color: transparent transparent transparent <?php echo esc_attr($about_bg); ?>;
			}
			<?php
		} 

		/* === Portfolios Section ===*/
		$portfolio_bg =  get_theme_mod( 'portfolio_section_bg' );
		$portfolio_pt =  get_theme_mod( 'portfolio_section_pt' );
		$portfolio_pb =  get_theme_mod( 'portfolio_section_pb' );
		if ( !empty($portfolio_bg) || !empty($portfolio_pt) || !empty($portfolio_pb) ) {
			?>
			#portfolio-section {
				<?php if(!empty($portfolio_bg)) : ?>
				background-color: <?php echo esc_attr($portfolio_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($portfolio_pt)) : ?>
				padding-top: <?php echo esc_attr($portfolio_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($portfolio_pb)) : ?>
				padding-bottom: <?php echo esc_attr($portfolio_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 

		/* === Feedback Section ===*/
		$feedback_bg =  get_theme_mod( 'feedback_section_bg' );
		$feedback_pt =  get_theme_mod( 'feedback_section_pt' );
		$feedback_pb =  get_theme_mod( 'feedback_section_pb' );
		if ( !empty($feedback_pt) || !empty($feedback_pb) || !empty($feedback_bg) ) {
			?>
			#feedback-section {
				<?php if(!empty($feedback_bg)) : ?>
				background-color: <?php echo esc_attr($feedback_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($feedback_pt)) : ?>
				padding-top: <?php echo esc_attr($feedback_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($feedback_pb)) : ?>
				padding-bottom: <?php echo esc_attr($feedback_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$bg_clr =  get_theme_mod( 'feedback_bg' );
		$border_clr =  get_theme_mod( 'feedback_border_clr' );
		$text_clr =  get_theme_mod( 'feedback_text_clr' );
		if ( !empty($border_clr) ||  !empty($bg_clr) ||  !empty($text_clr) ) {
			?>
			#feedback-section .testimonial {
				<?php if(!empty($bg_clr )) : ?>
				background-color: <?php echo esc_attr($bg_clr); ?>;
				<?php endif; ?>
				
				<?php if(!empty($border_clr)) : ?>
				border-color: <?php echo esc_attr($border_clr); ?>;
				<?php endif; ?>
				
				<?php if(!empty($text_clr)) : ?>
				color: <?php echo esc_attr($text_clr); ?>;
				<?php endif; ?>
			}
			<?php
		}
		$hover_bg =  get_theme_mod( 'feedback_hover_bg' );
		if ( !empty($hover_bg ) ) {
			?>
			#feedback-section .testimonial:hover {
				background-color: <?php echo esc_attr($hover_bg); ?>;
			}
			<?php
		}

		/* === Team Section ===*/
		$team_bg =  get_theme_mod( 'team_section_bg' );
		$team_pt =  get_theme_mod( 'team_section_pt' );
		$team_pb =  get_theme_mod( 'team_section_pb' );
		if ( !empty($team_bg) || !empty($team_pt) || !empty($team_pb) ) {
			?>
			#team-section {
				<?php if(!empty($team_bg )) : ?>
				background-color: <?php echo esc_attr($team_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($team_pt)) : ?>
				padding-top: <?php echo esc_attr($team_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($team_pb)) : ?>
				padding-bottom: <?php echo esc_attr($team_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		
		$bg_clr =  get_theme_mod( 'team_member_bg' );
		$border_clr =  get_theme_mod( 'member_border_clr' );
		$padding_y =  get_theme_mod( 'member_padding_y' );
		$padding_x =  get_theme_mod( 'member_padding_x' );
		if ( $border_clr != '' || $bg_clr != '' || $padding_y != '' || $padding_x != '') {
			?>
			.singel-team {
				<?php if(!empty($bg_clr )) : ?>
				background-color: <?php echo esc_attr($bg_clr); ?>;
				<?php endif; ?>
				
				<?php if(!empty($border_clr)) : ?>
				border-color: <?php echo esc_attr($border_clr); ?>;
				<?php endif; ?>
				
				<?php if(!empty($padding_y)) : ?>
				padding-top: <?php echo esc_attr($padding_y); ?>px;
				padding-bottom: <?php echo esc_attr($padding_y); ?>px;
				<?php endif; ?>
				
				<?php if(!empty($padding_x)) : ?>
				padding-left: <?php echo esc_attr($padding_x); ?>px;
				padding-right: <?php echo esc_attr($padding_x); ?>px;
				<?php endif; ?>

			}
			<?php
		}
		$team_hover_bg =  get_theme_mod( 'team_member_hover_bg' );
		if ( !empty($team_hover_bg ) ) {
			?>
			.singel-team:hover {
				<?php if(!empty($team_hover_bg )) : ?>
				background-color: <?php echo esc_attr($team_hover_bg); ?>;
				<?php endif; ?>
			}
			<?php
		}
		$face_width =  get_theme_mod( 'member_face_width' );
		$face_height =  get_theme_mod( 'member_face_height' );
		$border_radi =  get_theme_mod( 'member_face_border_radius' );
		if ( !empty($face_width ) || !empty($face_height ) || !empty($border_radi ) ) {
			?>
			.team-thumbnail.circle {
				<?php if(!empty($face_width )) : ?>
				width: <?php echo esc_attr($face_width); ?>px;
				<?php endif; ?>
				<?php if(!empty($face_height)) : ?>
				height: <?php echo esc_attr($face_height); ?>px;
				<?php endif; ?>
				<?php if(!empty($border_radi)) : ?>
				border-radius: <?php echo esc_attr($border_radi); ?>%;
				<?php endif; ?>
			}
			<?php
		}
		
		/* === Pricing Section ===*/
		$pricing_bg =  get_theme_mod( 'pricing_section_bg' );
		$pricing_pt =  get_theme_mod( 'pricing_section_pt' );
		$pricing_pb =  get_theme_mod( 'pricing_section_pb' );
		if ( !empty($pricing_bg) || !empty($pricing_pt) || !empty($pricing_pb) ) {
			?>
			#pricing-section {
				<?php if(!empty($pricing_bg)) : ?>
				background-color: <?php echo esc_attr($pricing_bg); ?>;
				<?php endif; ?>
				<?php if( !empty($pricing_pt) ) : ?>
				padding-top: <?php echo esc_attr($pricing_pt); ?>px;
				<?php endif; ?>
				<?php if( !empty($pricing_pb) ) : ?>
				padding-bottom: <?php echo esc_attr($pricing_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		$active_plan_bg =  get_theme_mod( 'active_plan_bg' );
		if ( !empty($active_plan_bg )) {
			?>
			.single-plan.active {
				background-color: <?php echo esc_attr($active_plan_bg); ?>;
			}
			<?php
		}
		$text_clc =  get_theme_mod( 'active_plan_text_clc' );
		if ( !empty($text_clc )) {
			?>
			.single-plan.active .plan-head h5, .single-plan.active .plan-price .price, .single-plan.active .plan-price, .single-plan.active .plan-features ul li, .single-plan.active .plan-head h6,.single-plan.active .btn-kunty{
				color: <?php echo esc_attr($text_clc); ?>;
			}
			<?php
		}

		$btn_text_clc =  get_theme_mod( 'active_plan_btn_text_clc' );
		$btn_border_clc =  get_theme_mod( 'active_plan_btn_border_clc' );
		if ( !empty($btn_text_clc ) || !empty($btn_border_clc )) {
			?>
			.single-plan.active .btn-kunty{
				<?php if( !empty($btn_text_clc) ) : ?>
				color: <?php echo esc_attr($btn_text_clc); ?>;
				<?php endif; ?>
				<?php if( !empty($btn_border_clc) ) : ?>
				border-color: <?php echo esc_attr($btn_border_clc); ?>;
				<?php endif; ?>
			}
			<?php
		}

		/* ===Brands Section ===*/
		$brands_bg =  get_theme_mod( 'brands_section_bg' );
		$brands_pt =  get_theme_mod( 'brands_section_pt' );
		$brands_pb =  get_theme_mod( 'brands_section_pb' );
		if ( !empty($brands_bg) || !empty($brands_pt) || !empty($brands_pb) ) {
			?>
			#brands-section {
				<?php if(!empty($brands_bg) ) : ?>
				background-color: <?php echo esc_attr($brands_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($brands_pt)) : ?>
				padding-top: <?php echo esc_attr($brands_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($brands_pb)) : ?>
				padding-bottom: <?php echo esc_attr($brands_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 
		
		/* ===CTA Section ===*/
		$gradient_1 =  get_theme_mod( 'cta_section_gradient_1', 'rgb(253,187,45)' );
		$gradient_2 =  get_theme_mod( 'cta_section_gradient_2', 'rgb(34,193,195)' );
		$cta_pt =  get_theme_mod( 'cta_section_pt' );
		$cta_pb =  get_theme_mod( 'cta_section_pb' );
		if ( !empty($cta_pt) || !empty($cta_pb)  || !empty($gradient_1)  || !empty($gradient_2) ) {
			?>
			#cta-section .cta-inner{
				<?php if(!empty($gradient_1) || !empty($gradient_2)) : ?>
				background-image: -moz-linear-gradient( -30deg, <?php echo esc_attr($gradient_1); ?> 0%, <?php echo esc_attr($gradient_2); ?> 100%);
				background-image: -webkit-linear-gradient( -30deg, <?php echo esc_attr($gradient_1); ?> 0%, <?php echo esc_attr($gradient_2); ?> 100%);
				background-image: -ms-linear-gradient( -30deg, <?php echo esc_attr($gradient_1); ?> 0%, <?php echo esc_attr($gradient_2); ?> 100%);
				<?php endif; ?>
				<?php if(!empty($cta_pt)) : ?>
				padding-top: <?php echo esc_attr($cta_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($cta_pb)) : ?>
				padding-bottom: <?php echo esc_attr($cta_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 

		$title_color =  get_theme_mod( 'cta_title_color'  );
		if ( !empty($title_color) ) {
			?>
			.cta-inner h2{
				color: <?php echo esc_attr($title_color); ?>;
			}
			<?php
		} 
		$subtitle_color =  get_theme_mod( 'cta_subtitle_color'  );
		if ( !empty($subtitle_color) ) {
			?>
			.cta-inner h6{
				color: <?php echo esc_attr($subtitle_color); ?>;
			}
			<?php
		} 
		$desc_color =  get_theme_mod( 'cta_desc_color'  );
		if ( !empty($desc_color) ) {
			?>
			.cta-inner p{
				color: <?php echo esc_attr($desc_color); ?>;
			}
			<?php
		} 

		/* ===News Section ===*/
		$news_bg =  get_theme_mod( 'news_section_bg' );
		$news_pt =  get_theme_mod( 'news_section_pt' );
		$news_pb =  get_theme_mod( 'news_section_pb' );
		if ( !empty($news_bg) || !empty($news_pt) || !empty($news_pb) ) {
			?>
			#news-section {
				<?php if(!empty($news_bg )) : ?>
				background-color: <?php echo esc_attr($news_bg); ?>;
				<?php endif; ?>
				<?php if(!empty($news_pt)) : ?>
				padding-top: <?php echo esc_attr($news_pt); ?>px;
				<?php endif; ?>
				<?php if(!empty($news_pb)) : ?>
				padding-bottom: <?php echo esc_attr($news_pb); ?>px;
				<?php endif; ?>
			}
			<?php
		} 

		// Preloader Background color
		$preloader_bg_color =  get_theme_mod( 'preloader_bg_color' );
		if ( !empty($preloader_bg_color) ) {
			?>
			.preloader-wrap {
				background: <?php echo esc_attr($preloader_bg_color); ?>;
			}
			<?php
		} // End $preloader_bg_color

		/**===============================================
		 * Misc Settings
		==================================================*/
		$container_width = get_theme_mod( 'container_width' );
		if ( !empty($container_width) ) {
			?>
			@media (min-width:1400px) {
				.container {
					max-width:<?php echo esc_attr($container_width); ?>px;
				}
			}
			<?php
		} // End $container_width

		// Button Border Radius
		$btn_bradius = get_theme_mod('site_btn_bradius');
		if ( $btn_bradius != '') {
			?>
			.btn.btn-kunty,.btn-wrap {
				border-radius: <?php echo esc_attr( $btn_bradius ); ?>px;
			}
			<?php
		} // END $btn_bradius


		/**================================================
		 * Footer Settings
		 ===================================================*/
		// Footer Background color
		$widgets_bg_color = get_theme_mod( 'footer_widgets_bg_color' );
		$widgets_bg_color_2 = get_theme_mod( 'footer_widgets_bg_color_2' );
		if ( $widgets_bg_color != '' ) {
			?>
			.footer-area {
				background-color: <?php echo esc_attr($widgets_bg_color); ?>;
				background-image: -moz-linear-gradient( -30deg, <?php echo esc_attr($widgets_bg_color); ?> 0%, <?php echo esc_attr($widgets_bg_color_2); ?> 100%);
				background-image: -webkit-linear-gradient( -30deg, <?php echo esc_attr($widgets_bg_color); ?> 0%, <?php echo esc_attr($widgets_bg_color_2); ?> 100%);
				background-image: -ms-linear-gradient( -30deg, <?php echo esc_attr($widgets_bg_color); ?> 0%, <?php echo esc_attr($widgets_bg_color_2); ?> 100%);
				
			}
			<?php
		} // End $widgets_bg_color


		//Footer Title Color
		$widgets_title_color =  get_theme_mod( 'footer_widgets_title_color' );
		if ( $widgets_title_color != '' ) {
			?>
			.footer-widget .widget-title  {
				color: <?php echo esc_attr($widgets_title_color); ?>;
			}
			<?php
		} // End $widgets_title_color


		//Footer Text Color
		$widgets_text_color =  get_theme_mod( 'footer_widgets_text_color' );
		if ( $widgets_text_color != '' ) {
			?>
			.footer-widgets, .footer-widgets p {
				color: <?php echo esc_attr($widgets_text_color); ?>;
			}
			<?php
		} // End $widgets_text_color

		//Footer Link Color
		$widgets_link_color =  get_theme_mod( 'footer_widgets_link_color' );
		if ( $widgets_link_color != '' ) {
			?>
			.footer-widgets a,.footer-widget.widget .tagcloud a,.footer-manu ul li a,.widget ul li::before{
				color: <?php echo esc_attr($widgets_link_color); ?> !important;
			}
			<?php
		} // End $widgets_link_color
		
		//Footer Link Hover Color
		$widgets_link_hcolor = get_theme_mod( 'footer_widgets_link_hcolor' );
		if ( $widgets_link_hcolor != '' ) {
			?>
			.footer-widgets a:hover,.footer-widget ul li a:hover,.footer-widget.widget > ul li::before,.footer-widget.widget .tagcloud a:hover,.footer-manu ul li a:hover,.widget ul li:hover::before {
				color: <?php echo esc_attr($widgets_link_hcolor); ?> !important;
			}
			<?php
		} // End $widgets_link_hcolor


		// Copyright Text Color
		$copyright_text_color =  get_theme_mod( 'footer_copyright_text_color'  );
		if ( $copyright_text_color != '' ) {
			?>
			#copyright-text {
				color: <?php echo esc_attr($copyright_text_color); ?>;
			}
			<?php
		} // End $copyright_text_color



		/**======================================================
		 * Site Branding
		=========================================================*/
		// Site title font
    	$site_title_font = json_decode(get_theme_mod('site_title_font_family'), true);
		if ($site_title_font['boldweight'] == 'regular') {
			unset($site_title_font['boldweight']);
			$site_title_font['boldweight'] = 'normal';
		}
		$site_title_fsize = get_theme_mod('site_title_font_size');
		$site_title_color =  get_theme_mod( 'site_title_color');
		if ( $site_title_font ) {
			?>
			.site-logo .site-title,.site-logo .site-title a{
				font-family: "<?php echo esc_attr($site_title_font['font']); ?>";
				font-weight: <?php echo esc_attr($site_title_font['boldweight']); ?>;

				<?php if($site_title_fsize) : ?>
					font-size: <?php echo esc_attr($site_title_fsize); ?>px;
				<?php endif; ?>

				<?php if($site_title_color) : ?>
				color: <?php echo esc_attr( $site_title_color ); ?>;
				<?php endif; ?>

			}
			<?php
		} //END $site_title_font

		// Tagline
    	$tagline_font = json_decode(get_theme_mod('tagline_font_family'), true);
		if ($tagline_font['boldweight'] == 'regular') {
			unset($tagline_font['boldweight']);
			$tagline_font['boldweight'] = 'normal';
		}
		$tagline_font_size = get_theme_mod('tagline_font_size');
		$tagline_color =  get_theme_mod( 'tagline_text_color');
		if ( $tagline_font ) {
			?>
			.site-branding p.site-description{
				font-family: "<?php echo esc_attr($tagline_font['font']); ?>";
				font-weight: <?php echo esc_attr($tagline_font['boldweight']); ?>;

				<?php if($tagline_font_size) : ?>
					font-size: <?php echo esc_attr($tagline_font_size); ?>px;
				<?php endif; ?>

				<?php if($tagline_color) : ?>
				color: <?php echo esc_attr( $tagline_color ); ?>;
				<?php endif; ?>

			}
			<?php
		} //END

		//Logo Width/height
		$logo_width =  get_theme_mod( 'site_logo_width'  );
		if ( !empty($logo_width) ) {
			?>
			.site-logo img {
				width: <?php echo esc_attr($logo_width); ?>px;
			}
			<?php
		} // End $logo_width

		$logo_height =  get_theme_mod( 'site_logo_height'  );
		if ( !empty($logo_height) ) {
			?>
			.site-logo img {
				height: <?php echo esc_attr($logo_height); ?>px;
			}
			<?php
		} // End $logo_height

        $css = ob_get_clean();

        if ( trim( $css ) == "" ) {
            return ;
        }
		$css = apply_filters( 'kunty_custom_css', $css ) ;
        if ( ! is_customize_preview() ) {
	        $css = preg_replace(
		        array(
			        // Remove comment(s)
			        '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')|\/\*(?!\!)(?>.*?\*\/)|^\s*|\s*$#s',
			        // Remove unused white-space(s)
			        '#("(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\'|\/\*(?>.*?\*\/))|\s*+;\s*+(})\s*+|\s*+([*$~^|]?+=|[{};,>~+]|\s*+-(?![0-9\.])|!important\b)\s*+|([[(:])\s++|\s++([])])|\s++(:)\s*+(?!(?>[^{}"\']++|"(?:[^"\\\]++|\\\.)*+"|\'(?:[^\'\\\\]++|\\\.)*+\')*+{)|^\s++|\s++\z|(\s)\s+#si',
		        ),
		        array(
			        '$1',
			        '$1$2$3$4$5$6$7',
		        ),
		        $css
	        );
        }
        if ( ! function_exists( 'wp_get_custom_css' ) ) {  // Back-compat for WordPress < 4.7.
            $custom = get_option('kunty_custom_css');
            if ($custom) {
                $css .= "\n/* --- Begin custom CSS --- */\n" . $custom . "\n/* --- End custom CSS --- */\n";
            }
        }
       return $css ;
	}

}