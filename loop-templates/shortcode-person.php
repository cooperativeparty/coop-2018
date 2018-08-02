<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'pl-2 pb-2'); ?>>
        <div class="row">
            <?php 
        echo '<a class="hidden-print" href="' . get_the_permalink() . '">';
        echo get_the_post_thumbnail( $pdf_id, 'thumbnail', array( 'class' => 'img-fluid' )  );
        echo '</a>';
        ?>
                <div class="col">
                    <?php the_title( sprintf( '<h5 class="card-title"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?><span class="mb-0 small hidden-sm-down text-muted"><?php if (get_field('job_title', $post->ID)):
            echo get_field('job_title', $post->ID); 
            elseif (get_field('constituency', $post->ID)):
            echo get_field('constituency', $post->ID);
            endif; ?>  <?php echo get_author_contact_small($post->ID); ?></span> </div>
        </div>
    </article>