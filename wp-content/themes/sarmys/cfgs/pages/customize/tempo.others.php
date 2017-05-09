<?php

	/**
	 *	Appearance / Customize / Others - config settings
	 */

	if( apply_filters( 'sarmys_overwrite_cfgs', false ) )
 		return;

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-others' => array(
			'title'		=> __( 'Others' , 'sarmys' ),
			'priority' 	=> 65,
			'sections'	=> array(
				'tempo-custom-css' => array(
					'title'		=> __( 'Custom CSS' , 'sarmys' ),
					'priority' 	=> 5,
					'fields'	=> array(
						'custom-css'	=> false
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
