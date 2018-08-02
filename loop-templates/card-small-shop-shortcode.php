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
         if (has_post_thumbnail($post->ID)) {
        echo get_the_post_thumbnail( $post->ID, 'A4-sm', array( 'class' => 'card-img-top img-max' )  );
        };
        echo '</a>';
        ?>
                <div class="col">
                    <?php the_title( sprintf( '<h5 class="card-title"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
                        <?php if($post->post_excerpt): echo '<div class="card-subtitle small hidden-sm-down mb-2" rel="role">'.$post->post_excerpt.'</div>'; endif; ?>
                            <a href="<?php echo get_site_url() . '/cart/' . '?add-to-cart=' . $post->ID ;?>" class="btn btn-block btn-sm btn-outline-info"> <i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart </a>
                </div>
        </div>
    </article>