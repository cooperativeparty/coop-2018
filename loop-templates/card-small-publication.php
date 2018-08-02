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
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card align-left flush border-none small mb-4'); ?>>
        <?php 
        if (has_post_thumbnail($post->ID)) {
        echo get_the_post_thumbnail( $post->ID, 'a4', array( 'class' => 'card-img-left' )  );
        } else {
        echo get_the_post_thumbnail( $pdf_id, 'a4', array( 'class' => 'card-img-left' )  );    
        };
        ?>
            <div class="card-body">
                <?php the_title( sprintf( '<h6 class="card-title"><a href="%s">', esc_url( get_permalink() ) ), '</a></h6>' );
                echo '<div class="card-text text-muted">' . get_the_excerpt() . '</div>'; ?> </div>
    </article>