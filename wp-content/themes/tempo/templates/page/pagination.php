<?php
    wp_link_pages( array( 
        'before'        => '<div class="tempo-paged-post"><span class="tempo-pagination-title">' . __( 'Pages', 'tempo' ) . ': </span>',
        'after'         => '<div class="clearfix"></div></div>',
        'link_before'   => '<span class="tempo-pagination-item">',
        'link_after'    => '</span>'
    ));
?>