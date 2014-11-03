<?php
require_once 'field.php';

class CEDCF_Input_View extends CEDCF_Field_View {
	public $type;
	
	function normalize( $settings ) {
		parent::normalize( $settings );
		$this->attributes['type'] = $this->type;
	}
	
	function get_filter() {
		return parent::get_filter() + array( 'accesskey', 'tabindex', 'autofocus' );
	}
	
	function render( $name, $id, $value ) {
		return sprintf( '<input name="%s" id="%s" value="%s" %s />',
			$name,
			$id,
			$value,
			$this->get_attributes()
		);	
	}
}