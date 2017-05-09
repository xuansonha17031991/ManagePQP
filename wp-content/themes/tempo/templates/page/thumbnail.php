<?php
    global $post;

    $thumbnail          = get_post( get_post_thumbnail_id( $post ) );
    $has_post_thumbnail = has_post_thumbnail( $post ) && isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );

    if( !apply_filters( 'tempo_page_thumbnail', $has_post_thumbnail, $post -> ID ) )
        return;


    echo '<div class="tempo-thumbnail-wrapper">';


    /**
     *  Thumbnail Image
     */

    echo '<div class="tempo-image-wrapper">';

    echo get_the_post_thumbnail( $post,  'tempo-classic', array(
        'alt'   => get_the_title( $post ),
        'class' => null
    ));

    echo '</div>';


    /**
     *  Thumbnail Caption
     */

    $caption = isset( $thumbnail -> post_excerpt ) ? strip_tags( $thumbnail -> post_excerpt ) : null;

    if( !empty( $caption ) ){
        echo '<div class="tempo-caption-wrapper">';
        echo '<p>' . $caption . '</p>';
        echo '</div>';
    }

    echo '</div>';
?>
