<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */
get_header(); ?>
    <div class="wrapper" id="single-wrapper">
        <?php get_template_part( 'partials/archived', 'notice' ); ?>
            <div id="content" class="container">
                <div class="row">
                    <div id="primary" class="col content-area">
                        <main id="main" class="site-main" role="main">
                            <?php 
                                       while ( have_posts() ) : the_post();
                                    
                        get_template_part( 'loop-templates/content', 'brief' );
                            
                     echo '<hr/>';
                       // coop_post_nav();
                        endwhile; // end of the loop. ?>
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