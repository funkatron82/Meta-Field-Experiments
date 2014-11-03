<?php

abstract class CEDCF_Field_Data {
	public $id;
	public $settings;
	public $view;
	
	function __construct( $settings ) {
		$this->settings = $this->normalize( $settings );
		$this->view = $this->get_view( $settings ); 
	}
	
	function save() {
		$id = $this->id;
		$data =  isset( $_POST[$id] ) ? $_POST[$id] : '';
		$this->set( $data );
	}
	
	function set( $data ) {
		
	}
	
	function get() {
		return '';
	}
	
	function sanitize( $data ) {
		$data = $this->is_saved( $data ) ? $data : $this->settings['default'];
		$data = ( $this->settings['cloneable'] ) ? array_map( array( $this->view, 'sanitize' ), ( array ) $data ) :  $this->view->sanitize( $data ) ;		
		return $data;	
	}
	
	function show() {
		$value = $this->get();		
	}
	
	function is_saved( $data ) {
		return ( $data !== array() && $data !== '' );	
	}
	
	function get_view( $settings ) {
		if( ! isset( $settings['type'] ) )
			return false;
		$type = str_replace( '_', ' ', $settings['type'] );
		$class = 'CEDCF_' . ucwords( $type ) . '_Html';
		
		return new $class( $settings );
	}
	
	function normalize( $settings ) {
		$this->id = sanitize_title( $settings['id'] );
		$settings = wp_parse_args( $settings, array(
			'multiple'      => false,
			'clone'         => false,
			'default'       => '',
		) );
		
		return $settings;
	}
	
	function get_name() {
		
	}
	
}