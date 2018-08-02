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
                <div class="col-12 col-md-6 post-thumb-wrap d-none d-sm-block">
                    <?php echo '<a href="' . get_the_permalink() . '">' . get_the_post_thumbnail( $post->ID, '16by9', array( 'class' => 'img-fluid' )  ) . '</a>';?> </div>
                <div class="col-12 col-md-6">
                    <div class="mx-md-2">
                        <header class="entry-header">
                            <div class="entry-meta py-1 small text-primary">
                                <?php get_meta_date(); ?>
                            </div>
                            <?php the_title( sprintf( '<h3 class="entry-title mb-2 mb-md-4 balance-text"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
                                <?php if ( 'post' == get_post_type() ) : ?>
                                    <div class="pb-3">
                                        <?php 	get_meta_author(); ?>
                                    </div>
                        </header>
                        <?php if($post->post_excerpt):
            echo '<div class="entry-content d-none d-md-block"><p class="text-muted mb-0 balance-text">'.$post->post_excerpt.'</p></div>';
            endif;?>
                            <!-- .entry-meta -->
                            <?php endif; ?>
                                <!-- .entry-header -->
                                <!-- .entry-content -->
                    </div>
                </div>
            </div>
        </article>
        <!-- #post-## -->