<?php

// Help functions
require_once( dirname(__FILE__) . '/helpers.php');

/** 
 * Validates string to HEX color. The input can be
 * eighter #FFFFFF or FFFFFF else the return value
 * is the parameter given.
 *
 * @param string &$str The input string
 * @param string $default If the color is '', make it default.
 */
if( ! function_exists('wt_toHEX') ) {

	function wt_toHEX( &$str, $default = '#000000' ) {

		// If the string is empty, return black color.
		if( $str === '' ) {
			$str = $default;
		}

		if( preg_match('/^[a-f0-9]{6}$/i', $str) OR preg_match('/^[a-f0-9]{3}$/i', $str)) {

			// The string is not valid, it only needs hastag.
			$str = '#' . $str;
		}

	}

}

/**
 * Check if a string is valid HEX color.
 *
 * @param string $str The HEX input
 * @return bool Is the string HEX type.
 */
if( ! function_exists('wt_isHEX') ) {

	function wt_isHEX( $str ) {

		// Check if the input string is valid HEX color.
		if( preg_match('/^#[a-f0-9]{6}$/i', $str) OR preg_match('/^#[a-f0-9]{3}$/i', $str) ) {

			// It is, so we return true.
			return TRUE;
		} 

		// Check for no hastag too.
		if( preg_match('/^[a-f0-9]{6}$/i', $str) OR preg_match('/^[a-f0-9]{3}$/i', $str) ) {

			// It is, so we return true.
			return TRUE;
		} 

		return FALSE;

	}

}

/**
 * Generate random string
 *
 * @return string 
 */

if( ! function_exists('wt_random_string') ) {

	function wt_random_string( $length = 6 ) {

		$str = "";
		$characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
		$max = count($characters) - 1;

		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}

		return $str;
		
	}

}