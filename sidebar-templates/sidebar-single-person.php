<div class="col-md-3 widget-area" id="secondary" role="complementary">
    <div class="affix-container" itemscope="itemscope" data-spy="affix" data-offset-top="110" data-offset-bottom="500" itemtype="http://schema.org/SiteNavigationElement">
        <?php
        global $post;
    $post_slug=$post->post_name;
$posts_byauthor = new WP_Query(array(
							'post_type' => 'post',
                            'author__in' => $post_slug,
                            'posts_per_page' => 3
						));        
                            if ( $posts_byauthor->have_posts() ) :
                echo 'Posts by' . $post->title;
                            while ( $posts_byauthor->have_posts() ) : $posts_byauthor->the_post();
                                           the_title();
        the_author();
        echo '<hr/>';
                            endwhile; endif;
        wp_reset_postdata();?>
    </div>
</div>
<!-- #secondary -->