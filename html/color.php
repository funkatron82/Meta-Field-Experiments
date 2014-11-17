<?php
require_once 'text.php';

class CEDCF_Color_Html extends CEDCF_Text_Html {
	function add_scripts() {
		//Enqueue script	
		wp_enqueue_script( 'cedcf-color', CEDCF_URL . 'js/color.js', array( 'wp-color-picker' ));		
		wp_enqueue_style( 'wp-color-picker' );
	}
	
	function normalize_attributes( $attributes ) {
		$attributes = wp_parse_args( $attributes, array(
			'size'        => 7,
			'pattern' => '^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$'
		) );
		
		return parent::normalize_attributes( $attributes );
	}
	
	function sanitize( $value ) {
		// 3 or 6 hex digits, or the empty string.
		if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $value ) ) {
			return $value;
		}
	
		return '#';
	}
	
	function normalize_classes( $classes ) {
		$classes[] = 'cedmf-color';
		return $classes;
	}
}