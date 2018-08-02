<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>
    <?php get_sidebar( 'footerfull' ); ?>
        <div class="wrapper py-3" id="wrapper-footer">
            <div class="<?php echo esc_html( $container ); ?>">
                <div class="row">
                    <div class="col-md-12">
                        <footer class="site-footer small text-muted" id="colophon">
                            <div class="site-info float-left hidden-print">
                                <a href="<?php echo esc_url( __( 'http://wordpress.org/','understrap' ) ); ?>">
                                    <?php printf( esc_html__( 'Proudly %s', 'understrap' ),'Open Source' ); ?>
                                </a> <span class="sep"> | </span>
                                <?php printf( // WPCS: XSS ok.
							esc_html__( 'Built using %1$s.', 'understrap' ),
						'<a href="http://understrap.com/">Understrap</a>, SCSS and Bootstrap 4' ); ?> (
                                    <?php printf( // WPCS: XSS ok.
							esc_html__( 'Version: %1$s', 'understrap' ), $the_theme->get( 'Version' ) ); ?>) </div>
                            <div class="imprint">Promoted by Claire McCarthy on behalf of the Co-operative Party, both at 65 St John Street, London EC1M 4AN. <small class="d-block d-print-inline">Co-operative Party Limited is a registered Society under the Co-operative
and Community Benefit Societies Act 2014. Registered no. 30027R
</small></div>
                            <!-- .site-info -->
                        </footer>
                        <!-- #colophon -->
                    </div>
                    <!--col end -->
                </div>
                <!-- row end -->
            </div>
            <!-- container end -->
        </div>
        <!-- wrapper end -->
        </div>
        <!-- #page -->
        <?php wp_footer(); ?>
            </body>

            </html>