<?php
/**
 * Genesis Style Trump
 *
 * @package   Genesis_Style_Trump
 * @author    Carrie Dils
 * @license   GPL-2.0+
 * @link      http://www.carriedils.com
 * @copyright 2013 Carrie Dils
 *
 * Plugin Name:       Genesis Style Trump
 * Plugin URI:        http://wordpress.org/plugins/genesis-style-trump
 * Description:       Loads Genesis child theme stylesheet after plugin styles.
 * Version:           1.0.0
 * Author:            Carrie Dils
 * Author URI:        http://www.carriedils.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:	      /languages
 * GitHub Plugin URI: https://github.com/cdils/genesis-style-trump
 * GitHub Branch:     master
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
    die( __( "Sorry, you are not allowed to access this page directly." ) );
}

add_action( 'genesis_setup', 'genesisstyletrump_load_stylesheet' );
/**
*  Move Genesis child theme style sheet to a much later priority to give any plugins a chance to load first.
*
* @since 1.0.0
*/ 
function genesisstyletrump_load_stylesheet() {

	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );
	add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 999 );

}
