<?php /**
 * Define current template file
 *
 * Create a global variable with the name of the current
 * theme template file being used.
 *
 * @param $template The full path to the current template
 */
function define_current_template( $template ) {
    $GLOBALS['current_theme_template'] = basename($template);

    return $template;
}
add_action('template_include', 'define_current_template', 1000);
/**
 * Get Current Theme Template Filename
 *
 * Get's the name of the current theme template file being used
 *
 * @global $current_theme_template Defined using define_current_template()
 * @param $echo Defines whether to return or print the template filename
 * @return The name of the template filename, including .php
 */
function get_current_template( $echo = false ) {
    if ( !isset( $GLOBALS['current_theme_template'] ) ) {
        trigger_error( '$current_theme_template has not been defined yet', E_USER_WARNING );
        return false;
    }
        $template = preg_replace('/\\.[^.\\s]{3,4}$/', '', $GLOBALS['current_theme_template']);
    if ( $echo ) {
        echo $template;
    }
    else {
        return $template;
    }
}
?>