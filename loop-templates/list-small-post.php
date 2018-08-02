<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'col-12 py-1 border-bottom-1'); ?>>
        <div class="row">
            <div class="col-2 hidden-sm-down">
                <a href="<?php the_permalink();?>">
                    <?php echo get_the_post_thumbnail( $post->ID, 'square-sm', array( 'class' => 'img-fluid ml-md-2 mb-2 mb-md-0' )  );?>
                </a>
            </div>
            <div class="col"> <small class="text-muted"><?php get_meta_date(); ?></small>
                <h5 class="my-2 text-balance"><?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?> </h5></div>
        </div>
    </article>