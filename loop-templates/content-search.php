<?php
/**
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'py-2 my-2 clearfix'); ?>>
        <div class="row">
            <a class="pseudolink" href="<?php the_permalink();?>"></a>
            <div class="col-1 post-thumb-wrap hidden-md-down">
                <?php echo '<a class="badge badge-info" href="' . get_post_type_archive_link(get_post_type( get_the_ID() )) . '">' . get_post_type( get_the_ID() ) . '</a>'; ?> </div>
            <div class="col-11">
                <header class="entry-header">
                    <h3 class="entry-title"><a href="<?php the_permalink();?>" rel="bookmark"><?php search_title_highlight(); ?></a></h3>
                    <?php if ( 'post' == get_post_type() ) : ?>
                        <div class="entry-meta pb-2 small text-muted">
                            <?php get_meta_date(); ?>
                        </div>
                        <!-- .entry-meta -->
                        <?php endif; ?>
                </header>
                <!-- .entry-header -->
                <div class="entry-content hidden-sm-down">
                    <?php
            if($post->post_excerpt):
            echo '<p>'. search_excerpt_highlight() .'</p>';
            endif;
            ?>
                </div>
                <!-- .entry-summary -->
            </div>
        </div>
    </article>
    <!-- #post-## -->