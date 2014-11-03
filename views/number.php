<?php
require_once 'input.php';

class CEDCF_Number_Html extends CEDCF_Input_Html {
	public $type = 'number';
	
	function normalize( $settings ) {
		//Defaults
		$settings = wp_parse_args( $settings, array(
			'step' => 1,
			'min' => 0,
			'max' => 10
		) );
		
		return parent::normalize( $settings );
	}
	
	function get_filter() {
		return parent::get_filter() + array( 'min', 'max', 'step' );
	}
}