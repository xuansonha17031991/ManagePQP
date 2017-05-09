<?php
    if( !class_exists( 'tempo_page' ) ){
        class tempo_page
        {
            private $page = array();
            private $section;

            function __construct( $slug, $args )
            {
                $this -> args       = (array)$args;
                $this -> slug       = $slug;
                $this -> section    = new tempo_section();
            }

            public function get()
            {
                if( !isset( $_GET ) || !isset( $_GET[ 'page' ] ) ){
                    wp_die( 'Invalid page name', 'tempo' );
                    return;
                }

                echo '<div class="tempo-page">';

                echo $this -> header();
                echo $this -> notifications();
                echo $this -> content();

                echo '</div>';
            }

            public function header()
            {
                $rett  = '';

                $rett .= '<div class="tempo-page-header">';
                $rett .= '<div class="tempo-topper"></div>';
                $rett .= '<div class="tempo-middle tempo-columns-wrapper">';


                $rett .= '<div class="tempo-column lg-3 md-4 sm-4">';

                $uri_title = esc_url( tempo_core::author( 'uri-title' ) );
                
                if( !empty( $uri_title ) ){
                    $rett .= '<h1 class="tempo-brand"><a href="' . esc_url( $uri_title ) . '" title="' . esc_attr( tempo_core::author( 'name' ) .' - ' . tempo_core::author( 'description' ) ) . '">' . tempo_core::author( 'name' ) . '</a></h1>';
                }
                else{
                    $rett .= '<h1 class="tempo-brand">' . tempo_core::author( 'name' ) . '</h1>';
                }

                $rett .= '</div>';

                $rett .= '<div class="tempo-column lg-9 md-8 sm-8">';
                $rett .= '<nav class="tempo-nav">';

                $contact = esc_url_raw( tempo_core::author( 'contact' ) );

                if( !empty( $contact ) ){
                    $rett .= '<ul class="tempo-list tempo-inline">';
                    $rett .= '<li>';
                    $rett .= '<a href="' . esc_url( $contact ) .'">' . __( 'Contact US', 'tempo' ) . '</a>';
                    $rett .= '</li>';
                    $rett .= '</ul>';
                }

                $uri = esc_url( tempo_core::theme( 'premium-faq' ) );

                if( !tempo_core::is_active_premium() && !empty( $uri ) ){
                    $rett .= '<ul class="tempo-list tempo-inline special-nav">';

                    $rett .= '<li>';
                    $rett .= '<a href="' . esc_url( $uri ) . '" class="tempo-upgrade"><i class="tempo-icon-publish"></i> <span>' . __( 'Upgrade to Premium', 'tempo' ) . '</span></a>';
                    $rett .= '</li>';

                    $rett .= '</ul>';
                }

                $rett .= '</nav>';
                $rett .= '</div>';

                $rett .= '<div class="clear clearfix"></div>';
                $rett .= '</div>';
                $rett .= '<div class="tempo-poor"></div>';
                $rett .= '</div>';


                /* BLANK SPACE */
                $rett .= '<div class="tempo-blank">';

                $description = esc_url( tempo_core::author( 'uri-description' ) );

                if( !empty( $description ) ){
                    $rett .= '<span class="tempo-author-description">';
                    $rett .= '<a href="' . esc_url( $description ) . '" target="_blank">' . tempo_core::author( 'description' ) . '</a>';
                    $rett .= '</span>';
                }

                $version = esc_url( tempo_core::theme( 'uri-version' ) );

                if( !empty( $version ) ){
                    $rett .= '<a href="' . esc_url( $version ) . '" target="_blank">' . sprintf( __( '%s - free version ( %s )', 'tempo' ), '<strong>' . tempo_core::theme( 'Name' ) . '</strong>',  tempo_core::theme( 'Version' ) ) . '</a>';
                }
                else{
                    $rett .= sprintf( __( '%s - free version ( %s )', 'tempo' ), '<strong>' . tempo_core::theme( 'Name' ) . '</strong>',  tempo_core::theme( 'Version' ) );
                }

                $rett .= '</div>';

                return $rett;
            }

            public function notifications()
            {
                $rett = '';

                /**
                 *  Notification Update
                 */
                if( isset( $_GET[ 'options-updated' ] ) && $_GET[ 'options-updated' ] == 'true' ){
                    $rett = tempo_html::notification( array(
                        'type'          => 'success',
                        'class'         => 'tempo-admin-page-notification',
                        'description'   => __( 'Options are updated successfully !' , 'tempo' )
                    ));
                }

                /**
                 *  Reset Notification
                 */
                else if( isset( $_GET[ 'options-reset' ] ) && $_GET[ 'options-reset' ] == 'true' ){
                    $rett = tempo_html::notification( array(
                        'type'          => 'notify',
                        'class'         => 'tempo-admin-page-notification',
                        'description'   => __( 'Options are reset successfully !' , 'tempo' )
                    ));
                }

                /**
                 *  Undefined Notification
                 */
                if( isset( $_GET[ 'notification' ] ) && !empty( $_GET[ 'notification' ] ) ){
                    $rett .= tempo_html::notification( array(
                        'type'          => 'wrong',
                        'class'         => 'tempo-admin-page-notification',
                        'description'   => urldecode( esc_attr( $_GET[ 'notification' ] ) )
                    ));
                }

                $notifications = apply_filters( 'tempo_admin_page_notifications', null, $this );

                if( !empty( $notifications ) ){
                    $rett .= $notifications;
                }

                return $rett;
            }

            public function content()
            {
                $rett = '';

                $rett .= '<div class="tempo-page-content">';

                /**
                 *  Admin Prepend Page Content
                 */
                $rett .= apply_filters( 'tempo_admin_prepend_page_content', null, $this );

                /**
                 *  Get content from template file
                 */
                $rett .= tempo_get_content( $this -> args );

                /**
                 *  Generate fields, boxes, columns and sections from config args
                 */
                if( isset( $this -> args[ 'sections' ] ) && !empty( $this -> args[ 'sections' ] ) && is_array( $this -> args[ 'sections' ] ) ){
                    $sections = $this -> args[ 'sections' ];

                    foreach( $sections as $index => $args ){
                        $rett .= $this -> section -> get( $args );
                    }
                }

                /**
                 *  Admin Append Page Content
                 */
                $rett .= apply_filters( 'tempo_admin_append_page_content', null, $this );

                $rett .= '</div>';

                return $rett;
            }
        }
    }
?>
