<?php
    global $post;

    $show_author    = apply_filters( 'sarmys_blog_author',      tempo_options::get( 'blog-author' ) );
    $show_time      = apply_filters( 'sarmys_blog_time',        tempo_options::get( 'blog-time' ) );
    $show_comments  = apply_filters( 'sarmys_blog_comments',    tempo_options::get( 'blog-comments' ) );

    if( !( $show_author || $show_time || $show_comments ) )
        return;
?>

<div class="tempo-meta top article">

    <?php
        // author
        $name   = get_the_author_meta( 'display_name' , $post -> post_author );

        if( $show_author ){
            echo '<a class="author" href="' . esc_url( get_author_posts_url( $post -> post_author ) ) . '" title="' . sprintf( __( 'Posted by %s' , 'sarmys' ) , esc_attr( $name ) ) . '">' . get_avatar( $post -> post_author, 90, get_template_directory_uri() . '/media/img/default-avatar.png' ). '</a>';
        }

        // time
        $y      = esc_attr( get_post_time( 'Y', false, $post ) );
        $m      = esc_attr( get_post_time( 'm', false, $post ) );
        $d      = esc_attr( get_post_time( 'd', false, $post ) );
        $dtime  = get_post_time( 'Y-m-d', false, $post );
        $ptime  = get_post_time( esc_attr( get_option( 'date_format' ) ), false , $post, true );


        if( $show_time ){
            echo '<span class="date">';
            echo '<a href="' . esc_url( get_day_link( $y , $m , $d ) )  . '" title="' . sprintf( __( 'posted on %s', 'sarmys' ), $ptime ) . '">';
            //echo '<i class="tempo-icon-clock-1"></i> ';
            echo '<time datetime="' . esc_attr( $dtime ) . '">' . $ptime . '</time>';
            echo '</a>';
            echo '</span>';
        }



        if( $post -> comment_status == 'open' && $show_comments ) {
            $nr = get_comments_number( $post -> ID );

            echo '<span class="comments">';
            echo '<a href="' . esc_url( get_comments_link( $post -> ID ) ) . '">';
            echo sprintf( _nx( '%s Comment', '%s Comments', absint( $nr ), '...', 'sarmys' ), number_format_i18n( absint( $nr ) ) );
            echo '</a>';
        }
    ?>
</div>
