<?php
/**
 * The template for displaying search results pages.
 *
 * @package understrap
 */

get_header(); ?>
    <header class="jumbotron jumbotron-fluid bg-primary text-white" data-spy="affix" data-offset-top="166">
        <div class="container">
            <?php printf( __( '<p class="lead">Search Results for:</p> %s', 'understrap' ), '<h1 class="page-title display-3"><i class="fa fa-search fa-fw muted" aria-hidden="true"></i> ' . get_search_query() . '</h1>' ); ?>
        </div>
    </header>
    <div class="wrapper search-wrapper">
        <div class="container">
            <div class="row">
                <section id="primary" class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area">
                    <main id="main" class="site-main" role="main">
                        <?php if ( have_posts() ) : ?>
                            <!-- .page-header -->
                            <?php /* Start the Loop */ ?>
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php
                        /**
                         * Run the loop for the search to output the results.
                         * If you want to overload this in a child theme then include a file
                         * called content-search.php and that will be used instead.
                         */
                        get_template_part( 'loop-templates/content', 'search' );
                        ?>
                                        <?php endwhile; ?>
                                            <?php the_posts_navigation(); ?>
                                                <?php else : ?>
                                                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>
                                                        <?php endif; ?>
                    </main>
                    <!-- #main -->
                </section>
                <!-- #primary -->
                <?php get_sidebar(); ?>
            </div>
            <!-- .row -->
        </div>
        <!-- Container end -->
    </div>
    <!-- Wrapper end -->
    <?php get_footer(); ?>