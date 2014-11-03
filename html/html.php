<?php

abstract class CEDCF_Field_Html {
	public $attributes = array();
	public $classes = array();
	public $type = '';
	public $settings = array();
	public $options = array();
	
	function __construct( $settings ) {
		$this->classes[] = 'cedcf-field';
		$this->classes[] = 'cedcf-' . $this->type;
		$this->settings = $this->normalize( $settings );
		$this->attributes = $this->filter_attributes();
		$this->options = $this->process_options();
		$this->add_actions();
		$this->add_scripts();
	}
	
	function normalize( $settings ) {
		return  wp_parse_args( $settings, array(
			'options' => array()	
		) );
	}
	
	function filter_attributes() {
		return array_intersect_key( $this->settings, array_flip( $this->get_filter() ) );
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
		return array( 'required', 'disabled' );
	}
	
	function process_options() {
		if( empty( $this->settings['options'] ) ) {
			return;
		}
		
		$options = array();
		
		foreach( $this->settings['options'] as $key => $option ) {
			if( ! is_array( $option ) || empty( $option['value'] ) )	
				continue;
			$option['value'] = $this->sanitize( $option['value'] );
			$options[$key] = $option;
		}
		
		return $options;
	}
	
	function walk_options() {
		return '';	
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