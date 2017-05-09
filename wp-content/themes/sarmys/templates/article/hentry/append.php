<?php
    // number of views ( support with jetpack plugin )
    if( function_exists( 'stats_get_csv' ) && apply_filters( 'sarmys_blog_views', tempo_options::get( 'blog-views' ) ) ) {
        global $post;

        $args = array(
            'days'      => -1,
            'post_id'   => $post -> ID,
        );

        $result = stats_get_csv( 'postviews' , $args );
        $views  = $result[ 0 ][ 'views' ];

        echo '<span class="sarmys-jp-views">';
        echo '<i class="tempo-icon-eye-2"></i> ' . number_format_i18n( absint( $views ) );
        echo '</span>';
    }
?>
