<?php 
    global $post;
    if($post->post_parent):
    $ancestors = get_ancestors( $post->ID, 'page' );
    $children = get_pages('title_li=&child_of='. $post->post_parent .'&echo=0&hierarchical=1&depth=1&parent=' . $post->post_parent);
    $parent = get_page($post->post_parent);
    endif;
    if ($children) : ?>
    <div class="subnav-wrap hidden-print mt-2 mt-md-3">
        <div class="container">
            <ul class="d-flex flex-column flex-md-row flex-md-wrap list-unstyled nav nav-pills">
                <li class="nav-item">
                    <a class="font-weight-bold nav-link" href="<?php echo get_the_permalink($parent->ID);?>">
                        <?php echo get_the_title($parent->ID);?> <i class="fa fa-caret-right" aria-hidden="true"></i></a>
                </li>
                <?php foreach($children as $post):
                    $current_class = ($post->ID === $current_id ? 'active' : '' );
                    setup_postdata($post);?>
                    <li class="nav-item">
                        <a href="<?php the_permalink();?>" class="nav-link <?php echo $current_class;?>">
                            <?php the_title();?>
                        </a>
                    </li>
                    <?php endforeach;
            wp_reset_postdata();?>
            </ul>
        </div>
        <hr/> </div>
    <?php endif; ?>