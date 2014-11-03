// Color Field JS

jQuery( document ).ready( function( $ ) {	
	$( '.cedcf-color' ).each( cedcf_color_init );
	
	$( '.cedcf-cloneable' ).on( 'clone', '.cedcf-clone', function( e ) {
		$( this ).find( '.cedcf-color' ).each( cedcf_color_init );
	} );
	
	function cedcf_color_init() {
		var	$this = $( this );
		$this.wpColorPicker( $this.data( 'js-options' ) );
	}
} );