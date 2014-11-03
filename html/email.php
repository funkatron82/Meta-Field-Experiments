<?php
require_once 'text.php';

class CEDCF_Email_Html extends CEDCF_Text_Html {
	public $type = 'email';

	function sanitize( $value ) {
		return sanitize_email( $value ); 	
	}
}