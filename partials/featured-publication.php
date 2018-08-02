<?php 
$term = get_queried_object();
    $term_id = $term->term_id;
        $args = array(
    'post_type' => 'publication',
        $taxonomy => $term->slug,
    'posts_per_page' => 1,
            'meta_query'    => array(
    array(
        'key'	  	=> 'policyarea_featured',
        'compare' => '==',
        'value'	  	=> '1'
    ),
)
);
$query = new WP_Query( $args );
if ($query->have_posts()):
while ($query->have_posts()):$query->the_post();
 get_template_part( 'loop-templates/featured', 'publication' );
endwhile;
endif; wp_reset_postdata();  ?>