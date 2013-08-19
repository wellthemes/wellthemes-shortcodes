<?php

/**
 * WellThemes Typography shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Column Shortcode
 * - Message Box
 * - Lists
 * - Single List Item
 * - Buttons
 * - Highlight
 * - Dropcaps
 */


/**
 * COLUMN SHORTCODE
 * ----------------------------------------------------------------
 */
if (!function_exists('wellthemes_column_shortcode')) {

	function wellthemes_column_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'size' => '',
			'last' => 'no',
		), $atts));

		$class1 = 'wellthemes-column';		
		if ($size != ''){
			$class1  = 'wellthemes-column-'.$size;
		}
		
		$class2 = '';
		if ($last == 'yes'){
			$class2  = ' wellthemes-column-last';
		}
		
		$class = $class1.$class2;
		
		$content = do_shortcode($content);
		$column = '<div class="'.$class.'">'.$content.'</div>';
		
		return $column;
	}
	
	add_shortcode('column', 'wellthemes_column_shortcode');

}

/**
 * MESSAGE BOX
 * ----------------------------------------------------------------
 */
add_shortcode( 'box', 'wellthemes_msgbox_shortcode' );

function run_box_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'box', 'wellthemes_msgbox_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_box_shortcode', 7 );

if (!function_exists('wellthemes_msgbox_shortcode')) {

	function wellthemes_msgbox_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => '',
			'width' => '',
			'custom_icon' => ''
		), $atts));

		$class = 'wellthemes-msgbox msgbox-'.$style;

		if( isset($custom_icon) ) {

			// Remove styling from the box if there is custom icon.
			$class .= ' has-icon';

			// Add the $custom icon tag.
			$custom_icon = "<i class='icon-". $custom_icon ."'></i>";

			// Prepend the icon to the content.
			$content = $custom_icon . $content;
		}


		$cssstyle = '';
		if ($width){ 
			$cssstyle = 'style="width:'.$width.'"';
		}

		$box = '<div class="'.$class.'" '.$cssstyle.'>'.do_shortcode( $content ).'</div>';
		return $box;
	}
}

/**
 * LISTS
 * ----------------------------------------------------------------
 */
add_shortcode( 'list', 'wellthemes_list_shortcode' );
function run_list_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'list', 'wellthemes_list_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_list_shortcode', 7 );

if (!function_exists('wellthemes_list_shortcode')) {
	function wellthemes_list_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => '',
		   ), $atts));
	   
		$class = 'wellthemes-list ';
		$class .= 'wellthemes-list-';
		$class .= $style; 
		
		$list = '<ul class="'.$class.'">'.$content.'</ul>';
		return $list;
	}	
}

/**
 * SINGLE LIST ITEM
 * ----------------------------------------------------------------
 */
add_shortcode( 'list_item', 'wellthemes_list_item_shortcode' );
function run_list_item_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'list_item', 'wellthemes_list_item_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_list_item_shortcode', 7 );

if (!function_exists('wellthemes_list_item_shortcode')) {	
	function wellthemes_list_item_shortcode( $atts, $content = null ) {	
		return '<li>' . $content . '</li>';		
	}
}

/**
 * BUTTONS
 * ----------------------------------------------------------------
 */
add_shortcode( 'button', 'wellthemes_button_shortcode' );
function run_button_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'button', 'wellthemes_button_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_button_shortcode', 7 );

if (!function_exists('wellthemes_button_shortcode')) {

	function wellthemes_button_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'id' 		=> '',
			'title'		=> '',			
			'url'		=> '#',
			'target'	=> '',
			'style'		=> '',
			'size'      => '',
			
		), $atts));
		
		// variable setup
		$title = ($title) ? ' title="'.$title .'"' : '';
		$id = ($id) ? ' id="'.$id .'"' : '';
		
		if ($style){ $style = $style; } else { $style = 'default'; }
		if ($size){ $size = $size; } else { $size = 'medium'; }
		
		$class = 'wellthemes-button ';
		$class .= 'wellthemes-button-';
		$class .= $style; 
		
		$class .= ' wellthemes-button-';
		$class .= $size;
		
		// target setup
		if		($target == 'blank' || $target == '_blank' || $target == 'new' ) { $target = ' target="_blank"'; }
		elseif	($target == 'parent')	{ $target = ' target="_parent"'; }
		elseif	($target == 'self')		{ $target = ' target="_self"'; }
		elseif	($target == 'top')		{ $target = ' target="_top"'; }
		else	{$target = '';}
		
		$button = '<a' .$target .$title. '  ' .$id. ' class="' .$class.'" href="' .$url. '"><i class="icon-twitter icon-3x"></i>' .$content. '</a>';
		
		return $button;
	}	
}

/**
 * HIGHLIGHT
 * ----------------------------------------------------------------
 */
add_shortcode( 'highlight', 'wellthemes_highlight_shortcode' );
function run_highlight_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'highlight', 'wellthemes_highlight_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_highlight_shortcode', 7 );

if (!function_exists('wellthemes_highlight_shortcode')) {

	function wellthemes_highlight_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => '',
		   ), $atts));
	   
		$class = 'wellthemes-highlight ';
		$class .= 'wellthemes-highlight-';
		$class .= $style; 

		$highlight = '<span class="'.$class.'">'.$content.'</span>';
		return $highlight;
	}
}

/**
 * DROPCAPS
 * ----------------------------------------------------------------
 */
if (!function_exists('wellthemes_dropcap_shortcode')) {

	function wellthemes_dropcap_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => 'default',
		   ), $atts));
	   
		$class  = 'wellthemes-dropcap-';
		$class .= $style; 
		
		$content = do_shortcode($content);
		$dropcap = '<span class="'.$class.'">'.$content.'</span>';
		
		return $dropcap;
	}
	
	add_shortcode('dropcap', 'wellthemes_dropcap_shortcode');

}