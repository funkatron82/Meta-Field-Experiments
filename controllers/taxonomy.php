<?php
require_once 'controller.php';
class CEDCF_Taxonomy_Controller extends CEDCF_Field_Controller {
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
		wp_set_object_terms( $this->post_id, $value, $this->taxonomy, false  );
	}
	
	function get_data() {
		$value = get_post_meta( $this->post_id, $this->name, ! $this->settings['cloneable'] );
		return ( ! $this->is_saved( $value ) ) ? $this->settings['default'] : $value;	
	}
}