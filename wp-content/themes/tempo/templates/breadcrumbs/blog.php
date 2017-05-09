<?php
    if( tempo_options::get( 'breadcrumbs' ) ){

        $nav = '';
        if( !tempo_options::get( 'breadcrumbs-nav' ) )
            $nav = 'no-nav';
?>
		<!-- breadcrumbs wrapper -->
        <div class="tempo-breadcrumbs <?php echo esc_attr( $nav ); ?>">

        	<?php tempo_get_template_part( 'templates/breadcrumbs/prepend', 'blog' ); ?>


	      	<!-- main container -->
            <div <?php echo tempo_container_class( 'main' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                	<!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

			        		<?php tempo_get_template_part( 'templates/breadcrumbs/before-content', 'blog' ); ?>


			        		<!-- navigation and headline -->
			          		<div <?php echo tempo_large_class(); ?>>

			          			<?php tempo_get_template_part( 'templates/breadcrumbs/prepend-content', 'blog' ); ?>


                                <?php if( tempo_options::get( 'breadcrumbs-nav' ) ) : ?>
    			          			<!-- navigation -->
    			            		<nav class="tempo-navigation">

    			            			<?php tempo_get_template_part( 'templates/breadcrumbs/prepend-nav', 'blog' ); ?>

    			              			<ul class="tempo-menu-list">

    			              				<?php tempo_get_template_part( 'templates/breadcrumbs/prepend-list', 'blog' ); ?>

    			                			<?php echo tempo_breadcrumbs::home(); ?>

    			                			<?php tempo_get_template_part( 'templates/breadcrumbs/after-home', 'blog' ); ?>

    			                			<?php tempo_get_template_part( 'templates/breadcrumbs/append-list', 'blog' ); ?>

    			              			</ul>

    			              			<?php tempo_get_template_part( 'templates/breadcrumbs/append-nav', 'blog' ); ?>

    			            		</nav><!-- end navigation -->
                                <?php endif; ?>


			            		<?php tempo_get_template_part( 'templates/breadcrumbs/after-nav', 'blog' ); ?>


			            		<!-- headline / end -->
			            		<h1 id="tempo-headline-blog" class="tempo-headline"><?php echo get_the_title( absint( get_option( 'page_for_posts' ) ) ); ?></h1>

			            		<?php tempo_get_template_part( 'templates/breadcrumbs/append-content', 'blog' ); ?>

			          		</div><!-- end navigation and headline -->


			          		<!-- counter -->
			          		<div <?php echo tempo_small_class( 'details' ); ?>>

		                    	<?php global $wp_query; ?>
		                        <?php echo tempo_breadcrumbs::count( $wp_query ); ?>

		                    </div><!-- end counter -->


			                <?php tempo_get_template_part( 'templates/breadcrumbs/after-content', 'blog' ); ?>

			            </div>
	      			</div><!-- end content -->

	        	</div>
	      	</div><!-- end main container-->


	      	<!-- delimiter container -->
            <div <?php echo tempo_container_class( 'delimiter' ); ?>>
                <div <?php echo tempo_row_class(); ?>>

                	<!-- content -->
                    <div <?php echo tempo_content_class(); ?>>
                        <div <?php echo tempo_row_class(); ?>>

		                    <div <?php echo tempo_full_class(); ?>>
		                        <hr/>
		                    </div>

		                </div>
                    </div><!-- end content -->

                </div>
            </div><!-- end delimiter container -->


	      	<?php tempo_get_template_part( 'templates/breadcrumbs/append', 'blog' ); ?>

	    </div><!-- end breadcrumbs wrapper -->
<?php
	}
?>
