<?php
/**
 * The template for displaying all single posts.
 *
 * @package understrap
 */
$pdf_field = get_field('document_url');
            $pdf_id = $pdf_field['id'];
            $pdf_url = $pdf_field['url'];
if ( check_mobile() == true ) :
$data = file_get_contents($pdf_url);
  header('Content-type: application/octet-stream');
  header('Content-disposition: attachment;filename=' . $post->post_name . '\.pdf');
  echo $data;
endif;
get_header(); ?>
    <div class="wrapper" id="single-wrapper">
        <div id="content" class="container">
            <div class="row">
                <div id="primary" class="col content-area">
                    <main id="main" class="site-main" role="main">
                        <?php 
                    $obj_fb = json_decode( file_get_contents( 'http://graph.facebook.com/?id='.get_permalink() ) );
                    $shares_fb = $obj_fb->shares;
                    update_post_meta($post->ID, '_facebook_likes', $shares_fb, false);
                    while ( have_posts() ) : the_post();
                        get_template_part( 'loop-templates/content', get_post_type() );
                        endwhile; // end of the loop. ?>
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
                <div class="col-md-3 widget-area" id="secondary" role="complementary">
                    <div class="row">
                        <?php
                    get_template_part( 'loop-templates/card', 'publication' );
                    dynamic_sidebar( 'sidebar-all' ); ?>
                    </div>
                </div>
                <!-- #secondary -->
            </div>
            <!-- .row -->
        </div>
        <!-- Container end -->
    </div>
    <!-- Wrapper end -->
    <?php get_footer(); ?>