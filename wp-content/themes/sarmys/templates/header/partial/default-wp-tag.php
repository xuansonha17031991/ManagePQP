<?php
    global $wp_query;

    $t = get_term_by( 'slug', esc_attr( get_query_var( 'tag' ) ), 'post_tag' );

    if( !empty( $t ) && !is_wp_error( $t ) && is_tag( $t ) ){
        echo '<h1 class="tempo-header-headline">' . single_tag_title( null, false ) . '</h1>';

        echo '<hr class="sarmys-header-delimiter"/>';

        if( !empty( $t -> description ) ){
            echo '<p class="tempo-template-description">' . esc_html( $t -> description ) . '</p>';
        }

        $label = _n( 'One Article' , '%s Articles' ,  absint( $wp_query -> found_posts ) , 'sarmys' );
        echo '<p><span class="counter-wrapper">' . __( 'Tag Archive', 'sarmys' ) . ' <span style="color:rgba( 255, 255, 255, 0.6 ); margin: 0px 20px;">|</span> ' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></p>';
    }
?>
