<?php function jetpackme_custom_related( $atts = "vertical" ) {
    $posts_titles = array();
     if ( class_exists( 'Jetpack_RelatedPosts' ) && method_exists( 'Jetpack_RelatedPosts', 'init_raw' ) ) {
        $related = Jetpack_RelatedPosts::init_raw()
            ->set_query_name( 'jetpackme-shortcode' ) // Optional, name can be anything
            ->get_for_post_id(
                get_the_ID(),
                array( 'size' => 3 )
            );
 
        if ( $related ) { ?>
    <aside id="recent-posts-3" class="widget widget_recent_entries p-2 mb-4">
        <h4 class="widget-title">Read more</h4>
        <?php            foreach ( $related as $result ) {
                // Get the related post IDs
                $related_post = get_post( $result[ 'id' ] );?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'event py-1 border-bottom-1'); ?>>
                <div class="row">
                    <div class="col-3">
                        <?php 
        echo '<a href="' . get_the_permalink($related_post->ID) . '">';
        echo get_the_post_thumbnail( $related_post->ID, 'square', array( 'class' => 'card-img-top img-max' )  );
        echo '</a>';
        ?></div>
                    <div class="col">
                        <h6 class="media-heading small"><a href="<?php echo get_permalink($related_post->ID);?>"><?php echo $related_post->post_title;?></a></h6> </div>
                </div>
            </article>
            <?php  };?>
    </aside>
    <?php    }}}
 ?>