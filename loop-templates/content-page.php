<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'row'); ?>>
        <!-- .entry-header -->
        <?php 
        $toc_class = (get_field('show_toc') ? 'col-md-8' : 'col-md-12');?>
            <div class="entry-content <?php echo $toc_class;?>">
                <?php the_content(); ?>
                    <?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
		?>
                        <?php if(get_field('next__previous')):?>
                            <div class="mt-4">
                                <?php the_next_previous_page_links('section');?>
                            </div>
                            <?php endif;?>
            </div>
            <?php get_template_part('partials/show', 'toc') ;?>
                <!-- .entry-content -->
                <div class="fb-quote"></div>
                <footer class="entry-footer col-12">
                    <?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?> </footer>
                <!-- .entry-footer -->
    </article>
    <!-- #post-## -->