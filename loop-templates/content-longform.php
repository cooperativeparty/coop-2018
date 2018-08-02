<?php
/**
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'p-2 my-1'); ?>>
        <div class="row">
            <div class="col-md-3 post-thumb-wrap">
                <?php 
        if(!is_category()):
        $categories = get_the_category();
            if ( ! empty( $categories ) ) {
            echo '<a class="badge badge-info" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }
                endif;
        echo get_the_post_thumbnail( $post->ID, '16by9', array( 'class' => 'img-fluid ml-md-2 mb-2 mb-md-0' )  ); 

        ?> </div>
            <div class="col-md-9">
                <div class="m-md-2 md-mr-3">
                    <header class="entry-header">
                        <?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
                            <?php if ( 'post' == get_post_type() ) : ?>
                                <div class="entry-meta pb-2 small text-muted">
                                    <?php get_meta_date(); ?>
                                </div>
                                <!-- .entry-meta -->
                                <?php endif; ?>
                    </header>
                    <!-- .entry-header -->
                    <div class="entry-content hidden-sm-down">
                        <?php the_content()?>
                            <?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
					'after'  => '</div>',
				) );
			?> </div>
                    <!-- .entry-content -->
                    <footer class="entry-footer">
                        <?php /* understrap_entry_footer();*/ ?>
                    </footer>
                    <!-- .entry-footer -->
                </div>
            </div>
        </div>
    </article>
    <!-- #post-## -->