<?php
    global $wp_query;

    $time = null;

    $label = _n( 'One Article' , '%s Articles' ,  absint( $wp_query -> found_posts ) , 'sarmys' );

    if ( is_day() ){
        $day    = get_the_date( );
        $m      = get_the_date( 'm' );
        $d      = get_the_date( 'd' );

        $month  = get_the_date( 'F' );
        $year   = get_the_date( 'Y' );
        $FY     = get_the_date( 'F Y' );

        echo '<h1 class="tempo-header-headline">' . __( 'Daily Archives' , 'sarmys' ) . '</h1>';

        echo '<hr class="sarmys-header-delimiter"/>';

        echo '<ul class="sarmys-archive">';
        echo '<li><a href="' . esc_url( get_year_link( $year ) ) . '" title="' . sprintf( __( 'Yearly archives - %s' , 'sarmys' ), esc_attr( $year ) ) . '">'  . $year . '</a></li>';
        echo '<li><a href="' . esc_url( get_month_link( $year, $m ) ) . '" title="' . sprintf( __( 'Monthly archives - %s' , 'sarmys' ), esc_attr( $FY ) ) . '">'  . $month . '</a></li>';
        echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . $d . '</time> <span style="color:rgba( 255, 255, 255, 0.6 ); margin: 0px 20px;">|</span> <span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></li>';
        echo '</ul>';

    }else if ( is_month() ){
        $month  = get_the_date( 'F' );
        $year   = get_the_date( 'Y' );

        echo '<h1 class="tempo-header-headline">' . __( 'Monthly Archives' , 'sarmys' ) . '</h1>';

        echo '<hr class="sarmys-header-delimiter"/>';

        echo '<ul class="sarmys-archive">';
        echo '<li><a href="' . esc_url( get_year_link( $year ) ) . '" title="' . sprintf( __( 'Yearly archives - %s' , 'sarmys' ), esc_attr( $year ) ) . '">'  . $year . '</a></li>';
        echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">' . $month . '</time> <span style="color:rgba( 255, 255, 255, 0.6 ); margin: 0px 20px;">|</span> <span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></li>';
        echo '</ul>';

    }else if ( is_year() ){
        $year   = get_the_date( 'Y' );

        echo '<h1 class="tempo-header-headline">' . __( 'Yearly Archives' , 'sarmys' ) . '</h1>';

        echo '<hr class="sarmys-header-delimiter"/>';

        echo '<ul class="sarmys-archive">';
        echo '<li><time datetime="' . esc_attr( get_the_date( 'Y-m-d' ) ) . '">'  . $year . '</time> <span style="color:rgba( 255, 255, 255, 0.6 ); margin: 0px 20px;">|</span> <span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></li>';
        echo '</ul>';

    }else{
        echo '<h1 class="tempo-header-headline">' . __( 'Archive' , 'sarmys' ) . '</h1>';

        echo '<hr class="sarmys-header-delimiter"/>';

        echo '<p><span class="counter-wrapper">' . sprintf( $label , '<span class="counter">' . number_format_i18n( absint( $wp_query -> found_posts ) ) . '</span>' ) . '</span></p>';
    }
?>
