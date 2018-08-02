<?php
/**
 * @package understrap
 */
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- .entry-header -->
        <div class="row">
            <?php if ( has_post_thumbnail() ) { ?>
                <div class="col-md-6 col-lg-3 post-thumb-wrap">
                    <?php         $categories = get_the_category();
            if ( ! empty( $categories ) ) {
            echo '<a class="badge badge-info" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
            }?>
                        <?php echo get_the_post_thumbnail( $post->ID, 'square', array( 'class' => 'img-max' ) ); ?>
                </div>
                <?php };?>
                    <header class="entry-header pb-2 col">
                        <?php the_title( '<h2 class="entry-title display-4 align-bottom ">', '</h2>' ); ?>
                            <?php
            if($post->post_excerpt):
            echo '<p class="lead">'.$post->post_excerpt.'</p>';
            endif;
            ?>
                                <!-- .entry-meta -->
                                <div class="social-buttons pt-2">
                                    <p class="meta">
                                        <?php
                                        get_author_contact();
						
					?>
                                    </p>
                                    <?php if(current_user_can('edit_post')):?> <a class="btn btn-default" href="<?php echo get_edit_post_link( $id, $context ); ?> "><i class="fa fa-cog fa-fw" aria-hidden="true"></i> Edit this post</a>
                                        <?php endif;?>
                                </div>
                    </header>
        </div>
        <div class="row">
            <?php
        
$coop_author_posts = new WP_Query( 
    array('post_type' => 'post',
                            'ignore_sticky_posts' =>1,
          'meta_query' => array(
              array(
                  'key' => 'coop_author',
                  'value' => '"' . get_the_ID() . '"',
                  'compare' => 'LIKE',
				))
         ));
if ( $coop_author_posts->have_posts() ) :?>
                <div class="col-md-6 col-lg-9 push-lg-3 push-md-6">
                    <hr/>
                    <header class="page-header">
                        <h4 class="">Recent posts by <?php the_title();?></h4></header>
                    <div class="row">
                        <?php
  $current_month = get_the_time('F');
                            while ( $coop_author_posts->have_posts() ) : $coop_author_posts->the_post();
                                 get_template_part( 'loop-templates/list', 'small-post' );

                        endwhile;
                    echo '</div>';
        endif;
 ?>
                    </div>
                </div>
    </article>
    <!-- #post-## -->