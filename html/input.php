<?php
require_once 'html.php';

class CEDCF_Input_Html extends CEDCF_Field_Html {
	function normalize_attributes( $attributes ) {
		$attributes = wp_parse_args( $attributes, array(
			'size'			=> 30,
			'placeholder' 	=> '',
		) );
		
		return $attributes;
	}
	
	function show( $name = '', $id = '', $value = NULL ){
		$template = '<input %s >';
		$attributes = $this->attributes;
		$attributes['class'] = $this->print_classes( $this->classes );
		$attributes['name'] = $name;
		$attributes['id'] = $id;
		$attributes['value'] = $value;
		printf( $template, $this->print_attributes( $attributes ) );
	}
}