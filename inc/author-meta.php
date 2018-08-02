<?php 

function get_author_contact() {
     global $post;
    if ( function_exists('get_field') ) {
        if(get_field('twitter', $post->id)) {
            $twitter = get_field('twitter', $post->id);
            $twitter = '<a class="btn btn-twitter mr-1" href="https://twitter.com/intent/follow?screen_name=' . $twitter . '"><i class="fa fa-twitter" aria-hidden="true"></i> Follow @' . $twitter . '</a>';
        }
        if(get_field('facebook', $post->id)) {
            $facebook = get_field('facebook', $post->id);
            $facebook = '<a class="btn btn-facebook mr-1" href="' . $facebook . '"><i class="fa fa-facebook-official" aria-hidden="true"></i> Facebook Page </a>';
        }
        if(get_field('wikipedia', $post->id)) {
            $wikipedia = get_field('wikipedia', $post->id);
            $wikipedia = '<a class="btn btn-instagram mr-1" href="' . $wikipedia . '"><i class="fa fa-wikipedia-w" aria-hidden="true"></i><span class="sr-only">W</span>ikipedia </a>';
        }
        if(get_field('personal_website', $post->id)) {
            $website = get_field('personal_website', $post->id);
            $website = '<a class="btn btn-secondary mr-1" href="' . $website . '"><i class="fa fa-globe" aria-hidden="true"></i> Website </a>';
        }
        if(get_field('email', $post->id)) {
            $email = get_field('email', $post->id);
            $email = '<a class="btn btn-secondary mr-1" href="mailto:' . $email . '"><i class="fa fa-envelope-o" aria-hidden="true"></i> Email </a>';
        }
echo $twitter, $facebook, $twfyid, $wikipedia, $website, $email;
    }}

function get_author_contact_small() {
     global $post;
    if ( function_exists('get_field') ) {
        if(get_field('twitter', $post->id)) {
            $twitter = get_field('twitter', $post->id);
            $twitter = '<a class="hidden-print mr-1 text-muted" href="https://twitter.com/intent/follow?screen_name=' . $twitter . '"><i class="fa fa-lg fa-twitter" aria-hidden="true"></i></a><a class="visible-print-inline mr-1 text-muted" href="' . $twitter . '"><i class="fa fa-lg fa-twitter" aria-hidden="true"></i></a>';
        }
        if(get_field('facebook', $post->id)) {
            $facebook = get_field('facebook', $post->id);
            $facebook = '<a class="mr-1 text-muted" href="' . $facebook . '"><i class="fa fa-lg fa-facebook-official" aria-hidden="true"></i></a>';
        }
        if(get_field('wikipedia', $post->id)) {
            $wikipedia = get_field('wikipedia', $post->id);
            $wikipedia = '<a class="mr-1 text-muted" href="' . $wikipedia . '"><i class="fa fa-lg fa-wikipedia-w" aria-hidden="true"></i></a>';
        }
        if(get_field('personal_website', $post->id)) {
            $website = get_field('personal_website', $post->id);
            $website = '<a class="mr-1 text-muted" href="' . $website . '"><i class="fa fa-lg fa-globe" aria-hidden="true"></i></a>';
        }
        if(get_field('email', $post->id)) {
            $email = get_field('email', $post->id);
            $email = '<a class="mr-1 text-muted" href="mailto:' . $email . '"><i class="fa fa-lg fa-envelope-o" aria-hidden="true"></i></a>';
        }
echo $twitter, $facebook, $twfyid, $wikipedia, $website, $email;
    }}

function get_meta_author() {
    /* Are we up and running?*/
    global $post,$coauthors_plus;
    
/* First pref - ACF custom field. First check if it exists*/    
    if ( function_exists('get_field') ) {
        /*Has an ACF relationship been set?*/
        $coop_author = get_field('coop_author');
        if($coop_author){
            echo '<div class="d-flex flex-row">';
        foreach( $coop_author as $post):
        setup_postdata($post); 
         get_template_part( 'loop-templates/author', 'byline-small' );
        endforeach;
         wp_reset_postdata();
            echo '</div>';
        }
    /* No ACF? Then try co-authors */
        elseif ( function_exists( 'coauthors_posts_links' ) ) {
        $coop_author = get_coauthors($post->ID);
        if($coop_author) {
        echo '<div class="d-flex flex-row">';
        foreach( $coop_author as $coauthor):
        $guess = (str_replace(' ', '-', strtolower($coauthor->display_name))); 
        $post = get_page_by_path($guess, OBJECT, 'person');
        $suffix = array('-msp','-mp','cllr-','-am');    
        $guess2 = (str_replace($suffix, '', str_replace(' ', '-', strtolower($coauthor->display_name)))); 
                $post2 = get_page_by_path($guess2, OBJECT, 'person');
        if($post){
            setup_postdata($post); 
       get_template_part( 'loop-templates/author', 'byline-small' );
        }
        elseif($post2) {
         $post = get_page_by_path($guess2, OBJECT, 'person');
             if($post){
            setup_postdata($post); 
       get_template_part( 'loop-templates/author', 'byline-small' );
        }         
        }
        else {
            echo '<a href="' . get_author_posts_url( $coauthor->ID, $coauthor->user_nicename ) . '">' . $coauthor->display_name . '</a>';
           echo '<p class="small textmuted">' . $coauthor->description . '</p>';
            
        }
        endforeach;
            wp_reset_postdata();
            echo '</div>';
        } 
}
    /* end function */
}}

function get_meta_author_posts() {
    
  }
?>