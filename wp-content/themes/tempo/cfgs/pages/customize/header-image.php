<?php
	
	/**
	 *	Appearance / Customize / Header Image - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'header_image'		=> array(
			'title' 		=> __( 'Header Image', 'tempo' ),
			'priority'      => 30,
			'fields'		=> array()
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>