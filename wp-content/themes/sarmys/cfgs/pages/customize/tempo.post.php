<?php

	/**
	 *	Appearance / Customize / Single Post / General - config settings
	 */

	if( apply_filters( 'sarmys_overwrite_cfgs', false ) )
 		return;

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-post' => false
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
