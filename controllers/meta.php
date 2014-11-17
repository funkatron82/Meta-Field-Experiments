<?php
require_once 'controller.php';
class CEDCF_Meta_Controller extends CEDCF_Field_Controller {
	public $post_id;
	function __construct( $settings ) {
		if( !$settings['post_id'] ) {
			$post = get_post();
			$settings['post_id'] = $post->ID;	
		}
		$this->post_id = $settings['post_id'];
		parent::__construct( $settings );
	}
	
	function set_data( $value ) {
		delete_post_meta( $this->post_id, $this->name );

		if( $this->settings['cloneable'] ) {
			foreach( (array) $value as $v )	 {
				add_post_meta( $this->post_id, $this->name, $v, false );	
			}
		} else {
			add_post_meta( $this->post_id, $this->name, $value, true );	
		}
	}
	
	function get_data() {
		$value = get_post_meta( $this->post_id, $this->name, ! $this->settings['cloneable'] );
		return ( ! $this->is_saved( $value ) ) ? $this->settings['default'] : $value;	
	}
}