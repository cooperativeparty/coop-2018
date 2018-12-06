<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package understrap
 */
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function understrap_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'understrap_body_classes' );

// Removes tag class from the body_class array to avoid Bootstrap markup styling issues.

add_filter( 'body_class', 'adjust_body_class' );
function adjust_body_class( $classes ) {
 
    foreach ( $classes as $key => $value ) {
        if ( $value == 'tag' ) unset( $classes[ $key ] );
    }
 
    return $classes;
 
}
//Highlight search terms
function search_excerpt_highlight() {
    $excerpt = get_the_excerpt();
    $keys = implode('|', explode(' ', get_search_query()));
    $excerpt = preg_replace('/(' . $keys .')/iu', '<strong class="bg-success text-white">\0</strong>', $excerpt);

    echo '<p>' . $excerpt . '</p>';
}

function search_title_highlight() {
    $title = get_the_title();
    $keys = implode('|', explode(' ', get_search_query()));
    $title = preg_replace('/(' . $keys .')/iu', '<strong class="bg-success text-white">\0</strong>', $title);

    echo $title;
}

// Filter custom logo with correct classes
add_filter('get_custom_logo','change_logo_class');
function change_logo_class($html)
{
	$html = str_replace('class="custom-logo"', 'class="img-responsive"', $html);
	$html = str_replace('class="custom-logo-link"', 'class="navbar-brand" custom-logo-link', $html);
	return $html;
}
// Change default titles for archives
// Return an alternate title, without prefix, for every type used in the get_the_archive_title().
add_filter('get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format' ) );
    } elseif ( is_tax( 'post_format' ) ) {
        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
            $title = _x( 'Asides', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
            $title = _x( 'Galleries', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
            $title = _x( 'Images', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
            $title = _x( 'Videos', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
            $title = _x( 'Quotes', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
            $title = _x( 'Links', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
            $title = _x( 'Statuses', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
            $title = _x( 'Audio', 'post format archive title' );
        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
            $title = _x( 'Chats', 'post format archive title' );
        }
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = __( 'Archives' );
    }
    return $title;
});
//Adding the Open Graph in the Language Attributes
function add_opengraph_doctype( $output ) {
		return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
	}
add_filter('language_attributes', 'add_opengraph_doctype');
// Gravity forms Bootstrap filters
add_filter( 'gform_field_container', 'add_bootstrap_container_class', 10, 6 );
function add_bootstrap_container_class( $field_container, $field, $form, $css_class, $style, $field_content ) {
  $id = $field->id;
  $field_id = is_admin() || empty( $form ) ? "field_{$id}" : 'field_' . $form['id'] . "_$id";
  return '<li id="' . $field_id . '" class="' . $css_class . ' form-group">{FIELD_CONTENT}</li>';
}
add_action( 'gform_enqueue_scripts', 'dequeue_gf_stylesheets', 11 );
function dequeue_gf_stylesheets() {
    wp_dequeue_style( 'gforms_reset_css' );
    wp_dequeue_style( 'gforms_datepicker_css' );
    wp_dequeue_style( 'gforms_formsmain_css' );
    wp_dequeue_style( 'gforms_ready_class_css' );
    wp_dequeue_style( 'gforms_browsers_css' );
}
//Order staff by pageorder
add_action( 'pre_get_posts', 'coop_sort_people' ); function coop_sort_people( $query ) { if ( $query->is_main_query() && !is_admin() ) { if ( $query->is_post_type_archive('person') ) { $query->set('orderby', 'menu_order'); } } }
// No indef?
function coop_noindex() {
    if ( function_exists('get_field') ) {
    global $post;

    if(get_field('norobots', $post->ID) && get_field('norobots', $post->ID) == true ) {
    echo '<meta name="robots" content="noindex" />' . "\n";
}} else {
        exit;
    }}
add_action( 'wp_head', 'coop_noindex', 5 );
//Lets add Open Graph Meta Info
function insert_fb_in_head() {
	global $post;
        echo '<meta property="og:site_name" content="' . get_bloginfo('name') . '"/>' . "\n";
            echo '<meta name="twitter:site" value="@coopparty" />' . "\n";
            echo '<meta property="fb:admins" content="750084415072315"/>' . "\n";
	if ( is_singular()) {
          $twitter_name   = str_replace('@', '', get_the_author_meta('twitter'));
        echo '<meta name="twitter:card" value="summary_large_image" />' . "\n";
        if (is_singular('post') && get_field('coop_author')) {
            $blogauthor = get_field('coop_author');
            $blogauthor = $blogauthor['0'];
          echo '<meta property="og:title" content="' . $blogauthor->post_title . ' | ' . get_the_title() . '"/>' . "\n";     
          echo '<meta property="twitter:title" content="' . $blogauthor->post_title . ' | ' . get_the_title() . '"/>' . "\n";     
        } else {
          echo '<meta property="og:title" content="' . get_the_title() . '"/>' . "\n";  
                echo '<meta name="twitter:title" value="' . get_the_title() . '" />' . "\n";
        };
        echo '<meta property="og:type" content="article"/>' . "\n";
        echo '<meta property="og:url" content="' . get_permalink() . '"/>' . "\n";
        echo '<meta property="twitter:url" content="' . get_permalink() . '"/>' . "\n";
    if ( has_excerpt( $post->ID ) ) {
        echo '<meta property="og:description" content="' . get_the_excerpt() . '"/>' . "\n";
        echo '<meta property="twitter:description" content="' . get_the_excerpt() . '"/>' . "\n";
    }
	if(get_field('custom_sharer_graphic', $post->ID)) {
        $imgid = (get_field('custom_sharer_graphic', $post->ID));
        		$fb_thumbnail_src = wp_get_attachment_image_src( $imgid['id'], 'facebook' );
        $tw_thumbnail_src = wp_get_attachment_image_src( $imgid['id'], 'twitter' );
        echo '<meta property="og:image" content="' . $fb_thumbnail_src[0] . '"/>' . "\n";
        echo '<meta property="twitter:image" content="' . $tw_thumbnail_src[0] . '"/>' . "\n";
                                echo '<meta property="og:image:width" content="1200"/>' . "\n";
                    echo '<meta property="og:image:height" content="628"/>' . "\n";
    }
        elseif(has_post_thumbnail( $post->ID )) {
		$fb_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'facebook' );
        $tw_thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'twitter' );
            if(has_term('51','devolved_region')) {
                		echo '<meta property="og:image" content="' . esc_attr(wpthumb( $fb_thumbnail_src[0], array('watermark_options' => array( 'mask' => wpthumb(get_stylesheet_directory_uri() . '/img/sharer-overlay-scot-fb.png','width=1200&height=auto'), 'position' => 'bl', 'padding' => 0 ) ))) . '"/>' . "\n";
        echo '<meta property="twitter:image" content="' . esc_attr(wpthumb( $tw_thumbnail_src[0], array('watermark_options' => array( 'mask' => wpthumb(get_stylesheet_directory_uri() . '/img/sharer-overlay-scot-fb.png','width=1024&height=auto'), 'position' => 'bl', 'padding' => 0 ) ))) . '"/>' . "\n";
            } else {
		echo '<meta property="og:image" content="' . esc_attr(wpthumb( $fb_thumbnail_src[0], array('watermark_options' => array( 'mask' => wpthumb(get_stylesheet_directory_uri() . '/img/sharer-overlay-fb.png','width=1200&height=auto'), 'position' => 'bl', 'padding' => 0 ) ))) . '"/>' . "\n";
        echo '<meta property="twitter:image" content="' . esc_attr(wpthumb( $tw_thumbnail_src[0], array('watermark_options' => array( 'mask' => wpthumb(get_stylesheet_directory_uri() . '/img/sharer-overlay-fb.png','width=1024&height=auto'), 'position' => 'bl', 'padding' => 0 ) ))) . '"/>' . "\n";
                        
	}
        echo '<meta property="og:image:width" content="1200"/>' . "\n";
                    echo '<meta property="og:image:height" content="628"/>' . "\n";
        }
    if($twitter_name) {
        echo '<meta name="twitter:creator" value="@' . $twitter_name . '" />';
    }
    } elseif(is_tax()) {
        global $query_vars;
         $queried_object = get_queried_object();
         $permalink = get_term_link( $queried_object->term_id );
     echo '<meta name="twitter:card" value="summary" />' . "\n"; 
        echo '<meta property="og:title" content="' . get_the_archive_title() . '"/>' . "\n";
        echo '<meta name="twitter:title" value="' . get_the_archive_title() . '" />' . "\n";
        echo '<meta property="og:type" content="article:section"/>' . "\n";
        echo '<meta property="og:url" content="' . $permalink . '"/>' . "\n";
        echo '<meta property="twitter:url" content="' . $permalink . '"/>' . "\n";
            echo '<meta property="og:description" content="' . get_the_archive_description() . '"/>' . "\n";
        echo '<meta property="twitter:description" content="' . get_the_archive_description() . '"/>' . "\n";
    } else {
        
    };
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );
/* 
/ Google tag manager
function google_tag_manager(){?>
    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime()
                , event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0]
                , j = d.createElement(s)
                , dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-T6BZXSR');
    </script>
    <!-- End Google Tag Manager -->
    <?php }
add_action( 'wp_head', 'google_tag_manager', 1 );
/* 
/ Google Analytics
*/
function google_analytics(){?>
        <!-- Google Analytics -->
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o), m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-24249851-1', 'auto');
            ga('send', 'pageview');
        </script>
        <script id="mcjs">
            ! function (c, h, i, m, p) {
                m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
            }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/f5fe9abc02e45a82afee6a4dd/1492834acc8f70a4377dd9275.js");
        </script>
        <!-- End Google Analytics -->
        <?php }
add_action( 'wp_head', 'google_analytics', 15 );
/*Confirmation page query vars */
function custom_query_vars_filter($vars) {
  $vars[] = 'regrate';
  $vars[] .= 'formid';
      $vars[] .= 'fname';
    $vars[] .= 'lname';
    $vars[] .= 'email';
  return $vars;
}
add_filter( 'query_vars', 'custom_query_vars_filter' );
/* Facebook Pixel 

function facebook_pixel(){?>
            <!-- Facebook Pixel Code -->
            <script>
                ! function (f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function () {
                        n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }(window, document, 'script', 'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '1657544437824326', {
                    <?php 
    $fname = get_query_var( 'fname');
        $lname = get_query_var( 'lname');
        $email = get_query_var( 'email');
if(isset($fname)){
echo "fn: '".get_query_var('fname')."',\n";
}
if(isset($lname)){
echo "ln: '".get_query_var('lname')."',\n";
}
if(isset($email)){
echo "em: '".get_query_var('email')."',\n";
}                        
                        ?>
                });
                fbq('track', 'PageView');
            </script>
            <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1657544437824326&ev=PageView&noscript=1" /></noscript>
            <!-- DO NOT MODIFY -->
            <!-- End Facebook Pixel Code -->
            <?php if ( !current_user_can('administrator') ) :      ?>
                <script>
                    window.fbMessengerPlugins = window.fbMessengerPlugins || {
                        init: function () {
                            FB.init({
                                appId: '1678638095724206'
                                , autoLogAppEvents: true
                                , xfbml: true
                                , version: 'v2.10'
                            });
                        }
                        , callable: []
                    };
                    window.fbAsyncInit = window.fbAsyncInit || function () {
                        window.fbMessengerPlugins.callable.forEach(function (item) {
                            item();
                        });
                        window.fbMessengerPlugins.init();
                    };
                    setTimeout(function () {
                        (function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) {
                                return;
                            }
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "//connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                    }, 0);
                </script>
                <?php endif;?>
                    <?php }
add_action( 'wp_head', 'facebook_pixel', 15 );*/
/* 
/ Post body code
*/
/* Create new post body hook */
function body_begin() { do_action('body_begin');}
/*
function google_tag_manager_post_body() {?>
                        <!-- Google Tag Manager (noscript) -->
                        <noscript>
                            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T6BZXSR" height="0" width="0" style="display:none;visibility:hidden"></iframe>
                        </noscript>
                        <!-- End Google Tag Manager (noscript) -->
                        <?php }
add_action('body_begin', 'google_tag_manager_post_body');

/*
/ Favicons
*/

function coop_favicons(){
echo'<link rel="apple-touch-icon" sizes="180x180" href="' . get_stylesheet_directory_uri() . '/img/icons/apple-touch-icon.png?v=kPxrxP0EYz">';
echo'<link rel="icon" type="image/png" sizes="32x32" href="' . get_stylesheet_directory_uri() . '/img/icons/favicon-32x32.png?v=kPxrxP0EYz">';
echo'<link rel="icon" type="image/png" sizes="16x16" href="' . get_stylesheet_directory_uri() . '/img/icons/favicon-16x16.png?v=kPxrxP0EYz">';
echo'<link rel="manifest" href="' . get_stylesheet_directory_uri() . '/img/icons/manifest.json?v=kPxrxP0EYz">';
echo'<link rel="mask-icon" href="' . get_stylesheet_directory_uri() . '/img/icons/safari-pinned-tab.svg?v=kPxrxP0EYz" color="#711f8e">';
echo'<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/img/icons/favicon.ico?v=kPxrxP0EYz">';
echo'<meta name="apple-mobile-web-app-title" content="The Co-operative Party">';
echo'<meta name="application-name" content="The Co-operative Party">';
echo'<meta name="msapplication-config" content="' . get_stylesheet_directory_uri() . '/img/icons/browserconfig.xml?v=kPxrxP0EYz">';
echo'<meta name="theme-color" content="#711f8e">';
 };
add_action( 'wp_head', 'coop_favicons', 5 );
// Automatically make YouTube videos respo
// Hook onto 'oembed_dataparse' and get 2 parameters
//Enable MP4 upload
function my_custom_upload_mimes($mimes = array()) {

	// Add a key and value for the CSV file type
	$mimes['mp4'] = "video/mp4";
    $mimes['webm'] = "video/webm";
    $mimes['svg'] = "image/svg+xml";

	return $mimes;
}

add_action('upload_mimes', 'my_custom_upload_mimes');
// Unlimited posts per page
function set_posts_per_page_for_towns_cpt( $query ) {
  if ( !is_admin() && $query->is_main_query() && is_tax( 'role' )) {
    $query->set( 'posts_per_page', '500' );
  }
}
add_action( 'pre_get_posts', 'set_posts_per_page_for_towns_cpt' );

//Remove a function from the parent theme
function remove_parent_filters(){ //Have to do it after theme setup, because child theme functions are loaded first
    remove_filter( 'wp_trim_excerpt', 'understrap_all_excerpts_get_more_link' );
}
add_action( 'after_setup_theme', 'remove_parent_filters' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
        'logged-in-user' => __( 'Logged In Member Menu', 'understrap' ),
        'logged-in-officer' => __( 'Logged In Officer Menu', 'understrap' ),
        'site-switcher' => __( 'Microsite Switcher', 'understrap' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
     add_post_type_support( 'page', 'excerpt' );
    /*
	 * Adding Thumbnail basic support
	 */
    add_theme_support( "post-thumbnails" );
    add_image_size( 'square-xsm', 48, 48, array( 'center', 'center' ) );
    add_image_size( 'square-sm', 240, 240, array( 'center', 'center' ) );
    add_image_size( 'square-md', 480, 480, array( 'center', 'center' ) );
    add_image_size( 'facebook', 1200, 628, array( 'center', 'center' ) );
    add_image_size( 'twitter', 1024, 512, array( 'center', 'center' ) );
    add_image_size( '16by9-sm', 600, 338, array( 'center', 'center' ) );
add_image_size( '16by9', 1200, 675, array( 'center', 'center' ) );
    add_image_size( 'hidef', 1920, 1080, array( 'center', 'center' ) );
    add_image_size( 'square', 1200, 1200, array( 'center', 'center' ) );
    add_image_size( 'A4', 600, 848, array( 'center', 'center' ) );
    add_image_size( 'A4-sm', 150, 150, false );
    add_image_size( 'A4-xs', 75, 75, false );


add_filter( 'image_size_names_choose', 'my_custom_sizes' );

function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'square-md' => __('Square Small (480x480)'),
                'square-sm' => __('Square Medium (240x240)'),
                        'square' => __('Square (1200x1200)'),
                                '16by9' => __('16:9 (1200x675)'),
    ) );
}

	/*
     * Upscale small thumbnail iamges
     */
    class ThumbnailUpscaler
{
	/** http://wordpress.stackexchange.com/questions/50649/how-to-scale-up-featured-post-thumbnail **/
	static function image_resize_dimensions($default, $orig_w, $orig_h, $new_w, $new_h, $crop)
	{
		if(!$crop)
			return null; // let the wordpress default function handle this

		$size_ratio = max($new_w / $orig_w, $new_h / $orig_h);
	
		$crop_w = round($new_w / $size_ratio);
		$crop_h = round($new_h / $size_ratio);
	
		$s_x = floor( ($orig_w - $crop_w) / 2 );
		$s_y = floor( ($orig_h - $crop_h) / 2 );

		if(is_array($crop)) {

			//Handles left, right and center (no change)
			if($crop[ 0 ] === 'left') {
				$s_x = 0;
			} else if($crop[ 0 ] === 'right') {
				$s_x = $orig_w - $crop_w;
			}

			//Handles top, bottom and center (no change)
			if($crop[ 1 ] === 'top') {
				$s_y = 0;
			} else if($crop[ 1 ] === 'bottom') {
				$s_y = $orig_h - $crop_h;
			}
		}
	
		return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
	}
}

