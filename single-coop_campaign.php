<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */
// not render sidebars.
$this_page_id   = get_queried_object_id();

if ( FLBuilderModel::is_builder_enabled() ) :
get_header('none');
?>
    <div id="page-wrapper">
        <div id="content" tabindex="-1">
            <div id="primary" class="content-area">
                <main class="site-main" id="main">
                    <?php while ( have_posts() ) : the_post(); ?>
                        <?php the_content();?>
                            <?php endwhile; // end of the loop. ?>
                </main>
            </div>
        </div>
    </div>
    <?php else:?>
        <?php
get_header('min');
get_template_part( 'partials/show', 'subpages-pills' ); ?>
            <div class="wrapper" id="page-wrapper" style="background-attachment:fixed; background-position:bottom;background-image: url('<?php echo get_field('coop_background_image') ?>');">
                <div class="container py-5" id="content" tabindex="-1">
                    <div class="row">
                        <!-- Do the left sidebar check -->
                        <div id="primary" class="content-area col-md-6">
                            <main class="site-main" id="main">
                                <div class="entry-content">
                                    <?php while ( have_posts() ) : the_post(); ?>
                                        <?php get_template_part( 'loop-templates/content', 'campaign' ); ?>
                                            <?php endwhile; // end of the loop. ?>
                                </div>
                            </main>
                            <!-- #main -->
                        </div>
                        <div class="col-md-6 col-lg-5 push-lg-1 ml-lg-auto"><a id="sign-campaign" />
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <?php
                            if(get_field('campaign_cta')): 
                               echo '<h2>' . get_field('campaign_cta') . '</h2>';
                               endif;
                            if(get_field('campaign_tags')):
                               $campaign_tags = 'act:' . $post->post_name . ',' . get_field('campaign_tags');
                            else:
                               $campaign_tags = 'act : ' . $post->post_name;
                            endif;
                            if(get_field('campaign_gform_id')) :
                               $gform_id = get_field('campaign_gform_id');
                            else:
                               $gform_id = '64';
                            endif; 
                            $shortcode = sprintf(
                                '[gravityform id="%1$s" title="false" description="false" field_values="tags=%2$s&parameter_name2=value2"]',
                                $gform_id,
                                $campaign_tags);
                                  echo do_shortcode( $shortcode );?> </div>
                            </div>
                        </div>
                        <!-- #primary -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- Container end -->
            </div>
            <!-- Wrapper end -->
            <?php
endif;
get_footer('min'); ?>