<?php
require_once 'input.php';

class CEDCF_Text_Html extends CEDCF_Input_Html {
	public $type = 'text';
	
	function normalize( $settings ) {
		$settings = wp_parse_args( $settings, array(
			'size'        => 30,
			'placeholder' => '',
		) );
		
		return parent::normalize( $settings );
	}
	
	function get_filter() {
		return array_merge( parent::get_filter(),  array( 'pattern', 'size', 'maxlength', 'minlength', 'placeholder' ) );
	}
}