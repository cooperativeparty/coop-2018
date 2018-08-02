<?php
// If you use this snippet as-is, ALL of The Events Calendar (i.e. "Core") and Pro add-on styles will NOT be loaded.
// (although there may be some $handles that I didn't detect... especially from widgets, shortcodes, and the like... no guarantess ;-)
// Comment out the line of each style you DO want to load.
// Note the comments within each array regarding the Display style options -- https://theeventscalendar.com/knowledgebase/wp-admin-settings-overview/#display
  // The Display styles are "stacked".
  // In other words, the Skeleton files are always loaded, and the Full styles are loaded when Tribe Events Styles (i.e. Theme) is selected.
  // However, the commented .css example file names can change, e.g. 'full.min.css' instead of 'skeleton.min.css' or 'theme-mobile.min.css' instead of 'full-mobile.min.css'
//
add_action( 'wp_enqueue_scripts', 'cliff_remove_tribe_events_styles', 20 );
function cliff_remove_tribe_events_styles() {
  
  // Core:
  //
  // Current as of 2015-09-25 (version 3.12.2)
  //
  $core_style_handles = array(
    // Skeleton Styles
    'tribe-events-bootstrap-datepicker-css', // /wp-content/plugins/the-events-calendar/vendor/bootstrap-datepicker/css/datepicker.css
    'tribe-events-custom-jquery-styles', // /wp-content/plugins/the-events-calendar/vendor/jquery/smoothness/jquery-ui-1.8.23.custom.css
    //'tribe-events-calendar-style', // NOT recommended to uncomment even in Skeleton styling because then you'll see a huge, ugly img.tribe-events-spinner-medium tribe_loading.gif
        // and you probably SHOULD comment out all 3 of these if you're using the Tribe Events Styles (Theme) styling, else you'll see the big spinner too
        // but do what you want
        // /wp-content/plugins/the-events-calendar/src/resources/css/tribe-events-skeleton.min.css
    
    // Full Styles
    'tribe-events-calendar-mobile-style', // /wp-content/plugins/the-events-calendar/src/resources/css/tribe-events-full-mobile.min.css
    
    // Tribe Events Styles
    'tribe-events-full-calendar-style', // /wp-content/plugins/the-events-calendar/src/resources/css/tribe-events-full.min.css
    'tribe-events-calendar-full-mobile-style', // /wp-content/plugins/the-events-calendar/src/resources/css/tribe-events-full-mobile.min.css
  );
  
  
  // PRO:
  //
  // Current as of 2015-09-25 (version 3.12.1)
  //
  $pro_style_handles = array(
    // Skeleton Styles
    'tribe_events-widget-calendar-pro-style', // /wp-content/plugins/events-pro/src/resources/css/widget-calendar-skeleton.css
    'tribe_events--widget-calendar-pro-override-style', // /wp-content/plugins/events-pro/src/resources/css/widget-calendar-skeleton.css
    'tribe-events-calendar-pro-style', // /wp-content/plugins/events-pro/src/resources/css/tribe-events-pro-skeleton.min.css
    
    // Full Styles
    'tribe-events-calendar-pro-mobile-style', // /wp-content/plugins/events-pro/src/resources/css/tribe-events-pro-full-mobile.min.css when 
    
    // Tribe Events Styles
    'tribe-events-full-pro-calendar-style', // /wp-content/plugins/events-pro/src/resources/css/tribe-events-pro-full.min.css
    'tribe-events-calendar-full-pro-mobile-style', // /wp-content/plugins/events-pro/src/resources/css/tribe-events-pro-full-mobile.min.css
  );
  
  
  
  // do the removing
  //
  $handles_to_remove = array_merge( $core_style_handles, $pro_style_handles );
  
  $handles_to_remove = array_unique( $handles_to_remove ); // shouldn't be necessary but just in case
  
  foreach( $handles_to_remove as $key => $handle ) {
    if( wp_style_is( $handle, $list = 'enqueued' ) ) {
      wp_dequeue_style( $handle );
    }
  }
}?>