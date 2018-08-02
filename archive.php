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
    <?php
$container   = get_theme_mod( 'understrap_container_type' );
?>
        <div class="wrapper" id="archive-wrapper">
            <?php get_template_part( 'partials/banner', 'archive' ); ?>
                <div class="<?php echo esc_attr( $container ); ?> py-5" id="content" tabindex="-1">
                    <div class="row">
                        <?php get_template_part( 'global-templates/left-sidebar-check' ); ?>
                            <main class="site-main" id="main">
                                <?php 
                $current_month = get_the_time('F');
                if ( have_posts() ) : ?>
                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <?php
						get_template_part( 'loop-templates/archive', get_post_type() );
						?>
                                            <?php endwhile; ?>
                                                <?php else : ?>
                                                    <?php get_template_part( 'loop-templates/content', 'none' ); ?>
                                                        <?php endif; ?>
                            </main>
                            <!-- #main -->
                            <!-- The pagination component -->
                            <?php understrap_pagination(); ?>
                    </div>
                    <!-- #primary -->
                    <!-- Do the right sidebar check -->
                    <?php get_template_part( 'global-templates/right-sidebar-check' ); ?>
                </div>
                <!-- .row -->
        </div>
        <!-- Container end -->
        </div>
        <!-- Wrapper end -->
        <?php get_footer(); ?>