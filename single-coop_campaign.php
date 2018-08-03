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
            <div class="wrapper" id="page-wrapper">
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
                        <div class="col-md-6 col-lg-5 push-lg-1 ml-lg-auto">
                            <a id="sign-campaign"></a>
                            <div class="card bg-light campaign-sticky">
                                <?php
                            $gforms_options = get_field('campaign_cta_gravityforms');	
                            
                                if(get_field('campaign_cta_custom')):
                                if(get_field('campaign_cta')){
                               echo '<h3 class="card-header">' . get_field('campaign_cta') . '</h3>';
                                };
                                else :
                                echo '<h3 class="card-header">Sign the petition</h3>';
                                endif;                                
                            if(get_field('campaign_gravityforms_option')):
                            if($gforms_options) {
                               $gform_id = $gforms_options['gformid'];
                            } else {
                               $gform_id = '92';
                            };
                            if($gforms_options){ 
                               $campaign_tags = 'act:' . $post->post_name . ',' . $gforms_options['tags'];
                            } else {
                               $campaign_tags = 'act : ' . $post->post_name;
                            };    
                            else:
                                    $gform_id = '92';
                                 $campaign_tags = 'act : ' . $post->post_name;
                            endif;
                            echo '<div class="card-body">';  
                                ///counter bar                         
                            
                                if(get_field('campaign_petition_enable')):
                                $petition_info = get_field('campaign_petition');
                                $starting_number = $petition_info['starting_number'];
                                $goal_count = $petition_info['goal_number'];
                                $submissions_number = do_shortcode(sprintf('[gravitywp_count formid="%1$s" filter_field="4" filter_value="%2$s" thousands_sep="," ]', $gform_id, $campaign_tags));            
                                $display_number = ($starting_number + $submissions_number);
                                $bar_percentage = ($display_number / $goal_count * 100);
                                
                                echo '<h4>' .  $display_number . ' People have signed ' . $bar_percentage . '% ' . $goal_count .' to go!</h4>';    ?>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?php echo $bar_percentage;?>%;" aria-valuenow="<?php echo $bar_percentage;?>" aria-valuemin="0" aria-valuemax="100">
                                            <?php echo $display_number;?> People signed </div>
                                        <?php echo $goal_count;?> Goal </div>
                                    <?php endif;
                                //Gravity form itself
                                                                $shortcode = sprintf(
                                '[gravityform id="%1$s" title="false" description="false" field_values="tags=%2$s&parameter_name2=value2"]',
                                $gform_id,
                                $campaign_tags);
                                  echo do_shortcode( $shortcode );
                                echo '</div>';
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- #primary -->
                </div>
                <!-- .row -->
                <!-- Container end -->
            </div>
            <!-- Wrapper end -->
            <?php
endif;
get_footer('min'); ?>