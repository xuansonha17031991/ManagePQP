<?php

    $prev_text = sprintf( __( '%s Prev', 'tempo' ), '<i class="tempo-icon-left-open-1"></i>' );
    $next_text = sprintf( __( 'Next %s', 'tempo' ), '<i class="tempo-icon-right-open-1"></i>' );

    $args = array(
        'mid_size'  => 2,
        'prev_text' => $prev_text,
        'next_text' => $next_text
    );

    $pagination = get_the_posts_pagination( $args );

    if( !empty( $pagination ) ){
?>
        <div class="clear clearfix"></div>

        <div <?php echo tempo_row_class(); ?>>
            <div class="col-lg-12">
                <div class="pagination-wrapper aligncenter">
                    <?php the_posts_pagination( $args ); ?>
                </div>
            </div>
        </div> 
<?php
    }
?>