add_filter('image_resize_dimensions', array('ThumbnailUpscaler', 'image_resize_dimensions'), 10, 6);

// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// Remove related posts footer
function jetpackme_remove_rp() {
    if ( class_exists( 'Jetpack_RelatedPosts' ) ) {
        $jprp = Jetpack_RelatedPosts::init();
        $callback = array( $jprp, 'filter_add_target_to_dom' );
        remove_filter( 'the_content', $callback, 40 );
    }
}
add_filter( 'wp', 'jetpackme_remove_rp', 20 );

// Mobile detect
function check_mobile() {
$detect = new Mobile_Detect;
if ( $detect->isMobile() ) {
 return true;
}
}

// Archive post status
add_filter( 'aps_status_arg_public', '__return_true' );
add_filter( 'aps_status_arg_private', '__return_false' );
add_filter( 'aps_status_arg_exclude_from_search', '__return_false' );
add_filter( 'aps_status_arg_show_in_admin_all_list', '__return_false' );


// Dropdown
class Walker_Nav_Menu_Dropdown extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0 , $args = array()){
		$indent = str_repeat("\t", $depth); // don't output children opening tag (`<ul>`)
	}
	function end_lvl(&$output, $depth = 0, $args = array()){
		$indent = str_repeat("\t", $depth); // don't output children closing tag
	}
	function start_el(&$output, $item, $depth = 0 , $args = array(), $id=0) {
        $current_id = get_queried_object()->term_id;
        $term_id = $item->object_id;
        $taxonomy = get_term($term_id);
        $taxonomy = $taxonomy->taxonomy;
        $custom_colour = get_field('microsite_colour', $taxonomy . '_' . $term_id);
        if ( $current_id == $term_id ){ $selected = 'selected'; } else { $selected ='';};
        $output .= sprintf( '<option style="background-color:%s" value="%s" %s>%s</option>',
            $custom_colour,               
            $item->url,
            $selected,
            $item->title
        );
	}	
	function end_el(&$output, $item, $depth = 0 , $args = array()){
		$output .= "\n"; // replace closing </li> with the option tag
	}
}
// Exclude publications from Policy area pages
function my_modify_tax_pages( $query ) {
if ( $query->is_tax( 'policyarea' ) && $query->is_main_query() || $query->is_tax( 'devolved_region' ) && $query->is_main_query() ) { 
$query->query_vars['post_type'] = 'post'; 
}
}
// Hook my above function to the pre_get_posts action
add_action( 'pre_get_posts', 'my_modify_tax_pages' );
// Coop Post nav
if ( ! function_exists( 'coop_post_nav' ) ) :

	function coop_post_nav() {
		// Don't print empty markup if there's nowhere to navigate.
		$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
		$next     = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous ) {
			return;
		}
		?>
                            <nav class="navigation post-navigation">
                                <h2 class="sr-only"><?php _e( 'Post navigation', 'understrap' ); ?></h2>
                                <div class="nav-links d-flex justify-content-start small">
                                    <?php

							if ( get_previous_post_link() ) {
								previous_post_link( '<span class="nav-previous w-25 text-left">%link</span>', _x( '<i class="fa fa-caret-left"></i>&nbsp;%title', 'Previous post link', 'understrap' ) );
							}
							if ( get_next_post_link() ) {
								next_post_link( '<span class="nav-next w-25 ml-auto text-right">%link</span>',     _x( '%title&nbsp;<i class="fa fa-caret-right"></i>', 'Next post link', 'understrap' ) );
							}
						?> </div>
                                <!-- .nav-links -->
                            </nav>
                            <!-- .navigation -->
                            <?php
	}
