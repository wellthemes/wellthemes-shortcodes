<?php

/**
 * WellThemes Elements shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Searchform
 */

/**
 * SEARCHFORM
 * ----------------------------------------------------------------
 * Print search form on the screen.
 */
if (!function_exists('wt_searchform')) {

	function wt_searchform( $atts ) {

		extract(shortcode_atts(array(
			'button_text' 	=> 'Search',
		), $atts));

		// The custom search form
		$output =  	"<div class='wt_searchform'>";
		$output .= 		get_search_form( $echo );
		$output .= 	"</div>";

		return $output;

	}
	
	add_shortcode('search', 'wt_searchform');
	
}

/**
 * Data Toggles Holder
 * ----------------------------------------------------------------
 * This is the outer part. Inside will be the single toggle windows.
 */
if (!function_exists('wt_data_toggle')) {

	function wt_data_toggle( $atts, $content = NULL ) {

		$content = strip_tags( $content, '<br>' );

		// The custom search form
		$output =  	"<div class='panel-group'>";
		$output .= 		do_shortcode( $content );
		$output .= 	"</div>";

		return $output;

	}
	
	add_shortcode('data_toggle', 'wt_data_toggle');
	
}

/**
 * Data Toggles Elements
 * ----------------------------------------------------------------
 * The toggle elements them self.
 */
if (!function_exists('wt_data_toggle_inner')) {

	function wt_data_toggle_inner( $atts, $content = NULL ) {

		extract(shortcode_atts(array(
			'default' 	=> 'false',
		), $atts)); 

		return $output;
	}
	
	add_shortcode('dt_inner', 'wt_data_toggle_inner');

}