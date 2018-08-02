<header id="banner" class="jumbotron jumbotron-fluid bg-primary text-white">
    <div class="container d-flex flex-wrap flex-md-nowrap">
            <div class="mr-3">
                <?php the_archive_title( '<h2 class="page-title display-3 balance-text">', '</h2>' );?>
                    <?php the_archive_description('<p class="d-lg-block d-none lead balance-text">', '</p>');?></div>
            <div class="ml-auto mt-auto shrink-self-none">
                <?php get_template_part( 'partials/buttons', 'archive' ); ?>
            </div>
    </div>
</header>