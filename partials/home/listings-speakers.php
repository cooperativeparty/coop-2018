<?php 
if(is_singular()):
$point_person = get_field('speakers', $post->id); 
endif;
if( $point_person ):?>
<div class="col-6">
<h4>Speakers include</h4>
            <?php foreach( $point_person as $p ): ?>
    <div class="card mb-2">
        <div class="card-block p-1">
                <div class="row p-0">
                    <div class="col-2 pr-0">
                        <?php echo get_the_post_thumbnail( $p->ID, 'square-sm', array( 'class' => 'rounded-circle float-left' )  );?>
                    </div>
                    <div class="col-10">
                        <h5 class="card-title"><a class="text-microsite" href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo get_field('job_title', $p->ID); ?><span class="pull-right"><i class="fa fa-twitter" aria-hidden="true"></i> <i class="fa fa-facebook" aria-hidden="true"></i></span></h6></div>
                </div>      </div>
    </div>
                <?php endforeach;?>
</div>
    <?php endif; ?>