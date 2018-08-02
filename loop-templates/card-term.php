<?php
/**
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'card mb-3 mb-md-0'); ?>>
        <?php echo get_the_post_thumbnail( $post->ID, 'square-sm', array( 'class' => 'card-img-top img-max' )  );?>
            <div class="card-block">
                <?php the_title( sprintf( '<h5 class="card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' );
                if(get_field('constituency')) { echo '<h6 class="card-subtitle text-muted mb-2">' . get_field('constituency') . '</h6>'; } 
                else {
                    if(get_field('job_title')) { echo '<h6 class="card-subtitle mb-2" rel="role">' . get_field('job_title') . '</h6>'; }
                }?>
                    <!-- .entry-header -->
                    <?php 
                     if(get_field('constituency')) { 
                    if(get_field('job_title')) { echo '<h6 class="card-subtitle small hidden-sm-down mb-2" rel="role">' . get_field('job_title') . '</h6>'; }
                }
                    ?>
                        <!-- .entry-content -->
                        <!-- .entry-footer -->
            </div>
            <?php if(get_field('user_twitter')) {
                    echo '<div class="card-footer footer-meta-bottom small">';
    if(get_field('user_twitter')) {
        echo '<a class="card-link" href="http://twitter.com/intent/user?screen_name=' . $get_field('user_twitter') . '"><i class="fa fa-twitter-square"></i> Follow</a>';
    }
        if(get_field('user_website')) {
        echo '<a class="card-link" href="' . $get_field('user_website') . '"><i class="fa fa-globe"></i>Website</a>';
    }
                        
                    echo '</div>';
    
}?>
    </article>
    <!-- #post-## -->