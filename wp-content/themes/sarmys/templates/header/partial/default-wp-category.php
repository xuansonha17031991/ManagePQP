<?php
    global $wp_query;

    $c = get_category( absint( get_query_var( 'cat' ) ) );

    if( !empty( $c ) && !is_wp_error( $c )  && is_category( $c -> term_id ) ){
		echo '<h1 class="tempo-header-headline">' . single_cat_title( null, false ) . '</h1>';

        echo '<hr class="sarmys-header-delimiter"/>';

        if( !empty( $c -> description ) ){
            echo '<p class="tempo-template-description">' . esc_html( $c -> description ) . '</p>';
        }

        $label = _n( 'One Article' , '%s Articles' ,  absint( $wp_query -> found_posts ) , 'sarmys' );
        echo '<p><span class="counter-wrapper">' . __( 'Category Archive', 'sarmys' ) . ' <span style="color:rgba( 255, 255, 255, 0.6 ); margin: 0px 20px;">|</span> ' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></p>';
	}
?>
