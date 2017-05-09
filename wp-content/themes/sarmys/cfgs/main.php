<?php

	/**
	 *	General config settings
	 */


	/**
	 *	Theme Config
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'theme' ), array(
		'description' => __( 'Sarmys is a free WordPress child Theme that extends the Tempo free WordPress theme.', 'sarmys' ),
	));

	tempo_cfgs::set( 'theme', $cfgs );


	/**
	 *	Custom Logo
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-logo' ), array(
        'height'      	=> 500,
        'width'       	=> 700,
        'flex-height' 	=> true,
		'flex-width'  	=> true,
		'header-text'	=> array( 'tempo-site-title', 'tempo-site-description' )
    ));

    tempo_cfgs::set( 'custom-logo', $cfgs );


	/**
     *	Custom Background
     */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-background' ), array(
        'default-color'         => '#f3f5f8',
        'default-image'         => null,
        'default-attachment'    => 'fixed'
	));

	tempo_cfgs::set( 'custom-background', $cfgs );


	/**
     *	Custom Header
     */

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'custom-header' ), array(
        'default-image' => get_stylesheet_directory_uri() . '/media/img/header.jpg'
    ));

    tempo_cfgs::set( 'custom-header', $cfgs );


	/**
	 *	Images Size
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'images-size' ), array(
		'tempo-classic' => array(
			'width' 	=> 1140,
			'height'	=> 640,
			'crop' 		=> true
		),
		'sarmys-header' => array(
			'width' 	=> 2560,
			'height'	=> 1440,
			'crop' 		=> true
		),
	));

	tempo_cfgs::set( 'images-size', $cfgs );
?>
