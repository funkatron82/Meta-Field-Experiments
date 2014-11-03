<?php
require_once 'text.php';

class CEDCF_Url_View extends CEDCF_Text_View {
	public $type = 'password';
	
	function normalize( $settings ) {
		parent::normalize( $settings );
		$this->classes[] = 'cedcf-password';
	}
}