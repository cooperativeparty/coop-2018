<?php if( have_rows('accordion_items') ): $i = 0;?>
    <div class="accordion accordion-sticky" id="accordion-acf">
        <?php  while ( have_rows('accordion_items') ) : the_row(); $i++;?>
            <div class="card">
                <div class="card-header" id="heading-<?php echo $i; ?>" class="btn btn-link" data-toggle="collapse" data-target="#accordion-<?php echo $i; ?>" aria-controls="collapseOne">
                    <h5><?php the_sub_field('accordion_header');?>
					</h5> </div>
                <div id="accordion-<?php echo $i; ?>" data-parent="#accordion-acf" class="collapse" aria-expanded="false" aria-labelledby="heading-<?php echo $i; ?>" data-parent="#accordion-acf">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <?php the_sub_field('accordion_body');?>
                            </div>
                            <?php if(get_sub_field('accordion_image')):
                        $image = get_sub_field('accordion_image');
                        echo '<div class="col-md-6 hidden-print">';
                        echo wp_get_attachment_image( $image['id'], 'square-md',array( "class" => "img-max" ));
                        echo '</div>';
                        endif;?> </div>
                        <?php
                        $button = get_sub_field('accordion_button');
                         if($button['accordion_button_url']):
                        ?>
                            <div class="row mb-3">
                                <div class="col-12">
                                    <a href="<?php echo $button['accordion_button_url'];?>" class="btn btn-lg <?php echo $button['accordion_button_colour'];?>">
                                        <?php echo $button['accordion_button_label'];?>
                                    </a>
                                </div>
                            </div>
                            <?php endif;?>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
    </div>
    <?php endif; ?>