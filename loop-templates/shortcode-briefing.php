<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'event pl-2 pb-2'); ?>>
        <div class="row"><a class="col-2 hidden-print" href="<?php the_permalink();?>"><i class="fa fa-info-circle fa-4x" aria-hidden="true"></i></a>
            <div class="col">
                <?php the_title( sprintf( '<h6><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?><small class="card-link"><?php get_meta_date(); ?></small></div>
        </div>
    </article>