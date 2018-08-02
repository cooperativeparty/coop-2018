<?php
$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();
if(get_field('heading_options') !== 'none'): ?>
    <div id="featured" class="jumbotron text-white bg-primary mb-md-3" style="background:<?php if(get_field('banner_colour') &&  get_field('heading_options') == 'custom') echo get_field('banner_colour');?>!important;">
        <div class="container">
            <div class="d-flex">
                <?php if(is_singular()):?>
                    <div class="mr-lg-5">
                        <h1 class="display-3 page-title">
                            <?php if(get_field('banner_headline') &&  get_field('heading_options') == 'custom')  { 
    echo get_field('banner_headline');
}                        else { 
                                echo get_the_title();
                            }?></h1>
                        <?php if(get_field('banner_content') &&  get_field('heading_options') == 'custom') { 
                            echo '<p class="lead">'. get_field('banner_content') . '</p>'; 
                                                              } else {
    if ( has_excerpt() ) {
                            echo '<p class="lead">'. get_the_excerpt() . '</p>';
}} ?>
                            <div class="tribe-events-schedule tribe-clearfix">
                                <?php echo tribe_events_event_schedule_details( $event_id, '<h2><i class="fa fa-calendar-o"></i> ', '</h2>' ); ?>
                                    <?php if ( tribe_get_cost() ) : ?> <span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
                                        <?php endif; ?>
                            </div>
                    </div>
                    <div class="ml-auto mt-auto hidden-sm-down d-flex flex-no-wrap">
                        <div class="btn-group" role="group" aria-label="Basic example"> <a class="btn btn-lg btn-outline-primary" href="<?php echo esc_url( tribe_get_events_link() ); ?>">
                        <?php printf( '<i class="fa fa-chevron-left"></i> ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?>
                    </a><a href="<?php echo tribe_get_single_ical_link ();?>" class="btn btn-lg btn-outline-primary"><i class="fa fa-rss"></i> iCal</a></div>
                    </div>
                    <?php else:?>
                        <div class="mr-lg-5">
                            <h1 class="display-3 page-title"><?php echo tribe_get_event_label_plural();?></h1> </div>
                        <div class="ml-auto mt-auto hidden-sm-down d-flex flex-no-wrap"><a href="<?php echo tribe_get_ical_link ();?>" class="btn btn-lg btn-outline-primary"><i class="fa fa-rss"></i> iCal Feed</a></div>
                        <?php endif;?>
            </div>
        </div>
    </div>
    <?php endif;?>
        <?php /*
            <header class="jumbotron jumbotron-fluid bg-primary text-white" data-spy="affix" data-offset-top="166">
                <div class="container">
                    <!-- List Title -->
                    <?php do_action( 'tribe_events_before_the_title' ); ?>
            <h1 class="display-3 page-title events-title"><?php echo tribe_get_events_title() ?></h1>
            <?php do_action( 'tribe_events_after_the_title' ); ?>
                <?php if(is_singular()):?>
                    <div class="tribe-events-schedule">
                        <?php echo tribe_events_event_schedule_details( $event_id, '<p class="lead"><i class="fa fa-calendar-o"></i> ', '</p>' ); ?>
                            <?php if ( tribe_get_cost() ) : ?> <span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
                                <?php endif; ?>
                    </div>
                    <?php endif; ?>
                        <div class="pull-right">
                            <!-- List Header -->
                            <?php do_action( 'tribe_events_before_header' ); ?>
                                <!-- Header Navigation -->
                                <?php do_action( 'tribe_events_before_header_nav' ); ?>
                                    <?php tribe_get_template_part( 'list/nav', 'header' ); ?>
                                        <?php do_action( 'tribe_events_after_header_nav' ); ?>
                                            <!-- #tribe-events-header -->
                                            <?php do_action( 'tribe_events_after_header' ); ?>
                        </div>
                        </div>
                        </header>
                        <?php endif; ?>*/?>