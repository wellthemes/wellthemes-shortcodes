<?php
/*  --------------------------------------------------------
	Plugin Name: 	WellThemes Shortcodes
	Version: 		1.0
	Description: 	Adds shortcodes to easily to your theme.
	Author: 		WellThemes Team
	Author URI: 	http://www.wellthemes.com
	Plugin URI: 	http://www.wellthemes.com
	Text Domain: 	wtshortcodes
	License:		GPLv2
	--------------------------------------------------------  */

/**
 * Add the shortcodes editor UI.
 */
if( !class_exists( 'wellthemesShortcodes' ) ){
	require_once( dirname(__FILE__) . '/admin/wellthemes_shortcodes_editor.php');
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
		// Add font-awesome stylesheets (minified version. Remove .min to use the regular one)
		wp_enqueue_style( 'font_awesome_stylesheet', plugin_dir_url( __FILE__ ) . 'css/font-awesome/css/font-awesome.min.css' );

		//Register required scripts
		// wp_register_script( 'wt_tabs', plugin_dir_url( __FILE__ ) . 'js/wt_tabs.js', array ( 'jquery', 'jquery-ui-tabs'), '1.0', true );
		// wp_register_script( 'wt_slider', plugin_dir_url( __FILE__ ) . 'js/unslider.min.js', array ( 'jquery'), '1.0', true );
	}

	add_action( 'wp_enqueue_scripts', 'wellthemes_shortcodes_scripts' );

endif;

function wellthemes_shortcodes_styles() {
	wp_register_style( 'wellthemes_shortcodes_css', plugin_dir_url( __FILE__ ) . 'css/shortcodes.css' );
	wp_enqueue_style( 'wellthemes_shortcodes_css' );
}
add_action( 'wp_enqueue_scripts', 'wellthemes_shortcodes_styles', 100 );

/**
 * Style for the editor of the shortcodes
 */
if( !function_exists ('wt_mce_style') ) :

	function wt_mce_style() {
		wp_register_style('wt_editor', plugin_dir_url( __FILE__ ) . 'css/editor.css');	
		wp_enqueue_style('wt_editor');

		// Add icons array
		wp_enqueue_style('font_awesome_stylesheet', plugin_dir_url( __FILE__ ) . 'css/font-awesome/css/font-awesome.min.css' );
	}

	add_filter( 'admin_head', 'wt_mce_style'  );
	
endif;