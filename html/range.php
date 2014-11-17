<?php
require_once 'number.php';

class CEDCF_Range_Html extends CEDCF_Number_Html {
	public $type = 'range';
	function normalize_attributes( $attributes ) {
		$atributes = parent::normalize_attributes( $attributes );
		$attributes['type'] = 'range';
		return $attributes;
	}
}