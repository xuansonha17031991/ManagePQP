<?php

	/**
	 *	Appearance / Customize / Site Identity - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'title_tagline' => array(
			'title' 		=> __( 'Site Identity', 'tempo' ),
			'priority'      => 10,
			'fields'		=> array(
				'logo' 		=> array(
					'title'			=> __( 'Logo', 'tempo' ),
					'description'	=> __( 'Is recommended to use an image with 235px maxim width and 70px maxim height.', 'tempo' ),
					'priority' 		=> 5,
					'input'			=> array(
						'type'			=> 'upload'
					)
				),
				'site-title-color'			=> array(
					'title'			=> __( 'Site Title Color', 'tempo' ),
					'priority' 		=> 10,
					'input'			=> array(
						'type'			=> 'color',
						'default' 		=> '#000000'
					)
				),
				'site-title-transp'			=> array(
					'title'			=> __( 'Site Title Transparency', 'tempo' ),
					'priority' 		=> 15,
					'input'			=> array(
						'type'			=> 'percent',
						'default' 		=> 80
					)
				),
				'site-title-h-transp'			=> array(
					'title'			=> __( 'Site Title Transparency (over)', 'tempo' ),
					'description'	=> __( 'When the mouse is over the Title Link.', 'tempo' ),
					'priority' 		=> 20,
					'input'			=> array(
						'type'			=> 'percent',
						'default' 		=> 100
					)
				),
				'tagline-color'			=> array(
					'title'			=> __( 'Tagline Color', 'tempo' ),
					'priority' 		=> 25,
					'input'			=> array(
						'type'			=> 'color',
						'default' 		=> '#000000'
					)
				),
				'tagline-transp'			=> array(
					'title'			=> __( 'Tagline Transparency', 'tempo' ),
					'priority' 		=> 30,
					'input'			=> array(
						'type'			=> 'percent',
						'default' 		=> 80
					)
				),
				'tagline-h-transp'			=> array(
					'title'			=> __( 'Tagline Transparency (over)', 'tempo' ),
					'description'   => __( 'When the mouse is over the Menu Link.', 'tempo' ),
					'priority' 		=> 35,
					'input'			=> array(
						'type'			=> 'percent',
						'default' 		=> 100
					)
				),
				//'header_text'		=> false,
			),
		)
	));

	if ( function_exists( 'the_custom_logo' ) )
		unset( $cfgs[ 'title_tagline' ][ 'fields' ][ 'logo' ] );

	tempo_cfgs::set( 'customize', $cfgs );
?>
