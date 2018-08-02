<?php if(get_field('contact_person_internal_id') || get_field('contact_person_external')): ?>
    <div class="card mb-3">
        <div class="card-header"><h5>Get help</h5></div>
        <div class="card-body">
            <p class="card-text">
                <?php the_field('contact_person_description');?>
            </p>
        </div>
        <div class="card-footer">
            <?php if(get_field('contact_person_external')){ ?>
                <a class="btn btn-danger ml-auto" href="mailto:<?php echo get_field('contact_person_external_email');?>"> <i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i>
                    <?php echo get_field('contact_person_external_name');?>
                </a>
                <?php  } else{
            $contact_id = get_field('contact_person_internal_id');
            ?> <a class="btn btn-danger float-right" href="mailto:<?php echo get_field('email',$contact_id) ;?>"><i class="fa fa-envelope-o fa-fw" aria-hidden="true"></i> <?php echo get_the_title($contact_id) ;?></a>
                    <?php };?>
        </div>
    </div>
    <?php endif;?>