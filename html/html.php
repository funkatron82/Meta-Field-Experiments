<?php

abstract class CEDCF_Field_Html {
	public $attributes = array();
	public $classes = array();
	public $settings = array();
	
	function __construct( $settings ) {
		$settings = wp_parse_args( $settings, array( 'attributes' => array(), 'classes' => array() ));
		$this->classes = $this->normalize_classes( $settings['classes'] );
		$this->attributes = $this->normalize_attributes( $settings['attributes']);
		$this->add_actions();
		$this->add_scripts();
	}

	function normalize_attributes( $attributes ) {
		return (array) $attributes;	
	}
	
	function normalize_classes( $classes ) {
		return (array) $classes;	
	}
	
	function print_attributes( $attributes ) {
		$attributes = (array) $attributes;
		
		//Parse attributes
		foreach( $attributes as $key => $value ) {
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
	
	function print_classes( $classes ) {
		return implode( ' ', $classes );
	}

	function show( $name, $id, $value = '' ) {
		echo '';	
	}
	
	function sanitize( $value ) {
		return esc_attr( $value );
	}
	
	function add_actions() {}
	
	function add_scripts() {}
}