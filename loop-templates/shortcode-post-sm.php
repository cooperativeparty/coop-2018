<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
?>
    <li id="post-<?php the_ID(); ?>" <?php post_class( 'event pb-1 border-bottom-1 my-1'); ?>><i class="fa fa-newspaper-o fa-li" aria-hidden="true"></i>
        <?php the_title( sprintf( '<h6><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?><small class="card-link"><?php get_meta_date(); ?></small> <small class="card-link"><i class="fa fa-user" aria-hidden="true"></i> <?php echo get_the_author(); ?></small> </li>