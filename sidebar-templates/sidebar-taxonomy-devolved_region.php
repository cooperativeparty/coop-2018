<div class="col-lg-4 widget-area" id="secondary" role="complementary">
    <?php get_template_part( 'partials/point', 'person' );?>
        <div id="Events" class="widget p-3 my-3">
            <?php  get_template_part( 'partials/listings', 'events' );?>
        </div>
        <div id="publications" class="widget widget_categories p-3 my-3">
            <?php  get_template_part( 'partials/listings', 'publications' );?>
        </div>
        <div id="" class="p-3 my-3 widget">
            <?php  get_template_part( 'partials/listings', 'people' );?>
        </div>
        <?php dynamic_sidebar( 'sidebar-all' ); ?>
</div>
<!-- #secondary -->