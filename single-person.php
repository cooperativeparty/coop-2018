<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */
$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
get_header();
?>
    <?php get_template_part( 'partials/banner', 'single' ); ?>
        <div class="wrapper" id="single-wrapper">
            <?php if ( get_post_status ( $ID ) == 'archive' ):?>
                <div class="alert alert-info" role="alert">
                    <div class="container"><strong>Archived content</strong> This page has been archived and is no longer being actively mantained. We cannot be responsible for the continued accuracy of its content, nor does it necessarily reflect the current views or policy of the Co-operative Party. </div>
                </div>
                <?php endif;?>
                    <div id="content" class="container">
                        <div class="row">
                            <div id="primary" class="col content-area">
                                <main id="main" class="site-main" role="main">
                                    <?php 
                                       while ( have_posts() ) : the_post();
                                                   get_template_part( 'loop-templates/content', get_post_type() );
  
                     echo '<hr/>';
                      
                        endwhile; // end of the loop. ?>
                                </main>
                                <!-- #main -->
                            </div>
                            <?php /* get_sidebar(); */ ?>
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- Container end -->
        </div>
        <!-- Wrapper end -->
        <!-- -->
        <?php get_footer(); ?>