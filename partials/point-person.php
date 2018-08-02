<?php 
if(is_tax()):
$queried_object = get_queried_object();
$point_person = get_field('point_person', $queried_object); 
elseif(is_singular()):
$point_person = get_field('speakers', $post->id); 
endif;
if( $point_person ):?>
    <div class="card">
        <div class="card-block">
            <h6 class="card-subtitle mb-2 text-muted">For more info</h6>
            <?php foreach( $point_person as $post ):
            setup_postdata($post);?>
                <div class="row pt-1">
                    <div class="col-2 pr-0">
                        <?php echo get_the_post_thumbnail( $p->ID, 'square-sm', array( 'class' => 'rounded-circle float-left' )  );?>
                    </div>
                    <div class="col-10">
                        <h5 class="card-title"><a class="text-microsite" href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo get_field('job_title'); ?><span class="pull-right"><?php echo get_author_contact_small(); ?></span></h6></div>
                </div>
                <?php endforeach;?>
        </div>
    </div>
    <?php endif; ?>