<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version  4.3
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>
    <div id="tribe-events-content" class="tribe-events-single entry-content">
        <!-- Notices -->
        <?php tribe_the_notices() ?>
            <!-- #tribe-events-header -->
            <?php while ( have_posts() ) :  the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class( 'row'); ?>>
                    <!-- Event content -->
                    <div class="tribe-events-single-event-description tribe-events-content col">
                        <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
                            <?php the_content(); ?>
                                <!-- .tribe-events-single-event-description -->
                                <?php  get_template_part( 'partials/listings', 'speakers' );?>
                                    <?php  get_template_part( 'partials/listings', 'organisers' );?>
                                        <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
                    </div>
                    <?php if (!FLBuilderModel::is_builder_enabled() ) :?>
                        <div id="secondary" class="col-md-6 pl-md-5">
                            <!-- Event meta -->
                            <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
                                <?php tribe_get_template_part( 'modules/meta' ); ?>
                                    <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                        </div>
                        <?php endif;?>
                </div>
                <!-- #post-x -->
                <?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
                    <?php endwhile; ?>
    </div>
    <!-- #tribe-events-content -->