<?php

	/**
	 *	Appearance / Customize / Site Identity - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
		'title_tagline' => array(
			'fields'		=> array(
				'site-title-color' => array(
					'callback'	=> function(){
						//return tempo_options::get( 'site-title' );
						return true;
					},
					'input' 	=> array(
						'default' => '#233141'
					)
				),
				'site-title-transp' => array(
					'callback'	=> function(){
						//return tempo_options::get( 'site-title' );
						return true;
					},
					'input' 	=> array(
						'default' => 100
					)
				),
				'site-title-h-transp'			=> array(
					'callback'	=> function(){
						//return tempo_options::get( 'site-title' );
						return true;
					}
				),
				'tagline-color' => array(
					'callback'	=> function(){
						//return tempo_options::get( 'tagline' );
						return true;
					},
					'input' 	=> array(
						'default' => '#233141'
					)
				),
				'tagline-transp' => array(
					'callback'	=> function(){
						//return tempo_options::get( 'tagline' );
						return true;
					},
					'input' 	=> array(
						'default' => 80
					)
				),
				'tagline-h-transp' => array(
					'callback'	=> function(){
						//return tempo_options::get( 'tagline' );
						return true;
					}
				),

			),
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>
