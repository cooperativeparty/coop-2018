<?php
/**
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */
get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
// On WooCommerce pages there is no need for sidebars as they leave
// too little space for WooCommerce itself. We check if WooCommerce
// is active and the current page is a WooCommerce page and we do
// not render sidebars.
?>
    <header class="jumbotron jumbotron-fluid banner bg-primary text-white" data-spy="affix" data-offset-top="166">
        <div class="container">
            <?php echo '<h1 class="display-3 page-title">' . get_the_title() . '</h1>';
                        echo '<p class="lead affix-hide">' . get_the_excerpt()  . '</p>';
                         ?> </div>
    </header>
    <div class="wrapper " id="page-wrapper">
        <div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">
            <div class="row">
                <!-- Do the left sidebar check -->
                <div id="primary" class="content-area col">
                    <section id="post-0" class=" py-2 post no-results not-found jumbotron">
                        <?php get_search_form(); ?>
                            <!-- .page-content -->
                    </section>
                    <main class="site-main my-4" id="main">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'loop-templates/content', 'page' );
                                 endwhile;
                                // end of the loop. ?>
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- Container end -->
    </div>
    <!-- Wrapper end -->
    <?php get_footer(); ?>