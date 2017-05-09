<?php
    global $post;

    if( !apply_filters( 'tempo_post_tags', tempo_options::get( 'post-tags' ), $post -> ID ) )
        return;

	if( has_tag() ){
?>
		<hr class="tempo-meta-delimiter"/>

        <div class="tempo-meta bottom single">
            <div class="tempo-terms tags">
              	<?php the_tags( '' , '' , '' ); ?>
                <div class="clear clearfix"></div>
            </div>
        </div>
<?php
	}
?>
