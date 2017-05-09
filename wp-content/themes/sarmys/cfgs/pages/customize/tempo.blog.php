<?php

	/**
	 *	Appearance / Customize / Blog - config settings
	 */

	if( apply_filters( 'sarmys_overwrite_cfgs', false ) )
 		return;

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-blog' => false
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
