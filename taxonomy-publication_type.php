<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header();
get_template_part( 'partials/banner', 'archive' ); ?>
    <div class="wrapper my-5" id="archive-wrapper">
        <div id="content" class="container">
            <div class="row">
                <div id="primary" class="col content-area">
                    <main id="main" class="site-main" role="main">
                        <?php
                        $i = 1;
                        if ( have_posts() ) : ?>
                            <div class="mb-4 d-flex flex-wrap align-content-stretch">
                                <?php while ( have_posts() ) : the_post();?>
                                    <div id="post-<?php the_ID(); ?>" <?php post_class( 'mb-lg-3 mb-2 col-lg-4 col-xl-3 col-12'); ?>>
                                        <?php get_template_part( 'loop-templates/card', 'publication' );?>
                                    </div>
                                    <?php 
                                endwhile;
                                ?>
                            </div>
                            <?php else : get_template_part( 'loop-templates/content', 'none' ); ?>
                                <?php 
                                endif; ?>
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