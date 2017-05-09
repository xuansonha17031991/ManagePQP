<div class="tempo-navigation-wrapper nav-collapse">

    <div class="tempo-navigation-shadow"></div>

    <!-- TOPPER MENU -->
    <nav class="tempo-navigation">

        <?php get_search_form(); ?>

        <div class="tempo-menu-content">

            <?php
                $args = array(
                    'theme_location'    => 'tempo-header',
                    'container_class'   => 'tempo-menu-wrapper',
                    'menu_class'        => 'tempo-menu-list'
                );
                
                $location = get_nav_menu_locations();

                if( has_nav_menu( 'tempo-header' ) ){
                    wp_nav_menu( $args );
                }else{
                    $pages = get_posts( array(
                        'numberposts'   => 5,
                        'post_type'     => 'page',
                        'order'         => 'ASC'
                    ) );
                    
                    if( !empty( $pages ) ){

                        echo '<div class="tempo-menu-wrapper">';
                        echo '<ul class="tempo-menu-list">';

                        foreach( $pages as $p => $item ){
                            $classes                = '';
                            $tempo_curr_ancestor = false;

                            if( $item -> post_parent > 0 ){
                                continue;
                            }

                            if( is_page( $item -> ID ) ||  ( $item -> ID === absint( get_option( 'page_for_posts' ) ) && is_home() ) ){
                                $classes = 'current-menu-item';
                            }

                            $submenu = tempo_submenu( $item -> ID );

                            if( !empty( $submenu ) ){
                                $classes .= ' menu-item-has-children';

                                if( $tempo_curr_ancestor  ){
                                    $classes .= ' current-menu-ancestor';
                                }
                            }
                                
                            echo '<li class="menu-item ' . esc_attr( $classes ) . '">';
                            echo '<a href="' . esc_url( get_permalink( $item ) ) . '" title="' . esc_attr( get_the_title( $item ) ) . '">' . get_the_title( $item ) . '</a>';
                            echo $submenu;
                            echo '</li>';
                        }

                        echo '</ul>';
                        echo '</div>';
                    }
                }
            ?>

            <?php //- TO DO: FILTER ACTION -// ?>
        </div>
    </nav>

</div>