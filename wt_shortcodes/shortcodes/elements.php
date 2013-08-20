<?php

/**
 * WellThemes Elements shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Searchform
 */

/**
 * RECENT POSTS
 * ----------------------------------------------------------------
 * Print search form on the screen.
 */
if (!function_exists('wt_searchform')) {

	function wt_searchform( $atts ) {

 	    extract(shortcode_atts(array(
	   		'default'		=> 'true',
	   		'button-text' 	=> 'Search',
	   	), $atts));

 	    // The custom search form
 	    $output =  "<form role='search' id='wt_searchform'>";
 	    $output .= "</form>";


		return $output;
	}
	
	add_shortcode('search', 'wt_searchform');
}