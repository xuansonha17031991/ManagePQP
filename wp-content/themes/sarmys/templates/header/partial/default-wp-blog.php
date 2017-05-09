<?php
    global $wp_query;

    $page = get_page( absint( get_option( 'page_for_posts' ) ) );

    $title = __( 'Blog', 'sarmys' );

    if( isset( $page -> ID ) )
        $title = get_the_title( $page);

	echo '<h1 class="tempo-header-headline">' . esc_html( $title ) . '</h1>';

    echo '<hr class="sarmys-header-delimiter"/>';

    $label = _n( 'One Article' , '%s Articles' ,  absint( $wp_query -> found_posts ) , 'sarmys' );
    echo '<p><span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></p>';
?>
