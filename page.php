<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
$sidebar_pos = get_theme_mod( 'understrap_sidebar_position' );
// On WooCommerce pages there is no need for sidebars as they leave
// too little space for WooCommerce itself. We check if WooCommerce
// is active and the current page is a WooCommerce page and we do
// not render sidebars.
$is_woocommerce = false;
$this_page_id   = get_queried_object_id();
if ( class_exists( 'WooCommerce' ) ) {

	if ( is_woocommerce() || is_shop() || get_option( 'woocommerce_shop_page_id' ) === $this_page_id ||
	     get_option( 'woocommerce_cart_page_id' ) == $this_page_id || get_option( 'woocommerce_checkout_page_id' ) == $this_page_id ||
	     get_option( 'woocommerce_pay_page_id' ) == $this_page_id || get_option( 'woocommerce_thanks_page_id' ) === $this_page_id ||
	     get_option( 'woocommerce_myaccount_page_id' ) == $this_page_id || get_option( 'woocommerce_edit_address_page_id' ) == $this_page_id ||
	     get_option( 'woocommerce_view_order_page_id' ) == $this_page_id || get_option( 'woocommerce_terms_page_id' ) == $this_page_id
	) {

		$is_woocommerce = true;
	}
}
get_template_part( 'partials/banner', 'page' );
get_template_part( 'partials/archived', 'notice' ); ?>
            <div class="wrapper" id="page-wrapper">
                <div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">
                    <div class="row">
                        <!-- Do the left sidebar check -->
                        <div id="primary" class="content-area col py-5">
                            <main class="site-main" id="main">
                                <?php while ( have_posts() ) : the_post(); ?>
                                    <?php get_template_part( 'loop-templates/content', 'page' );
                        get_template_part('partials/cta', 'box') ;   ?>
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