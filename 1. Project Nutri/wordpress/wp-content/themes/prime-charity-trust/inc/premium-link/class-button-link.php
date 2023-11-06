<?php

if ( ! defined( 'PRIME_CHARITY_TRUST_URL' ) ) {
    define( 'PRIME_CHARITY_TRUST_URL', esc_url( 'https://www.themeignite.com/products/charitable-trust-wordpress-theme/', 'prime-charity-trust') );
}
if ( ! defined( 'PRIME_CHARITY_TRUST_TEXT' ) ) {
    define( 'PRIME_CHARITY_TRUST_TEXT', __( 'Prime Charity Trust PRO','prime-charity-trust' ));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Prime_Charity_Trust_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/premium-link/button-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Prime_Charity_Trust_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Prime_Charity_Trust_Customize_Section_Pro( $manager,'prime_charity_trust_button_link', array(
			'priority'   => 1,
			'title'    => esc_html( PRIME_CHARITY_TRUST_TEXT, 'prime-charity-trust' ),
			'pro_text' => esc_html__( 'GO PRO', 'prime-charity-trust' ),
			'pro_url'  => esc_url( PRIME_CHARITY_TRUST_URL)
		) )	);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'prime-charity-trust-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/premium-link/assets/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'prime-charity-trust-customize-controls', trailingslashit( get_template_directory_uri() ) . '/inc/premium-link/assets/customize-controls.css' );
	}
}

// Doing this customizer thang!
Prime_Charity_Trust_Customize::get_instance();