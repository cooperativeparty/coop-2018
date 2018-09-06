<?php
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// Setup an array of venue details for use later in the template
$venue_details = tribe_get_venue_details();
// Venue
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// Organizer
$organizer = tribe_get_organizer();

?>
    <div class="row">
        <div class="col-md-6 post-thumb-wrap">
            <!-- Event Image -->
            <?php 
            // echo '<a href="' . esc_url( tribe_get_event_link() ) .'" class="badge badge-info">' . tribe_get_city() . '</a>'; ?>
                <?php  if(has_post_thumbnail()) {
    echo '<img width="1200" height="675" src="' . tribe_event_featured_image( null, '16by9', false, false  ) . '" class="img-fluid ml-md-2 mb-2 mb-md-0 wp-post-image" alt="">'; 
} else {
    $default = wp_get_attachment_image_src( '17759', '16by9' );
    echo '<img width="1200" height="675" src="' . $default[0] . '" class="img-fluid ml-md-2 mb-2 mb-md-0 wp-post-image" alt="">'; 
} ?></div>
        <div class="col-md-6">
            <div class="mx-md-2 md-mr-3">
                <!-- Event Cost -->
                <?php /* if ( tribe_get_cost() ) : ?> <span class="badge badge-default"><?php echo tribe_get_cost( null, true ); ?></span>
                    <?php endif; */ ?>
                        <!-- Location -->
                        <?php if ( $venue_details ) : ?>
                            <!-- Venue Display Info -->
                            <div class="text-muted">
                                <?php echo $venue_details[linked_name] . ' ' . tribe_get_city(); ?>
                            </div>
                            <!-- .tribe-events-venue-details -->
                            <?php endif; ?>
                                <!-- Event Title -->
                                <?php do_action( 'tribe_events_before_the_event_title' ) ?>
                                    <h2 class="entry-title tribe-events-list-event-title mt-0">
	<a class="tribe-event-url " href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="
                                <?php the_title_attribute() ?>" rel="bookmark">
                                    <?php the_title() ?>
                                        </a>
                                        </h2>
                                    <?php do_action( 'tribe_events_after_the_event_title' ) ?>
                                        <!-- Event Meta -->
                                        <?php do_action( 'tribe_events_before_the_meta' ) ?>
                                            <div class="tribe-events-event-meta">
                                                <div class="author <?php echo esc_attr( $has_venue_address ); ?>">
                                                    <!-- Schedule & Recurrence Details -->
                                                    <div class="entry-meta py-1 small text-primary">
                                                        <?php echo tribe_events_event_schedule_details() ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- .tribe-events-event-meta -->
                                            <?php do_action( 'tribe_events_after_the_meta' ) ?>
                                                <!-- Event Content -->
                                                <?php do_action( 'tribe_events_before_the_content' ) ?>
                                                    <div class="entry-content hidden-sm-down"> </div>
                                                    <div class="small align-items-end">
                                                        <?php if ( tribe_get_map_link() ) { echo '<a class="card-link" href="' . tribe_get_map_link() .'"><i class="fa fa-map-o" aria-hidden="true"></i> Map</a>'; } ?>
                                                            <?php if ( tribe_get_single_ical_link() ) { echo '<a class="card-link" href="' . tribe_get_single_ical_link() .'"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> iCal</a>'; } ?> </div>
            </div>
        </div>
    </div>
    <!-- .tribe-events-list-event-description -->
    <?php
do_action( 'tribe_events_after_the_content' );