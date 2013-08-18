<?php

/**
 * WellThemes Query shortcodes.
 * ---------------------------------------------------------------
 * Custom queries for the user, so he doesn`t have to write them alone.
 * 
 * List of the shortcodes in this file:
 * - Recent Posts
 * - List Authors
 *
 */

/**
 * RECENT POSTS
 * ----------------------------------------------------------------
 *
 * @uses  wp_get_recent_posts() Retrieve the most recent posts.
 * @param array $atts Shortcode attributes
 * @return string Output html as list
 */
if( ! function_exists( 'wellthemes_get_recent_posts_list' ) ) {
	add_shortcode( 'recent_posts', 'wellthemes_get_recent_posts_list' );

	function wellthemes_get_recent_posts_list( $atts ){
		extract( shortcode_atts( array(
			'title' 	=> 	'Recent Posts',
			'limit' 	=> 	"5",
			'order' 	=> 	'DESC',
			'orderby' 	=> 	'post_date',
			'category'	=>	'0'
		), $atts ) );

		$args = array(
			'numberposts' 	=> $limit,
			'order'			=> $order,
			'orderby'		=> $orderby,
			'category'		=> $category
		);

		$recent_posts = wp_get_recent_posts( $args );

		$heading = "<h2 class='wellthemes-recent-posts'>";
		$heading .= $title;
		$heading .= "</h2>"; 

		// Create the list of posts
		$list = "<ul>";
		foreach( $recent_posts as $post ) 
			$list .= "<li><a href='". get_permalink( $recent["ID"] ) ."'>". $post["post_title"] ."</a></li>";
		$list .= "</ul>";

		return $heading.$list;
	}

}

/**
 * LIST AUTHORS
 * ----------------------------------------------------------------
 * 
 * @param array $atts Shortcode attributes
 * @return string Output html as list
 */
add_shortcode('print_authors', 'wt_authors');
if( ! function_exists( 'wt_authors' ) ) {

	function wt_authors( $atts ) {
		extract( shortcode_atts( array(
				"display_posts" => true,
				"exclude_admin" => false,
				"show_fullname" => true,
				"hide_empty" 	=> false,
			), $atts ) );

		$list = list_authors($display_posts, $exclude_admin, $show_fullname, $hide_empty);
		return "<div class='author-list'>" . $list . "</div>";
	}

}