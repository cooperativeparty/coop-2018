<div class="col-12 col-lg-3 widget-area" id="secondary" role="complementary">
    <?php get_template_part( 'partials/cta', 'box' )?>
        <!-- Event featured image, but exclude link -->
        <?php 
    if(is_singular()):
    echo tribe_event_featured_image( $event_id, 'full', false );
    endif; ?>
            <?php tribe_get_template_part( 'modules/bar' ); ?>
                <?php dynamic_sidebar( 'sidebar-all' ); ?>
</div>
<!-- #secondary -->