<?php
/*
	Plugin Name: 	WellThemes Shortcodes
	Version: 		1.0.1
	Description: 	Adds shortcodes to easily to your theme.
	Author: 		WellThemes Team
	Author URI: 	http://www.wellthemes.com
	Plugin URI: 	http://www.wellthemes.com
	Text Domain: 	wtshortcodes
	License:		GPLv2
	--------------------------------------------------------
*/

/**
 * Add the shortcodes editor UI.
 */
if( !class_exists( 'wellthemesShortcodes' ) ){
	require_once( dirname(__FILE__) . '/editor/wellthemes_shortcodes_editor.php');
}

/**
 * Load shortcodes. They are separated in diferent files acording the 
 * functionality and type of shortcodes.
 *
 * The file shortcode-functions.php will load the shortcodes.
 */
require_once( dirname(__FILE__) . '/shortcode-functions.php');


/**
 * Enqueue scripts and styles for the shortcodes plugin.
 */
if( !function_exists ('wellthemes_shortcodes_scripts') ) :
	function wellthemes_shortcodes_scripts() {
		wp_enqueue_style('wellthemes_shortcodes_css', plugin_dir_url( __FILE__ ) . 'css/font-awesome/css/font-awesome.css');		
		wp_enqueue_style('wellthemes_shortcodes_css', plugin_dir_url( __FILE__ ) . 'css/wellthemes_shortcodes_styles.css');		
	}
	add_action('wp_enqueue_scripts', 'wellthemes_shortcodes_scripts');
endif;