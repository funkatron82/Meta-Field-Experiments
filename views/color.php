<?php
require_once 'text.php';

class CEDCF_Color_View extends CEDCF_Text_View {
	public $type = 'color';
	
	function add_scripts() {
		//Enqueue script	
		wp_enqueue_script( 'cedcf-color', plugin_dir_url( __FILE__ ). 'js/color.js', array( 'wp-color-picker' ));
	}
	
	function normalize( $settings ) {
		parent::normalize( $settings );
		$this->classes[] = 'cedcf-color';
	}
	
	function sanitize( $value ) {
		return $this->sanitize_hex( $value ); 	
	}
	
	function sanitize_hex( $color ) {
		if ( '' === $color )
			return '';
	
		// 3 or 6 hex digits, or the empty string.
		if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
			return $color;
	
		return NULL;

	}
}