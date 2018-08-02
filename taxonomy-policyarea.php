<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;
$term = get_queried_object();

get_header(); 
?>
    <?php get_template_part( 'partials/banner', 'microsite' ); ?>
        <?php get_template_part( 'partials/featured', 'publication' ); ?>
            <div class="wrapper" id="archive-wrapper">
                <div id="content" class="container">
                    <div class="row">
                        <div id="primary" class="col-md-8 content-area">
                            <?php get_template_part( 'partials/featured', 'campaign' ); ?>
                                <main id="main" class="site-main" role="main">
                                    <?php if ( have_posts() ) : ?>
                                        <!-- .page-header -->
                                        <?php /* Start the Loop */ ?>
                                            <?php 
                            $current_month = get_the_time('F');
                            while ( have_posts() ) : the_post();
                                get_template_part( 'loop-templates/archive', get_post_type() );

                        endwhile;
                        understrap_pagination();
                        ?>
                                                <?php else : ?>
                                                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>
                                                        <?php endif; ?>
                                </main>
                                <!-- #main -->
                        </div>
                        <!-- #primary -->
                        <?php get_sidebar( 'sidebar' ); ?>
                    </div>
                    <!-- .row -->
                </div>
                <!-- Container end -->
            </div>
            <!-- Wrapper end -->
            <?php get_footer(); ?>