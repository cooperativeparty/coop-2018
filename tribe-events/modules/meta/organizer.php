<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.4
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple = count( $organizer_ids ) > 1;

$phone = tribe_get_organizer_phone();
$email = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>
    <div class="tribe-events-meta-group tribe-events-meta-group-organizer widget p-2 mb-md-2">
        <h4 class="widget-title tribe-events-single-section-title"><?php echo tribe_get_organizer_label( ! $multiple ); ?></h4>
        <dl class="row">
            <?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );

		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			}

			?> <dt class="sr-only"><?php // This element is just to make sure we have a valid HTML ?></dt>
                <dd class="col-sm-12 tribe-organizer">
                    <h5 class="mb-0"><?php echo tribe_get_organizer_link( $organizer ) ?></h5> </dd>
                <?php
		}

		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) {
				?> <dt class="sr-only">
					<?php esc_html_e( 'Phone:', 'the-events-calendar' ) ?>
				</dt>
                    <dd class="col-sm-12 tribe-organizer-tel"> <i class="fa fa-phone fa-fw" aria-hidden="true"></i>
                        <?php echo esc_html( $phone ); ?>
                    </dd>
                    <?php
			}//end if

			if ( ! empty( $email ) ) {
				?> <dt class="sr-only">
					<?php esc_html_e( 'Email:', 'the-events-calendar' ) ?>
				</dt>
                        <dd class="col-sm-12 tribe-organizer-email"><i class="fa fa-envelope fa-fw" aria-hidden="true"></i>
                            <a href="mailto:<?php echo esc_html( $email ); ?>">
                                <?php echo esc_html( $email ); ?>
                            </a>
                        </dd>
                        <?php
			}//end if

			if ( ! empty( $website ) ) {
				?> <dt class="sr-only">
					<?php esc_html_e( 'Website:', 'the-events-calendar' ) ?>
				</dt>
                            <dd class="col-sm-12  tribe-organizer-url"> <i class="fa fa-globe fa-fw" aria-hidden="true"></i>
                                <?php echo $website; ?>
                            </dd>
                            <?php
			}//end if
		}//end if

		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>
        </dl>
    </div>