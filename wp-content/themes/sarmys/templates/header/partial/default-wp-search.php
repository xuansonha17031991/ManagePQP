<?php
    global $wp_query;

	echo '<h1 class="tempo-header-headline">' . __( 'Search Result', 'sarmys' ) . '</h1>';

    echo '<div class="tempo-search-form">';
    get_search_form();
    echo '</div>';

    $label = _n( 'One Article' , '%s Articles' ,  absint( $wp_query -> found_posts ) , 'sarmys' );
    echo '<p><span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></p>';
?>
