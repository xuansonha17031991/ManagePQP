<?php

	/**
	 *	Appearance / Customize / Social - config settings
	 */

	$cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
	 	'tempo-social' => array(
			'title'		=> __( 'Social' , 'tempo' ),
			'priority' 	=> 60,
			'fields'	=> array(
				'evernote' 		=> array(
					'title'		=> __( 'Evernote', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'vimeo' 			=> array(
					'title'		=> __( 'Vimeo', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'twitter' 			=> array(
					'title'		=> __( 'Twitter', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'skype' 			=> array(
					'title'		=> __( 'Skype', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'renren' 			=> array(
					'title'		=> __( 'Renren', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'github' 			=> array(
					'title'		=> __( 'Github', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'rdio' 			=> array(
					'title'		=> __( 'Rdio', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'linkedin' 		=> array(
					'title'		=> __( 'Linkedin', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'behance' 			=> array(
					'title'		=> __( 'Behance', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'dropbox' 			=> array(
					'title'		=> __( 'Dropbox', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'flickr' 			=> array(
					'title'		=> __( 'Flickr', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'instagram' 		=> array(
					'title'		=> __( 'Instagram', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'vkontakte' 		=> array(
					'title'		=> __( 'Vkontakte', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'facebook' 		=> array(
					'title'		=> __( 'Facebook', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'tumblr' 			=> array(
					'title'		=> __( 'Tumblr', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'picasa' 			=> array(
					'title'		=> __( 'Picasa', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'dribbble' 		=> array(
					'title'		=> __( 'Dribbble', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'stumbleupon'		=> array(
					'title'		=> __( 'Stumbleupon', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'lastfm' 			=> array(
					'title'		=> __( 'Lastfm', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'gplus' 			=> array(
					'title'		=> __( 'Google Plus', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'google-circles' 	=> array(
					'title'		=> __( 'Google Circles', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'youtube-play' 	=> array(
					'title'		=> __( 'YouTube Play', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'youtube' 			=> array(
					'title'		=> __( 'YouTube', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'pinterest' 		=> array(
					'title'		=> __( 'Pinterest', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'smashing' 		=> array(
					'title'		=> __( 'Smashing', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'soundcloud' 		=> array(
					'title'		=> __( 'SoundCloud', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'flattr' 			=> array(
					'title'		=> __( 'Flattr', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'odnoklassniki' 	=> array(
					'title'		=> __( 'Odnoklassniki', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'mixi' 			=> array(
					'title'		=> __( 'Mixi', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url'
					)
				),
				'rss' 				=> array(
					'title'		=> __( 'Rss', 'tempo' ),
					'input'		=> array(
						'type'		=> 'url',
						'default'	=> esc_url( get_bloginfo( 'rss2_url' ) )
					)
				)
			)
		)
	));

	tempo_cfgs::set( 'customize', $cfgs );
?>