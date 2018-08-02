<?php
/**
 * @package understrap
 */
            global $post;
            $pdf_field = get_field('document_url');
            $pdf_id = $pdf_field['id'];
            $pdf_url = $pdf_field['url'];
setup_postdata( $post );

?>
    <div id="post-<?php the_ID(); ?>" class="object-embed-shortcode d-flex flex-row">
        <?php 
        echo '<div class="shortcode-image align-self-start mr-2"><a class="hidden-print" href="' . get_the_permalink() . '">';
                if (has_post_thumbnail($post->ID)) {
        echo get_the_post_thumbnail( $post->ID, 'A4-xs', array( 'class' => 'hidden-print card-img-top img-max' )  );
        } else {
        echo get_the_post_thumbnail( $pdf_id, 'A4-xs', array( 'class' => 'hidden-print card-img-top img-max' )  );    
        };
        echo '</a></div>';
        ?>
            <div class="shortcode-content d-flex flex-column">
                <?php the_title( sprintf( '<h6 class="mt-auto mb-0"><a class="balance-text" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
                if ( has_excerpt( $post->ID ) ) {
                    echo '<div class="text-muted small hidden-sm-down mb-1" rel="role">' . get_the_excerpt() . '</div>';
                }?>
                    <div class="shortcode-footer ml-auto mt-auto small hidden-print"> <a class="card-link" href="<?php echo $pdf_url; ?>"><i class="fa fa-download"></i> Download</a> <a class="card-link" href="mailto:?Subject=<?php echo rawurlencode(get_the_title()); ?>&Body=The%20Co-operative%20Party%20<?php echo rawurlencode(get_the_title()); ?>%20<?php echo $pdf_url;?>"><i class="fa fa-envelope-o"></i> Email</a> </div>
            </div>
    </div>