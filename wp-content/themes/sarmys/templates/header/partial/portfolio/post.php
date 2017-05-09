<?php global $post; ?>

<div <?php echo tempo_full_class(); ?>>

	<div class="sarmys-header">

		<!-- CATEGORIES -->
		<?php tempo_get_template_part( 'templates/single/terms/categories' ); ?>

		<!-- POST TITLE -->
		<h1 class="tempo-header-headline"><?php echo get_the_title( $post ); ?></h1>

		<!-- HEADER META -->
		<?php tempo_get_template_part( 'templates/single/meta/top' ); ?>

	</div>

</div>
