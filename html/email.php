<?php
require_once 'text.php';

class CEDCF_Email_Html extends CEDCF_Text_Html {
	function normalize_attributes( $attributes ) {
		$attributes = parent::normalize_attributes( $attributes );
		$attributes['type'] ='email';			
		return $attributes;	
	}
	
	function sanitize( $value ) {
		return sanitize_email( $value ); 	
	}
	
	function normalize_classes( $classes ) {
		$classes[] = 'cedmf-email';
		return $classes;
	}
}