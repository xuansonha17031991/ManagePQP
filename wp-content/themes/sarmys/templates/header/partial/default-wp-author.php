<?php
    global $wp_query, $post;

    echo '<div class="sarmys-wp-template-author">' . get_avatar( $post -> post_author, 70, get_template_directory_uri() . '/media/img/default-avatar.png' ) . '</div>';

	echo '<h1 class="tempo-header-headline author"><span class="author">' . esc_html( get_the_author_meta( 'display_name' , $post -> post_author ) ) . '</span></h1>';

    $description = esc_html( get_the_author_meta( 'description' , $post -> post_author ) );

    echo '<hr class="sarmys-header-delimiter"/>';

    if( !empty( $description ) )
        echo '<p class="tempo-template-description">' . esc_html( $description ) . '</p>';

    $label = _n( 'One Article' , '%s Articles' ,  absint( $wp_query -> found_posts ) , 'sarmys' );
    echo '<p><span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></p>';
?>
