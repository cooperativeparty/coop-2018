<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
get_template_part( 'partials/banner', 'event' ); ?>
    <div class="wrapper" id="archive-wrapper">
        <?php if ( is_single() && FLBuilderModel::is_builder_enabled() ) { $container_class = 'container-fluid'; } else { $container_class = 'container';}?>
            <div id="content" class="<?php echo $container_class;?>">
                <div class="row">
                    <?php if(tribe_is_event() && is_single()) {
    $cols= 'col';
} else { 
    $cols = 'col-md-9';
} ;?>
                        <div id="primary" class="<?php echo $cols;?> content-area">
                            <main id="main" class="site-main" role="main">
                                <?php tribe_events_before_html(); ?>
                                    <?php tribe_get_view(); ?>
                                        <?php tribe_events_after_html(); ?>
                                            <!-- #tribe-events-pg-template -->
                            </main>
                        </div>
                        <?php if(!(tribe_is_event() && is_single()) ) {
    get_template_part('sidebar-templates/sidebar', 'events'); 
} ?>
                </div>
            </div>
    </div>
    <?php
get_footer();