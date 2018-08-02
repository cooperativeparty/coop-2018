<?php
/**
 * @package understrap
 */
            global $post;
            setup_postdata( $post );

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <div class="col-3">
                <?php 
        echo '<a href="' . get_the_permalink() . '">';
        echo get_the_post_thumbnail( $post->ID, 'a4', array( 'class' => 'card-img-top img-max' )  );
        echo '</a>';
        ?></div>
            <div class="col">
                <h6 class="text-muted mb-2">Featured campaign</h6>
                <?php the_title( sprintf( '<h5 class="card-title"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
                    echo '<div class="card-subtitle small hidden-sm-down mb-2" rel="role">' . get_the_excerpt() . '</div>'; ?>
                    <div class="footer-meta-bottom small"> <a class="btn-wrap btn btn-danger float-right" href="<?php echo get_the_permalink();?>">Take action</a> </div>
            </div>
        </div>
    </article>