endif;
//Unqueeue dashicons

// remove dashicons in frontend to non-admin 
    function wpdocs_dequeue_dashicon() {
        if (current_user_can( 'update_core' )) {
            return;
        }
        wp_deregister_style('dashicons');
    }
    add_action( 'wp_enqueue_scripts', 'wpdocs_dequeue_dashicon' );
// Woocommerce
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 99 );
function dequeue_woocommerce_styles_scripts() {
    if ( function_exists( 'is_woocommerce' ) ) {
        if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
            # Styles
            wp_dequeue_style( 'woocommerce-general' );
            wp_dequeue_style( 'woocommerce-layout' );
            wp_dequeue_style( 'woocommerce-smallscreen' );
            wp_dequeue_style( 'woocommerce_frontend_styles' );
            wp_dequeue_style( 'woocommerce_fancybox_styles' );
            wp_dequeue_style( 'woocommerce_chosen_styles' );
            wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
            # Scripts
            wp_dequeue_script( 'wc_price_slider' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-add-to-cart' );
            wp_dequeue_script( 'wc-cart-fragments' );
            wp_dequeue_script( 'wc-checkout' );
            wp_dequeue_script( 'wc-add-to-cart-variation' );
            wp_dequeue_script( 'wc-single-product' );
            wp_dequeue_script( 'wc-cart' );
            wp_dequeue_script( 'wc-chosen' );
            wp_dequeue_script( 'woocommerce' );
            wp_dequeue_script( 'prettyPhoto' );
            wp_dequeue_script( 'prettyPhoto-init' );
            wp_dequeue_script( 'jquery-blockui' );
            wp_dequeue_script( 'jquery-placeholder' );
            wp_dequeue_script( 'fancybox' );
            wp_dequeue_script( 'jqueryui' );
        }
    }
}
function cliff_all_tickets_default_quantity() {
	// bail if not on a Single Event page
	if ( ! function_exists( 'tribe_is_event' ) || ! tribe_is_event() ) {
		return false;
	}
	
	wp_enqueue_script( 'jquery' );
	?>
                                <script type="text/javascript">
                                    jQuery(document).ready(function () {
                                        // RSVP, Woo, and EDD tickets default to quantity of 1
                                        jQuery('input.tribe-ticket-quantity, .woocommerce .quantity input.qty, .edd.quantity input.edd-input').val(1);
                                        // CSS to display RSVP tickets' "Send RSVP confirmation to" fields
                                        // Note: will continue to show even if user changes quantity to zero because we didn't bind to the field to continually watch it
                                        jQuery('tr.tribe-tickets-meta-row').show();
                                    });
                                </script>
                                <?php
}
add_action( 'wp_footer', 'cliff_all_tickets_default_quantity' );
function wp_visual_icon_fonts_remove(){
   wp_dequeue_style( 'wpvi-font-css' );
}
add_action( 'wp_enqueue_scripts', 'wp_visual_icon_fonts_remove', 100 );
/**
 * Remove the Tribe Customier css <script>
 */
