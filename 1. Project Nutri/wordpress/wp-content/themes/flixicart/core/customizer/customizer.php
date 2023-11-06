<?php
/**
 * FlixiCart Theme Customizer.
 *
 * @package FlixiCart
 */
// customizer settings.
function flixicart_customizer_settings()
{

	$settings = array(
		'general',
	);

	foreach ($settings as $setting)
	{
		$feature_file = get_theme_file_path('/core/customizer/flixicart-' . $setting . '.php');
		require $feature_file;
	}
	require get_stylesheet_directory() . '/core/customizer/custom-controls/customize-upgrade-control.php';
}
add_action('after_setup_theme','flixicart_customizer_settings');