<?php 
// Ensure the global $post variable is in scope
$term = get_queried_object();
    $term_id = $term->term_id;
global $post;
// Retrieve the next 5 upcoming events
$upcoming_events = tribe_get_events( array(
    'eventDisplay' => 'upcoming',
    'posts_per_page' => -1,
    $taxonomy => $term->slug,
) );
/*$prev_events = tribe_get_events( array(
    'eventDisplay' => 'past',
    'posts_per_page' => 3,
    'order' => 'DESC',    
    $taxonomy => $term->slug,
) );*/
if($upcoming_events):
echo '<div id="Events" class="widget p-2 my-2">';
echo '<h4 class="text-microsite widget-title">Events</h4>';
echo '<h6 class="month-spacer py-1 mb-1">Upcoming</h6>';
foreach ( $upcoming_events as $post ) :
    setup_postdata( $post );
 get_template_part( 'loop-templates/card', 'small-event' );
endforeach;
echo '<a class="btn btn-outline-secondary btn-block" href="' . get_term_link($term, $term->slug ) . '">See all</a>';  
echo '</div>';
endif;/*
if($prev_events):
echo '<h6 class="month-spacer py-1 mb-1">Past</h6>';
foreach ( $prev_events as $post ) :
    setup_postdata( $post );
 get_template_part( 'loop-templates/card', 'small-event' );
endforeach;
endif;*/
   
wp_reset_postdata(); 
?>