function tribe_remove_customizer_css(){
	if ( class_exists( 'Tribe__Customizer' ) ) {
		remove_action( 'wp_print_footer_scripts', array( Tribe__Customizer::instance(), 'print_css_template' ), 15 );
	}
}
add_action( 'wp_footer', 'tribe_remove_customizer_css' );
// Remove TablePress plugin CSS in favor of using LESS from Twitter Bootstrap, see https://gist.github.com/Willem-Siebe/ba6428a1dcd6b767a818.
add_filter( 'tablepress_use_default_css', '__return_false' );
/* Custom gravity spinner */
function gf_spinner_replace( $image_src, $form ) {
	return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'; // relative to you theme images folder
}
add_filter( 'gform_ajax_spinner_url', 'gf_spinner_replace', 10, 2 );
//Single
function get_custom_cat_template($single_template) {
   global $post;
   if ( in_category( 'brief' )) {
      $single_template = locate_template('single-briefing.php');
   }
   return $single_template;
} 
add_filter( "single_template", "get_custom_cat_template" ) ;
/**
* Facebook share count
*/
function wp_get_shares( $post_id ) {
    $cache_key = 'misha_share' . $post_id;
    $count = get_transient( $cache_key );
    
    if ( $count === false ) {
	$obj_fb = json_decode( file_get_contents( 'https://graph.facebook.com/?id='.get_permalink($post_id) ) );
        if($obj_fb) {
                                        $count= $obj_fb->share->share_count;
                                        update_post_meta($post->ID, '_facebook_likes', $count, false);
                                        set_transient( $cache_key, $count, 7200 ); // store value in cache for a 1 hour
                                    }
                                    }
    return $count;
}