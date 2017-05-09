<?php global $post, $posts_total, $posts_index; ?>

<?php tempo_get_template_part( 'templates/article/before' ); ?>

<article <?php post_class( 'tempo-article classic' ); ?>>

    <?php tempo_get_template_part( 'templates/article/prepend' ); ?>

    <?php tempo_get_template_part( 'templates/article/thumbnail' ); ?>

    <div class="sarmys-content">
    	<div class="sarmys-right-align">

		    <?php tempo_get_template_part( 'templates/article/terms/categories' ); ?>

		    <?php tempo_get_template_part( 'templates/article/meta/top' ); ?>

		    <?php tempo_get_template_part( 'templates/article/title' ); ?>

		    <?php tempo_get_template_part( 'templates/article/hentry' ); ?>

	    </div>

	    <div class="clear clearfix"></div>

    </div>

    <?php tempo_get_template_part( 'templates/article/append' ); ?>

    <div class="clear clearfix"></div>

</article>

<?php tempo_get_template_part( 'templates/article/after' ); ?>
