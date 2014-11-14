<?php

/*
Plugin Name: Meta Field Experiments
Plugin URI: http://www.crosseyedesign.com/custom-meta-fields
Description: 
Version: 0.1
Author: Manny "Funkatron" Fleurmond
Author URI: http://www.crosseyedesign.com
License: GPL2
*/

include_once 'config.php';
include_once 'html/input.php';
include_once 'html/text.php';
//include_once 'html/number.php';
include_once 'html/url.php';
include_once 'html/email.php';
//include_once 'html/range.php';
include_once 'html/color.php';
add_action( 'add_meta_boxes_post', 'cmf_boxes' );

function cmf_boxes() {
	add_meta_box(
		'cmf_test',
		'Test Meta Box',
		'cmf_show',
		'post',
		'normal',
		'high'
	);		
}

function cmf_show( $post, $meta_box ) {
	$test = new CEDCF_Url_Html( array( 'attributes' => array( 'required' => true, 'placeholder'=> 'winning' ) ) );
	$test->show( 'test', 'test' );
}