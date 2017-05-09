<?php

	/**
	 *	Header Menu - config file
	 */

	$cfgs = array_merge( (array)tempo_cfgs::get( 'menus' ), array(
		'tempo-header'	=> __( 'Header Menu', 'tempo' )
	));

	tempo_cfgs::set( 'menus', $cfgs );
?>