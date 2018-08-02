<?php
/**
 * Template Name: Twibbon
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */
?>
    <?php get_header('min');?>
        <?php 
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
?>
            <?php $image = wp_get_attachment_image_src(get_field('banner_image', $queried_object), 'full'); ?>
                <div class="wrapper pt-5" id="page-wrapper" style="background-image: url('<?php echo $image[0]; ?>');<?php if(get_field('background_blend_mode', $queried_object)) { echo 'mix-blend-mode:' . get_field('background_blend_mode', $queried_object); }?>;background-repeat:no-repeat; background-position:center; background-size:cover;opacity:<?php echo get_field('banner_alpha', $queried_object);?>">
                    <div class="<?php echo esc_html( $container ); ?>" id="content" tabindex="-1">
                        <div class="row">
                            <!-- Do the left sidebar check -->
                            <?php if(!$_GET['img_url']) : ?>
                                <div id="primary" class="content-area col-md-6">
                                    <main class="site-main" id="main">
                                        <h2 class="entry-title display-4 align-bottom">Voting Labour &amp; Co-operative? Show your colours with pride </h2>
                                        <p class="lead">With the 2017 General Election campaign now underway, thousands of Co-operative Party and Labour Party members are hitting the doorsteps. If you're with us, show your support on social media via custom profile picture (a Twibbon). Simply fill in your details below, upload your chosen photo, and a custom image will be generated for you.</p>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <?php echo gravity_form(97, false, false, false, '', true, 12);?>
                                            </div>
                                        </div>
                                    </main>
                                    <!-- #main -->
                                </div>
                                <!-- #primary -->
                                <div id="secondary" class="col-md-6"> <img src="https://party.coop/wp-content/blogs.dir/5/files/2017/04/fb-frame_preview-lg-1.png" class="img-responsive" /> </div>
                                <?php else:
                                $img_url =  filter_var(urldecode ($_GET['img_url']), FILTER_SANITIZE_URL);
                                $img_overlay = 'https://party.coop/wp-content/blogs.dir/5/files/2017/04/img-overlay_preview-lg.png';
                                $img_assembled = wpthumb( $img_url, array( 'width' => 1200, 'height' => 1200, 'crop' => true, 'watermark_options' => array( 'mask' => wpthumb( $img_overlay, 'width=1200&height=1200'), 'position' => 'cc' ) ));
                                $name = filter_var ( $_GET['submit-name'], FILTER_SANITIZE_STRING);
                                $filetype = new SplFileInfo($img_assembled);
                                $filetype = $filetype->getExtension()
                            ?>
                                    <div id="primary" class="content-area col-md-6">
                                        <main class="site-main" id="main">
                                            <h2 class="entry-title display-4 align-bottom"><?php echo $name;?>, here's your image!</h2>
                                            <p class="lead">Here's your generated image. You can use the links below to save it to your computer for use on Facebook, Twitter and anywhere else. Thanks for your support - and do help spread the word!</p>
                                            <div class="panel panel-default">
                                                <div class="panel-body"> <a class="btn mb-3 mb-md-0 btn-outline-primary btn-lg btn-block" href="<?php echo $img_assembled;?>" download="<?php echo $name;?>-coop-img.<?php echo $filetype;?>"><i class="fa fa-download" aria-hidden="true"></i> Download <span class="hidden-sm-down"><span class="hidden-md-down">generated</span> image to my computer</span></a> </div>
                                            </div>
                                            <h5 class="pt-3">Now help spread the word</h5>
                                            <div class="social-buttons pt-1 d-flex d-md-inline-flex">
                                                <?php get_template_part( 'partials/buttons', 'share' ); ?>
                                            </div>
                                            <h5 class="pt-3">You might also be interested in...</h5>
                                            <ul class="list-group">
                                                <li class="list-group-item list-group-item-action"><a href="https://party.coop/join">Join the Co-operative Party for £19.17</a></li>
                                                <li class="list-group-item list-group-item-action"><a href="https://party.coop/general-election-2017">Visit our General Election Campaign hub</a></li>
                                                <li class="list-group-item list-group-item-action"><a href="https://party.coop/about">Learn more about the Co-operative Party and how we work with Labour</a></li>
                                            </ul>
                                        </main>
                                        <!-- #main -->
                                    </div>
                                    <!-- #primary -->
                                    <div id="secondary" class="col-md-6">
                                        <?php echo '<img src="' . $img_assembled . '"/>';?> </div>
                                    <?php endif;?>
                        </div>
                    </div>
                    <!-- .row -->
                </div>
                <!-- Container end -->
                <!-- Wrapper end -->
                <?php get_footer(); ?>