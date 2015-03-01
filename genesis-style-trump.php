<?php
/**
 * Genesis Style Trump
 *
 * Read more about why I created this plugin at http://www.carriedils.com/woocommerce-genesis-important-style/
 *
 * @package           Genesis_Style_Trump
 * @author            Carrie Dils
 * @license           GPL-2.0+
 * @link              http://www.carriedils.com
 * @copyright         2013 Carrie Dils
 *
 * Plugin Name:       Genesis Style Trump
 * Plugin URI:        http://wordpress.org/plugins/genesis-style-trump
 * Description:       Loads Genesis child theme style sheet after plugin styles.
 * Version:           1.0.1
 * Author:            Carrie Dils
 * Author URI:        http://www.carriedils.com
 * Text Domain:       genesis-style-trump
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/cdils/genesis-style-trump
 * GitHub Branch:     master
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

	// First find out the theme to limit calls to wp_get_theme
	$theme = wp_get_theme(); 

	// In all cases we will remove the stylesheet first
	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

	// If Parallax Pro theme is active, enqueue Genesis Style Trump at earlier priority
	if ( $theme == 'Parallax Pro Theme' ) { 
		add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 14 );
	}
	else if ( $theme == 'Altitude Pro Theme' ) { 
		// enquque main stylesheet 
		add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 15 );
		// enqueue altitude speficif css for background and whatnot
		add_action( 'wp_enqueue_scripts', 'altitude_css', 16 );
	}
	else { 
		add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 999 );
	}
}
