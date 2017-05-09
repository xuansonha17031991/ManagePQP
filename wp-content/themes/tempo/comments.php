<?php
if( comments_open() ){
    if( is_user_logged_in() ){
        echo '<div id="comments" ' . tempo_comments_class( 'tempo-comments-wrapper user-logged-in' ) . '>';
    }
    else{
        echo '<div id="comments" ' . tempo_comments_class( 'tempo-comments-wrapper user-not-logged-in' ) . '>';
    }

    if ( post_password_required() ){
        echo '<p class="nopassword">';
        _e( 'This post is password protected. Enter the password to view any comments.' , 'tempo' );
        echo '</p>';
        echo '</div>';
        return;
    }

    if( apply_filters( 'tempo_custom_comments', false ) ){

        /**
         *  To customize your comments you can use filter
         *  tempo_custom_comments
         */

        return;

    }

    /* IF EXISTS WORDPRESS COMMENTS */
    else if ( have_comments() ) {
        $nr = absint( get_comments_number() );

        echo '<div class="tempo-comments-list-wrapper">';
        echo '<h3 class="tempo-comments-title">';
        echo sprintf( _nx( 'Comment ( %s )' , 'Comments ( %s )' , $nr , 'Title before comment(s) list' , 'tempo' ) , '<strong>' . number_format_i18n( $nr ) . '</strong>' );
        echo '</h3>';

        echo '<ol class="tempo-comments-list">';

        wp_list_comments( array(
            'callback' => array( 'tempo_comments' , 'classic' ),
            'style' => 'ul'
        ));

        echo '</ol>';
        echo '</div>';

        tempo_get_template_part( 'templates/comments/pagination' );
    }

    if ( !have_comments() ) {

        /**
         *  If not found comments load custom template
         *  ../templates/comments/no-comments.php
         */

        tempo_get_template_part( 'templates/comments/no-comments' );
    }

    /* FORM SUBMIT COMMENTS */
    $commenter = wp_get_current_commenter();

    $name   = esc_attr( $commenter[ 'comment_author' ] ) ? esc_attr( $commenter[ 'comment_author' ] ) : null;
    $email  = esc_attr( $commenter[ 'comment_author_email' ] ) ? esc_attr( $commenter[ 'comment_author_email' ] ) : null;
    $web    = esc_attr( $commenter[ 'comment_author_url' ] ) ? esc_attr( $commenter[ 'comment_author_url' ] ) : null;

    /* FIELDS */
    $fields =  array(
        'author' => '<div class="field">'.
                    '<p class="comment-form-author input"><input class="required" value="' . $name . '" placeholder="' . __( 'Name (Required)', 'tempo' ) . '" id="author" name="author" type="text" size="30"/></p>',
        'email'  => '<p class="comment-form-email input"><input class="required" value="' . $email . '" placeholder="' . __( 'Email (Required)', 'tempo' ) . '" id="email" name="email" type="text" size="30" /></p>',
        'url'    => '<p class="comment-form-url input"><input value="' . $web . '" placeholder="' . __( 'Website URL', 'tempo' ) . '" id="url" name="url" type="text" size="30"/></p><div class="clear clearfix"></div></div>'
    );

    $text = '';

    if ( !have_comments() ) {
        $text  = '<div class="textarea"><p class="comment-form-comment textarea">';
        $text .= '<textarea id="comment" name="comment" cols="45" rows="10" aria-required="true" placeholder="' . __( 'Be first! Add your comment here...', 'tempo' ) . '"></textarea>';
        $text .= '</p></div>';
    }
    else{
        $text  = '<div class="textarea"><p class="comment-form-comment textarea">';
        $text .= '<textarea id="comment" name="comment" cols="45" rows="10" aria-required="true" placeholder="' . __( 'Add your comment here...', 'tempo' ) . '"></textarea>';
        $text .= '</p></div>';
    }

    $args = array(
        'title_reply'           => '',
        'comment_notes_after'   => '',
        'comment_notes_before'  => '',
        'logged_in_as'          => '',
        'fields'                => apply_filters( 'comment_form_default_fields', $fields ),
        'comment_field'         => $text,
        'label_submit'          => __( 'Post Comment' , 'tempo' )
    );

    echo '<div class="tempo-comments">';
    comment_form( $args );
    echo '<div class="clearfix"></div>';
    echo '</div>';
    echo '</div>';

    echo '<div class="comments-list-collapse">';

    if ( have_comments() ) {
        $nr = absint( get_comments_number() );
        echo '<a href="javascript:void(null);" class="' . esc_attr( apply_filters( 'tempo_submi_comment_class', 'tempo-btn btn-primary btn-hover-empty icon-left' ) ) . '"><i class="tempo-icon-chat-5"></i>' . sprintf( _nx( 'View Comment (%s) ...' , 'View Comments (%s) ...' , $nr , 'Button after comment(s) form' , 'tempo' ) , number_format_i18n( $nr ) ) . '</a>';
    }
    else{
        echo '<a href="javascript:void(null);" class="' . esc_attr( apply_filters( 'tempo_submi_comment_class', 'tempo-btn btn-primary btn-hover-empty icon-left' ) ) . '"><i class="tempo-icon-chat-5"></i>' . __( 'View Comments ...', 'tempo' ) . '</a>';
    }

    echo '</div>';
}
?>
