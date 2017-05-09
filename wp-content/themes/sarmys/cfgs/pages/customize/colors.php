<?php

	/**
	 *	Appearance / Customize / Colors - config settings
	 */

	if( apply_filters( 'sarmys_overwrite_cfgs', false ) )
		return;

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'colors' => array(
			'title' 		=> __( 'Colors', 'sarmys' ),
			'priority'      => 11,
			'fields'		=> array(
				'first-color' 		=> false,
				'first-h-color' 	=> false,
				'second-color' 		=> false,
				'second-h-color' 	=> false
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
