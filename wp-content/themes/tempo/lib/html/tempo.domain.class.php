<?php
	if( !class_exists( 'tempo_domain' ) ){

		class tempo_domain
		{
            private $pages  = array();
            private $domain = null;

			public function get( $domain, $pages )
			{	
                $this -> pages  = (array)$pages;
                $this -> domain = $domain;

                add_action( 'admin_menu', array( $this, 'register' ) );
			}

			public function register()
            {
                if( !apply_filters( 'tempo_domain_register', false, $this -> domain, $this -> pages ) ){
                    foreach( $this -> pages as $page_slug => $args ){

                        if( isset( $args[ 'menu' ] ) ) {
                            $menu           = $args[ 'menu' ];
                            $page           = new tempo_page( $page_slug, $args );
                            $callback       = array( $page, 'get' );
                           
                            add_theme_page(
                                $menu[ 'title' ]            // PAGE TITLE
                                , $menu[ 'title' ]          // MENU TITLE
                                , 'edit_theme_options'      // CAPABILITY
                                , $page_slug                // PAGE SLUG
                                , $callback                 // CALLBACK FUNCTION
                            );
                        }
                    }
                }
            }
		}
	}
?>