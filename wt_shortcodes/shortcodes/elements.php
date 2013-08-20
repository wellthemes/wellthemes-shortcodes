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