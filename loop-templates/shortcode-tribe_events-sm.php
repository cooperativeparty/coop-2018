<?php
/**
 * @package understrap
 */
            global $post;
setup_postdata( $post );
$venue_details = tribe_get_venue_details();
?>
    <li id="post-<?php the_ID(); ?>" <?php post_class( 'event pb-1 border-bottom-1 my-1'); ?>><i class="fa fa-calendar fa-li" aria-hidden="true"></i>
        <?php the_title( sprintf( '<h6><a class="text-microsite" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
            <div class="small text-muted footer-meta-bottom">
                <?php if ( $venue_details ) : ?> <span class="card-link"><i class="fa fa-calendar-o"></i>
                        <?php echo tribe_get_start_date(null,false); ?>
                    </span> <span class="card-link"><i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo tribe_get_city(); ?>
                    </span>
                    <?php endif; ?>
                        <?php if ( tribe_get_map_link() ) { echo '<a class="card-link" href="' . tribe_get_map_link() .'"><i class="fa fa-map-o" aria-hidden="true"></i> Map</a>'; } ?>
                            <?php if ( tribe_get_single_ical_link() ) { echo '<a class="card-link" href="' . tribe_get_single_ical_link() .'"><i class="fa fa-calendar-plus-o" aria-hidden="true"></i> iCal</a>'; } ?> </div>
    </li>