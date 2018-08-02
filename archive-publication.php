<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); 
?>
    <header class="jumbotron jumbotron-fluid bg-primary text-white" data-spy="affix" data-offset-top="166">
        <div class="container">
            <?php the_archive_title( '<h1 class="page-title display-3 mb-0">', '</h1>' );
            the_archive_description( '<p class="lead">', '</p>' ); ?> </div>
        <div class="wrapper" id="archive-wrapper">
            <div class="container">
                <div class="row">
                    <div id="primary" class="col content-area">
                        <main id="main" class="site-main" role="main">
                            <?php
                            $faicon = 'fa-folder-open';
                        $term_query = new WP_Term_Query( array( 'taxonomy' => 'publication_type' ) );
                        if ( ! empty( $term_query->terms ) ) : ?>
                                <ul class="flex-grid row mb-md-3">
                                    <?php foreach ( $term_query ->terms as $term ) : 
                                    
                                get_template_part( 'loop-templates/card', 'cover-cpt-object' );
                                endforeach; endif; ?>
                                </ul>
                        </main>
                        <!-- #main -->
                    </div>
                    <!-- #primary -->
                </div>
                <!-- .row -->
            </div>
        </div>
    </header>
    <!--<div id="content" class="container my-lg-5 my-3">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php /*
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
                                endif;*/ ?>
                </main>
                <!-- #main -->
    <!-- </div>-->
    <!-- #primary -->
    <!-- </div>-->
    <!-- .row -->
    <!-- </div>-->
    <!-- Container end -->
    <!-- Container end -->
    <!-- Wrapper end -->
    <?php get_footer(); ?>