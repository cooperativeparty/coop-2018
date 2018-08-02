<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'page pl-2 pb-2'); ?>>
        <div class="row">
            <?php 
        echo '<a class="hidden-print" href="' . get_the_permalink() . '">';
        echo get_the_post_thumbnail( $pdf_id, 'thumbnail', array( 'class' => 'img-fluid' )  );
        echo '</a>';
        ?>
                <div class="col">
                    <?php the_title( sprintf( '<h5 class="card-title"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
                        <p class="small text-muted mb-0">
                            <?php echo get_the_excerpt();?>
                        </p>
                </div>
        </div>
    </article>