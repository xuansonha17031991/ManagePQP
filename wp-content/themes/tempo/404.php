<?php tempo_get_header( '404' ); ?>

    <?php tempo_get_template_part( 'templates/prepend', '404' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/404' ); ?>

    <?php tempo_get_template_part( 'templates/breadcrumbs/after', '404' ); ?>

    <!-- page -->
    <div id="tempo-page" <?php echo tempo_page_class( 'template-404' ); ?>>

        <?php tempo_get_template_part( 'templates/container/before', '404' ); ?>

        <!-- container -->
        <div <?php echo tempo_container_class(); ?>>
            <div <?php echo tempo_row_class(); ?>>

                <!-- content -->
                <div <?php echo tempo_content_class(); ?>>
                    <div <?php echo tempo_row_class(); ?>>

                        <?php tempo_get_template_part( 'templates/section/before', '404' ); ?>

                        <section <?php echo tempo_404_section_class( 'tempo-section tempo-404' ); ?>>

                            <?php tempo_get_template_part( 'templates/section/prepend', '404' ); ?>

                            <?php tempo_get_template_part( 'templates/404/hentry/before' ); ?>

                            <div class="tempo-hentry">

                                <?php tempo_get_template_part( 'templates/404/hentry/append' ); ?>

                                <?php tempo_get_template_part( 'templates/404' ); ?>

                                <?php tempo_get_template_part( 'templates/404/hentry/prepend' ); ?>

                            <div>

                            <?php tempo_get_template_part( 'templates/404/hentry/after' ); ?>

                            <?php tempo_get_template_part( 'templates/section/append', '404' ); ?>

                        </section>

                        <?php tempo_get_template_part( 'templates/section/after', '404' ); ?>

                    </div>
                </div><!-- end content -->

            </div>
        </div><!-- end container -->


        <?php tempo_get_template_part( 'templates/container/after', '404' ); ?>

    </div><!-- end page -->

    <?php tempo_get_template_part( 'templates/append', '404' ) ?>

<?php tempo_get_footer( '404' ); ?>
