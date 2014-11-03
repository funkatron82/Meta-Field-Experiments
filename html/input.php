<?php
require_once 'html.php';

class CEDCF_Input_Html extends CEDCF_Field_Html {
	public $type;
	
	function filter_attributes() {
		$attributes = parent::filter_attributes();
		$attributes['type'] = $this->type;
		return $attributes;
	}
	
	function get_filter() {
		return array_merge( parent::get_filter(), array( 'accesskey', 'tabindex', 'autofocus' ) );
	}
	
	function show( $name, $id, $value = '' ) {
		if( ! empty( $this->options ) ) {
			$this->attributes['list'] = $id . '_list';
			$datalist = sprintf( '<datalist id="%s"> %s </datalaist>', $this->attributes['list'], $this->walk_options() );	
		}
		return sprintf( '<input name="%s" id="%s" value="%s" %s /> %s',
			$name,
			$id,
			$value,
			$this->get_attributes(),
			$datalist
		);	
	}
	
	function walk_options() {
		if( empty( $this->options ) )
			return;
		
		$html = '';	
		foreach( $this->options as $option ) {
			$html .= sprintf( '<option value="%s"> %s</option>', $option['value'], empty( $option['label'] ) ? '' : $option['label'] );	
		}
		
		return $html;
	}
}