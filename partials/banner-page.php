<?php if(get_field('heading_options') !== 'none'): ?>
    <div id="featured" class="jumbotron text-white bg-primary mb-md-3" style="background:<?php if(get_field('banner_colour') &&  get_field('heading_options') == 'custom') echo get_field('banner_colour');?>!important;">
        <div class="container">
            <div class="d-flex">
                <div class="mr-lg-5">
                    <h2 class="page-title display-3 balance-text">
                            <?php if(get_field('banner_headline') &&  get_field('heading_options') == 'custom')  { 
    echo get_field('banner_headline');
}                        else { 
                                echo get_the_title();
                            }?></h2>
                    <?php if(get_field('banner_content') &&  get_field('heading_options') == 'custom') { 
                            echo '<p class="lead d-none d-lg-block">'. get_field('banner_content') . '</p>'; 
                                                              } else {
                            echo '<p class="lead d-lg-block d-none balance-text">'. get_the_excerpt() . '</p>';
} ?>
                </div>
                <?php if(get_field('banner_sharers') !== false || get_field('heading_options') !== 'custom') { ?>
                    <div class="ml-auto mt-auto hidden-sm-down d-flex flex-no-wrap">
                        <?php get_template_part( 'partials/buttons', 'share' ); ?>
                    </div>
                    <?php };?>
            </div>
        </div>
    </div>
    <?php endif;?>