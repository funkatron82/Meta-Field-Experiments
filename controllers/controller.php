<?php

abstract class CEDCF_Field_Controller {	
	public $name;
	public $html;
	public $settings;
	
	function __construct( $settings ) {
		$this->name = $settings['name'];
		$this->settings = $this->normalize( $settings );
		$this->html = $this->get_html( $settings );
	}
	
	function set_data( $value ) {
		
	}
	
	function get_data() {
		return '';
	}
	
	function save() {
		$new = $_REQUEST[ $this->name ];
		$new = $this->sanitize( $new );	
		$this->set_data( $new );	
	}
	
	function is_saved( $data ) {
		return ( $data !== array() && $data !== '' );	
	}
	
	function sanitize( $value ) {
		$value = $this->is_saved( $value ) ? $value : $this->settings['default'];
		$value = ( $this->settings['cloneable'] || $this->settings['multiple'] ) ? array_map( array( $this->html, 'sanitize' ), ( array ) $value ) :  $this->html->sanitize( $value ) ;		
		return $value;	
	}
	
	function normalize( $settings ) {
		$settings = wp_parse_args( $settings, array(
			'multiple'      => false,
			'clone'         => false,
			'default'       => '',
		) );
		
		return $settings;
	}
	
	function get_html( $settings ) {
		if( ! isset( $settings['type'] ) )
			return false;
		$type = str_replace( '_', ' ', $settings['type'] );
		$class = 'CEDCF_' . ucwords( $type ) . '_Html';
		
		return new $class( $settings );
	}
	
	function show() {
		$value = $this->get_data();
		if( $this->settings['cloneable'] ) {
			
		} else {
			$name = $this->name;
			$name .= $this->settings['multiple'] ? '[]' : '';
			$this->html->show( $name, $name, $value );	
		}
	}
}