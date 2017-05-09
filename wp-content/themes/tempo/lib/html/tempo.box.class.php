<?php
	if( !class_exists( 'tempo_box' ) ){
		class tempo_box
		{
			private $attr;

			function __construct()
			{
				$this -> attr 	= new tempo_attr();
				$this -> field 	= new tempo_field();
			}

			function get( $args )
		    {
				$rett = '';

				if( !empty( $args ) ){

					$args = apply_filters( 'tempo_attr__class', $args, 'tempo-box' );

			        $rett  = '<div ';
			        $rett .= $this -> attr -> get( 'id', 	$args ) . ' ';
			        $rett .= $this -> attr -> get( 'class', $args ) . ' ';
			        $rett .= $this -> attr -> get( 'style', $args ) . ' ';
			        $rett .= '>';

			        //- BOX HEADER -//
			        // FILTRU
			        $header = $this -> header( $args );

			        if( !empty( $header ) ){
				        $rett .= '<div class="tempo-box-header">';
				        $rett .= $header;
				        $rett .= '</div>';
			    	}

			        //- BOX CONTENT -//
			        $rett .= '<div class="tempo-box-content">';

			        // FILTRU
			        $rett .= $this -> content( $args );

			        $rett .= '</div>';
			        $rett .= '</div>';
				}

		        return $rett;
		    }

			function header( $args )
		    {
		        $rett = '';

	            if( isset( $args[ 'title' ] ) ){
	                $rett .= '<h3>' . esc_html( $args[ 'title' ] ) . '</h3>';
	            }

	            if( isset( $args[ 'description' ] ) ){
	                $rett .= '<small>' . esc_html( $args[ 'description' ] ) . '</small>';
	            }

		        return $rett;
		    }

		    function content( $args )
		    {
		        $rett = tempo_get_content( $args );

		        if( isset( $args[ 'fields' ] ) && !empty( $args[ 'fields' ] ) && is_array( $args[ 'fields' ] ) ){
		        	foreach( $args[ 'fields' ] as $index => $args ){
		        		$rett .= $this -> field -> get( $args );
		        	}
		        }

		        return $rett;
		    }
		}
	}
?>
