<section class="jumbotron jumbotron-fluid bg-info text-white scrollify">
    <div class="container">
        <h2 class="display-4">Get involved</h2>
        <div class="row">
            <div class="col-md-6 col-hd-5">
                <ul class="flex-grid row mb-md-3 pr-lg-4">
                    <li class="flex-grid-item col-md-6 col-xl-4 col-sm-4 col-6"> <a class="flex-grid-content flex-column grid-border grid-border-white" href="/join"><i class="fa fa-user-plus" aria-hidden="true"></i>
                                        <h4>Join the Party</h4></a> </li>
                    <li class="flex-grid-item col-md-6 col-xl-4 col-sm-4 col-6"> <a href="/donate" class="flex-grid-content flex-column grid-border grid-border-white"><i class="fa fa-gbp" aria-hidden="true"></i>
                                        <h4>Donate</h4></a> </li>
                    <li class="flex-grid-item col-md-6 col-xl-4 col-sm-4 col-6"> <a href="/events" class="flex-grid-content flex-column grid-border grid-border-white"><i class="fa fa-calendar" aria-hidden="true"></i>
                                        <h4>Attend an event</h4></a> </li>
                    <li class="flex-grid-item col-md-6 col-xl-4 col-sm-4 col-6"> <a href="https://twitter.com/intent/follow?screen_name=coopparty" class="flex-grid-content grid-border flex-column grid-border-white"><i class="fa fa-twitter" aria-hidden="true"></i>
                                        <h4>Follow on Twitter</h4></a> </li>
                    <li class="flex-grid-item col-md-6 col-xl-4 col-sm-4 col-6"> <a href="https://facebook.com/coopparty" class="flex-grid-content grid-border flex-column grid-border-white"><i class="fa fa-facebook" aria-hidden="true"></i>
                                        <h4>Like us on Facebook</h4></a> </li>
                    <li class="flex-grid-item col-md-6 col-xl-4 col-sm-4 col-6"> <a href="/shop" class="flex-grid-content grid-border flex-column grid-border-white"><i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                        <h4>Online shop</h4></a> </li>
                    <li class="flex-grid-item col-md-6 col-xl-4 col-sm-4 col-6"> <a href="/members/networks/" class="flex-grid-content grid-border flex-column grid-border-white"><i class="fa fa-handshake-o" aria-hidden="true"></i>
                                        <h4>Join a network</h4></a> </li>
                    <li class="flex-grid-item col-md-6 col-xl-4 col-sm-4 col-6"> <a href="/members/local-parties/" class="flex-grid-content grid-border flex-column grid-border-white"><i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <h4>Find my local party</h4></a> </li>
                </ul>
            </div>
            <?php 
// Retrieve the next 5 upcoming events
$upcoming_events = tribe_get_events( array(
    'eventDisplay' => 'upcoming',
    'posts_per_page' => 3
) );
if($upcoming_events):
                        echo '                        <div class="push-hd-1 col-md-6 ">
                            <h3 class="text-microsite widget-title">Upcoming Events</h3>';
foreach ( $upcoming_events as $post ) :
    setup_postdata( $post );
 get_template_part( 'loop-templates/card', 'small-event' );
endforeach;
echo '<a class="mt-3 btn btn-outline-primary btn-lg btn-block" href="/events">See all</a></div>
                ';     
                            endif;
wp_reset_postdata(); 
                        ?> </div>
    </div>
</section>