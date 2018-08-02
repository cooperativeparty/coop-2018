<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package understrap
 */

get_header();
?>
    <div class="wrapper" id="404-wrapper">
        <div class="container" id="content">
            <div class="row">
                <div class="content-area" id="primary">
                    <main class="site-main" id="main" role="main">
                        <section class="error-404 not-found container py-5">
                            <header class="page-header">
                                <div class="row"><i class="fa fa-exclamation-triangle fa-5x fa-fw mx-auto text-warning" aria-hidden="true"></i></div>
                                <div class="row">
                                    <div class="col">
                                        <h1 class="page-title display-3 my-3 text-primary text-center"><?php esc_html_e( 'Sorry - that page can&rsquo;t be found.',
                                                                                                                    'understrap' ); ?></h1></div>
                                </div>
                            </header>
                            <!-- .page-header -->
                            <div class="page-content">
                                <p class="lead text-center text-lg"> It looks like nothing was found at this location. Maybe try searching or <a href="/contact"><i class="fa fa-envelope-o" aria-hidden="true"></i> get in touch</a> </p>
                                <div class="mx-auto col-sm-6 my-2">
                                    <?php get_search_form(); ?>
                                </div>
                                <hr/> </div>
                            <!-- .page-content -->
                        </section>
                        <!-- .error-404 -->
                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
            <!-- .row -->
        </div>
        <!-- Container end -->
    </div>
    <!-- Wrapper end -->
    <?php get_footer(); ?>