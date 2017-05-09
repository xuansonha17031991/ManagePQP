<?php
    global $post;

    $show_author    = apply_filters( 'sarmys_meta_post_author',     tempo_options::get( 'post-author' ) );
    $show_time      = apply_filters( 'sarmys_meta_post_time',       tempo_options::get( 'post-time' ) );
    $show_comments  = apply_filters( 'sarmys_meta_post_comments',   tempo_options::get( 'post-comments' ) );
    $show_views     = apply_filters( 'sarmys_meta_post_views',      tempo_options::get( 'post-views' ) );

    $meta           = $show_author || $show_time || $show_comments || $show_views;

    if( !apply_filters( 'tempo_post_meta', $meta, $post -> ID ) )
        return;
?>

<div class="tempo-meta top single">
    <ul>
        <?php
            // author
            if( $show_author )
                echo '<li><a class="author" href="' . esc_url( get_author_posts_url( $post-> post_author ) ) . '" title="' . sprintf( __( 'Posted by %s' , 'sarmys' ) , esc_attr( $name ) ) . '">' . esc_html( get_the_author_meta( 'display_name' , $post -> post_author ) ) . '</a></li>';

            // time, date
            if( $show_time ){
                $y      = esc_attr( get_post_time( 'Y', false, $post ) );
                $m      = esc_attr( get_post_time( 'm', false, $post ) );
                $d      = esc_attr( get_post_time( 'd', false, $post ) );
                $dtime  = get_post_time( 'Y-m-d', false, $post );
                $ptime  = get_post_time( esc_attr( get_option( 'date_format' ) ), false , $post, true );

                echo '<li><a href="' . esc_url( get_day_link( $y , $m , $d ) )  . '" title="' . sprintf( __( 'posted on %s', 'sarmys' ), $ptime ) . '"><time datetime="' . esc_attr( $dtime ) . '">' . esc_html( $ptime ) . '</time></a></li>';
            }

            // comments
            if( $post -> comment_status == 'open' && $show_comments ) {
                $nr = get_comments_number( $post -> ID );

                echo '<li>';
                echo '<a href="' . esc_url( get_comments_link( $post -> ID ) ) . '">';
                echo '<i class="tempo-icon-chat-5"></i> ' . number_format_i18n( absint( $nr ) );
                echo '</a>';
                echo '</li>';
            }

            // number of views ( support with jetpack plugin )
            if( function_exists( 'stats_get_csv' ) && $show_views ) {

                $args = array(
                    'days'      => -1,
                    'post_id'   => $post -> ID,
                );

                $result = stats_get_csv( 'postviews' , $args );
                $views  = $result[ 0 ][ 'views' ];

                echo '<li>';
                echo '<i class="tempo-icon-eye-2"></i> ' . number_format_i18n( absint( $views ) );
                echo '</li>';
            }
        ?>
    </ul>
</div>
