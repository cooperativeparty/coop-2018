<?php
/**
 * @package understrap
 */
?>
    <?php 
            $pdf_field = get_field('document_url');
            $pdf_id = $pdf_field['id'];
            $pdf_url = $pdf_field['url'];
                            global $current_month;
                            $this_month = get_the_time('F');
                            if( $this_month!=$current_month ):
                                $current_month = $this_month;
                            echo '<h6 class="month-spacer py-2 mb-2 mt-5"><a href="'. get_month_link('', '') . '">' . $current_month . ' ' . get_the_time('Y') . '</a></h6>';
                            endif;  ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'py-2 my-5 clearfix'); ?>>
            <div class="row">
                <div class="col-sm-3 col-4 post-thumb-wrap">
                    <?php 
                    $taxonomies = wp_get_object_terms( $post->ID,  'publication_type' );
            echo '<a class="badge badge-info" href="' . esc_url( get_category_link( $taxonomies[0]->term_id ) ) . '">' . esc_html( $taxonomies[0]->name ) . '</a>';
         echo get_the_post_thumbnail( $pdf_id, 'a4', array( 'class' => 'img-fluid  ml-md-2 mb-2 mb-md-0' )  );

        ?> </div>
                <div class="col-sm-6 col-8 push-sm-3">
                    <div class="m-md-2 md-mr-3">
                        <header class="entry-header">
                            <?php the_title( sprintf( '<h3 class="entry-title"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                <div class="py-1">
                                    <?php 	get_meta_author(); ?>
                                </div>
                                <div class="entry-meta pb-2 small text-muted">
                                    <?php get_meta_date(); ?>
                                </div>
                                <!-- .entry-meta -->
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content hidden-sm-down">
                            <?php
            if($post->post_excerpt):
            echo '<p>'.$post->post_excerpt.'</p>';
            endif;
            ?>
                                <div class="small align-items-end h-100"> <a class="card-link" href="<?php echo $pdf_url; ?>"><i class="fa fa-file-pdf-o"></i> Download</a> <a class="card-link" href="mailto:?Subject=<?php echo rawurlencode(get_the_title()); ?>&Body=The%20Co-operative%20Party%20<?php echo rawurlencode(get_the_title()); ?>%20<?php echo $pdf_url;?>"><i class="fa fa-envelope-o"></i> Email</a> </div>
                        </div>
                        <!-- .entry-content -->
                    </div>
                </div>
            </div>
        </article>
        <!-- #post-## -->