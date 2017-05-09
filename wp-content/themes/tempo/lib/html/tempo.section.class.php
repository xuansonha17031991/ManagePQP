<?php
	if( !class_exists( 'tempo_section' ) ){
		class tempo_section
		{
			private $attr;
			private $column;
			private $notif;

			function __construct()
			{
				$this -> attr 		= new tempo_attr();
				$this -> column 	= new tempo_column();
				$this -> notif 		= new tempo_notification();
			}

			function get( $args )
			{
				$rett = '<div class="tempo-section" ' . $this -> attr -> get( 'style', $args ) . '>';

				//- SECTION HEADER -//
				$header = $this -> header( $args );

				if( !empty( $header ) ){
					$rett .= '<div class="tempo-section-header">';
					$rett .= $header;
					$rett .= '</div>';
				}

				//- SECTION CONTENT -//
				$rett .= '<div class="tempo-section-content">';
				// FILTER
				$rett .= $this -> content( $args );
				$rett .= '</div>';

				$rett .= '</div>';

				return $rett;
			}

			function header( $args )
			{
				$rett = '';

				/* HEADLINE */
	            if( isset( $args[ 'title' ] ) ){
	                $rett .= '<h1 class="tempo-section-title">' . $args[ 'title' ] . '</h1>';
	            }

	            /* DESCRIPTION */
	            if( isset( $args[ 'description' ] ) ){
	                $rett .= '<p class="tempo-section-description">' . $args[ 'description' ] . '</p>';
	            }

	            /* NOTIFICATION */
	            $notif = null;

	            if( isset( $args[ 'notification' ] ) && !empty( $args[ 'notification' ] ) && is_array( $args[ 'notification' ] ) ){
					$notif = $this -> notif -> get( $args[ 'notification' ] );
				}

				if( !empty( $notif ) ){
					$rett .= '<div class="notofication-wrapper">' . $notif . '</div>';
				}

	            /* BUTTONS */

		        return $rett;
			}

			function content( $args )
			{
				$rett = tempo_get_content( $args );

		        /* CONTENT FROM COLUMNS */
		        if( isset( $args[ 'columns' ] ) && !empty( $args[ 'columns' ] ) && is_array( $args[ 'columns' ] ) ){

		        	$rett .= $this -> column -> wrapper( 'before' );

		        	foreach( $args[ 'columns' ] as $index => $args ){
		        		$rett .= $this -> column -> get( $args );
		        	}

		        	$rett .= $this -> column -> wrapper( 'after' );
		        }

		        return $rett;
			}
		}
	}
?>