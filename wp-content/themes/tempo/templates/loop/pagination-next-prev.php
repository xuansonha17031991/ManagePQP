<?php
    $prev_arrow = '<i class="tempo-icon-left-open-1"></i>';              // TO DO: ADD ACTION OR FILTER
    $next_arrow = '<i class="tempo-icon-right-open-1"></i>';             // TO DO: ADD ACTION OR FILTER

    $prev_label = sprintf( __( '%s Previous', 'tempo' ), $prev_arrow );     // TO DO: ADD ACTION OR FILTER
    $next_label = sprintf( __( 'Next %s', 'tempo' ), $next_arrow );         // TO DO: ADD ACTION OR FILTER

    posts_nav_link( null, $prev_label, $next_label );
?>