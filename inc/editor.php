<?php // Add TinyMCE style formats.
add_filter( 'tiny_mce_before_init', 'coopparty_tiny_mce_before_init' );

function coopparty_tiny_mce_before_init( $settings ) {

  $style_formats = array(
      array(
          'title' => 'Drop Caps',
          'selector' => 'p',
          'classes' => 'drop-cap',
          'wrapper' => true
          ),
      array(
          'title' => 'Panel',
          'selector' => 'div',
          'classes' => 'panel',
          'wrapper' => true
          ),
            array(
          'title' => 'Red button',
          'selector' => 'a',
          'classes' => 'btn btn-lg btn-danger'
          )
  );
  
    if ( isset( $settings['style_formats'] ) ) {
      $orig_style_formats = json_decode($settings['style_formats'],true);
      $style_formats = array_merge($orig_style_formats,$style_formats);
    }

    $settings['style_formats'] = json_encode( $style_formats );
    return $settings;
}?>