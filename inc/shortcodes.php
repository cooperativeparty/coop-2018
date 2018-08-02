<?php 
/*
Create shortcode to output publications
*/
add_shortcode( 'publication', 'display_items_shortcode' );
add_shortcode( 'publications', 'display_items_shortcode' );
add_shortcode( 'item', 'display_items_shortcode' );
function display_items_shortcode( $atts ) {
    ob_start();
    extract(
        shortcode_atts( array (
        'id' => null,
        'wrap' => 'Y',
        'xclass' => 'my-2',
        'type' => null,
        'taxonomy' => null,
        'order' => 'date',
        'orderby' => 'title',
        'number' => -1,
        'itemwrap' => null,
        'display' => 'lg',
        'title' => null
    ),$atts));
    global $post;
    
    $options = array(
        'post_type' => 'any',
        'ignore_sticky_posts' =>1,
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $number);
    $post_type = array(
             array(
            'taxonomy' => $taxonomy,
            'field' => 'slug',
            'terms' => $type,
            'operator' => 'IN'
    ));
    
    if(isset($id)){
    $id= array_map("intval", explode(",", $id));    
    $options['post__in'] = $id;
    };
    if(isset($type)){
            $options['tax_query'] = $post_type;
    };
  
$publications = new WP_Query($options); 
if ( $publications->have_posts() ):
    if ($wrap == 'Y'){
        echo '<div class="object-embed-shortcode-wrapper ' . $xclass . '">';
    }
    if(isset($title)){
        echo '<h5>' . $title . '</h5>';
    };
    if($display === 'sm'){
        echo '<ul class="fa-ul">';
while ( $publications->have_posts() ) : $publications->the_post();
        get_template_part( 'loop-templates/shortcode',  get_post_type() . '-sm');
        endwhile;
echo '</ul>';
    } else {
        while ( $publications->have_posts() ) : $publications->the_post();
                echo '<div class="' . $itemwrap . '">';
        get_template_part( 'loop-templates/shortcode',  get_post_type());
                echo '</div>';
        endwhile;
    };

if($wrap == 'Y') {
    echo '</div>';
};
endif;
 wp_reset_query();
 $pubs_output = ob_get_clean();
 return $pubs_output;
};
/* 
/ Posts
*/

add_shortcode( 'post', 'display_post_shortcode' );
add_shortcode( 'posts', 'display_post_shortcode' );
function display_post_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'id' => '',
        'wrap' => 'Y',
        'xclass' => 'my-2 col',
        'type' => 'blog',
        'order' => 'date',
        'orderby' => 'title',
        'number' => -1,
    ), $atts ) );
 
    // define query parameters based on attributes
    global $post;
    $options = array(
        'post_type' => 'post',
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $number,
        'include' => $id,
         'tax_query' => array(
        'taxonomy' => 'category',
        'field' => 'slug',
        'terms' => $type,
        'operator' => 'IN'
    )
    );
$myposts = get_posts( $options );
if ($wrap == 'Y'):    
echo '<div class="publications-shortcode ' . $xclass . '"><div class="col">';
foreach ( $myposts as $post ) : setup_postdata( $post );
    get_template_part( 'loop-templates/card', 'small-post-shortcode' );
   endforeach;
if($wrap == 'Y') :
    echo '</div></div>';
    endif;
    endif;
 $pubs_output = ob_get_clean();
        return $pubs_output;
    wp_reset_postdata();
}
/*
/ Accordions
*/
add_shortcode( 'display-accordion', 'display_acf_accordion_shortcode' );
function display_acf_accordion_shortcode( $atts ) {
     ob_start();
    get_template_part( 'partials/acf', 'accordion' );
     $pubs_output = ob_get_clean();
     return $pubs_output;
}

/* 
/ Shop
*/

add_shortcode( 'shop', 'display_shop_shortcode' );
add_shortcode( 'shops', 'display_shop_shortcode' );
function display_shop_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'id' => '',
        'wrap' => 'Y',
        'xclass' => 'my-2 col',
        'type' => 'blog',
        'order' => 'date',
        'orderby' => 'title',
        'number' => -1,
    ), $atts ) );
 
    // define query parameters based on attributes
    global $post;
    $options = array(
        'post_type' => 'product',
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $number,
        'include' => $id    );
$myposts = get_posts( $options );
if ($wrap == 'Y'):    
echo '<div class="publications-shortcode ' . $xclass . '"><div class="col">';
foreach ( $myposts as $post ) : setup_postdata( $post );
    get_template_part( 'loop-templates/card', 'small-shop-shortcode' );
   endforeach;
if($wrap == 'Y') :
    echo '</div></div>';
    endif;
    endif;
 $pubs_output = ob_get_clean();
        return $pubs_output;
    wp_reset_postdata();
}
/*
/ People
*/
add_shortcode( 'people', 'display_people_shortcode' );
add_shortcode( 'person', 'display_person_shortcode' );
function display_person_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'id' => '',
        'wrap' => 'Y',
        'xclass' => 'my-2 col',
        'itemwrap' => 'col-md-6'
    ), $atts ) );
 
    // define query parameters based on attributes
    global $post;
    $options = array(
        'post_type' => 'person',
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $number,
        'include' => $id);
