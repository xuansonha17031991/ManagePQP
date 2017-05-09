<?php global $post ?>

<?php tempo_get_template_part( 'templates/single/before', 'post' ); ?>

<article <?php post_class( 'tempo-article classic single' ); ?>>

    <?php tempo_get_template_part( 'templates/single/prepend', 'post' ); ?>

    <?php tempo_get_template_part( 'templates/single/thumbnail', 'post' ); ?>

    <div class="sarmys-content">

        <?php
            if( !apply_filters( 'sarmys_has_head', tempo_has_header(), $post ) ){
                echo '<div class="sarmys-head">';

                tempo_get_template_part( 'templates/single/terms/categories' );

                tempo_get_template_part( 'templates/single/title' );

                tempo_get_template_part( 'templates/single/meta/top' );

                echo '</div>';
            }
        ?>

        <div class="tempo-hentry">

            <?php tempo_get_template_part( 'templates/single/hentry/prepend', 'post' ); ?>

            <?php the_content(); ?>

            <?php tempo_get_template_part( 'templates/single/hentry/append', 'post' ); ?>

            <div class="clearfix"></div>
        </div>

        <?php tempo_get_template_part( 'templates/single/hentry/after', 'post' ); ?>

        <?php tempo_get_template_part( 'templates/single/pagination', 'post' ); ?>

        <?php tempo_get_template_part( 'templates/single/terms/tags', 'post' ); ?>

        <?php tempo_get_template_part( 'templates/single/author', 'post' ); ?>

        <div class="clear clearfix"></div>

    </div>

    <div class="clearfix"></div>
</article>

<?php tempo_get_template_part( 'templates/single/after', 'post' ); ?>

<?php tempo_get_template_part( 'templates/single/comments/before', 'post' ); ?>

<?php comments_template(); ?>

<?php tempo_get_template_part( 'templates/single/comments/after', 'post' ); ?>

<?php tempo_get_template_part( 'templates/single/append', 'post' ); ?>
