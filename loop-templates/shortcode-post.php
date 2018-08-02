<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'event pb-2 border-bottom-1 mb-2'); ?>>
        <div class="row">
            <?php 
        echo '<a href="' . get_the_permalink() . '">';
        echo get_the_post_thumbnail( $pdf_id, 'thumbnail', array( 'class' => 'img-fluid' )  );
        echo '</a>';
        ?>
                <div class="col">
                    <?php the_title( sprintf( '<h5 class="card-title"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?><small class="text-muted"><?php get_meta_date(); ?></small> </div>
        </div>
    </article>