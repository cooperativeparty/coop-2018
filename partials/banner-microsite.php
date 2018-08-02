<?php
$queried_object = get_queried_object(); $taxonomy = $queried_object->taxonomy; $term_id = $queried_object->term_id; $term = get_queried_object();
if(get_field('show_banner', $queried_object) && get_field('show_banner', $queried_object) == true ) : 
?>
    <?php $image = wp_get_attachment_image_src(get_field('banner_image', $queried_object), 'hidef'); ?>
        <div id="featured" class="jumbotron text-white banner" style="background-attachment:fixed;
                                        background:<?php echo get_field('banner_colour', $queried_object);?>;
                                        background-image: url('<?php echo $image[0]; ?>');
                                        background-blend-mode:<?php echo get_field('background_blend_mode', $queried_object); ?>;
                                        background-repeat:no-repeat;
                                        background-position:center;
                                                                              position:relative;
                                        background-size:<?php echo get_field('background-size', $queried_object);?>;
                                        " data-spy="affix" data-offset-top="166">
            <div class="banner-inner" style="background:<?php echo get_field('banner_colour', $queried_object);?>;
                                             opacity:<?php $alpha = get_field('banner_alpha', $queried_object);
                                             echo $alpha * 0.01;?>;position:absolute;top:0;left:0;width:100%;height:100%"></div>
            <div class="container">
                <div class="col-sm-12">
                    <?php if(get_field('banner_headline', $queried_object)) { echo '<h2 class="display-3 page-title">' . get_field('banner_headline', $queried_object) . '</h2>'; }
                    else {
                        echo '<h2 class="page-title display-3 balance-text">' . get_the_archive_title() . '</h2>';
                    }
                    ?>
                        <div class="lead affix-hide">
                            <?php if(get_field('banner_content')) { echo get_field('banner_content', $queried_object); 
                                                                  } else {
                            echo '<p class="lead">'. term_description() . '</p>';
} ?>
                        </div>
                </div>
                <div class="float-right hidden-sm-down">
                    <?php /* get_template_part( 'partials/buttons', 'share' ); */ ?>
                </div>
            </div>
        </div>
        <?php else: ?>
            <header class="jumbotron jumbotron-fluid bg-primary text-white" data-spy="affix" data-offset-top="166">
                <div class="container">
                    <?php echo '<h2 class="page-title display-3 balance-text">' . $term->name . '</h2>';
      the_archive_description( '<div class="lead affix-hide">', '</div>' );?> </div>
                <div class="pull-right">
                    <?php get_template_part( 'partials/buttons', 'archive' ); ?>
                </div>
            </header>
            <?php endif; ?>