<?php
require_once 'text.php';

class CEDCF_Url_Html extends CEDCF_Text_Html {
	public $type = 'url';

	function sanitize( $value ) {
		return esc_url( $value ); 	
	}
}