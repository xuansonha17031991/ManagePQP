<?php

	/**
	 *	Appearance / Customize / Background Image - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'background_image'		=> array(
			'title' 		=> __( 'Background Image', 'tempo' ),
			'priority'      => 20,
			'fields' 		=> array(
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>