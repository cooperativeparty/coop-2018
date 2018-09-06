<?php
/**
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="row">
            <!-- .entry-header -->
            <header class="entry-header col pb-2">
                <?php 
                $icon = get_field('title_fa_icon');
                the_title( '<h2 class="entry-title display-4"> <div class="text-muted small"><i class="fa ' . $icon . '"></i>  Briefing:</div><span class="balance-text">', '</span></h2>' ); ?>
                    <div class="d-flex flex-column flex-md-row">
                        <div class="entry-meta text-muted col-hd-8 mt-3">
                            <dl class="row"> <dt class="col-4">From:</dt>
                                <dd class="col-8">
                                    <?php 	the_author(); ?>
                                </dd> <dt class="col-4">For attention of:</dt>
                                <dd class="col-8">
                                    <?php the_terms( $post->ID, 'audience', '', ', ' ); ?>
                                </dd> <dt class="col-4">Published:</dt>
                                <dd class="col-8">
                                    <?php the_date();?>
                                </dd> <dt class="col-4">Last updated:</dt>
                                <dd class="col-8">
                                    <?php the_modified_date(); ?>
                                </dd> <dt class="col-4 d-none d-print-block">Printed:</dt>
                                <dd class="col-8 visible-print-block">
                                    <?php echo date(get_option('date_format')); ?>
                                </dd> <dt class="col-4 hidden-print">Other formats:</dt>
                                <dd class="col-8 hidden-print"><a class="pl-2" href="javascript:window.print()"><i class="fa fa-print" aria-hidden="true"></i> Print</a> </dd>
                            </dl>
                        </div>
                        <!-- .entry-meta -->
                    </div>
                    <hr/>
                    <?php
            if($post->post_excerpt):
            echo '<p class="lead">'.$post->post_excerpt.'</p>';
            endif;
            ?>
            </header>
        </div>
        <div class="row">
            <div class="entry-content col-12 col-md-7">
                <?php the_content();?>
                    <?php
                global $post;
                if ( !has_shortcode( $post->post_content, 'display-accordion' ) ) {  
                get_template_part( 'partials/acf', 'accordion' );
                };
                ?>
            </div>
            <div class="entry-ancillary col-md-5 col-lg-4 mx-auto">
                <?php get_template_part( 'partials/action', 'points' );?>
                    <?php get_template_part( 'partials/contact', 'person' );?>
                        <?php get_template_part( 'partials/attached', 'resources' );?>
                            <?php if(get_field('show_toc')):?>
                                <?php echo '<div class="toc-container"><h3 class="toc-title">'.get_the_title().'</h3><ul class="toc-body">' . toc_get_index(get_the_content()) . '</ul></div></h3>';?>
                                    <?php endif;?>
            </div>
            <?php /*
			wp_link_pages( array(
				'before' => '<div class="page-links ">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) ); */ 
		?>
                <div class="fb-quote "></div>
                <!-- .entry-content -->
                <!-- .entry-footer -->
        </div>
    </article>
    <!-- #post-## -->