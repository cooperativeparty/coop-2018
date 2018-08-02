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
    <section class="bg-primary text-white py-2 py-md-3 mb-md-5 jumbotron">
        <div class="container">
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-8'); ?>>
                <div class="row">
                    <div class="col-3 pl-0">
                        <?php 
                        
                                echo '<a href="' . get_the_permalink() . '">';
                if (has_post_thumbnail($post->ID)) {
        echo get_the_post_thumbnail( $post->ID, 'a4', array( 'class' => 'card-img-top img-max' )  );
        } else {
        echo get_the_post_thumbnail( $pdf_id, 'a4', array( 'class' => 'card-img-top img-max' )  );    
        };
        echo '</a>';
        ?></div>
                    <div class="col d-flex flex-column pr-0">
                        <h6 class="text-muted mb-2">Must-read</h6>
                        <?php the_title( sprintf( '<h2 class="entry-title"><a class="text-microsite text-white" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
                    echo '<div class="card-subtitle hidden-sm-down">' . get_the_excerpt() . '</div>'; ?>
                            <div class="footer-meta-bottom small mt-auto align-self-end"> <a class="btn-wrap btn btn-outline-danger mr-0 mr-md-1" href="<?php echo $pdf_url; ?>"><i class="fa fa-file-pdf-o"></i> Download</a><a class="btn-wrap btn btn-danger" href="<?php echo get_the_permalink();?>">Read online</a> </div>
                    </div>
                </div>
            </article>
        </div>
    </section>