<?php

    /**
     *  Sidebars - config file
     */

    $cfgs = (array)tempo_cfgs::get( 'sidebars' );

    if( !empty( $cfgs ) )
        return;

    $cfgs = array(

        /**
         *  Header Sidebars
         */

        'header'    => array(),


        /**
         *
         *  Content Sidebars
         *  Main Sidebar        - is used by default for next templates: Blog, Archives, Author, Categories, Tags and Search Results.
         *  Front Page Sidebar  - is used by default for Front Page template.
         *  Single Sidebar      - is used by default for single post template.
         *  Page Sidebar        - is used by default for page template.
         */

        'content' => array(
            'main' => array(
                'id'            => 'main',
                'name'          => __( 'Main Sidebar' , 'sarmys' ),
                'description'   => __( 'Main Sidebar - is used by default for next templates: Blog, Archives, Author, Categories, Tags and Search Results.' , 'sarmys' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            ),
            'front-page' => array(
                'id'            => 'front-page',
                'name'          => __( 'Front Page - Default Sidebar' , 'sarmys' ),
                'description'   => __( 'Front Page Sidebar - is used by default for Front Page template.' , 'sarmys' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            ),
            'post' => array(
                'id'            => 'post',
                'name'          => __( 'Single Post - Default Sidebar' , 'sarmys' ),
                'description'   => __( 'Default Single Post Sidebar - is used by default for single post template.' , 'sarmys' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            ),
            'page' => array(
                'id'            => 'page',
                'name'          => __( 'Page - Default Sidebar' , 'sarmys' ),
                'description'   => __( 'Page Sidebar - is used by default for page template.' , 'sarmys' ),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="widget-title">',
                'after_title'   => '</h4>'
            )
        ),


        /**
         *
         *  Footer Sidebars
         */

        'footer' => array()
    );

    tempo_cfgs::set( 'sidebars', $cfgs );
?>
