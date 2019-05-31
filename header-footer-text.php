<?php
/**
 * Plugin Name: Header/Footer Text
 * Plugin URI:  https://github.com/tobiasvogel/header-footer-text
 * Description: Allow changing of the theme header/footer text easily from the dashboard
 * Author:      Tobias X Vogel
 * Author URI:  https://github.com/tobiasvogel
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 * Version:     1.0.0
 * Text Domain: header-footer-text
 * Domain Path: /languages
 */

/**
 * Administration
 */
require plugin_dir_path( __FILE__ ) . 'includes/admin.php';

/**
 * Shortcodes
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-shortcodes.php';
$GLOBALS['header_footer_text_shortcodes'] = new Header_Footer_Text_Shortcodes();

/**
 * Template Tags
 */
require plugin_dir_path( __FILE__ ) . 'includes/template-tags.php';

/**
 * Load the plugin textdomain
 */
function load_header_footer_text_textdomain() {
	load_plugin_textdomain( 'header-footer-text', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'plugins_loaded', 'load_header_footer_text_textdomain' );
