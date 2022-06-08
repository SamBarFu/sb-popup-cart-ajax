<?php
/**
 * @package sb-popup-cart-ajax
 *
 * Plugin Name: Popup cart ajax
 * Description: popup to add cart ajax
 * Version: 1.0.0
 * Author: sambar
 * Author URI: 
 * License: GPLv2 or later
 * Text Domain: sbpca
*/

// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Check if WooCommerce is active
if (!in_array( 'woocommerce/woocommerce.php',apply_filters('active_plugins', get_option( 'active_plugins' )))) {
    die;
}

define('PLUGIN_PREFIX_SBCPA', 'sbpca');
define('PLUGIN_URL_SBCPA', plugin_dir_url(__FILE__));
define('PLUGIN_PATH_SBCPA', plugin_dir_path(__FILE__));
define('THEME_TEMPLATE_URL_SBCPA', 'templates');


/**
* plugin initialization 
*/
require plugin_dir_path(__FILE__) . '/inc/SBPopupCartAjax.php';

function run_sb_popup_cart_ajax(){
    $SBPopupCartAjax = new SBPopupCartAjax();
    //require plugin_dir_path(__FILE__) . '/inc/shortcode_sb_filter_ajax.php';

}
run_sb_popup_cart_ajax();