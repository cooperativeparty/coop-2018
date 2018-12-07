<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

$container = get_theme_mod( 'understrap_container_type' );
?>
    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <div class="hfeed site" id="page">
            <div class="brandband d-flex">
                <div class="col bg-purple"></div>
                <div class="col bg-indigo"></div>
                <div class="col bg-blue"></div>
                <div class="col bg-green"></div>
                <div class="col bg-yellow"></div>
                <div class="col bg-orange"></div>
                <div class="col bg-red"></div>
            </div>
            <!-- ******************* The Navbar Area ******************* -->
            <header id="wrapper-head" class="position-relative" itemscope itemtype="http://schema.org/WebSite">
                <?php if ( 'container' == $container ) : ?>
                    <div class="container d-flex flex-wrap flex-row-reverse flex-lg-row">
                        <?php endif; ?>
                            <a class="skip-link screen-reader-text sr-only" href="#content">
                                <?php esc_html_e( 'Skip to content', 'understrap' ); ?>
                            </a>
                            <div class="col-4 px-0 my-4 d-none d-lg-block">
                                <a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                    <?php get_template_part( 'partials/dyn', 'logo' ); ?>
                                </a>
                            </div>
                            <!-- end custom logo -->
                            <?php get_template_part( 'partials/login', 'form' );?>
                                <nav class="navbar nav-primary navbar-expand-lg navbar-light justify-content-between p-0 flex-grow-1">
                                    <!-- Your site title as branding in the menu -->
                                    <h1 class="navbar-brand d-block d-lg-none"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                                    <!-- The WordPress Menu goes here -->
                                    <div id="navbarNavDropdown" class="collapse navbar-collapse">
                                        <?php wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container' => false,
						'menu_class'      => 'navbar-nav ml-auto ml-md-0',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'walker'          => new coopparty_WP_Bootstrap_Navwalker(),
					)
				); ?> <a class="btn btn-block btn-danger mb-4 mt-3 d-block btn-lg d-sm-none" href="<?php echo get_page_link('11217');?>"><i class="fa fa-plus fa-fw"></i> Join the Party</a> </div>
                                </nav>
                                <!-- .site-navigation -->
                                <?php if ( 'container' == $container ) : ?>
                    </div>
                    <!-- .container -->
                    <?php endif; ?>
            </header>
            <!-- #wrapper-navbar end -->