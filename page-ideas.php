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
            <?php the_title( '<h1 class="page-title display-3 mb-0">', '</h1>' );?> </div>
    </header>
    <div id="content" class="container my-lg-5 my-3">
        <div class="row">
            <div id="primary" class="content-area">
                <main id="main" class="site-main" role="main">
                    <?php 
                            $terms = get_terms( array(
    'taxonomy' => 'policyarea',
    'hide_empty' => false,
) );
                            if($terms):
                            echo ' <ul class="flex-grid row mb-md-3 pr-lg-4">';
                            foreach($terms as $term):
                $image = wp_get_attachment_image_src(get_field('banner_image', $term), '16by9');
                            echo '<li class="flex-grid-item image col-md-6 col-xl-3 col-sm-4 col-6"> <a style="
                                        background-image: url('. $image[0] .');"
                                        class="bg-primary flex-grid-content flex-column" href="' . esc_url( get_term_link( $term ) ) . '"><h3>' . $term->name . '</h3><div class="description">' . $term->description . '</div></a></li>';
                            endforeach;
                            echo '</ul>';
                            endif;
                ?>
                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->
        </div>
        <!-- .row -->
    </div>
    <!-- Container end -->
    <!-- Container end -->
    <!-- Wrapper end -->
    <?php get_footer(); ?>