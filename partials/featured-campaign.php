<?php 
$term = get_queried_object();
    $term_id = $term->term_id;
        $args = array(
    'post_type' => 'coop_campaign',
        $taxonomy => $term->slug,
    'posts_per_page' => 1
);
$query = new WP_Query( $args );
if ($query->have_posts()):
echo '<div class="p-3 mb-5 bg-light jumbotron">';
while ($query->have_posts()):$query->the_post();
 get_template_part( 'loop-templates/card', 'campaign' );
endwhile;
echo '</div>';
endif; wp_reset_postdata();  ?>