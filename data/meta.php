<?php

class CEDCF_Meta_Data extends CEDCF_Field_Data {
	public $post_id;
	
	function __construct( $settings) {
		if ( empty( $settings['post_id'] ) && ! is_numeric( $settings['post_id'] ) )
			return;
		$this->post_id = (int) $settings['post_id'];
		parent::__construct( $settings );
	}
	
	function get() {
		$data = $meta = get_post_meta( $this->post_id, $this->id, ! $this->settings['multiple'] );
		return $this->sanitize( $data );	
	}
	
	function set( $data ) {
		
	}
}