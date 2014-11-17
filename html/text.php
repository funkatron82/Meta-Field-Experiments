<?php
require_once 'input.php';

class CEDCF_Text_Html extends CEDCF_Input_Html {
	function normalize_attributes( $attributes ) {
		$attributes['type'] ='text';		
		return parent::normalize_attributes( $attributes );
	}
	
	function normalize_classes( $classes ) {
		$classes[] = 'cedmf-text';
		return $classes;
	}
}