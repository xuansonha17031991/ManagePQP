<?php

	/**
     *  Post Categories
     *	This widget can be used only for single post template
     */

	if( !class_exists( 'sarmys_widget_post_categories' ) ){
		class sarmys_widget_post_categories extends WP_Widget
		{
			/**
             *  Widget Constructor
             */

		    function __construct()
		    {
		        parent::__construct( 'sarmys_widget_post_categories', __( 'Post Categories', 'sarmys' ) . ' [' . tempo_core::theme( 'Name' ) . ']', array(
		            'classname'     => 'tempo_widget_categories',
		            'description'   => __( 'This widget can be used only for single post template', 'sarmys' )
		        ));
		    }

		    /**
             *  Widget Preview
             */

		    function widget( $args, $instance )
		    {
		        global $post;

		        // extract args
		        extract( $args , EXTR_SKIP );

		        $instance = wp_parse_args( (array) $instance, array(
		            'title' => __( 'Post Categories', 'sarmys' )
		        ));

		        if( is_singular( 'post' ) && has_category( ) ){
		            echo $before_widget;

		            if( !empty( $instance[ 'title' ] ) ){
		                echo $before_title;
		                echo apply_filters( 'widget_title', esc_attr( $instance[ 'title' ] ), $instance, $this -> id_base );
		                echo $after_title;
		            }

		            $categories = tempo_post_categories( $post -> ID );

		            echo '<div><ul>';

		            foreach( $categories as $c ){

		                $link = esc_url( get_term_link( $c[ 'term_id' ] , 'category' ) );

		                if ( is_wp_error( $link ) )
		                    continue;

		                echo '<li>';
		                echo '<a href="' . esc_url( $link ) . '" rel="category">' . esc_html( $c[ 'name' ] ) . ' <span class="category tempo-category-' . absint( $c[ 'term_id' ] ) . '">' . absint( $c[ 'count' ] ) . '</span></a>';
		                echo '</li>';
		            }

		            echo '</ul></div>';

		            echo $after_widget;
		        }
		    }

		    /**
             *  Widget Update
             */

		    function update( $new_instance, $old_instance )
		    {
		        $instance               = $old_instance;
		        $instance[ 'title' ]    = sanitize_text_field( $new_instance[ 'title' ] );

		        return $instance;
		    }

		    /**
             *  Widget Form ( admin side )
             */

		    function form( $instance )
		    {
		        $instance = wp_parse_args( (array) $instance, array(
		            'title' => null
		        ));

		        echo '<p>';
		        echo '<label for="' . esc_attr( $this -> get_field_id( 'title' ) ) . '">' . __( 'Title', 'sarmys' );
		        echo '<input type="text" class="widefat" id="' . esc_attr( $this -> get_field_id( 'title' ) ) . '" name="' . esc_attr( $this -> get_field_name( 'title' ) ) . '" value="' . esc_attr( sanitize_text_field( $instance[ 'title' ] ) ) . '" />';
		        echo '</label>';
		        echo '</p>';
		    }
		}
	}
?>
