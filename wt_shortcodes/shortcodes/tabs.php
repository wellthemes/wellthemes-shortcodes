<?php

/**
 * WellThemes Tabs shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Tabs
 */


/**
 * TABS
 * ----------------------------------------------------------------
 */
function run_tabs_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'tabs', 'wt_tabs_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_tabs_shortcode', 7 );

if (!function_exists('wt_tabs_shortcode')) {
	
	function wt_tabs_shortcode( $atts, $content = null ) {
		
		//include the jquery scripts
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('wt_tabs');
		
		//get the tab titles
		preg_match_all( '/tab title=\'([^\']+)\'/i', $content, $matches, PREG_OFFSET_CAPTURE );
		$tab_titles = array();
		
		$tab_titles = array();
		
		if( isset($matches[1]) ){ 
			$tab_titles = $matches[1]; 
		}
		
		$output = '';
		
		if( count($tab_titles) ){
		    $output .= '<div class="wt-tabs">';
			$output .= '<ul class="ui-tabs-nav clearfix">';
			foreach( $tab_titles as $tab_title ){
				$output .= '<li><a href="#wt-tab-'. sanitize_title( $tab_title[0] ) .'">' . $tab_title[0] . '</a></li>';
			}
		    $output .= '</ul>';
		    $output .= do_shortcode( $content );
		    $output .= '</div>';
		} else {
			$output .= do_shortcode( $content );
		}	
		
		return $output;
	}	

	add_shortcode( 'tabs', 'wt_tabs_shortcode' );

}

/**
 * SINGLE LIST ITEM
 * ----------------------------------------------------------------
 */
function run_tab_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'tab', 'wt_tab_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_tab_shortcode', 7 );

if (!function_exists('wt_tab_shortcode')) {	
	function wt_tab_shortcode( $atts, $content = null ) {	
		extract(shortcode_atts(array(
			'title' => ''
		   ), $atts));
		
		return '<div id="wt-tab-'. sanitize_title( $title ) .'" class="tab-content">'. do_shortcode( $content ) .'</div>';				
	}

	add_shortcode( 'tab', 'wt_tab_shortcode' );

}