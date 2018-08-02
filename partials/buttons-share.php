<?php global $post; 
$tweet = get_field( 'suggested_tweet', $post->ID );
$fb_url = rawurlencode(get_the_permalink() . '?utm_source=facebook_share&utm_campaign=' . $post->post_name . '_button&utm_medium=sharer_button' );
$fb_link = 'https://www.facebook.com/dialog/share?app_id=750084415072315&display=popup&href=' . $fb_url . '&amp;quote=' . rawurlencode($tweet);
$tw_url = rawurlencode(get_the_permalink() . '?utm_source=twitter_share&utm_campaign=' . $post->post_name . '_button&utm_medium=sharer_button' );
$tw_link = 'https://twitter.com/intent/tweet?text=' . rawurlencode($tweet) . '%20' . $tw_url . '&related=coopparty';
?>
<div class="btn-group" role="group" aria-label="Share buttons"><a class="hidden-print btn btn-facebook" href="<?php echo $fb_link;?>"> <i class="fa fa-facebook fa-fw mr-1" aria-hidden="true"></i><span class="hidden-xs-down"> Share</span> <span class="badge d-none d-sm-inline"><?php echo wp_get_shares($post->ID);?></span> </a> <a href="<?php echo $tw_link;?>" class="hidden-print btn btn-twitter ml-1"><i class="fa fa fa-twitter" aria-hidden="true"></i><span class="d-none d-sm-inline"> Tweet</span></a></div>