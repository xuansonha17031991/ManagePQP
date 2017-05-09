<div <?php post_class(); ?>>

    <?php tempo_get_template_part( 'templates/page/prepend', 'front-page' ); ?>

    <?php tempo_get_template_part( 'templates/page/thumbnail/before', 'front-page' ); ?>

    <?php tempo_get_template_part( 'templates/page/thumbnail', 'front-page' ); ?>

    <?php tempo_get_template_part( 'templates/page/thumbnail/after', 'front-page' ); ?>

    <?php tempo_get_template_part( 'templates/page/hentry/before', 'front-page' ); ?>

    <div class="tempo-hentry">

    <?php tempo_get_template_part( 'templates/page/hentry/prepend', 'front-page' ); ?>

    <?php the_content(); ?>

    <?php tempo_get_template_part( 'templates/page/hentry/append', 'front-page' ); ?>

    <div class="clearfix"></div>
    </div>

    <?php tempo_get_template_part( 'templates/page/hentry/after', 'front-page' ); ?>

    <?php tempo_get_template_part( 'templates/page/pagination', 'front-page' ); ?>

    <?php tempo_get_template_part( 'templates/page/comments/before', 'front-page' ); ?>

    <?php comments_template(); ?>

    <?php tempo_get_template_part( 'templates/page/comments/after', 'front-page' ); ?>

    <?php tempo_get_template_part( 'templates/page/append', 'front-page' ); ?>

    <div class="clearfix"></div>
</div>