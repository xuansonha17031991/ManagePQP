<!-- topper wrapper -->
<div class="tempo-topper">

    <!-- container -->
    <div <?php echo tempo_container_class( 'main' ); ?>>
        <div <?php echo tempo_row_class(); ?>>

            <!-- content -->
            <div <?php echo tempo_content_class(); ?>>
                <div <?php echo tempo_row_class(); ?>>

                    <?php tempo_get_template_part( 'templates/header/topper/before' ); ?>

                    <!-- topper content -->
                    <div <?php echo tempo_full_class(); ?>>

                        <?php tempo_get_template_part( 'templates/header/topper/prepend' ); ?>

                        <?php tempo_get_template_part( 'templates/header/topper/site-identity' ); ?>

                        <?php tempo_get_template_part( 'templates/header/topper/site-identity-after' ); ?>

                        <?php tempo_get_template_part( 'templates/header/topper/menu' ); ?>

                        <?php tempo_get_template_part( 'templates/header/topper/append' ); ?>

                    </div><!-- end topper content -->

                    <?php tempo_get_template_part( 'templates/header/topper/after' ); ?>

                </div>
            </div><!-- end content -->

        </div>
    </div><!-- end container -->

</div><!-- end topper wrapper -->
