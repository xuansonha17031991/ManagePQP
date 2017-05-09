<?php
	if( !class_exists( 'tempo_notification' ) ){
		class tempo_notification
		{
			function __construct()
			{
				$this -> attr = new tempo_attr();
			}

			function get( $args )
			{
				$rett 			= '';
				$type 			= '';
				$title 			= null;
				$description	= null;

				if( isset( $args[ 'title' ] ) && !empty( $args[ 'title' ] ) ){
					$title = $args[ 'title' ];
				}

				if( isset( $args[ 'description' ] ) && !empty( $args[ 'description' ] ) ){
					$description = $args[ 'description' ];
				}

				if( !( empty( $title ) && empty( $description ) ) ){

					if( isset( $args[ 'class' ] ) ){
						$args[ 'class' ] .= ' tempo-notification ';
					}
					else{
						$args[ 'class' ] = 'tempo-notification ';
					}

					if( isset( $args[ 'type' ] ) && !empty( $args[ 'type' ] ) ){
						$args[ 'class' ] .= in_array( $args[ 'type' ] , array( 'notify', 'success', 'wrong', 'error' ) ) ? $args[ 'type' ] : 'notify';
					}

					if( isset( $args[ 'wrapper' ] ) ){
						$classes = isset( $args[ 'align' ] ) ? esc_attr( $args[ 'align' ] ) : 'center';
						$rett .= '<div class="tempo-notification-wrapper ' . esc_attr( $classes ) . '">';
					}

					$rett .= '<div ' . $this -> attr -> get( 'class', $args ) . ' ' . $this -> attr -> get( 'style', $args ) . '>';

					if( !empty( $title ) ){
						$rett .= '<strong>' . $title . '</strong>';
					}

					if( !empty( $description ) ){
						$rett .= '<p>' . $description . '</p>';
					}

					$rett .= '</div>';

					if( isset( $args[ 'wrapper' ] ) ){
						$rett .= '</div>';
					}
				}

				return $rett;
			}
		}
	}
?>