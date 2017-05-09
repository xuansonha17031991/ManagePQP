<?php
if( !class_exists( 'tempo_comments' ) ){

class tempo_comments
{
	/* DUSQUSE */
	/* FACEBOOK */
	/* WORDPRESS */
	static function classic( $comment, $args, $depth )
    {
        global $post;

		$file = get_stylesheet_directory() . '/media/img/default-avatar.png';
		$avatar = get_stylesheet_directory_uri() . '/media/img/default-avatar.png';

		if( !file_exists( $file ) )
        	$avatar = get_template_directory_uri() . '/media/img/default-avatar.png';

        $GLOBALS['comment'] = $comment;
        switch ( $comment -> comment_type ) {
            case '' : {
                echo '<li '; comment_class(); echo' id="li-comment-'; comment_ID(); echo '">';
                echo '<div id="comment-'; comment_ID(); echo '" class="comment-box">';
                echo '<header>';
                echo get_avatar( $comment -> comment_author_email , 62  , $avatar );
                echo '<span class="tempo-comment-meta">';

                comment_reply_link( array_merge( $args , array(
                    'reply_text'    => __( 'Reply', 'tempo' ),
                    'before'        => '<span class="comment-replay">',
                    'after'         => '</span>',
                    'depth'         => (int)$depth
                )));

                echo '<cite>';

                if( $comment -> user_id == $post -> post_author ){
                    echo '<span class="tempo-author-tag">' . __( 'Author' , 'tempo' ) . '</span>';
                }

                echo get_comment_author_link( $comment -> comment_ID );
                echo '</cite>';
                echo '<time datetime="' . esc_attr( get_comment_date( 'Y-m-d' , $comment -> comment_ID ) ) . '" class="comment-time">';
                echo sprintf( __( 'Posted on %s %s', 'tempo' ), '<span class="tempo-comment-titme">' . get_comment_date( esc_attr( get_option( 'time_format' ) ), $comment -> comment_ID ) . '</span>', '<span class="tempo-comment-date">' . get_comment_date( esc_attr( get_option( 'date_format' ) ) , $comment -> comment_ID ) . '</span>' );
                echo '</time>';

                echo '</span>';
                echo '<div class="clear clearfix"></div>';
                echo '</header>';

                echo '<div class="comment-quote">';
                if ( $comment -> comment_approved == '0' ) {
                    echo '<em class="comment-awaiting-moderation">';
                    _e( 'Your comment is awaiting moderation.' , 'tempo' );
                    echo '</em>';
                }
                echo get_comment_text();
                echo '</div>';

                echo '</div>';
                break;
            }
            default : {
                echo '<li '; comment_class(); echo' id="li-comment-'; comment_ID(); echo '">';
                echo '<div id="comment-'; comment_ID(); echo '" class="comment-box">';
                echo '<header>';
                echo '<span class="tempo-comment-meta">';
                echo '<cite>';
                echo get_comment_author_link( $comment -> comment_ID );
                echo '</cite>';
                echo '<time datetime="' . esc_attr( get_comment_date( 'Y-m-d' , $comment -> comment_ID ) ) . '" class="comment-time">';
                echo sprintf( __( 'Posted on %s %s', 'tempo' ), '<span class="tempo-comment-titme">' . get_comment_date( esc_attr( get_option( 'time_format' ) ), $comment -> comment_ID ) . '</span>', '<span class="tempo-comment-date">' . get_comment_date( esc_attr( get_option( 'date_format' ) ) , $comment -> comment_ID ) . '</span>' );
                echo '</time>';

                echo '</span>';
                echo '<div class="clear clearfix"></div>';
                echo '</header>';

                echo '<div class="comment-quote">';
                echo get_comment_text();
                echo '</div>';

                echo '</div>';
                break;
            }
        }
    }
}

}   /* END IF CLASS EXISTS */
?>
