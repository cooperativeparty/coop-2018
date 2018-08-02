<?php

/*

Template name: Homepage

*/
get_header(); 
if(class_exists('Memcache')){
  echo '<!-- Memcache is enabled.-->';
} else {
echo '<!-- Memcache not enabled.-->';
}
?>
    <?php /*
get_template_part( 'includes/page', 'banner' ); 
*/
?>
        <div class="jumbotron-fluid jumbotron text-white bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 content">
                        <h2 class="display-4">A fairer society means sharing power&nbsp;and working together</h2>
                        <p class="lead">We believe that things work best when ordinary people have a voice, and when services are accountable to the people who use them.</p>
                        <div class="row">
                            <div class="col-sm-12"><a class="btn btn-info" href="https://party.coop/about/"><i class="fa fa-fw fa-info-circle"></i> Learn more</a> <a class="btn btn-danger" href="https://party.coop/join/"><i class="fa-fw fa fa-plus-circle"></i> Join the Party</a></div>
                        </div>
                        <div class="row hidden-sm hidden-xs">
                            <div class="col-sm-4"><a href="https://twitter.com/CoopParty" class="twitter-follow-button" data-size="large" data-show-count="false">Follow @CoopParty</a></div>
                            <div class="col-sm-8" style="overflow:hidden">
                                <div class="fb-like" data-href="https://facebook.com/coopparty" data-layout="standard" data-action="like" data-show-faces="true" data-colorscheme="dark"> </div>
                            </div>
                        </div>
                    </div>
                    <script type="text/javascript">
                        window.twttr = (function (d, s, id) {
                            var t, js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s);
                            js.id = id;
                            js.src = "https://platform.twitter.com/widgets.js";
                            fjs.parentNode.insertBefore(js, fjs);
                            return window.twttr || (t = {
                                _e: []
                                , ready: function (f) {
                                    t._e.push(f)
                                }
                            });
                        }(document, "script", "twitter-wjs"));
                    </script>
                    <div class="col-md-6">
                        <div class="embed-responsive embed-responsive-16by9">
                            <a href="/web/20160707163845/https://party.coop/about">
                                <video class="embed-responsive-item" autoplay controls muted>
                                    <source src="https://s3.eu-west-2.amazonaws.com/coopparty-website-cdn/ballot-box-basket-web.mp4" type="video/mp4"> Your browser does not support the video tag. </video>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="fullwidth intro" id="intro"><div class="container">
		<?php if(have_posts()):while(have_posts()):the_post(); ?>
		
				<?php the_content(); ?>
    <?php endwhile; endif;?>
<div class="row">
<div class="col-sm-3"><a class="btn btn-danger" href="https://party.coop/about/"><i class="fa fa-chevron-right"></i> About the Co-operative Party</a></div>
<div class="col-sm-2"><a href="https://twitter.com/CoopParty" class="twitter-follow-button" data-size="large" data-show-count="false">Follow @CoopParty</a></div>
<div class="col-sm-7" style="overflow:hidden"><div class="fb-like" 
		data-href="https://facebook.com/coopparty" 
		data-layout="standard" 
		data-action="like" 
		data-show-faces="true"
        data-colorscheme="dark">
	</div></div>

</div>				
<script type="text/javascript">
window.twttr = (function (d, s, id) {
  var t, js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src= "https://platform.twitter.com/widgets.js";
  fjs.parentNode.insertBefore(js, fjs);
  return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
}(document, "script", "twitter-wjs"));
</script>
				</div>
	</div>-->
        <div class="fullwidth" id="latest">
            <div class="container">
                <div class="row">
                    <div id="news" class="col-sm-4">
                        <h4><i class="fa fa-rss"></i> News</h4>
                        <?php get_template_part( 'includes/recent', 'list-posts' ); ?>
                    </div>
                    <div id="events" class="col-sm-4 pull-right">
                        <h4><i class="fa fa-calendar"></i> Upcoming Events</h4>
                        <ul class="item-list list-unstyled">
                            <?php	global $post;
	$all_events = tribe_get_events(
		array(
			'eventDisplay'=>'upcoming',
			'posts_per_page'=>3
			)
	);
	foreach($all_events as $post) {
	setup_postdata($post);
	?>
                                <?php get_template_part( 'includes/events', 'loop' ); ?>
                                    <?php } //endforeach 
 wp_reset_query(); ?>
                        </ul> <a class="btn btn-block btn-default" href="http://www.party.coop/events"><i class="fa fa-chevron-right"></i> View all events</a> </div>
                    <div class="col-sm-4 pull-left">
                        <h4><i class="fa fa-book"></i> Publications</h4>
                        <?php get_template_part( 'includes/recent', 'list-publications' ); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php get_footer(); ?>