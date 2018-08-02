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
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'mb-3 col-4  mb-md-0 card-hover'); ?>>
        <?php echo get_the_post_thumbnail( $pdf_id, 'a4', array( 'class' => 'card-img' )  ); ?> <a href="<?php echo get_the_permalink()?>" class="card-img-overlay">
                <?php the_title( '<small>', '</small>' );
                  echo '<h6 class="card-subtitle text-muted mb-2">' . get_the_author() . '</h6>';?> </a> </article>