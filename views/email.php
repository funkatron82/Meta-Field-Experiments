<?php
require_once 'text.php';

class CEDCF_Email_View extends CEDCF_Text_View {
	public $type = 'url';
	
	function normalize( $settings ) {
		parent::normalize( $settings );
		$this->classes[] = 'cedcf-email';
	}
	
	function sanitize( $value ) {
		return sanitize_email( $value ); 	
	}
}