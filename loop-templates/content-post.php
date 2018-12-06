<?php
/**
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <!-- .entry-header -->
            <header class="entry-header col pb-2">
                <?php the_title( '<h2 class="entry-title display-4 balance-text">', '</h2>' ); ?>
                    <?php
            if($post->post_excerpt):
            echo '<p class="lead balance-text">'.$post->post_excerpt.'</p>';
            endif;
            ?>
                        <?php 	get_meta_author(); ?>
                            <div class="d-flex flex-column flex-md-row">
                                <div class="entry-meta text-muted">
                                    <?php get_meta_date(); ?>
                                </div>
                                <!-- .entry-meta -->
                                <div class="social-buttons mt-2 ml-md-auto mt-md-auto d-flex d-md-inline-flex">
                                    <?php get_template_part( 'partials/buttons', 'share' ); ?>
                                </div>
                            </div>
                            <hr class="hidden-sm-down" /> </header>
        </div>
        <div class="row">
            <?php if ( has_post_thumbnail() ) { ?>
                <figure class=" col-12 figure pb-2 pb-lg-4 img-max post-thumb-wrap hidden-print">
                    <?php echo get_the_post_thumbnail( $post->ID, '16by9', array( 'class' => 'img-max' ) ); ?>
                        <figcaption class="figure-caption pt-2">
                            <?php echo get_post(get_post_thumbnail_id())->post_excerpt;?>
                        </figcaption>
                </figure>
                <?php };
             $toc_class = (get_field('show_toc') ? 'col-md-8' : '');?>
        </div>
        <div class="row">
            <div class="col-12 col-md-8 <?php echo $toc_class;?> mx-auto">
                <div class="entry-content">
                    <?php the_content();?>
                </div>
                <?php get_template_part('partials/cta', 'box') ;?>
            </div>
            <?php get_template_part('partials/show', 'toc') ;?>
                <?php /*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) ); */ 
		?>
                    <div class="fb-quote"></div>
                    <!-- .entry-content -->
                    <!-- .entry-footer -->
        </div>
    </article>
    <!-- #post-## -->