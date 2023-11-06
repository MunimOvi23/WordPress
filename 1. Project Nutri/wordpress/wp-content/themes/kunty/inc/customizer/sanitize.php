<?php

/**
 * Sanitize Functions.
 */
 
if ( ! function_exists( 'kunty_sanitize_logo' ) ) :
	/**
	 * Sanitize the logo title select option.
	 *
	 * @since 1.0.0	 *
	 * @param string $logo_option.
	 */
	 
	function kunty_sanitize_logo( $logo_option ) {
		if ( ! in_array( $logo_option, array(  'logo-only', 'title-only', 'title-desc', 'title-img' ) ) ) {
			$logo_option = 'logo-only';
		} 
		return $logo_option;
	}
endif;


if ( ! function_exists( 'kunty_sanitize_css' ) ) :
	/**
	 * Sanitize CSS code
	 *
	 * @since 1.0.0	 *
	 * @param $string
	 * @return string
	 */
	function kunty_sanitize_css($string) {
		$string = preg_replace( '@<(script|style)[^>]*?>.*?</\\1>@si', '', $string );
		$string = strip_tags($string);
		return trim( $string );
	}
endif;


if ( ! function_exists( 'kunty_sanitize_checkbox' ) ) :
	/**
	* Sanitize Checkbox
	 *
	 * @since 1.0.0	 
	 *	
	*/
	function kunty_sanitize_checkbox( $input ) {
		if ( $input == 1 ) {
			return true;
		} else {
			return false;
		}
	}
endif; 


if ( ! function_exists( 'kunty_sanitize_select' ) ) :

	/**
		* Sanitize select.
	 *
	 * @since 1.0.0
	 *	
	 */
	function kunty_sanitize_select( $input, $setting ) {

		// Ensure input is a slug.
		$input = sanitize_key( $input );

		// Get list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );

	}

endif;


if ( ! function_exists( 'kunty_dropdown_pages' ) ) :
	/**
	 * Sanitize dropdown pages.
	 *
	 * @since 1.0.0
	 *	
	 */
	function kunty_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	  
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
endif;


if ( ! function_exists( 'kunty_sanitize_html' ) ) :
	/**
	 * HTML sanitization 
	 *
	 * @since 1.0.0
	 * @see wp_filter_post_kses() https://developer.wordpress.org/reference/functions/wp_filter_post_kses/
	 *
	 * @param string $html HTML to sanitize.
	 * @return string Sanitized HTML.
	 */
	function kunty_sanitize_html( $html ) {
		return wp_kses_post( force_balance_tags( $html ) );
	}
endif;


if ( ! function_exists( 'kunty_sanitize_map_iframe' ) ) :
	/**
	 * Google map iframe sanitization
	 *
	 *
	 */
	function kunty_sanitize_map_iframe( $input, $setting ) {
		$allowedtags = array(
			'iframe' => array(
				'src' => array(),
				'width' => array(),
				'height' => array(),
				'frameborder' => array(),
				'style'     => array(),
				'marginwidth' => array(),
				'marginheight' => array(),
			)
		);

		$input = wp_kses( $input, $allowedtags );

		return $input;
	}
endif;




if ( ! function_exists( 'kunty_sanitize_image' ) ) :
	/**
	 * Image sanitization callback example.
	 *
	 * Checks the image's file extension and mime type against a whitelist. If they're allowed,
	 * send back the filename, otherwise, return the setting default.
	 *
	 */
	function kunty_sanitize_image( $image, $setting ) {
		/*
		 * Array of valid image file types.
		 *
		 * The array includes image mime types that are included in wp_get_mime_types()
		 */
		$mimes = array(
			'jpg|jpeg|jpe' => 'image/jpeg',
			'gif'          => 'image/gif',
			'png'          => 'image/png',
			'bmp'          => 'image/bmp',
			'tif|tiff'     => 'image/tiff',
			'ico'          => 'image/x-icon'
		);
		// Return an array with file extension and mime_type.
		$file = wp_check_filetype( $image, $mimes );
		// If $image has a valid mime_type, return it; otherwise, return the default.
		return ( $file['ext'] ? $image : $setting->default );
	}
endif;


if ( ! function_exists( 'kunty_sanitize_number_range' ) ) :
	/**
	 * Number Range sanitization callback example.
	 *
	 * @since 1.0.0	 
	 * - Sanitization: number_range
	 * - Control: number, tel
	 *
	 * Sanitization callback for 'number' or 'tel' type text inputs. This callback sanitizes
	 * `$number` as an absolute integer within a defined min-max range.
	 *
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 *
	 * @param int                  $number  Number to check within the numeric range defined by the setting.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string The number, if it is zero or greater and falls within the defined range; otherwise,
	 *                    the setting default.
	 */
	function kunty_sanitize_number_range( $number, $setting ) {
		// Ensure input is an absolute integer.
		$number = absint( $number );

		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;

		// Get minimum number in the range.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

		// Get maximum number in the range.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

		// Get step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

		// If the number is within the valid range, return it; otherwise, return the default
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}
endif;


if ( ! function_exists( 'kunty_sanitize_sort' ) ) :
	/**
	 * Sanitize sort
	 *
	 * @since 1.0.0
	 *	
	 */
	function kunty_sanitize_sort($value) {
		if (is_array($value)) {
			foreach ($value as $key => $subvalue) {
				$value[$key] = esc_attr($subvalue);
			}
			return $value;
		}
		return esc_attr($value);
	}
endif;


if ( ! function_exists( 'kunty_sanitize_choices' ) ) :
	/**
	 * Sanitize choices.
	 *
	 * @since 1.0.0
	 *	
	 */
	function kunty_sanitize_choices( $input, $setting ) {
		global $wp_customize; 
		$control = $wp_customize->get_control( $setting->id ); 
		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
	
endif;




