<div class="container">
    <?php 
    global $post;
    $current_id = $post->ID;
    $children = get_pages( array( 'child_of' => $post->ID, 'parent' => $post->ID ) );
    
        if ($children) :
     echo ' <ul class="flex-grid row mb-md-3 pr-lg-4">';
                            foreach($children as $post):
                $image = wp_get_attachment_image_src(get_field('banner_image', $post->ID), '16by9');
                            echo '<li class="flex-grid-item image col-md-6 col-xl-3 col-sm-4 col-6"> <a style="
                                        background-image: url('. $image[0] .');"
                                        class="bg-primary flex-grid-content flex-column" href="' . esc_url( get_permalink( $post->ID ) ) . '"><h3>' . $post->post_title . '</h3><div class="description">' . $post->post_excerpt . '</div></a></li>';
                            endforeach;
                            echo '</ul>';
            wp_reset_postdata();endif; ?>
</div>