<?php
/**
 * Declaring widgets
 *
 *
 * @package understrap
 */

/**
 * Pull through custom widgets
 */
unregister_sidebar( 'sidebar-1' );
unregister_sidebar( 'right-sidebar' );
unregister_sidebar( 'left-sidebar' );
function understrap_widgets_init() {
	register_sidebar( array(
			'name'          => __( 'Blog single sidebar', 'understrap' ),
			'id'            => 'sidebar-single',
			'description'   => 'Blog post sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	register_sidebar( array(
			'name'          => __( 'Blog archive sidebar', 'understrap' ),
			'id'            => 'sidebar-archive',
			'description'   => 'Blog post sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		register_sidebar( array(
			'name'          => __( 'People sidebar', 'understrap' ),
			'id'            => 'sidebar-people',
			'description'   => 'Left sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
    
    		register_sidebar( array(
			'name'          => __( 'Publications sidebar', 'understrap' ),
			'id'            => 'sidebar-publication',
			'description'   => 'Publications sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
        		register_sidebar( array(
			'name'          => __( 'Default sidebar', 'understrap' ),
			'id'            => 'sidebar-all',
			'description'   => 'Sidebar displayed across whole site',
			'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
            		register_sidebar( array(
			'name'          => __( 'Woocommerce sidebar', 'understrap' ),
			'id'            => 'woocommerce',
			'description'   => 'Sidebar displayed on shop pages',
			'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
        	register_sidebar( array(
			'name'          => __( 'Single briefing sidebar', 'understrap' ),
			'id'            => 'sidebar-briefing',
			'description'   => 'Briefing post sidebar widget area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s p-2 mb-4">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
    
    		register_sidebar( array(
			'name'          => __( 'Footer Full', 'understrap' ),
			'id'            => 'footerfull',
			'description'   => 'Widget area below main content and above footer',
		    'before_widget'  => '<div id="%1$s" class="mt-2 mb-2 mb-md-0 mt-md-0 hidden-print footer-widget %2$s col">', 
		    'after_widget'   => '</div><!-- .footer-widget -->', 
		    'before_title'   => '<h3 class="widget-title">', 
		    'after_title'    => '</h3>', 
		) );

}
add_action( 'widgets_init', 'understrap_widgets_init' );

require get_stylesheet_directory() . '/inc/widgets/custom-widgets.php';