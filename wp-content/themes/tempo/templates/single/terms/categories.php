<?php
	global $post;

	if( !apply_filters( 'tempo_post_categories', tempo_options::get( 'post-categories' ), $post -> ID ) )
		return;

	if( has_category( null, $post ) ){
?>
		<div class="tempo-categories single">

			<?php tempo_the_post_categories( $post -> ID, '<span>/</span>' ) ?>

		</div>
<?php
	}
?>
