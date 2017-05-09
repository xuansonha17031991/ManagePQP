<div <?php post_class(); ?>>

    <?php tempo_get_template_part( 'templates/page/prepend' ); ?>

    <div class="sarmys-content">

        <?php
            if( !tempo_has_header() ){
                echo '<div class="sarmys-head">';

                tempo_get_template_part( 'templates/page/title' );

                tempo_get_template_part( 'templates/page/meta/top' );

                echo '</div>';
            }
        ?>

        <div class="tempo-hentry">

            <?php tempo_get_template_part( 'templates/page/hentry/prepend' ); ?>

            <?php the_content(); ?>

            <?php tempo_get_template_part( 'templates/page/hentry/append' ); ?>

            <div class="clearfix"></div>
        </div>

        <?php tempo_get_template_part( 'templates/page/hentry/after' ); ?>

        <?php tempo_get_template_part( 'templates/page/pagination' ); ?>

        <div class="clear clearfix"></div>

    </div>

    <div class="clearfix"></div>

</div>

<?php tempo_get_template_part( 'templates/page/after' ); ?>

<?php tempo_get_template_part( 'templates/page/comments/before' ); ?>

<?php comments_template(); ?>

<?php tempo_get_template_part( 'templates/page/comments/after' ); ?>

<?php tempo_get_template_part( 'templates/page/append' ); ?>
