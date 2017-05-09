<?php global $post; ?>

<div <?php echo tempo_full_class(); ?>>

    <div class="sarmys-header">

        <!-- PAGE TITLE -->
        <h1 class="tempo-header-headline"><?php echo get_the_title( $post ); ?></h1>

        <!-- HEADER META -->
        <?php tempo_get_template_part( 'templates/page/meta/top' ); ?>

    </div>

</div>
