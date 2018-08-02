<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

?>
    <div class="tribe-events-meta-group tribe-events-meta-group-venue widget p-2 mb-md-3">
        <h4 class="widget-title tribe-events-single-section-title"> <?php esc_html_e( tribe_get_venue_label_singular(), 'the-events-calendar' ) ?> </h4>
        <dl>
            <?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>
                <dd class="tribe-venue col-md-12">
                    <h5 class="mb-0"> <?php echo tribe_get_venue() ?></h5> </dd>
                <?php if ( tribe_address_exists() ) : ?>
                    <dd class="tribe-venue-location row"> <address class="push-sm-1 col-sm-6 tribe-events-address mb-0">
					<i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo tribe_get_full_address(); ?>
<br/>
					<?php if ( tribe_show_google_map_link() ) : ?>
                        <a class="small" href="<?php echo tribe_get_map_link(); ?>">(View on map)</a>
					<?php endif; ?>
				</address> </dd>
                    <?php endif; ?>
                        <?php if ( ! empty( $phone ) ): ?> <dt> <?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?> </dt>
                            <dd class="tribe-venue-tel">
                                <?php echo $phone ?>
                            </dd>
                            <?php endif ?>
                                <?php if ( ! empty( $website ) ): ?> <dt class="sr-only"> <?php esc_html_e( 'Website:', 'the-events-calendar' ) ?> </dt>
                                    <dd class="url col-md-12 mb-2"><i class="fa fa-globe fa-fw" aria-hidden="true"></i> <a href="<?php echo tribe_get_venue_website_url(); ?>">Venue website</a> </dd>
                                    <?php endif ?>
                                        <?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
        </dl>
    </div>