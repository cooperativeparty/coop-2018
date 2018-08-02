<div class="col-lg-4 widget-area" id="secondary" role="complementary">
    <div id="publications" class="widget p-3">
        <?php  get_template_part( 'partials/listings', 'publications' );?>
    </div>
    <?php  get_template_part( 'partials/listings', 'events' );?>
        <?php dynamic_sidebar( 'sidebar-all' ); ?>
</div>
<!-- #secondary -->