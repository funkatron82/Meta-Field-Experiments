<?php

abstract class CEDCF_Field_View {
	public $attributes = array();
	public $classes = array();
	
	function __construct( $settings, $options = array() ) {
		$this->normalize( $settings );
		$this->add_actions();
		$this->add_scripts();
	}
	
	function normalize( $settings ) {
		$this->classes[] = 'cedcf-field';
		$this->attributes = array_intersect_key( $settings, array_flip( $this->get_filter() ) );
	}
	
	function get_attributes() {
		$attr = array();

		//Classes
		$this->attributes['class'] = implode( ' ', $this->classes );
		
		//Parse attributes
		foreach( $this->attributes as $key => $value ) {
			if( $value === false || is_null( $value ) ) {
				continue;	
			}
			
			if( $value === true ) {
				$attr[] = $key;	
			} else {
				if( is_string( $value ) ) {
					$value = esc_attr( $value );
				}
				$attr[] = sprintf( '%s="%s"', $key, $value );	
			}
		}
		return implode( ' ', $attr );
	}
	
	function get_filter() {
		return 	array( 'required', 'disabled' );
	}
	
	function render( $name, $id, $value ) {
		return '';	
	}
	
	function sanitize( $value ) {
		return esc_attr( $value );
	}
	
	function add_actions() {}
	
	function add_scripts() {}
}