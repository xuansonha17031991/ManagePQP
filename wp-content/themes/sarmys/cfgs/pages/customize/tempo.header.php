<?php

	/**
	 *	Appearance / Customize / Header Settings - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'tempo-header' => array(
			'sections'		=> array(
				'tempo-header-btn-1' => array(
					'title' 	=> __( 'First Button', 'sarmys' ),
					'priority'	=> 30,
					'fields'	=> array(
						'header-btn-1' => array(
							'title'			=> __( 'Display First Button', 'sarmys' ),
							'description'	=> __( 'enable / disable first Button', 'sarmys' ),
							'priority'		=> 5,
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true
							)
						),
						'header-btn-1-text' => array(
							'title'			=> __( 'Text', 'sarmys' ),
							'priority'		=> 10,
							'input'			=> array(
								'type'			=> 'text',
								'default'		=> __( 'First Button', 'sarmys' )
							)
						),
						'header-btn-1-description' => array(
							'title'			=> __( 'Description', 'sarmys' ),
							'priority'		=> 15,
							'input'			=> array(
								'type'			=> 'text',
								'default'		=> __( 'first button description', 'sarmys' )
							)
						),
						'header-btn-1-url' => array(
							'title'			=> __( 'URL', 'sarmys' ),
							'transport'		=> 'postMessage',
							'priority'		=> 20,
							'input'			=> array(
								'type'			=> 'url'
							)
						),
						'header-btn-1-target' => array(
							'title'			=> __( 'Open url in new window', 'sarmys' ),
							'description'	=> __( 'enable / disable link attribut target="_blank"', 'sarmys' ),
							'transport'		=> 'postMessage',
							'priority'		=> 25,
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true
							)
						)
					)
				),
				'tempo-header-btn-2' => array(
					'title' 	=> __( 'Second Button', 'sarmys' ),
					'priority'	=> 35,
					'fields'	=> array(
						'header-btn-2' => array(
							'title'			=> __( 'Display Second Button', 'sarmys' ),
							'description'	=> __( 'enable / disable second Button', 'sarmys' ),
							'priority'		=> 5,
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true
							)
						),
						'header-btn-2-text' => array(
							'title'			=> __( 'Text', 'sarmys' ),
							'priority'		=> 10,
							'input'			=> array(
								'type'			=> 'text',
								'default'		=> __( 'Second Button', 'sarmys' )
							)
						),
						'header-btn-2-description' => array(
							'title'			=> __( 'Description', 'sarmys' ),
							'priority'		=> 15,
							'input'			=> array(
								'type'			=> 'text',
								'default'		=> __( 'second button description', 'sarmys' )
							)
						),
						'header-btn-2-url' => array(
							'title'			=> __( 'URL', 'sarmys' ),
							'priority'		=> 20,
							'input'			=> array(
								'type'			=> 'url'
							)
						),
						'header-btn-2-target' => array(
							'title'			=> __( 'Open url in new window', 'sarmys' ),
							'description'	=> __( 'enable / disable link attribut target="_blank"', 'sarmys' ),
							'priority'		=> 25,
							'input'			=> array(
								'type'			=> 'checkbox',
								'default'		=> true
							)
						)
					)
				)
			)
		)
	));

	if( !apply_filters( 'sarmys_overwrite_cfgs', false ) ){

		if( isset( $cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-appearance' ] ) )
 			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-appearance' ] 							= false;

		if( isset( $cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ] ) ){
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ][ 'header-btn-1-text-color' ] 		= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ][ 'header-btn-1-text-transp' ] 	= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ][ 'header-btn-1-text-h-color' ] 	= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ][ 'header-btn-1-text-h-transp' ] 	= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ][ 'header-btn-1-bkg-color' ] 		= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ][ 'header-btn-1-bkg-transp' ] 		= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ][ 'header-btn-1-bkg-h-color' ] 	= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-1' ][ 'header-btn-1-bkg-h-transp' ] 	= false;
		}

		if( isset( $cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ] ) ){
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ][ 'header-btn-2-text-color' ] 		= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ][ 'header-btn-2-text-transp' ] 	= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ][ 'header-btn-2-text-h-color' ] 	= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ][ 'header-btn-2-text-h-transp' ] 	= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ][ 'header-btn-2-bkg-color' ] 		= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ][ 'header-btn-2-bkg-transp' ] 		= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ][ 'header-btn-2-bkg-h-color' ] 	= false;
			$cfgs[ 'tempo-header' ][ 'sections' ][ 'tempo-header-btn-2' ][ 'header-btn-2-bkg-h-transp' ] 	= false;
		}
	}

	tempo_cfgs::set( 'customize', $cfgs );
?>
