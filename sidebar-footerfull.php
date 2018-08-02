<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

$container   = get_theme_mod( 'understrap_container_type' );

?>
    <?php if ( is_active_sidebar( 'footerfull' ) ) : ?>
        <!-- ******************* The Footer Full-width Widget Area ******************* -->
        <div class="wrapper jumbotron jumbotron-fluid bg-primary text-white bg-microsite hidden-print" id="wrapper-footer-full">
            <div class="<?php echo esc_html( $container ); ?> py-5" id="content">
                <div class="row">
                    <?php dynamic_sidebar( 'footerfull' ); ?>
                </div>
            </div>
        </div>
        <!-- #wrapper-footer-full -->
        <?php endif; ?>