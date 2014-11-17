<?php
require_once 'input.php';

class CEDCF_Text_Html extends CEDCF_Input_Html {
	public $type = 'text';
	function normalize_attributes( $attributes ) {
		$attributes['type'] ='text';		
		return parent::normalize_attributes( $attributes );
	}
}