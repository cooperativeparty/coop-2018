<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>
    <?php get_template_part( 'partials/banner', 'archive' ); ?>
        <div class="wrapper" id="archive-wrapper">
            <div id="content" class="container py-5">
                <div class="row">
                    <div id="primary" class="col content-area">
                        <main id="main" class="site-main card-deck-wrapper" role="main">
                            <?php
                        $i = 1;
                        if ( have_posts() ) : ?>
                                <div class="card-deck mb-4">
                                    <?php while ( have_posts() ) : the_post();?>
                                        <?php get_template_part( 'loop-templates/card', 'person' );?>
                                            <?php 
                                if($i % 4 == 0) {echo '</div><div class="card-deck  my-4">';}
                                $i++; 
                                endwhile;
                                while ($i%4 != 1) {
                                echo '<div class="card no-outline"></div>';
                                $i++; 
                                };
                                ?> </div>
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