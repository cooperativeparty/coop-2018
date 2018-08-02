<?php
/**
 * @package understrap
 */
            $pdf_field = get_field('document_url');
            $pdf_id = $pdf_field['id'];
            $pdf_url = $pdf_field['url'];
global $post;
setup_postdata( $post );
?>
    <div class="card small border-none flush">
        <?php 
        if (has_post_thumbnail($post->ID)) {
        echo get_the_post_thumbnail( $post->ID, 'a4-sm', array( 'class' => 'card-img-top' )  );
        } else {
        echo get_the_post_thumbnail( $pdf_id, 'a4-sm', array( 'class' => 'card-img-top' )  );    
        };
        ?>
            <div class="card-body">
                <?php the_title( sprintf( '<h6 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' );
       echo '<p class="card-text hidden-sm-down">' . get_the_excerpt() . '</p>';
      ?> </div>
            <div class="card-footer footer-meta-bottom"> <a class="card-link" href="<?php echo $pdf_url; ?>"><i class="fa fa-download"></i> Download</a> <a class="card-link" href="mailto:?Subject=<?php echo rawurlencode(get_the_title()); ?>&Body=The%20Co-operative%20Party%20<?php echo rawurlencode(get_the_title()); ?>%20<?php echo $pdf_url;?>"><i class="fa fa-envelope-o"></i> Email</a> </div>
    </div>
    <!-- #post-## -->