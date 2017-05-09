<!-- topper wrapper -->
<div class="tempo-topper">

	<!-- container -->
    <div <?php echo tempo_container_class( 'main' ); ?>>
        <div <?php echo tempo_row_class(); ?>>

			<?php tempo_get_template_part( 'templates/header/topper/before' ); ?>

				<?php tempo_get_template_part( 'templates/header/topper/prepend' ); ?>

				<?php tempo_get_template_part( 'templates/header/topper/menu' ); ?>

				<?php tempo_get_template_part( 'templates/header/topper/menu-after' ); ?>

                <div class="sarmys-site-identity">

                    <?php tempo_get_template_part( 'templates/header/topper/site-identity' ); ?>

				    <?php tempo_get_template_part( 'templates/header/topper/site-identity-after' ); ?>

                </div>

			    <?php tempo_get_template_part( 'templates/header/topper/append' ); ?>

		    <?php tempo_get_template_part( 'templates/header/topper/after' ); ?>

		</div>
	</div><!-- end container -->

</div><!-- end topper wrapper -->
