<?php
    
    /**
     *  Appearance / Customize / Layout - config settings
     */

    $default = array(
        'main'          => __( 'Main Sidebar' , 'sarmys' ),
        'front-page'    => __( 'Front Page Sidebar' , 'sarmys' ),
        'page'          => __( 'Page Sidebar' , 'sarmys' ),
        'post'          => __( 'Single Post Sidebar' , 'sarmys' )
    );

    $sidebars   = $default;
    $custom     = tempo_validator::get_json( tempo_options::val( 'custom-sidebars' ) );

    if( !empty( $custom ) && is_array( $custom ) )
        $sidebars = array_merge( $default,  $custom );
    

    $cfgs = tempo_cfgs::merge( (array)tempo_cfgs::get( 'customize' ), array(
    	'tempo-layout' => array(
    		'title'		=> __( 'Layout' , 'sarmys' ),
    		'priority' 	=> 47,
    		'sections'	=> array(
                'tempo-layout-general' => array(
                    'title'             => __( 'General' , 'sarmys' ),
                    'description'       => sprintf( __( '%s: On the premium version, the content width for layout with sidebars is 945 pixels.' , 'sarmys' ), '<b>' . __( 'IMPORANT', 'sarmys' ) . '</b>' ),
                    'fields'            => array(
                        'content-width' => 'unsupport'
                    )
                ),
    			'tempo-layout' => array(
    				'title'             => __( 'Blog & Archives' , 'sarmys' ),
                	'description'       => __( 'Default Layout is used for the next templates: Blog, Archives, Categories, Tags, Author and Search Results.' , 'sarmys' ),
                	'fields'			=> array(
                		'layout'	=> array(
                			'title'             => __( 'Layout' , 'sarmys' ),
                			'input'				=> array(
                				'type'		=> 'select',
                				'default'	=> 'right',
                				'options'	=> array(
                					'left'  => __( 'Left Sidebar', 'sarmys' ),
                    				'full'  => __( 'Full Width', 'sarmys' ),
                    				'right' => __( 'Right Sidebar', 'sarmys' )
                				)
                			)
                		),
                		'sidebar'	=> array(
                			'title'             => __( 'Sidebar' , 'sarmys' ),
                			'input'				=> array(
                				'type'		=> 'select',
                				'default'	=> 'main',
                				'options'	=> $sidebars
                			)
                		)
                	)
    			),
    			'tempo-front-page-layout' => array(
    				'title'             => __( 'Front Page' , 'sarmys' ),
                	'description'       => __( 'In order to use this option set you need to activate a staic page on Front Page from - "Static Front Page" tab.' , 'sarmys' ),
                	//'callback' 			=> 'is_front_page',
                	'fields'			=> array(
                		'front-page-layout' => array(
                			'title'             => __( 'Layout' , 'sarmys' ),
                			'input'				=> array(
                				'type'		=> 'select',
                				'default'	=> 'full',
                				'options'	=> array(
                					'left'  => __( 'Left Sidebar', 'sarmys' ),
                    				'full'  => __( 'Full Width', 'sarmys' ),
                    				'right' => __( 'Right Sidebar', 'sarmys' )
                				)
                			)
                		),
                		'front-page-sidebar' => array(
                			'title'             => __( 'Sidebar' , 'sarmys' ),
                			'input'				=> array(
                				'type'		=> 'select',
                				'default'	=> 'front-page',
                				'options'	=> $sidebars
                			)
                		)
                	)
    			),
    			'tempo-post-layout' => array(
    				'title'             => __( 'Post' , 'sarmys' ),
                	'description'       => __( 'for the each post you can overwrite the Layout options with the custom settings ( on edit page meta box "Layout" ).' , 'sarmys' ),
                	'fields'			=> array(
                		'post-layout' => array(
                			'title'             => __( 'Layout' , 'sarmys' ),
                			'input'				=> array(
                				'type'		=> 'select',
                				'default'	=> 'right',
                				'options'	=> array(
                					'left'  => __( 'Left Sidebar', 'sarmys' ),
                    				'full'  => __( 'Full Width', 'sarmys' ),
                    				'right' => __( 'Right Sidebar', 'sarmys' )
                				)
                			)
                		),
                		'post-sidebar' => array(
                			'title'             => __( 'Sidebar' , 'sarmys' ),
                			'input'				=> array(
                				'type'		=> 'select',
                				'default'	=> 'post',
                				'options'	=> $sidebars
                			)
                		)
                	)
    			),
                'tempo-page-layout' => array(
                    'title'             => __( 'Page' , 'sarmys' ),
                    'description'       => __( 'for the each page you can overwrite the Layout options with the custom settings ( on edit page meta box "Layout" ).' , 'sarmys' ),
                    'fields'            => array(
                        'page-layout' => array(
                            'title'             => __( 'Layout' , 'sarmys' ),
                            'input'             => array(
                                'type'      => 'select',
                                'default'   => 'full',
                                'options'   => array(
                                    'left'  => __( 'Left Sidebar', 'sarmys' ),
                                    'full'  => __( 'Full Width', 'sarmys' ),
                                    'right' => __( 'Right Sidebar', 'sarmys' )
                                )
                            )
                        ),
                        'page-sidebar' => array(
                            'title'             => __( 'Sidebar' , 'sarmys' ),
                            'input'             => array(
                                'type'      => 'select',
                                'default'   => 'page',
                                'options'   => $sidebars
                            )
                        )
                    )
                )
    		)
    	)
    ));

    tempo_cfgs::set( 'customize', $cfgs );
?>