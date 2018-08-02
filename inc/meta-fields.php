<?php
function get_meta_date() {
    echo '<time datetime="' . get_the_time('c') . '">' . get_the_time('j<\s\u\p>S</\s\u\p> F Y') . '</time>';
}

function get_meta_category() {
    global $post;
    if(wp_get_object_terms($post->ID, 'category')) {
        $categories = wp_get_object_terms($post->ID, 'category');
        foreach($categories as $category){
            echo '<a class="label label-default" rel="category" href="'.get_term_link($category->slug, 'category').'"><i class="fa fa-tag"></i> '.$category->name.'</a>';
            }}
    else {
     return false;   
    }
}
function get_meta_devolved() {
      global $post;
      $region_terms = wp_get_object_terms($post->ID, 'devolved_region');
            if(!empty($region_terms)){
                if ( ! is_wp_error( $product_terms ) ) {
            foreach($region_terms as $term){
            echo '<a  class="label label-default" rel="devolved" href="'.get_term_link($term->slug, 'devolved_region').'"><i class="fa fa-university"></i> '.$term->name.'</a>'; 
            }}}
    else {
     return false;   
    }
}
function get_meta_policyarea() {
    global $post;
    $issue_terms = wp_get_object_terms($post->ID, 'policyarea');
            if(!empty($issue_terms)){
            foreach($issue_terms as $term){
            echo '<a  class="label label-default" rel="policy" href="'.get_term_link($term->slug, 'policyarea').'"><i class="fa fa-lightbulb-o"></i> '.$term->name.'</a>'; 
            }}
    else {
     return false;   
    }
}
function get_meta_role() {
    global $post;
    $role_terms = wp_get_object_terms($post->ID, 'role');
    if(!empty($role_terms)){
            foreach($role_terms as $term){
            echo '<a class="label" rel="policy" href="'.get_term_link($term->slug, 'role').'"><i class="fa fa-lightbulb"></i> '.$term->name.'</a>';
            }}
    else {
     return false;   
    }   
}
?>