<header id="banner" class="jumbotron jumbotron-fluid bg-primary text-white">
    <div class="container clearfix">
        <?php the_archive_title( '<h2 class="page-title display-3 balance-text">', '</h2>' );?>
            <?php the_archive_description( '<div class="lead mt-2 affix-hide">', '</div>' );?>
                <div class="float-right">
                    <?php get_template_part( 'partials/buttons', 'archive' ); ?>
                </div>
    </div>
</header>