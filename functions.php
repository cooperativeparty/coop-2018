<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

function add_child_theme_textdomain() {
    load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );

/**
* Custom post meta functions
*/
require_once get_stylesheet_directory() . '/inc/meta-fields.php';
/**
* Related posts functions
*/
require_once get_stylesheet_directory() . '/inc/related-posts.php';
/**
* Related posts functions
*/
require_once get_stylesheet_directory() . '/inc/author-meta.php';
/**
* Related posts functions
*/
require_once get_stylesheet_directory() . '/inc/custom-fields.php';
/**
* Load Boostrap additional functions
*/
require_once get_stylesheet_directory() . '/inc/bootstrap-extras.php';
/**
* Extras
*/
require_once get_stylesheet_directory() . '/inc/extras.php';
/**
* Widgets
*/
require_once get_stylesheet_directory() . '/inc/widgets.php';
/**
* Widgets
*/
require_once get_stylesheet_directory() . '/inc/template-name.php';
/**
* They Work for You API
*/
//require_once get_stylesheet_directory() . '/inc/twfy.php';
/**
* Check Mobile
*/
require_once get_stylesheet_directory() . '/lib/mobile-detect/Mobile_Detect.php';
/**
* Tiny MCE Scripts
*/
require_once get_stylesheet_directory() . '/inc/editor.php';
/**
* Check Mobile
*/
//require_once get_stylesheet_directory() . '/lib/TwitterAPIExchange.php';
/**
* Check Mobile
*/
if (!defined('WP_Thumb') ) {
define( 'WP_THUMB_PATH', trailingslashit( STYLESHEETPATH . '/lib/wp-thumb' ) );
define( 'WP_THUMB_URL', trailingslashit( get_stylesheet_directory_uri() . '/lib/wp-thumb' ) );
require_once get_stylesheet_directory() . '/lib/wp-thumb/wpthumb.php';
}
/**
* Remove Tribe styles
*/
require_once get_stylesheet_directory() . '/inc/remove-tribe-styles.php';
/**
* Tribe events tweaks
*/
require_once get_stylesheet_directory() . '/inc/tribe-events-tweaks.php';
/**
* Shortcodes
*/
require_once get_stylesheet_directory() . '/inc/shortcodes.php';
/**
* Shortcodes
*/
/* require_once get_stylesheet_directory() . '/inc/shortcodes-new.php';
/**
* Bootstrap navwalker
*/
require_once get_stylesheet_directory() . '/inc/bootstrap-wp-navwalker.php';
//move wpautop filter to AFTER shortcode is processed
/*
 *  Functions from coop-2015 theme
 */
 remove_filter ('term_description', 'wpautop');
//Function to check if a post has children
function post_have_children($id){
	$children = get_pages('child_of='.$id);
	if(count($children) == 0){
		return false;
	}
	else{
		return true;
	}
}
