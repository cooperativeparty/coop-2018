<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
$venue_details = tribe_get_venue_details();
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'event pb-2 border-bottom-1 mb-2'); ?>>
        <div class="row">
                <?php 
        echo '<a href="' . get_the_permalink() . '">';
        echo get_the_post_thumbnail( $pdf_id, 'thumbnail', array( 'class' => 'img-fluid' )  );
        echo '</a>';
        ?>
            <div class="col">
                <?php if ( $venue_details ) : ?>
                    <div class="small text-muted">
                        <?php echo tribe_get_start_date(null,false); ?> | <?php echo tribe_get_city(); ?>
                    </div>
                    <?php endif; ?>
                        <?php the_title( sprintf( '<h5 class="card-title"><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h5>' ); ?>
                            <div class="small footer-meta-bottom">
                                <a class="card-link" href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="" rel="bookmark"> <i class="fa fa-info-circle" aria-hidden="true"></i> <?php esc_html_e( 'Event details', 'the-events-calendar' ) ?></a><?php if ( tribe_get_map_link() ) { echo '<a class="card-link" href="' . tribe_get_map_link() .'"><i class="fa fa-map-o" aria-hidden="true"></i> Map</a>'; } ?><?php if ( tribe_get_single_ical_link() ) { echo '<a class="card-link" href="' . tribe_get_single_ical_link() .'"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> iCal</a>'; } ?> </div>
            </div>
        </div>
    </article>