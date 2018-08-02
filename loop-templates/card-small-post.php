<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'event py-1 py-2 border-bottom-1'); ?>>
        <div class="row">
            <div class="col-3">
                <?php 
        echo '<a href="' . get_the_permalink() . '">';
        echo get_the_post_thumbnail( $pdf_id, 'square', array( 'class' => 'card-img-top img-max' )  );
        echo '</a>';
        ?></div>
            <div class="col">
                <?php the_title( sprintf( '<h6 class="card-title mb-0"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?> <span class="small text-muted"><?php echo wp_get_shares($post->ID);?> Shares</span> </div>
        </div>
    </article>