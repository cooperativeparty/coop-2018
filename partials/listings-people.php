<?php
$term = get_queried_object();
    $term_id = $term->term_id;
 $cats =  get_terms( 'role', 'orderby=count&hide_empty=0' );
if ($cats) :
echo '<h4 class="widget-title text-microsite"> People</h4>';
foreach ($cats as $cat) :
$args = array(
    'post_type' => 'person',
    'posts_per_page' => 6,
    'tax_query' => array(
		'relation' => 'AND',
        'orderby'        => 'rand',
		array(
			'taxonomy' => $taxonomy,
			'field'    => 'slug',
			'terms'    => $term->slug,
		),
		array(
			'taxonomy' => 'role',
			'field'    => 'term_id',
			'terms'    => $cat->term_id
		),
	),
);
$query = new WP_Query( $args );
if (($query->have_posts())) :
echo '<h5 class="mt-2 small">'.$cat->name.' <small class="pull-right"><a href="'. esc_url( get_term_link( $cat ) ) .'">View all</a></small></h5>';
echo '<div class="row m-0 mb-1">';
while (($query->have_posts())) : ($query->the_post());
echo '<div class="col-md-2 p-1">';
echo '<a href="' . get_the_permalink( $post->ID ) .'"  data-toggle="tooltip" data-placement="bottom" title="' . get_the_title($post->ID) . '">';
echo get_the_post_thumbnail( $post->ID, 'square-sm', array( 'class' => 'rounded-circle img-max' )  );
echo '</a>';
echo '</div>';
endwhile;
echo '</div>';
endif;
endforeach;
wp_reset_query();
endif; ?>