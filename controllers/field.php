<?php

abstract class CEDCF_Field {
	public $id;
	public $settings;
	public $view;
	
	function __construct( $settings ) {
		$this->view = $this->get_view( $settings ); 
		$this->normalize( $settings );
	}
	
	function save() {
		$id = $this->id;
		$data =  isset( $_POST[$id] ) ? $_POST[$id] : '';
		$this->set( $data );
	}
	
	function set( $data ) {
		
	}
	
	function get() {
		
	}
	
	function show() {
		$value = $this->get();
		$value = $this->is_saved( $value ) ? $value : $this->settings['default'];
		$value = ( $this->settings['multiple'] || $this->settings['cloneable'] ) ? ( array ) $value : $value ;	
		$value = is_array( $value ) ? array_map( array( $this->view, 'sanitize' ), $value ) : $this->view->sanitize( $value );
	}
	
	function is_saved( $data ) {
		return ( $data !== array() && $data !== '' );	
	}
	
	function get_view( $settings ) {
		if( ! isset( $settings['type'] ) )
			return false;
		$type = str_replace( '_', ' ', $settings['type'] );
		$class = 'CEDCF_' . ucwords( $type ) . '_View';
		
		return new $class( $settings );
	}
	
	function normalize( $settings ) {
		$this->id = sanitize_title( $settings['id'] );
		$this->settings = wp_parse_args( $settings, array(
			'multiple'      => false,
			'clone'         => false,
			'default'       => '',
		) );
	}
}