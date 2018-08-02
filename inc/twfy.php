<?php
//require_once get_stylesheet_directory() . '/lib/twfyapi.php';
require_once (__DIR__).'/../lib/twfyapi.php';


//Function used to retreive MP info
function get_person_info($mpid) {
    $twfyapi = new TWFYAPI('EtY7A8AzvaXzGqwmy9AekdRL');
    $mp_id = $mpid;
    $mp_basic = unserialize($twfyapi->query('getPerson', array('id' => $mp_id,'output'=>'php')));
    $mp_info = unserialize($twfyapi->query('getMPInfo', array('id' => $mp_id,'output'=>'php')));
    $mp = array_merge($mp_basic[0],$mp_info);
    if(array_key_exists('office',$mp)) {
                $positions = array();
        foreach($mp['office'] as $position) {
        $date_from = $position['to_date'];
        $date = DateTime::createFromFormat('Y-m-d', $date_from);
        $now = new DateTime();
        if($now < $date && strpos($position['position'], 'Member') === FALSE ){
               $positions[] = trim($position['position'].' '.$position['dept']);             
          }}}
    $full_name = isset($mp['full_name']) ? $mp['full_name'] : null;
    $constituency = isset($mp['constituency']) ? $mp['constituency'] : null;
    $mp_website = isset($mp['mp_website']) ? $mp['mp_website'] : null;
    $facebook_page = isset($mp['facebook_page']) ? $mp['facebook_page'] : null;
    $twitter_username = isset($mp['twitter_username']) ? $mp['twitter_username'] : null;
    $wikipedia_url = isset($mp['wikipedia_url']) ? $mp['wikipedia_url'] : null;
    $positions = isset($positions) ? $positions : null;
    $mp_array = array( 
                      'full_name' => $full_name,
                      'constituency' => $constituency,
                      'mp_website' => $mp_website,
                      'facebook_page' => $facebook_page,
                      'twitter_username' => $twitter_username,
                      'wikipedia_url' => $wikipedia_url,
                      'positions' => $positions
                        );
    return $mp_array;
}
// Retreive TWFYID for a post 
function get_person_twfyid($postid) {
    if ( function_exists('update_field') ) {  
    $twfyid = get_field('twfyid',$postid);
    if($twfyid) {
        return $twfyid;
    } else {
        echo 'No TWFYID';
    }
} else {
       echo 'ACF disabled';
    }}
// Function to cycle through and update missing info for MPs
function update_person_info($post_id){
$twfyid = get_person_twfyid($post_id);
$mp_info = get_person_info($twfyid);
if($mp_info) {
    update_field('field_556db7c256b3b', $mp_info['constituency'], $_GET['post']);    
    update_field('field_565c7c1a90993', $mp_info['mp_website'], $_GET['post']);
    update_field('field_565c7be790990', $mp_info['facebook_page'], $_GET['post']);
    update_field('field_565c7bc09098f', $mp_info['twitter_username'], $_GET['post']);
    update_field('field_565c7c0990992', $mp_info['wikipedia_url'], $_GET['post']);
    update_field('field_556db79256b3a', $mp_info['positions'][0], $_GET['post']);
    }
}
function backend_update_person_info() {
    $post_id = $_GET['post'];
    update_person_info($post_id);
}
function display_person_info($post_id) {
    $twfyid = get_person_twfyid($post_id);
$mp_info = get_person_info($twfyid);
    var_dump($mp_info);
}
////
add_action( 'save_post_person', 'backend_update_person_info');
    
//Batch function
function update_person_info_batch() {
    $query = new WP_Query(array(
    'post_type' => 'person',
    'post_status' => 'publish',
        'posts_per_page' => -1,
));
    while ($query->have_posts()) {
    $query->the_post();
        $post_id = get_the_ID();
        update_person_info($post_id);    
}}
    
    
    
    
    

//Diagnostic
/*

    $twfyapi = new TWFYAPI('EtY7A8AzvaXzGqwmy9AekdRL');
    $party = 'Labour\/Co-operative';
    $mplist = unserialize($twfyapi->query('getMPs', array('party' => $party,'output'=>'php')));
ob_start();
    foreach($mplist as $mps) :
    var_dump(get_person_info($mps['person_id']));
ob_flush();
    endforeach;
ob_end_flush();
*/











?>