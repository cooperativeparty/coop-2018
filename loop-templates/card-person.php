<?php
/**
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card mb-3 mb-md-0'); ?>>
        <?php echo get_the_post_thumbnail( $post->ID, 'square-sm', array( 'class' => 'card-img-top img-max' )  );?>
            <div class="card-block pb-0">
                <?php the_title( sprintf( '<h5 class="card-title mb-0"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
                                                if(get_field('constituency')) { echo '<h6 class="card-subtitle text-muted my-1">' . get_field('constituency') . '</h6>'; } 
                if(get_field('party_title')) { echo '<div class="badge badge-info mb-1" rel="role">' . get_field('party_title') . '</div>'; }
                                if(get_field('job_title')) { echo '<div class="card-subtitle small hidden-sm-down my-1" rel="role">' . get_field('job_title') . '</div>'; }


                    ?>
                    <!-- .entry-content -->
                    <!-- .entry-footer -->
            </div>
            <div class="card-footer footer-meta-bottom small">
                <?php echo get_author_contact_small(); ?>
            </div>
    </article>
    <!-- #post-## -->