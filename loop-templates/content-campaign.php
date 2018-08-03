<?php
/**
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- .entry-header -->
        <header class="entry-header">
            <?php the_title( '<h2 class="entry-title display-4">', '</h2>' ); ?>
                <?php
            if($post->post_excerpt):
            echo '<p class="lead">'.$post->post_excerpt.'</p>';
            endif;
            ?>
                    <div class="pt-1 mt-3 mb-5 d-block d-sm-none">
                        <a href="#sign-campaign" class="btn btn-block btn-lg btn-danger">
                            <?php echo get_field('campaign_cta',$post->ID);?>
                        </a>
                    </div>
                    <div class="social-buttons pt-1 mb-md-2 d-flex d-md-inline-flex">
                        <?php get_template_part( 'partials/buttons', 'share' ); ?>
                    </div>
                    <!-- .entry-meta -->
                    <hr/> </header>
        <?php if(get_field('campaign_video_url')) {

    echo get_field('campaign_video_url');
}
                elseif ( has_post_thumbnail() ) { ?>
            <figure class="figure pb-2 img-max post-thumb-wrap">
                <?php         $categories = get_the_category();
            if ( ! empty( $categories ) ) {
            echo '<a class="badge badge-info" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }?>
                    <?php echo get_the_post_thumbnail( $post->ID, 'facebook', array( 'class' => 'img-fluid' ) ); ?>
                        <figcaption class="figure-caption">
                            <?php echo get_post(get_post_thumbnail_id())->post_excerpt;?>
                        </figcaption>
            </figure>
            <?php };?>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <hr/>
                <?php /*
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) ); */ 
		?>
                    <div class="fb-quote"></div>
                    <!-- .entry-content -->
                    <footer class="entry-footer">
                        <?php // understrap_entry_footer(); ?>
                    </footer>
                    <!-- .entry-footer -->
    </article>
    <!-- #post-## -->