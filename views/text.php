<?php
require_once 'input.php';

class CEDCF_Text_View extends CEDCF_Input_View {
	public $type = 'text';
	
	function normalize( $settings ) {
		$this->settings = wp_parse_args( $this->settings, array(
			'size'        => 30,
			'placeholder' => '',
		) );
		
		parent::normalize( $settings );
	}
	
	function get_filter() {
		return parent::get_filter() + array( 'pattern', 'size', 'maxlength', 'minlength', 'placeholder' );
	}
}