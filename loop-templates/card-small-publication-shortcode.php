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
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'pb-2 border-bottom-1 mb-2'); ?>>
        <div class="row">
            <?php 
        echo '<a href="' . get_the_permalink() . '">';
                if (has_post_thumbnail($post->ID)) {
        echo get_the_post_thumbnail( $post->ID, 'A4-sm', array( 'class' => 'card-img-top img-max' )  );
        } else {
        echo get_the_post_thumbnail( $pdf_id, 'A4-sm', array( 'class' => 'card-img-top img-max' )  );    
        };
        echo '</a>';
        ?>
                <div class="col">
                    <?php the_title( sprintf( '<h5 class="card-title"><a class="balance-text" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
                    echo '<div class="card-subtitle small hidden-sm-down mb-2" rel="role">' . get_the_excerpt() . '</div>'; ?>
                        <div class="footer-meta-bottom small"> <a class="card-link" href="<?php echo $pdf_url; ?>"><i class="fa fa-download"></i> Download</a> <a class="card-link" href="mailto:?Subject=<?php echo rawurlencode(get_the_title()); ?>&Body=The%20Co-operative%20Party%20<?php echo rawurlencode(get_the_title()); ?>%20<?php echo $pdf_url;?>"><i class="fa fa-envelope-o"></i> Email</a> </div>
                </div>
        </div>
    </article>