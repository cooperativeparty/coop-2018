<?php
/**
 * Template Name: Confirmation Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

/*All visitors to confirmation page should be redirected from the main join page. If they aren't, redirect.*/
$referer = wp_get_referer();
echo '<!--'.$referer.'-->';
if (strpos($referer, 'party.coop/join') != true) {
          wp_safe_redirect( get_permalink('11217') );
          exit;    
}
get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
$is_woocommerce = false;
$this_page_id   = get_queried_object_id();
get_template_part( 'partials/banner', 'page' );

/*FB Conversion Tracker*/
$value = null;
$submit_value = get_query_var('regrate');
if (strpos($submit_value, '60') !== false) $value = '60';
if (strpos($submit_value, '34') !== false) $value = '34';
if (strpos($submit_value, '20') !== false) $value = '20';
if (strpos($submit_value, '10') !== false) $value = '10';
if (strpos($submit_value, '1') !== false) $value = '1';
?>
    <script>
        fbq('track', 'CompleteRegistration', {
            value: <?php echo $value;?>
            , currency: 'GBP'
        });
    </script> >
    <div class="wrapper" id="page-wrapper">
        <div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">
            <div class="row">
                <!-- Do the left sidebar check -->
                <div id="primary" class="content-area col">
                    <main class="site-main" id="main">
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php get_template_part( 'loop-templates/content', 'page' );?>
                                <?php endwhile; // end of the loop. ?>
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