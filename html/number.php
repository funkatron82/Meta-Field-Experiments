<?php
require_once 'input.php';

class CEDCF_Number_Html extends CEDCF_Input_Html {
	public $type = 'number';
	function normalize_attributes( $attributes ) {
		$attributes = wp_parse_args( $attributes, array(
			'step' => 1,
			'min' => 0,
			'max' => 10
		) );
		$atributes = parent::normalize_attributes( $attributes );
		$attributes['type'] = 'number';
		return $attributes;
	}
	
	function  sanitize( $value ) {
		return filter_var( $value, FILTER_SANITIZE_NUMBER_FLOAT );
	}
}