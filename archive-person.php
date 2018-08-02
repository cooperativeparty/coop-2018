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
      if(is_category()) :?>
                <div class="pull-right"> <a class="btn btn-outline-info" href="<?php 
                     $category = get_category( get_query_var('cat') );
                    echo get_category_feed_link($category->cat_ID); ?> "><i class="fa fa-rss fa-fw" aria-hidden="true"></i> RSS</a> <a href="#" class="btn btn-outline-info"><i class="fa fa fa-envelope-o fa-fw" aria-hidden="true"></i> Subscribe</a> <a href="#" class="btn btn-outline-info"><i class="fa fa-bell fa-fw" aria-hidden="true"></i> Notifications</a></div>
                <?php endif;
      ?>
        </div>
    </header>
    <div class="jumbotron bg-primary">
        <div class="wrapper" id="archive-wrapper" data-spy="affix" data-offset-top="166">
            <div class="container">
                <div class="row">
                    <div id="primary" class="col content-area">
                        <main id="main" class="site-main" role="main">
                            <?php
                            $faicon = 'fa-users';
                        $term_query = new WP_Term_Query( array( 'taxonomy' => 'role' ) );
                        if ( ! empty( $term_query->terms ) ) : ?>
                                <ul class="flex-grid row mb-md-3 pr-lg-5">
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
    </div>
    <div id="content" class="container my-5">
        <div class="row">
            <div id="primary" class="col content-area">
                <main id="main" class="site-main card-deck-wrapper" role="main">
                    <?php
                        $i = 1;
                        if ( have_posts() ) : ?>
                        <div class="card-deck mb-4">
                            <?php while ( have_posts() ) : the_post();
                            ?>
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
        </div>
        <!-- .row -->
    </div>
    <!-- Container end -->
    <!-- Container end -->
    <!-- Wrapper end -->
    <?php get_footer(); ?>