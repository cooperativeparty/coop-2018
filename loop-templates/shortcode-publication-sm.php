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
    <li id="post-<?php the_ID(); ?>" <?php post_class( 'pb-1 border-bottom-1 my-1'); ?>><i class="fa fa-book fa-li" aria-hidden="true"></i>
        <?php the_title( sprintf( '<h6><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
            <div class="text-muted footer-meta-bottom small hidden-print"> <a class="card-link" href="<?php echo $pdf_url; ?>"><i class="fa fa-download"></i> Download</a> <a class="card-link" href="mailto:?Subject=<?php echo rawurlencode(get_the_title()); ?>&Body=The%20Co-operative%20Party%20<?php echo rawurlencode(get_the_title()); ?>%20<?php echo $pdf_url;?>"><i class="fa fa-envelope-o"></i> Email</a> </div>
    </li>