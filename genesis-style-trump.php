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
 * Plugin URI:        @TODO
 * Description:       Loads Genesis child theme stylesheet after plugin styles.
 * Version:           0.1.0
 * Author:            Carrie Dils
 * Author URI:        http://www.carriedils.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * GitHub Plugin URI: https://github.com/cdils/genesis-style-trump
 */

// If this file is called directly, abort.
if ( !defined( 'ABSPATH' ) ) {
    die( __("Sorry, you are not allowed to access this page directly.") );
}

register_activation_hook( __FILE__, 'genesisstyletrump_activation' );
/**
* This function runs on plugin activation. It checks to make sure Genesis
* or a Genesis child theme is active. If not, it deactivates itself.
*
* @since 0.1.0
*/
function genesisstyletrump_activation() {

        if ( ! defined( 'PARENT_THEME_VERSION' ) || ! version_compare( PARENT_THEME_VERSION, '2.0.0', '>=' ) )
                genesisstyletrump_deactivate( '2.0.0', '3.6' );

}

/**
* Deactivate Genesis Style Trump.
*
* This function deactivates Genesis Style Trump.
*
* @since 0.1.0
*/
function genesisstyletrump_deactivate( $genesis_version = '2.0.0', $wp_version = '3.8' ) {
        
        deactivate_plugins( plugin_basename( __FILE__ ) );
        wp_die( sprintf( __( 'Sorry, you cannot run Genesis Style Trump without WordPress %s and <a href="%s">Genesis %s</a>, or greater.', 'genesisstyletrump' ), $wp_version, 'http://my.studiopress.com/themes/genesis/', $genesis_version ) );
        
}

add_action( 'genesis_setup', 'genesisstyletrump_load_stylesheet' );
/**
* Hook into Genesis when during setup and remove Genesis child theme style sheet
*
* @uses  genesis_meta  <genesis/lib/css/load-styles.php>
* @since 0.1.0
*/ 
function genesisstyletrump_load_stylesheet() {

	remove_action( 'genesis_meta', 'genesis_load_stylesheet' );

}

add_action( 'wp_enqueue_scripts', 'genesis_enqueue_main_stylesheet', 999 );
/**
* Enqueue Genesis child theme style sheet at higher priority
* to give any plugin stylesheets a chance to load first
*
* @uses wp_enqueue_scripts <http://codex.wordpress.org/Function_Reference/wp_enqueue_style>
* @since 1.0.0
*/
