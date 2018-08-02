<?php $settings = array(
    'oauth_access_token' => "20686582-JfjN7rF14jRtrvIPYjy1Z73wxXW6CgvvlmQIrDho2",
    'oauth_access_token_secret' => "FGxv5dXMwJ1dPWbQiVhsjKhOOn2c05JFzjZfgr9jeNsDz",
    'consumer_key' => "N3qFTtYEJ2zGZhes3wxf8Q",
    'consumer_secret' => "0aDswzufbefbDLQjNxzCdv7qTSsaqejb3XOlkFU"
);
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$requestMethod = 'GET';
$getfield = '?q=from%3Acooppartylocal%20OR%20cooppartylocal%20OR%20%23coop100+exclude:retweets+filter:images&count=100&result_type=mixed';


function randomMix() {
    // Found here https://css-tricks.com/snippets/php/random-hex-color/
    $rand = array('screen', 'overlay', 'darken', 'lighten', 'color-dodge', 'color-burn', 'hard-light', 'soft-light', 'luminosity');
    $mix = $rand[array_rand($rand)];;
    return $mix;
}


$twitter = new TwitterAPIExchange($settings);

$api_response = $twitter ->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
$response = json_decode($api_response);
if($response):
echo '<ul class="hexagons">';
$resonse = shuffle($response->statuses);
$i=0;
foreach($response->statuses as $tweet):
  $media = $tweet->entities->media[0]->media_url_https;
if($media):
$i++;
    echo '<li style="mix-blend-mode:' . randomMix() . '"><div><img src="'. wpthumb( $media, 'width=200&height=200&crop=1' ) . '"/></div></li>';
endif;

if($i==9) break;
endforeach;
echo '</ul>';
endif;?>