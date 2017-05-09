<?php
	if( !apply_filters( 'sarmys_post_author_box', tempo_options::get( 'post-author-box' ) ) )
		return;

	global $post;

	echo '<div class="tempo-author">';

	echo '<div class="tempo-author-avatar">';
	echo get_avatar( $post -> post_author, 70, get_template_directory_uri() . '/media/img/default-avatar.png' );
	echo '</div>';

	echo '<div class="sarmys-author-name">';
	echo '<span>' . __( 'Author', 'sarmys' ) . '</span>';

	$website = esc_html( get_the_author_meta( 'url' , $post -> post_author ) );

	if( !empty( $website ) ){
		echo '<h4><a href="' . esc_url( $website ) . '" target="_blank">' . esc_html( get_the_author_meta( 'display_name' , $post -> post_author ) ) . '</a></h4>';
	}
	else{
		echo '<h4><a href="' . esc_url( get_author_posts_url( $post -> post_author ) ) . '">' . esc_html( get_the_author_meta( 'display_name' , $post -> post_author ) ) . '</a></h4>';
	}

	echo '</div>';

	echo '<div class="tempo-author-social-networks">';
	echo '</div>';

	echo '<div class="clear clearfix"></div>';
	echo '</div>';
?>
