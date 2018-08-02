<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
$venue_details = tribe_get_venue_details();
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'event pl-2 pb-2'); ?>>
        <div class="row">
            <?php 
        echo '<a class="hidden-print" href="' . get_the_permalink() . '">';
        echo get_the_post_thumbnail( $pdf_id, 'thumbnail', array( 'class' => 'img-fluid' )  );
        echo '</a>';
        ?>
                <div class="col">
                    <?php the_title( sprintf( '<h5 class="card-title mt-0"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
                        <?php if ( $venue_details ) : ?>
                            <div class="small text-muted">
                                <?php echo tribe_get_start_date(null,false); ?> |
                                    <?php echo tribe_get_city(); ?>
                            </div>
                            <?php endif; ?>
                                <div class="small footer-meta-bottom hidden-print">
                                    <a class="card-link" href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="" rel="bookmark"> <i class="fa fa-info-circle" aria-hidden="true"></i>
                                        <?php esc_html_e( 'Event details', 'the-events-calendar' ) ?>
                                    </a>
                                    <?php if ( tribe_get_map_link() ) { echo '<a class="card-link" href="' . tribe_get_map_link() .'"><i class="fa fa-map-o" aria-hidden="true"></i> Map</a>'; } ?>
                                        <?php if ( tribe_get_single_ical_link() ) { echo '<a class="card-link" href="' . tribe_get_single_ical_link() .'"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> iCal</a>'; } ?> </div>
                </div>
        </div>
    </article>