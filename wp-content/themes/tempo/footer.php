    
            <?php tempo_get_template_part( 'templates/footer/before' ); ?>

            <footer id="tempo-footer" class="tempo-footer" role="contentinfo">

                <?php tempo_get_template_part( 'templates/footer/prepend' ); ?>
                
                <?php tempo_get_template_part( 'templates/footer/copyright' ); ?>

                <?php tempo_get_template_part( 'templates/footer/before-social' ); ?>

                <?php tempo_get_template_part( 'templates/footer/social' ); ?>

                <?php tempo_get_template_part( 'templates/footer/append' ); ?>

            </footer>

            <?php tempo_get_template_part( 'template/footer/after' ); ?>

            <?php tempo_get_template_part( 'templates/website-wrapper/append' ); ?>

        </div>

        <?php tempo_get_template_part( 'templates/website-wrapper/after' ); ?>

        <?php tempo_get_template_part( 'template/body/append' ); ?>

        <?php wp_footer(); ?>

    </body>

</html>