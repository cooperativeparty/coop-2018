<?php
/**
 * @package understrap
 */
?>
    <?php 
                            global $current_month;
                            $this_month = get_the_time('F');
                            if( $this_month!=$current_month ):
                                $current_month = $this_month;
                            echo '<h6 class="month-spacer py-1 mb-5 mt-lg-5"><a href="'. get_month_link('', '') . '">' . $current_month . ' ' . get_the_time('Y') . '</a></h6>';
                            endif;  ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'border-bottom border-light pb-md-4 pb-2 mb-2 mb-md-4'); ?>>
            <div class="row">
                <div class="col-xl-2">
                    <?php 
                $faicon = get_field('title_fa_icon');
               echo '<i class="fa fa-scale text-info ' . $faicon . '"></i>'; ?> </div>
                <div class="col-xl-10 col-12">
                    <div class="mx-md-2">
                        <header class="entry-header">
                            <div class="entry-meta py-1 small text-primary">
                                <?php get_meta_date(); ?>
                            </div>
                            <?php the_title( sprintf( '<h3 class="entry-title mb-4 balance-text"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                <!-- .entry-meta -->
                                <div class="pb-3"> <strong>For the attention of:</strong>
                                    <?php the_terms( $post->ID, 'audience', '', ', ' ); ?>
                                </div>
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content hidden-sm-down">
                            <?php
            if($post->post_excerpt):
            echo '<div class="text-muted mb-0 balance-text">'.$post->post_excerpt.'</div>';
            endif;
            ?> </div>
                        <!-- .entry-content -->
                    </div>
                </div>
            </div>
        </article>
        <!-- #post-## -->