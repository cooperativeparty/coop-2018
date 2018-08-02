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
        <div class="wrapper" id="archive-wrapper"  data-spy="affix" data-offset-top="166">
            <div id="content" class="container">
                <div class="row">
                    <div id="primary" class="col-sm-8 content-area">
                        <main id="main" class="site-main" role="main">
                            <?php if ( have_posts() ) : ?>
                                <header class="page-header">
                                    <h2 class="mt-0 text-microsite">Blog</h2></header>
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