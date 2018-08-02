<?php if( have_rows('resources_list') ):?>
    <div class="card mb-2">
        <div class="card-header">
            <h5>Resources</h5></div>
        <div class="card-body">
            <ul class="fa-ul list-group list-group-flush">
                <?php while ( have_rows('resources_list') ) : the_row();
            
            if(get_sub_field('resources_list_external')) :?>
                    <li class="list-group-item"><i class="fa fa-link fa-li" aria-hidden="true"></i>
                        <h6><a class="text-microsite" href="<?php echo get_sub_field('resources_list_external_link_url');?>" rel="bookmark">
                        <?php echo get_sub_field('resources_list_external_link_title');?></a></h6>
                        <div class="text-muted footer-meta-bottom small">
                            <?php 
                        $url = get_sub_field('resources_list_external_link_url');
                        /* $metadescription = wp_remote_get($url);
                        if($metadescription['description']):
                        echo $metadescription['description'];
                        else:*/
                        $exturl = get_sub_field('resources_list_external_link_url');
                        /* echo str_replace('mailto:','<i class"fa"></i> ',$exturl);
                        endif; */?> </div>
                    </li>
                    <?php else:
            $post_object = get_sub_field('resources_list_internal_link_id');
            if( $post_object ):
            $post = $post_object[0];
            setup_postdata( $post);
            get_template_part( 'loop-templates/shortcode', get_post_type() . '-sm'); 
            wp_reset_postdata();
            endif;
            endif;
            endwhile; ?>
            </ul>
        </div>
    </div>
    <?php endif; ?>