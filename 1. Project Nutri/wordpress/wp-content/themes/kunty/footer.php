<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package kunty
 */

?>

			<footer class="footer-area" id="footer-area">

				<?php
				
					/**
					 * hooked kunty_footer_widgets - 10
					 * @see kunty_footer_widgets
					*/
					do_action('kunty_footer_widgets');

					/**
					 * hooked kunty_footer_copyright - 10
					 * @see kunty_footer_copyright
					*/
					do_action('kunty_footer_copyright');
					
				?>
			</footer>
			<!-- Ene Footer -->

			<!-- Back to Top -->
			<?php
			if( 1 === get_theme_mod( 'scrollup_display', 1 ) ) : ?>
			<div class="progress-wrap">
				<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
					<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
				</svg>
			</div>
				<?php
			endif; ?>
			
			<?php
			if( 1 === get_theme_mod( 'preloader_display', 1 ) ) : ?>
				<div class="preloader-wrap">
					<div class="preloader"></div>
				</div>
				<?php
			endif; ?>
			<?php
			if( 1 === get_theme_mod( 'custom_cursor_display', 1 ) ) : ?>
			<!-- Custom Cursor -->
			<div class="node" id="node"></div>
			<div class="cursor" id="cursor"></div>
				<?php
			endif; ?>
		</div>
        <!-- End Wrapper -->
	<?php wp_footer(); ?>
    </body>
</html>