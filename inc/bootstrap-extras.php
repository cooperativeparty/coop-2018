<?php 

/*
Custom function for Bootstrap dropdowns
*/
function bootstrap_dropdowns($menu_name) {
$menu_name = $menu_name; 
if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
    $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    foreach ( (array) $menu_items as $key => $menu_item ) {
        $title = $menu_item->title;
        $url = $menu_item->url;
        $menu_list .= '<a class="dropdown-item" href="' . $url . '">' . $title . '</a>';
    }
} else {
    $menu_list = '<ul><li>Menu "' . $menu_name . '" not defined.</li></ul>';
}
      echo $menu_list;
}

/* Bootstrap breadcrumbs 
*/
function bootstrap_breadcrumbs() {

$showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
$delimiter = ''; // delimiter between crumbs
$home = 'Home'; // text for the 'Home' link
$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
$before = '<li class="breadcrumb-item" class="breadcrumb-item active">'; // tag before the current crumb
$after = '</li>'; // tag after the current crumb

global $post;
$homeLink = get_bloginfo('url');

if (is_home() || is_front_page()) {

if ($showOnHome == 1) echo '<ul class="breadcrumb small"><li class="breadcrumb-item"><a href="' . $homeLink . '">' . $home . '</a></li></ul>';

} else {

echo '<ul class="breadcrumb small"><li class="breadcrumb-item"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . '</li> ';

if ( is_category() ) {
$thisCat = get_category(get_query_var('cat'), false);
if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
echo $before . '' . single_cat_title('', false) . '' . $after;

} elseif ( is_search() ) {
echo $before . 'Search results for "' . get_search_query() . '"' . $after;

} elseif ( is_day() ) {
echo '<li class="breadcrumb-item" class="breadcrumb-item" ><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
echo '<li class="breadcrumb-item" class="breadcrumb-item"><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . '</li> ';
echo $before . get_the_time('d') . $after;

} elseif ( is_month() ) {
echo '<li class="breadcrumb-item"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '</li> ';
echo $before . get_the_time('F') . $after;

} elseif ( is_year() ) {
echo $before . get_the_time('Y') . $after;

} elseif ( is_single() && !is_attachment() ) {
if ( get_post_type() != 'post' ) {
$post_type = get_post_type_object(get_post_type());
$slug = $post_type->rewrite;
echo '<li class="breadcrumb-item"><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
if ($showCurrent == 1) echo '<li class="breadcrumb-item">' . $delimiter . '</li> ' . $before . get_the_title() . $after;
} else {
$cat = get_the_category(); $cat = $cat[0];
$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
echo '<li class="breadcrumb-item">'. $cats;
if ($showCurrent == 1) echo $before . get_the_title() . $after;
}

} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
$post_type = get_post_type_object(get_post_type());
echo $before . $post_type->labels->singular_name . $after;

} elseif ( is_attachment() ) {
$parent = get_post($post->post_parent);
$cat = get_the_category($parent->ID); $cat = $cat[0];
echo get_category_parents($cat, TRUE, ' ' . $delimiter . '</li> ');
echo '<li class="breadcrumb-item"><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;

} elseif ( is_page() && !$post->post_parent ) {
if ($showCurrent == 1) echo $before . get_the_title() . $after;

} elseif ( is_page() && $post->post_parent ) {
$parent_id = $post->post_parent;
$breadcrumbs = array();
while ($parent_id) {
$page = get_page($parent_id);
$breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
$parent_id = $page->post_parent;
}
$breadcrumbs = array_reverse($breadcrumbs);
for ($i = 0; $i < count($breadcrumbs); $i++) {
echo $breadcrumbs[$i];
if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . '</li> ';
}
if ($showCurrent == 1) echo ' ' . $delimiter . '</li> ' . $before . get_the_title() . $after;

} elseif ( is_tag() ) {
echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

} elseif ( is_author() ) {
global $author;
$userdata = get_userdata($author);
echo $before . 'Articles posted by ' . $userdata->display_name . $after;

} elseif ( is_404() ) {
echo $before . 'Error 404' . $after;
}

if ( get_query_var('paged') ) {
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
echo __('Page') . ' ' . get_query_var('paged');
if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
}

echo '</ul>';

}
} // end dimox_breadcrumbs()
/******************************************************************************************/
/*   Bootstrap 3 Widget Filters                                                           */
/******************************************************************************************/
//*
function wop_bootstrap_widget_output_filters( $widget_output, $widget_type, $widget_id, $sidebar_id ) {
	
	switch( $widget_type ) {
		
		case 'categories' :
      			$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
      			$widget_output = str_replace('<li class="cat-item cat-item-', '<li class="list-group-item cat-item cat-item-', $widget_output);
      			$widget_output = str_replace('(', '<span class="badge badge-pill badge-info ml-2"> ', $widget_output);
      			$widget_output = str_replace(')', ' </span>', $widget_output);
      			break;
		case 'calendar' :
			$widget_output = str_replace('calendar_wrap', 'calendar_wrap table-responsive', $widget_output);
        		$widget_output = str_replace('<table id="wp-calendar', '<table class="table table-condensed" id="wp-calendar', $widget_output);
    			break;
		case 'tag_cloud' :    	
			$regex = "/(<a[^>]+?)( style='font-size:.+pt;'>)([^<]+?)(<\/a>)/"; //clean up
			$replace_with = "$1><span class='label label-primary'>$3</span>$4";
			$widget_output = preg_replace( $regex , $replace_with , $widget_output );
    			break;
		case 'archives' :	
      			$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
      			$widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
			$widget_output = str_replace('(', '<span class="badge badge-pill badge-info ml-2 cat-item-count"> ', $widget_output);
   			$widget_output = str_replace(')', ' </span>', $widget_output);
    			break;
		case 'meta' :   	
        		$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
        		$widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
    			break;
		case 'recent-posts' :   	
        		$widget_output = str_replace('<ul>', '<ul class="list-group">', $widget_output);
        		$widget_output = str_replace('<li>', '<li class="list-group-item">', $widget_output);
			$widget_output = str_replace('class="post-date"', 'class="post-date text-muted small"', $widget_output);
    			break;
		case 'recent-comments' :   	
        		$widget_output = str_replace('<ul id="recentcomments">', '<ul id="recentcomments" class="list-group">', $widget_output);
        		$widget_output = str_replace('<li class="recentcomments">', '<li class="recentcomments list-group-item">', $widget_output);
     			break;
		case 'pages' :   	
	        	$widget_output = str_replace('<ul>', '<ul class="nav nav-stacked nav-pills">', $widget_output);
	     		break;
		case 'nav_menu' :   	
	        	$widget_output = str_replace(' class="menu"', 'class="menu nav nav-stacked nav-pills"', $widget_output);
	    		break;
    		default:
			$widget_output = $widget_output; // not sure if this is needed
	}
      return $widget_output;
}
add_filter( 'widget_output', 'wop_bootstrap_widget_output_filters', 10, 4 ); // not sure if this should be hooked into an action... maybe init or widgets_init
/******************************************************************************************/
/*   Search Form - Using native in wordpress filter                                       */
/******************************************************************************************/
//*
add_filter( 'get_search_form', 'wop_bootstrap_search_form', 100);
function wop_bootstrap_search_form() {
    $value_or_placeholder = ( get_search_query() == '' ) ? 'placeholder' : 'value';
    $label = 'Search';
    $search_text = 'Search this website...';
    $button_text = 'Search';
$form = '<form method="get" class="search-form" action="'.home_url( '/' ).'" role="search">
    <div class="form-group mb-0">
        <label class="sr-only sr-only-focusable" for="bsg-search-form">'.esc_html( $label ).'</label>
        <div class="input-group">
            <input type="search" class="search-field form-control" id="search" name="s" '.$value_or_placeholder.'="'.esc_attr( $search_text ).'">
            <span class="input-group-btn">
                <button type="submit" class="search-submit btn btn-info">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <span class="sr-only">'.esc_attr( $button_text ).'</span>
                </button>
            </span>
        </div>
    </div>
</form>';
    return $form;
}
// */
?>