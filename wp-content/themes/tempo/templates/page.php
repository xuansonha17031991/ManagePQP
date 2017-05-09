<div <?php post_class(); ?>>

    <?php tempo_get_template_part( 'templates/page/prepend' ); ?>

    <?php tempo_get_template_part( 'templates/page/thumbnail/before' ); ?>

    <?php tempo_get_template_part( 'templates/page/title' ); ?>

    <?php tempo_get_template_part( 'templates/page/title/after' ); ?>

    <?php tempo_get_template_part( 'templates/page/meta/top' ); ?>

    <?php tempo_get_template_part( 'templates/page/thumbnail' ); ?>

    <?php tempo_get_template_part( 'templates/page/thumbnail/after' ); ?>

    <?php tempo_get_template_part( 'templates/page/hentry/before' ); ?>

    <div class="tempo-hentry">

    <?php tempo_get_template_part( 'templates/page/hentry/prepend' ); ?>

    <?php the_content(); ?>

    <?php tempo_get_template_part( 'templates/page/hentry/append' ); ?>

    <div class="clearfix"></div>
    </div>

    <?php tempo_get_template_part( 'templates/page/hentry/after' ); ?>

    <?php tempo_get_template_part( 'templates/page/pagination' ); ?>

    <?php tempo_get_template_part( 'templates/page/comments/before' ); ?>

    <?php comments_template(); ?>

    <?php tempo_get_template_part( 'templates/page/comments/after' ); ?>

    <?php tempo_get_template_part( 'templates/page/append' ); ?>

    <div class="clearfix"></div>
</div>
