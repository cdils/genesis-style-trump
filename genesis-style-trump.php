<?php
/**
 * Genesis Style Trump
 *
 * Read more about why I created this plugin at http://www.carriedils.com/woocommerce-genesis-important-style/
 *
 * @package 	Genesis_Style_Trump
 * @author 	Carrie Dils
 * @license 	GPL-2.0+
 * @link 	http://www.carriedils.com
 * @copyright 	2013 Carrie Dils
 *
 * Plugin Name:	Genesis Style Trump
 * Plugin URI:		http://wordpress.org/plugins/genesis-style-trump
 * Description:		Loads Genesis child theme style sheet after plugin styles.
 * Version:		1.0.4
 * Author: 		Carrie Dils
 * Author URI: 		https://carriedils.com
 * Text Domain: 	genesis-style-trump
 * License:		GPL-2.0+
 * License URI:		http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:	/languages
 * GitHub Plugin URI:	https://github.com/cdils/genesis-style-trump
 * GitHub Branch:	master
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

add_action( 'genesis_setup', 'genesisstyletrump_load_stylesheet' );
/**
 * Move Genesis child theme style sheet to a much later priority to give any plugins a chance to load first.
 *
 * @since 1.0.0
 */
function genesisstyletrump_load_stylesheet() {

	// Get name of current theme
	$theme = wp_get_theme();

	// Check to see if known themes with parallax scripts are active
	// If so, set an earlier priority ($priority) for the main stylesheet
	// and specify the additional function ($theme_function_that_loads_parallax_elements) to hook to wp_enqueue_scripts
	switch ( $theme ) {

		case 'Parallax Pro Theme':
			$priority = 14;
			$theme_function_that_loads_parallax_elements = 'parallax_css';
			break;

		case 'Altitude Pro Theme':
			$priority = 14;
			$theme_function_that_loads_parallax_elements = 'altitude_css';
			break;

		case 'Cafe Pro Theme':
			$priority = 14;
			$theme_function_that_loads_parallax_elements = 'cafe_css';
			break;

		case 'Foodie Pro Theme':
			$priority = 999;
			$theme_function_that_loads_parallax_elements = 'foodie_pro_add_customizer_styles';
			break;

		default:
			$priority = 999;
			$theme_function_that_loads_parallax_elements = null;

	}

	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
	add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', $priority );

	// If there is an additional function defined, hook it to wp_enqueue_scripts
	if ( ! is_null( $theme_function_that_loads_parallax_elements ) ) {
		add_action( 'wp_enqueue_scripts', $theme_function_that_loads_parallax_elements, $priority );
	}

}
