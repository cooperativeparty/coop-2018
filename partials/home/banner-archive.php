<header id="banner" class="jumbotron jumbotron-fluid bg-primary text-white" data-spy="affix" data-offset-top="166">
    <div class="container clearfix">
        <?php the_archive_title( '<h1 class="page-title display-3 mb-0">', '</h1>' );?>
            <?php the_archive_description( '<div class="lead mt-2 affix-hide">', '</div>' );?>
                <div class="float-right">
                    <?php get_template_part( 'partials/buttons', 'archive' ); ?>
                </div>
    </div>
</header>