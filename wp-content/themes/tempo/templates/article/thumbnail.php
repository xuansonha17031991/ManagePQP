<?php
    global $post;

	$thumbnail          = get_post( get_post_thumbnail_id( $post ) );
    $has_post_thumbnail = has_post_thumbnail( $post ) && isset( $thumbnail -> ID ) && wp_attachment_is( 'image', $thumbnail );

    if( !$has_post_thumbnail )
        return;


    echo '<div class="tempo-thumbnail-wrapper">';
    
    
    /**
     *  Image Thumbnail Image
     */

    echo '<div class="tempo-image-wrapper overflow-hidden">';

	echo get_the_post_thumbnail( $post,  'tempo-classic', array(
        'alt'   => get_the_title( $post ),
        'class' => null
    ));


    /**
     *  Thumbnail Permalink ( go to single post )
     */

    echo '<a href="' . esc_url( get_permalink( $post ) ) . '" class="tempo-flex-container" title="' . esc_attr( get_the_title( $post ) ) . '">';
    echo '</a>';

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