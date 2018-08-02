<?php if( have_rows('action_point') ):?>
    <div class="card mb-3 text-white bg-green">
        <div class="card-header"><h5>Action Points</h5></div>
        <ul class="text-white list-group list-group-flush">
            <?php  while ( have_rows('action_point') ) : the_row();?>
                <li class="list-group-item"><i class="fa fa-fw <?php the_sub_field('action_point_icon');?>"></i>
                    <?php 
                    if(get_sub_field('action_point_url')) :
                     echo '<a class="text-white" href="' . get_sub_field('action_point_url') . '">' . get_sub_field('action_point_header') . '</a>';                
                    else:
                    the_sub_field('action_point_header');
                    endif;
                    if(get_sub_field('action_point_description')) :
                    echo '<div class="small">' . get_sub_field('action_point_description');
                    if(get_sub_field('action_point_url')) :
                     echo '<a class="hidden-print float-right text-dark" href="' . get_sub_field('action_point_url') . '"> (More) </a>';                
                    endif;
                    echo '</div>';                
                    endif;
                    ?> </li>
                <?php endwhile; ?>
        </ul>
    </div>
    <?php endif; ?>