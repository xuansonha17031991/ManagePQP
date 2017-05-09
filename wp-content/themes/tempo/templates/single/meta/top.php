<?php
    global $post;

    $show_author    = apply_filters( 'tempo_meta_post_author', tempo_options::get( 'post-author' ) );
    $show_time      = apply_filters( 'tempo_meta_post_time', tempo_options::get( 'post-time' ) );

    $meta           = $show_author || $show_time;

    if( !apply_filters( 'tempo_post_meta', $meta, $post -> ID ) )
        return;
?>

<div class="tempo-meta top single">

    <?php
        // author
        $name   = get_the_author_meta( 'display_name' , $post -> post_author );
        $author = '<a class="author" href="' . esc_url( get_author_posts_url( $post-> post_author ) ) . '" title="' . sprintf( __( 'Posted by %s' , 'tempo' ) , esc_attr( $name ) ) . '">' . get_avatar( $post -> post_author, 20, get_template_directory_uri() . '/media/img/default-avatar.png' ) . ' ' . $name . '</a>';

        // time
        $y      = esc_attr( get_post_time( 'Y', false, $post ) );
        $m      = esc_attr( get_post_time( 'm', false, $post ) );
        $d      = esc_attr( get_post_time( 'd', false, $post ) );
        $dtime  = get_post_time( 'Y-m-d', false, $post );
        $ptime  = get_post_time( esc_attr( get_option( 'date_format' ) ), false , $post, true );

        $time   = '<i class="tempo-icon-clock-1"></i> <a href="' . esc_url( get_day_link( $y , $m , $d ) )  . '" title="' . sprintf( __( 'posted on %s', 'tempo' ), $ptime ) . '"><time datetime="' . esc_attr( $dtime ) . '">' . $ptime . '</time></a>';

        if( $show_author && $show_time ){
            printf( __( 'Posted by %s on %s', 'tempo' ), $author, $time );
        }
        else if( !$show_author ){
            printf( __( 'Posted on %s', 'tempo' ), $time );
        }
        else if( !$show_time ){
            printf( __( 'Posted by %s', 'tempo' ), $author );
        }
    ?>
</div>
