<?php global $post; ?>

<?php tempo_get_template_part( 'templates/single/title/before' ); ?>

<h1 class="tempo-title single">

	<?php tempo_get_template_part( 'templates/single/title/prepend' ); ?>

    <?php the_title(); ?>

    <?php tempo_get_template_part( 'templates/single/title/append' ); ?>

</h1>

<?php tempo_get_template_part( 'templates/single/title/after' ); ?>