$myposts = get_posts( $options );
if ($wrap == 'Y'):    
echo '<div class="person-shortcode ' . $xclass . '">';
foreach ( $myposts as $post ) : setup_postdata( $post );
    echo '<div class="' . $itemwrap . '">';
 get_template_part( 'loop-templates/card', 'small-person' );
    echo '</div>';
   endforeach;
if($wrap == 'Y') :
    echo '</div>';
    endif;
    endif;
 $pubs_output = ob_get_clean();
        return $pubs_output;
    wp_reset_postdata();
}
function display_people_shortcode( $atts ) {
    ob_start();
 
    // define attributes and their defaults
    extract( shortcode_atts( array (
        'id' => '',
        'wrap' => 'Y',
        'xclass' => 'my-2 col',
        'type' => 'person',
        'order' => 'date',
        'orderby' => 'title',
        'number' => -1,
        'itemwrap' => 'col-md-6'
    ), $atts ) );
 
    // define query parameters based on attributes
    global $post;
    $options = array(
        'post_type' => 'person',
        'order' => $order,
        'orderby' => $orderby,
        'posts_per_page' => $number,
        'include' => $id,
         'tax_query' => array(
             array(
            'taxonomy' => 'role',
            'field' => 'slug',
            'terms' => $type,
            'operator' => 'IN'
    )));
$myposts = get_posts( $options );
if ($wrap == 'Y'):    
echo '<div class="person-shortcode ' . $xclass . '">';
foreach ( $myposts as $post ) : setup_postdata( $post );
    echo '<div class="' . $itemwrap . '">';
 get_template_part( 'loop-templates/card', 'small-person' );
    echo '</div>';
   endforeach;
if($wrap == 'Y') :
    echo '</div>';
    endif;
    endif;
 $pubs_output = ob_get_clean();
        return $pubs_output;
    wp_reset_postdata();
}


/* 
Events calendar shortcode
*/
function coop_get_tribe_events($atts) {
    ob_start();
	if ( !function_exists( 'tribe_get_events' ) ) { 
		return;
	}
	global $wp_query, $tribe_ecp, $post;
	$ckhp_event_tax = '';
	extract( shortcode_atts( array( 
        'wrap' => 'Y',
        'xclass' => 'my-2 col',
        'category' => '',
		'number' => 5,
        'display'=> 'upcoming'
	), $atts, 'ckhp-tribe-events' ), EXTR_PREFIX_ALL, 'ckhp' );

	if ( $ckhp_category ) {
		$ckhp_event_tax = array( 
			array(
				'taxonomy' => 'tribe_events_cat',
				'field' => 'slug',
				'terms' => $ckhp_category
			) 
		);
	}
	$posts = tribe_get_events(apply_filters('tribe_events_list_widget_query_args', array(
			'eventDisplay' => $ckhp_display,
			'posts_per_page' => $ckhp_number,
			'tax_query'=> $ckhp_event_tax
	)));
	if ( $posts) {
        if ($ckhp_wrap == 'Y'):    
echo '<div class="events-shortcode ' . $ckhp_xclass . '">';
        endif;
		foreach( $posts as $post ) :
			setup_postdata( $post );
			 get_template_part( 'loop-templates/card', 'small-event-shortcode' );
		endforeach;
        if($ckhp_wrap == 'Y') :
    echo '</div>';
    endif;
	} 
	wp_reset_query();
     $events_output = ob_get_clean();
            return $events_output;
    
}
add_shortcode('events', 'coop_get_tribe_events'); // link new function to shortcode name
add_shortcode('event', 'coop_get_tribe_events'); // link new function to shortcode name

function coop_cta_box() {
        ob_start();
     get_template_part( 'partials/cta', 'box' );
        $output = ob_get_contents(); // end output buffering
    ob_end_clean(); // grab the buffer contents and empty the buffer
    return $output;
}
add_shortcode('cta', 'coop_cta_box'); // link new function to shortcode name

/*
Purple Grid
*/
function display_purple_grid_shortcode($atts){
    extract(shortcode_atts(array(
    'ids' => '',
    'colwidth' => 'col-6',
    'color' => 'primary'    
), $atts));
$id_array = explode(',', $ids); 
    $cutom_loop = new WP_Query( array(
        'post_type' => 'any',
        'post__in' => $id_array,
        'ignore_sticky_posts' => true
        ) );
    ob_start();
    if ( $cutom_loop->have_posts() ) :
     echo ' <ul class="flex-grid row mb-md-3">';
    while ( $cutom_loop->have_posts() ) : $cutom_loop->the_post(); global $post;

                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'square-md');
                            echo '<li class="flex-grid-item sq-' . $color . ' image ' . $colwidth . '"> <a style="
                                        background-image: url('. $image[0] .');"
                                        class="flex-grid-content flex-column" href="' . esc_url( get_permalink( $post->ID ) ) . '"><h3>' . $post->post_title . '</h3><div class="description">' . $post->post_excerpt . '</div></a></li>';
   endwhile;
    echo '</ul>';
    endif;
    wp_reset_postdata();
    $content = ob_get_contents();
    ob_end_clean();
    return $content;
};
add_shortcode( 'purple-grid', 'display_purple_grid_shortcode' );
?>