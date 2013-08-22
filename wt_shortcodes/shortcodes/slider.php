<?php

/**
 * WellThemes Slider shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Slider
 * - Slider Item
 */


/**
 * SLIDER WRAP
 * ----------------------------------------------------------------
 */
function run_slider_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'slider', 'wt_slider_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_slider_shortcode', 7 );

if (!function_exists('wt_slider_shortcode')) {
	
	function wt_slider_shortcode( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'speed' => '500',
			'delay' => '3000',
			'nav' => 'yes',			
		   ), $atts));
		 
		if ($nav == 'yes'){
			$dots = 'true';
		} else {
			$dots = 'false';
		}
		
		//include the jquery scripts
		wp_enqueue_script('wt_slider');		
		?>
		
		<script>
			jQuery(function($){
				$(document).ready(function(){
					$('.wt-slider').unslider({
						speed: <?php echo $speed; ?>,
						delay: <?php echo $delay; ?>,
						complete: function() {},
						keys: true,
						dots: <?php echo $dots; ?>,
						fluid: true
					});
				});
			});
		</script>

	<?php
		$slider = "<div class='wt-slider'><ul class='wt-slider-holder'>". do_shortcode( $content ) ."</ul></div>";
		return $slider;
		
	}	

	add_shortcode( 'slider', 'wt_slider_shortcode' );

}

/**
 * SLIDER ITEM
 * ----------------------------------------------------------------
 */
function run_slide_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'slide', 'wt_slide_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_slide_shortcode', 7 );

if (!function_exists('wt_slide_shortcode')) {	
	function wt_slide_shortcode( $atts, $content = null ) {	
		extract(shortcode_atts(array(
			'title' => ''
		   ), $atts));
		
		$output = '';
		$output .= "<li class='wt-slider-item' >";
		
		if (!empty($title)){
			$output .= '<h3>'.$title.'</h3>';
		}
		
		$output .= '<p class="desc">'. do_shortcode( $content ).'</p>';
		$output .= '</li>';
		
		return $output;
		
	}

	add_shortcode( 'slide', 'wt_slide_shortcode' );

}