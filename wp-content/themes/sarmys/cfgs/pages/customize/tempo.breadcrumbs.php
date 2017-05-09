<?php

	/**
	 *	Appearance / Customize / Breadcrumbs - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-breadcrumbs' => false
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
