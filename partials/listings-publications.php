<h4 class="text-microsite widget-title">Publications</h4>
<?php 
$term = get_queried_object();
    $term_id = $term->term_id;
        $args = array(
    'post_type' => 'publication',
        $taxonomy => $term->slug,
    'posts_per_page' => 4
);
$query = new WP_Query( $args );
if ($query->have_posts()):
while ($query->have_posts()):$query->the_post();
 get_template_part( 'loop-templates/card', 'small-publication' );
endwhile;
echo '<a class="btn btn-outline-secondary btn-block" href="' . get_term_link($term, $term->slug ) . '">See all<a>';        
endif; wp_reset_postdata();  ?>