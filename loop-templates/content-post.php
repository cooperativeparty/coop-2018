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
                            <hr class="hidden-sm-down" />
            </header>
        </div>
        <div class="row">
            <?php if ( has_post_thumbnail() ) { ?>
                <figure class=" col-12 figure pb-2 pb-lg-4 img-max post-thumb-wrap hidden-print">
                    <div class="badge badge-info hidden-sm-down">
                        <?php         $categories = get_the_category();
            if ( ! empty( $categories ) ) {
            echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }
            $region = wp_get_object_terms( $post->ID, 'devolved_region');
            if ( ! empty( $region ) ) {
            echo ' / <a href="' . esc_url( get_term_link( $region[0]->term_id ) ) . '">' . esc_html( $region[0]->name ) . '</a>';
            }
             $issues = wp_get_object_terms( $post->ID, 'policyarea');
            if ( ! empty( $issues ) ) {
            echo ' / <a href="' . esc_url( get_term_link( $issues[0]->term_id ) ) . '">' . esc_html( $issues[0]->name ) . '</a>';
            }   
                ?></div>
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
                    <?php the_content();?></div>
            <?php get_template_part('partials/cta', 'box') ;?></div>
            
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