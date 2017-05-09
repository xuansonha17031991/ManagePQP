<?php
	if( !apply_filters( 'tempo_blog_categories', tempo_options::get( 'blog-categories' ) ) )
		return;

	global $post;

	if( has_category( null, $post ) ){
?>
		<div class="tempo-categories article">

			<?php tempo_the_post_categories( $post -> ID, '<span>/</span>' ) ?>

		</div>
<?php
	}
?>
