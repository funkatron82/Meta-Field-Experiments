<?php
require_once 'text.php';

class CEDCF_Url_Html extends CEDCF_Text_Html {
	function normalize_attributes( $attributes ) {
		$attributes = parent::normalize_attributes( $attributes );
		$attributes['type'] ='url';		
		return $attributes;
	}

	function sanitize( $value ) {
		return esc_url( $value ); 	
	}
	
	function normalize_classes( $classes ) {
		$classes[] = 'cedmf-url';
		return $classes;
	}
}