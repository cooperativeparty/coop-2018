<?php
/**
 * @package understrap
 */
global $post;
?>
    <div class="row pt-1">
        <div class="col-2 pr-0">
            <?php echo get_the_post_thumbnail( $post->ID, 'square-sm', array( 'class' => 'rounded-circle float-left' )  );?>
        </div>
        <div class="col-10">
            <h5 class="card-title mb-0"><a class="text-microsite" href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
            <div class="mb-2"> <span class="card-subtitle small hidden-sm-down text-primary"><?php if (get_field('job_title', $post->ID)):
            echo get_field('job_title', $post->ID); 
            elseif (get_field('constituency', $post->ID)):
            echo get_field('constituency', $post->ID);
            endif; ?></span>
                <div class="small my-1">
                    <?php echo get_author_contact_small($post->ID); ?>
                </div>
            </div>
        </div>
    </div>
    <!-- #post-## -->