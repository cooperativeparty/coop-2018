<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
get_header();
get_template_part( 'partials/banner', 'single' );
?>
        <div class="wrapper" id="single-wrapper">
            <?php get_template_part( 'partials/archived', 'notice' ); ?>
                <div id="content" class="container">
                    <div class="row">
                        <div id="primary" class="col content-area py-5">
                            <main id="main" class="site-main" role="main">
                          <?php while ( have_posts() ) : the_post();
                                get_template_part( 'loop-templates/content', get_post_type() );
                                echo '<hr/>';
                                endwhile; ?>
                            </main>
                            <!-- #main -->
                        </div>
                        <!-- #primary -->
                        <?php get_sidebar(); ?>
                    </div>
                    <!-- .row -->
                </div>
                <!-- Container end -->
        </div>
        <!-- Wrapper end -->
        <?php get_footer(); ?>